<?php

namespace Agrinesia\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Agrinesia\Http\Controllers\Controller;
use Agrinesia\Models\MitraSale;
use Agrinesia\Imports\MitraImport;
use Agrinesia\Imports\NewMitraImport;
use Agrinesia\Models\Process;
use Agrinesia\Models\ProcessDetail;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SalesController extends Controller
{
    public function mitraIndex()
    {
        $data = MitraSale::select('mitra_name','area_code',DB::raw('sum(sales_val_a) as last_year'),DB::raw('sum(sales_val_b) as this_year'),DB::raw('sum(sales_target) as target'),DB::raw('sum(sales_val_b)/sum(sales_target) *100 as achievements'))
                            ->groupBy('mitra_name','area_code')
                            ->get();

        return view('back.pages.mitraSales',compact('data'));
    }

    public function mitraImport(Request $request)
    {
        $request->validate([
            'mitra' => 'required|file|mimes:xlsx,xls,XLSX,XLS'
        ]);

        $input = $request->all();
        Excel::import(new MitraImport, $request->file('mitra'));
        
        $log = 'File Successfully Uploaded';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'File Successfully Uploaded',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function newMitraIndex(Request $request)
    {
        $data = Process::get();

        return view('back.pages.mitraNew',compact('data'));
    }

    public function newMitraImport(Request $request)
    {
        $request->validate([
            'mitra_baru' => 'required|file|mimes:xlsx,xls,XLSX,XLS'
        ]);

        $input = $request->all();
        Excel::import(new NewMitraImport, $request->file('mitra_baru'));
        
        $log = 'File Mitra Baru Successfully Uploaded';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'File Mitra Baru Successfully Uploaded',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
