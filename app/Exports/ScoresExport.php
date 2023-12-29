<?php

namespace App\Exports;

use App\Models\nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ScoresExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('nilai.export', [
            'scores' => nilai::all() #disesuaikan
        ]);
    }
}
