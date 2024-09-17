<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;
use App\Exports\ScoresExport;
use App\Imports\ScoresImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use MathPHP\Probability\Distribution\Continuous;

class nilaiController extends Controller
{
    public function index(){
        $nilai = Nilai::all();
        return view('nilai.index',['nilai' => $nilai]);
    }
    public function create(){
        return view('nilai.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'nilai_siswa' => 'required|numeric',
        ]);
    
        $newNilai = Nilai::create($data); 
    
        return redirect(route('nilai.index'));
    }
    public function edit(Nilai $dataSiswa){
        return view('nilai.edit', ['dataSiswa' => $dataSiswa]);
    }
    public function update(Nilai $dataSiswa, Request $request){
        $data = $request->validate([
            'nilai_siswa' => 'required|numeric',
        ]);

        $dataSiswa->update($data);

        return redirect(route('nilai.index'))->with('success', 'Data berhasil terupdate');
    }

    public function delete(Nilai $dataSiswa){
        $dataSiswa->delete();
        return redirect(route('nilai.index'))->with('success','Data berhasil terhapus');
    }
    
    public function dataBergolong()
    {
        $scores = nilai::all();

        // Mengambil nilai minimum dan maksimum dari skor
        $minScore = $scores->min('nilai_siswa');
        $maxScore = $scores->max('nilai_siswa');

        // Menentukan jumlah kelas interval (bisa disesuaikan)
        $jumlahKelas = 10;

        // Menghitung lebar interval
        $intervalWidth = ceil(($maxScore - $minScore) / $jumlahKelas);

        // Mengelompokkan data skor ke dalam kelas interval
        $scoreGroups = [];
        for ($i = 0; $i < $jumlahKelas; $i++) {
            $lowerBound = $minScore + ($i * $intervalWidth);
            $upperBound = $lowerBound + $intervalWidth - 1;
            $count = $scores->whereBetween('nilai_siswa', [$lowerBound, $upperBound])->count();

            // Menyimpan data kelas interval, nilai tengah, dan frekuensi
            $scoreGroups[] = [
                'interval' => "$lowerBound - $upperBound",
                'mid_value' => ($lowerBound + $upperBound) / 2,
                'frequency' => $count,
            ];
        }
    
        return view('nilai.dataBergolong', compact('scoreGroups'));
    }

    public function distribusiFrekuensi()
    {
        $scoreFrequencies = nilai::groupBy('nilai_siswa')
            ->selectRaw('nilai_siswa, count(*) as count')
            ->orderBy('nilai_siswa', 'asc')
            ->get()
            ->map(function ($item) {
                return $item;
            });

           

        return view('nilai.frekuensi', compact('scoreFrequencies'));
    }

    public function getChiSqure()
    {
        $result = DB::table('tb_zed')->get();

        return view('nilai.tabelChi', compact('result'));
    }

    public function calculateChiSqure(Request $request)
    {

        // $request->validate([
        //     'chi' => 'required|regex:/^\d+(\.\d{2})?$/',
        // ]);

        $chi = DB::table('tb_zed')->where('z', substr($request->chi, 0, -1))->first();
        $lastChi    = substr($request->chi, -1);
        $result = '';

        if ($lastChi === '0') {
            $result = $chi->nol;
        } elseif ($lastChi === '1') {
            $result = $chi->satu;
        } elseif ($lastChi === '2') {
            $result = $chi->dua;
        } elseif ($lastChi === '3') {
            $result = $chi->tiga;
        } elseif ($lastChi === '4') {
            $result = $chi->empat;
        } elseif ($lastChi === '5') {
            $result = $chi->lima;
        } elseif ($lastChi === '6') {
            $result = $chi->enam;
        } elseif ($lastChi === '7') {
            $result = $chi->tujuh;
        } elseif ($lastChi === '8') {
            $result = $chi->delapan;
        } elseif ($lastChi === '9') {
            $result = $chi->sembilan;
        } else {
            $result = $chi->nol;
        }


        return back()->with('success', $result);
    }
    
    function normsdist($x)
{
    $distribution = new Continuous\Normal(0, 1); 
    return $distribution->cdf($x); 
}

public function liliefors()
{
    $scores = nilai::all(); # sesuaikan dengan nama model
    $scoresAverage = $scores->avg('nilai_siswa'); # sesuaikan dengan nama colom nilai
    $scoresSTD = DB::table('nilai_ujian') # sesuaikan dengan table dan colom nilai
        ->selectRaw('SQRT(SUM(POWER(nilai_siswa - ' . $scoresAverage . ', 2)) / (COUNT(nilai_siswa) - 1)) AS result')->first();

    $sortedScores = $scores->pluck('nilai_siswa')->sort()->toArray();

    $totalData = count($sortedScores);

    $empiricalCumulativeProbability = [];

    $cumulativeCount = 0;
    foreach ($sortedScores as $value) {
        $cumulativeCount++;
        $empiricalCumulativeProbability[$value] = $cumulativeCount / $totalData;
    }
    //  return $empiricalCumulativeProbability;


    $zScores = [];
    foreach ($scores as $score) {
        $scoreValue = $score->nilai_siswa;
        $zScore = ($scoreValue - $scoresAverage) / $scoresSTD->result;
        $normsdist = $this->normsdist($zScore);
        $zScores[$score->id] = [
            'scoreValue' => $scoreValue,
            'zScore' => number_format($zScore, 5),
            'normsdist' => number_format($normsdist, 5),
            'empiricalCumulativeProbability' =>$empiricalCumulativeProbability[$scoreValue],
            'fx' => abs($normsdist - $empiricalCumulativeProbability[$scoreValue]),
        ];
    }

    return view('nilai.liliefors', compact('scores', 'zScores'));
}

public function export()
{
    return Excel::download(new ScoresExport, 'nilai.xlsx');
}

public function import()
{
    Excel::import(new ScoresImport, request()->file('file'));

    return redirect('/')->with('success', 'Success Import Scores');
}

public function ujiT()
    {
        $result = DB::table('ujit')->get();
        $sumX1 = $result->sum('x1');
        $sumX2 = $result->sum('x2');
        $averageX1 = $result->avg('x1');
        $averageX2 = $result->avg('x2');
        $SD1 = DB::table('ujit')
            ->selectRaw('SQRT(SUM(POWER(x1 - ' . $averageX1 . ', 2)) / (COUNT(x1) - 1)) AS result')->first();
        $SD2 = DB::table('ujit')
            ->selectRaw('SQRT(SUM(POWER(x2 - ' . $averageX2 . ', 2)) / (COUNT(x2) - 1)) AS result')->first();

        $roundedSDX1 = round($SD1->result, 2);
        $roundedSDX2 = round($SD2->result, 2);

        $variance1 = DB::table('ujit')
            ->selectRaw('SUM(POWER(x1 - ' . $averageX1 . ', 2)) / (COUNT(x1) - 1) AS result')
            ->first();
        $variance2 = DB::table('ujit')
            ->selectRaw('SUM(POWER(x2 - ' . $averageX2 . ', 2)) / (COUNT(x2) - 1) AS result')
            ->first();

        $roundedVariance1 = round($variance1->result, 2);
        $roundedVariance2 = round($variance2->result, 2);

        return view('nilai.ujit', compact('result', 'sumX1', 'sumX2', 'averageX1', 'averageX2', 'roundedSDX1', 'roundedSDX2', 'roundedVariance1', 'roundedVariance2'));
    }

    public function biserial()
    {
        $result = DB::table('ujit')->get();
        $N = $result->count();

        // Assuming 'x' is the column you want to calculate biserial correlation for
        $sumX1 = $result->sum('x1');
        $sumX2 = $result->sum('x2');

        $meanX1 = $sumX1 / $N;
        $meanX2 = $sumX2 / $N;

        // Calculate SSY (Sum of Squares for Y) for x1 and x2 separately
        $SSYX1 = $result->sum(function ($item) use ($meanX1) {
            return pow($item->x1 - $meanX1, 2);
        });
        $SSYX2 = $result->sum(function ($item) use ($meanX2) {
            return pow($item->x2 - $meanX2, 2);
        });

        // Calculate ΣY2 for x1 and x2 separately
        $sumY2X1 = $result->sum(function ($item) {
            return pow($item->x1, 2);
        });
        $sumY2X2 = $result->sum(function ($item) {
            return pow($item->x2, 2);
        });
        
        

        // Create a new variable 'total' that combines x1 and x2 values
        $total = $result->pluck('x1')->merge($result->pluck('x2'))->toArray();
        $Ntotal = count($total);
        $sumN = array_sum($total);
        $sumY2N = array_sum(array_map(function ($item) {
            return pow($item, 2);
        }, $total));
        $meanN = $sumN / $Ntotal;
        $SSYN = array_sum(array_map(function ($item) use ($meanN) {
            return pow($item - $meanN, 2);
        }, $total));




        return view('nilai.biserial', compact('result', 'N', 'sumX1', 'sumX2', 'meanX1', 'meanX2', 'SSYX1', 'SSYX2', 'sumY2X1', 'sumY2X2', 'Ntotal', 'sumN', 'sumY2N', 'meanN', 'SSYN'));
    }
}

