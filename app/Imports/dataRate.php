<?php

namespace App\Imports;

use App\Models\Rate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class dataRate implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rate([
            'date'=>$row['date'],
            'exchange_rate_usd'=>$row['exchange_rate_usd']
            //
        ]);
    }
}
