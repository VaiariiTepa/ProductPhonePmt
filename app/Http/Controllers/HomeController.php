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

        return view('home',compact('productphone','searchdevice'));

    }

    public function insertDevice(Request $request,Productphone $productphone){
        DB::table('productphones')->truncate();
        $input = $request->all();
        $devicename = $input['DeviceName'];

        $productphone->DeviceName = $devicename;
        if (isset($input['technology'])) {
            # code...
            $productphone->technology = $input['technology'];
        }
        if (isset($input['_2g_bands'])) {
            # code...
            $productphone->_2g_bands = $input['_2g_bands'];
        }
        if (isset($input['_3g_bands'])) {
            # code...
            $productphone->_3g_bands = $input['_3g_bands'];
        }
        if (isset($input['_4g_bands'])) {
            # code...
            $productphone->_4g_bands = $input['_4g_bands'];
        }
        if (isset($input['speed'])) {
            # code...
            $productphone->speed = $input['speed'];
        }
        if (isset($input['usb'])) {
            # code...
            $productphone->usb = $input['usb'];
        }
        if (isset($input['announced'])) {
            # code...
            $productphone->announced = $input['announced'];
        }
        if (isset($input['status'])) {
            # code...
            $productphone->status = $input['status'];
        }
        if (isset($input['dimensions'])) {
            # code...
            $productphone->dimensions = $input['dimensions'];
        }
        if (isset($input['weight'])) {
            # code...
            $productphone->weight = $input['weight'];
        }
        if (isset($input['sim'])) {
            # code...
            $productphone->sim = $input['sim'];
        }
        if (isset($input['type'])) {
            # code...
            $productphone->type = $input['type'];
        }
        if (isset($input['size'])) {
            # code...
            $productphone->size = $input['size'];
        }
        if (isset($input['resolution'])) {
            # code...
            $productphone->resolution = $input['resolution'];
        }
        if (isset($input['protection'])) {
            # code...
            $productphone->protection = $input['protection'];
        }
        if (isset($input['os'])) {
            # code...
            $productphone->os = $input['os'];
        }
        if (isset($input['chipset'])) {
            # code...
            $productphone->chipset = $input['chipset'];
        }
        if (isset($input['cpu'])) {
            # code...
            $productphone->cpu = $input['cpu'];
        }
        if (isset($input['gpu'])) {
            # code...
            $productphone->gpu = $input['gpu'];
        }
        if (isset($input['card_slot'])) {
            # code...
            $productphone->card_slot = $input['card_slot'];
        }
        if (isset($input['internal'])) {
            # code...
            $productphone->internal = $input['internal'];
        }
        if (isset($input['triple'])) {
            # code...
            $productphone->triple = $input['triple'];
        }
        if (isset($input['dual_'])) {
            # code...
            $productphone->dual_ = $input['dual_'];
        }
        if (isset($input['features'])) {
            # code...
            $productphone->features = $input['features'];
        }
        if (isset($input['video'])) {
            # code...
            $productphone->video = $input['video'];
        }
        if (isset($input['single'])) {
            # code...
            $productphone->single = $input['single'];
        }
        if (isset($input['loudspeaker_'])) {
            # code...
            $productphone->loudspeaker_ = $input['loudspeaker_'];
        }
        if (isset($input['_3_5mm_jack_'])) {
            # code...
            $productphone->_3_5mm_jack_ = $input['_3_5mm_jack_'];
        }
        if (isset($input['wlan'])) {
            # code...
            $productphone->wlan = $input['wlan'];
        }
        if (isset($input['bluetooth'])) {
            # code...
            $productphone->bluetooth = $input['bluetooth'];
        }
        if (isset($input['gps'])) {
            # code...
            $productphone->gps = $input['gps'];
        }
        if (isset($input['nfc'])) {
            # code...
            $productphone->nfc = $input['nfc'];
        }

        if (isset($input['radio'])) {
            # code...
            $productphone->radio = $input['radio'];
        }
        if (isset($input['usb'])) {
            # code...
            $productphone->usb = $input['usb'];
        }
        if (isset($input['sensors'])) {
            # code...
            $productphone->sensors = $input['sensors'];
        }
        if (isset($input['charging'])) {
            # code...
            $productphone->charging = $input['charging'];
        }
        if (isset($input['colors'])) {
            # code...
            $productphone->colors = $input['colors'];
        }
        if (isset($input['models'])) {
            # code...
            $productphone->models = $input['models'];
        }
        if (isset($input['sar'])) {
            # code...
            $productphone->sar = $input['sar'];
        }
        if (isset($input['price'])) {
            # code...
            $productphone->price = $input['price'];
        }

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
