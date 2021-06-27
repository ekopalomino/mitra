<?php

namespace Agrinesia\Imports;

use Agrinesia\Models\Process;
use Agrinesia\Models\ProcessDetail;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class NewMitraImport implements OnEachRow, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $row = $row->toArray();
        
        $data = Process::create([
            'registrant_name' => $row['nama_mitra'],
            'area_id' => $row['area_id'],
            'sales_id' => $row['sales_nik'],
        ]);
        dd($data);
        $details = ProcessDetail::create([
            'registrant_id' => $data->id,
            'status_id' => '8b3c1952-d225-4aa1-96fa-ba8f7b3e9b53',
        ]);
    }
}
