<?php

namespace App\Exports;

use App\Exports\Export;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleOnglet implements WithMultipleSheets
{
    use Exportable;
    var $productphone = [];

    public function __Construct($productphone){
        $this->productphone = $productphone;
    }


    public function sheets(): array
    {
        $sheets = [];
        // dump($this->productphone[0]);
        foreach ($this->productphone as $key => $value) {
            // $value = array_slice($value,0,30);
            foreach ($value as $k => $v) {



                $sheets[] = new Export($v);

            }
        }

        return $sheets;
    }
}
