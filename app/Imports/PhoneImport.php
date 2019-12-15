<?php

namespace App\Imports;

use App\Phone_import;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class PhoneImport implements ToModel
{

    /**
     * @param array $row
     *
     * @return  Phone|null
     */
    public function model(array $row)
    {
        return new Phone_import([
           'DeviceName'     => $row[0]
        ]);
    }
}
