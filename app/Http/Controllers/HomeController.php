<?php

namespace App\Http\Controllers;

use App\User;
use App\fonoapi;
use Psy\Util\Str;
use App\Productphone;
use App\Exports\Export;
use App\Imports\PhoneImport;
use Illuminate\Http\Request;
use App\Exports\MultipleOnglet;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productphone = [];

        return view('home',compact('productphone'));
    }

    public function recupDevice(Request $request){

        $input = $request->all();
        $searchdevice = $input['searchdevice'];

        $fonoapi = new fonoapi("f91c731dfb97dd2473f75cb8b942c71543fe85ef4f85809e");

        $productphone = $fonoapi->getDevice($input['searchdevice']);

        return view('home',compact('productphone','searchdevice'));

    }

    public function insertDevice($v){
        // dump($v->DeviceName);
        $productphone = new Productphone();

        // $input = $request->all();
        // $devicename =  ;

        $productphone->DeviceName = $v->DeviceName;

        if (isset($v->technology)){
            # code...
            $productphone->technology = $v->technology ;
        }
        if (isset( $v->_2g_bands)) {
            # code...
            $productphone->_2g_bands = $v->_2g_bands ;
        }
        if (isset($v->_3g_bands) ) {
            # code...
            $productphone->_3g_bands = $v->_3g_bands;
        }
        if (isset($v->_4g_bands) ) {
            # code...
            $productphone->_4g_bands =  $v->_4g_bands;
        }
        if (isset( $v->speed)) {
            # code...
            $productphone->speed = $v->speed ;
        }
        if (isset($v->usb) ) {
            # code...
            $productphone->usb = $v->usb;
        }
        if (isset($v->announced) ) {
            # code...
            $productphone->announced = $v->announced;
        }
        if (isset($v->status )) {
            # code...
            $productphone->status =  $v->status;
        }
        if (isset($v->dimensions) ) {
            # code...
            $productphone->dimensions = $v->dimensions;
        }
        if (isset($v->weight) ) {
            # code...
            $productphone->weight = $v->weight ;
        }
        if (isset($v->sim) ) {
            # code...
            $productphone->sim = $v->sim ;
        }
        if (isset($v->type) ) {
            # code...
            $productphone->type =  $v->type;
        }
        if (isset($v->size) ) {
            # code...
            $productphone->size = $v->size ;
        }
        if (isset($v->resolution) ) {
            # code...
            $productphone->resolution =  $v->resolution;
        }
        if (isset($v->protection) ) {
            # code...
            $productphone->protection =  $v->protection;
        }
        if (isset($v->os) ) {
            # code...
            $productphone->os = $v->os ;
        }
        if (isset( $v->chipset)) {
            # code...
            $productphone->chipset =  $v->chipset;
        }
        if (isset($v->cpu )) {
            # code...
            $productphone->cpu = $v->cpu ;
        }
        if (isset($v->gpu) ) {
            # code...
            $productphone->gpu =  $v->gpu;
        }
        if (isset($v->card_slot) ) {
            # code...
            $productphone->card_slot =  $v->card_slot;
        }
        if (isset($v->internal) ) {
            # code...
            $productphone->internal =  $v->internal;
        }
        if (isset($v->triple) ) {
            # code...
            $productphone->triple =  $v->triple;
        }
        if (isset($v->dual_) ) {
            # code...
            $productphone->dual_ =  $v->dual_;
        }
        if (isset($v->features) ) {
            # code...
            $productphone->features =  $v->features;
        }
        if (isset($v->video) ) {
            # code...
            $productphone->video = $v->video ;
        }
        if (isset($v->single) ) {
            # code...
            $productphone->single =  $v->single;
        }
        if (isset($v->loudspeaker_) ) {
            # code...
            $productphone->loudspeaker_ =  $v->loudspeaker_;
        }
        if (isset($v->_3_5mm_jack_) ) {
            # code...
            $productphone->_3_5mm_jack_ = $v->_3_5mm_jack_ ;
        }
        if (isset($v->wlan) ) {
            # code...
            $productphone->wlan =  $v->wlan;
        }
        if (isset($v->bluetooth) ) {
            # code...
            $productphone->bluetooth =  $v->bluetooth;
        }
        if (isset($v->gps) ) {
            # code...
            $productphone->gps = $v->gps ;
        }
        if (isset($v->nfc) ) {
            # code...
            $productphone->nfc =  $v->nfc;
        }

        if (isset($v->radio) ) {
            # code...
            $productphone->radio =  $v->radio;
        }
        if (isset($v->usb) ) {
            # code...
            $productphone->usb =  $v->usb;
        }
        if (isset($v->sensors) ) {
            # code...
            $productphone->sensors =  $v->sensors;
        }
        if (isset($v->charging )) {
            # code...
            $productphone->charging = $v->charging ;
        }
        if (isset($v->colors) ) {
            # code...
            $productphone->colors =  $v->colors;
        }
        if (isset($v->models) ) {
            # code...
            $productphone->models =  $v->models;
        }
        if (isset($v->sar) ) {
            # code...
            $productphone->sar = $v->sar ;
        }
        if (isset($v->price) ) {
            # code...
            $productphone->price = $v->price ;
        }

        $productphone->save();



        // return Excel::download(new Export, $devicename.'_Product_Pad.xlsx');
        // return (new Export)->download($devicename.'_Product_Pad.xlsx');
        // return redirect()->action(
        //     'HomeController@export', ['devicename' => $devicename]
        // );


    }

    public function show_device(Request $request){
        $input = $request->all();
        $fonoapi = new fonoapi("f91c731dfb97dd2473f75cb8b942c71543fe85ef4f85809e");

        $id = $input['id'];
        $searchdevice = $input['searchdevice'];

        $productphone = $fonoapi->getDevice($searchdevice);

        //itinier les champs passé a la vue

        $productphone[$id]->status_reseaux = 'GSM';
        $productphone[$id]->size =  Str::limit($productphone[$id]->size, 3,'');
        $productphone[$id]->dimensions =  Str::limit($productphone[$id]->dimensions, 20,'');
        $productphone[$id]->weight =  Str::limit($productphone[$id]->weight, 5,'');


        if($productphone[$id]->_4g_bands){
            $productphone[$id]->status_reseaux = "GSM / HSPA / LTE";
        }elseif(!$productphone[$id]->_4g_bands && $productphone[$id]->_3g_bands){
            $productphone[$id]->status_reseaux = "GSM / HSPA";
        }

        $device[] = $productphone[$id];

        return view('device',compact('device','id','searchdevice'));
    }

    public function export($productphone){
        // dump($productphone);
        return Excel::download(new MultipleOnglet($productphone), 'ProductPhone_Product_Pad.xlsx');

    }

    public function import(Request $request){

        // Excel::import(new UsersImport, request()->file('mon_fichier'));

        $collection = Excel::toCollection(new PhoneImport, $request->file('mon_fichier'));
        $collection = reset($collection);
        $collection = reset($collection);
        // $collection = reset($collection);
        // $collection = reset($collection);
        // $collection = reset($collection);

        // $fonoapi = new fonoapi("f91c731dfb97dd2473f75cb8b942c71543fe85ef4f85809e");

        // $productphone = $fonoapi->getDevice($collection[1]);
        $productphone = [];
        foreach($collection as $key => $c){

            if (!empty($c[0])) {
                # code...
                $fonoapi = new fonoapi("f91c731dfb97dd2473f75cb8b942c71543fe85ef4f85809e");
                $result = $fonoapi->getDevice($c[0]);

                if ($result !== 'No Matching Results Found') {
                    $productphone[] = $result;
                }

            }


        }

        DB::table('productphones')->truncate();

        foreach ($productphone as $value) {
            # code...
            foreach ($value as $k => $v) {
                if (isset($v->DeviceName)) {
                    # code...
                    $this->insertDevice($v);
                }
            }
        }

        return Excel::download(new MultipleOnglet($productphone), 'ProductPhone_Product_Pad.xlsx');

    }
}
