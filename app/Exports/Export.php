<?php

namespace App\Exports;

use App\User;
use App\fonoapi;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Export implements FromView
{
    var $id;
    var $devicename;

    public function __construct($id,$devicename){
        $this->id = $id;
        $this->devicename = $devicename;
    }

    public function view(): View
    {

        $fonoapi = new fonoapi("f91c731dfb97dd2473f75cb8b942c71543fe85ef4f85809e");

        $productphone = $fonoapi->getDevice($this->devicename);
        $productphone[$this->id]->status_reseaux = 'GSM';
        $productphone[$this->id]->size =  Str::limit($productphone[$this->id]->size, 3,'');
        $productphone[$this->id]->dimensions =  Str::limit($productphone[$this->id]->dimensions, 20,'');
        $productphone[$this->id]->weight =  Str::limit($productphone[$this->id]->weight, 5,'');


        if($productphone[$this->id]->_4g_bands){
            $productphone[$this->id]->status_reseaux = "GSM / HSPA / LTE";
        }elseif(!$productphone[$this->id]->_4g_bands && $productphone[$this->id]->_3g_bands){
            $productphone[$this->id]->status_reseaux = "GSM / HSPA";
        }

        $device[] = $productphone[$this->id];
        return view('layouts.template_excel', [
            'device' => $productphone[$this->id]
        ]);
    }
}
