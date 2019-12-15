<?php

namespace App\Exports;


use App\fonoapi;
// use Illuminate\Support\Str;
// use Illuminate\Contracts\View\View;
use App\Productphone;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class Export implements FromQuery, WithMapping, WithTitle
{

    use Exportable;
    var $devicename;

    public function __construct($devicename){
        $this->devicename = $devicename;
    }

    public function query()
    {
        $devicename = $this->devicename;

        return Productphone
        ::query()
        ->where('DeviceName','like','%'.$devicename->DeviceName.'%');
    }

    public function map($productphone): array
    {
        // This example will return 3 rows.
        // First row will have 2 column, the next 2 will have 1 column
        return [

                ["DeviceName",$productphone->DeviceName]
                ,["technology",$productphone->technology]
                ,["_2g_bands",$productphone->_2g_bands]
                ,["_3g_bands",$productphone->_3g_bands]
                ,["_4g_bands",$productphone->_4g_bands]
                ,["speed",$productphone->speed]
                ,["usb",$productphone->usb]
                ,["announced",$productphone->announced]
                ,["status",$productphone->status]
                ,["dimensions",$productphone->dimensions]
                ,["weight",$productphone->weight]
                ,["sim",$productphone->sim]
                ,["type",$productphone->type]
                ,["size",$productphone->size]
                ,["resolution",$productphone->resolution]
                ,["protection",$productphone->protection]
                ,["os",$productphone->os]
                ,["chipset",$productphone->chipset]
                ,["cpu",$productphone->cpu]
                ,["gpu",$productphone->gpu]
                ,["card_slot",$productphone->card_slot]
                ,["internal",$productphone->internal]
                ,["triple",$productphone->triple]
                ,["dual_",$productphone->dual_]
                ,["features",$productphone->features]
                ,["video",$productphone->video]
                ,["single",$productphone->single]
                ,["loudspeaker_",$productphone->loudspeaker_]
                ,["_3_5mm_jack_",$productphone->_3_5mm_jack_]
                ,["wlan",$productphone->wlan]
                ,["bluetooth",$productphone->bluetooth]
                ,["gps",$productphone->gps]
                ,["nfc",$productphone->nfc]
                ,["radio",$productphone->radio]
                ,["usb",$productphone->usb]
                ,["sensors",$productphone->sensors]
                ,["charging",$productphone->charging]
                ,["colors",$productphone->colors]
                ,["models",$productphone->models]
                ,["sar",$productphone->sar]
                ,["price",$productphone->price]

        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        $devicename = $this->devicename;
        return $devicename->DeviceName;
    }

}
