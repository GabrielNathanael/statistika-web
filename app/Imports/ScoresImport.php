<?php

namespace App\Imports;

use App\Models\nilai;
use Maatwebsite\Excel\Concerns\ToModel;

class ScoresImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new nilai([
            'nilai_siswa' => $row[0] #disesuaikan
        ]);
    }
}
