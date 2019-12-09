<?php

namespace App\Http\Controllers;

use App\User;
use App\fonoapi;
use App\Productphone;
use App\Exports\Export;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

        dump($productphone);
        return view('home',compact('productphone','searchdevice'));

    }

    public function insertDevice(Request $request,Productphone $productphone){
        DB::table('productphones')->truncate();
        $input = $request->all();
        $devicename = $input['DeviceName'];

        $productphone->DeviceName = $devicename;
        $productphone->technology = $input['technology'];
        $productphone->_2g_bands = $input['_2g_bands'];
        $productphone->_3g_bands = $input['_3g_bands'];
        $productphone->_4g_bands = $input['_4g_bands'];
        $productphone->speed = $input['speed'];
        $productphone->usb = $input['usb'];
        $productphone->announced = $input['announced'];
        $productphone->status = $input['status'];
        $productphone->dimensions = $input['dimensions'];
        $productphone->weight = $input['weight'];
        $productphone->sim = $input['sim'];
        $productphone->type = $input['type'];
        $productphone->size = $input['size'];
        $productphone->resolution = $input['resolution'];
        $productphone->protection = $input['protection'];
        $productphone->os = $input['os'];
        $productphone->chipset = $input['chipset'];
        $productphone->cpu = $input['cpu'];
        $productphone->gpu = $input['gpu'];
        $productphone->card_slot = $input['card_slot'];
        $productphone->internal = $input['internal'];
        $productphone->triple = $input['triple'];
        $productphone->dual_ = $input['dual_'];
        $productphone->features = $input['features'];
        $productphone->video = $input['video'];
        if (isset($input['single'])) {
            # code...
            $productphone->single = $input['single'];
        }
        $productphone->loudspeaker_ = $input['loudspeaker_'];
        $productphone->_3_5mm_jack_ = $input['_3_5mm_jack_'];
        $productphone->wlan = $input['wlan'];
        $productphone->bluetooth = $input['bluetooth'];
        $productphone->gps = $input['gps'];
        $productphone->nfc = $input['nfc'];
        if (isset($input['radio'])) {
            # code...
            $productphone->radio = $input['radio'];
        }
        $productphone->usb = $input['usb'];
        $productphone->sensors = $input['sensors'];
        $productphone->charging = $input['charging'];
        $productphone->colors = $input['colors'];
        if (isset($input['models'])) {
            # code...
            $productphone->models = $input['models'];
        }
        $productphone->sar = $input['sar'];
        $productphone->price = $input['price'];

        $productphone->save();



        // return Excel::download(new Export, $devicename.'_Product_Pad.xlsx');
        // return (new Export)->download($devicename.'_Product_Pad.xlsx');
        return redirect()->action(
            'HomeController@export', ['devicename' => $devicename]
        );


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

    public function export(){

        // $input = $request->all();

        // $id = $input['id'];
        // $searchdevice = $input['searchdevice'];
        $devicename = $_GET['devicename'];

        // return (new Export)->download($devicename.'_Product_Pad.xlsx');
        return Excel::download(new Export, $devicename.'_Product_Pad.xlsx');
        // return Excel::create('Test', function($excel) {

        //     // Set the title
        //     $excel->setTitle('Mon premier excel laravel');

        //     // Call them separately
        //     $excel->setDescription('A demonstration to change the file properties');

        //                 // Manipulate first row
        //     $excel->row(1, array(
        //         'test1', 'test2'
        //     ));

        //     // Manipulate 2nd row
        //     $excel->row(2, array(
        //     'test3', 'test4'
        //     ));

        //     // Set black background
        //     $sheet->row(3, function($row) {

        //         // call cell manipulation methods
        //         $row->setBackground('#000000');

        //     });
        //     #Append

        // });
        // $users = User::all();
        // return view('layouts.template_excel',compact('users'));
    }
}
