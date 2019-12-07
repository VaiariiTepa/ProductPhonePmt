<?php

namespace App\Http\Controllers;

use App\User;
use App\fonoapi;
use App\Exports\Export;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

    public function export(Request $request){

        $input = $request->all();

        $id = $input['id'];
        $searchdevice = $input['searchdevice'];
        $devicename = $input['devicename'];

        return Excel::download(new Export($id,$searchdevice), $devicename.'_Product_Pad.xlsx');
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

        return Excel::download(new Export, 'invoices.xlsx');
        // $users = User::all();
        // return view('layouts.template_excel',compact('users'));
    }
}
