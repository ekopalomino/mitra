<?php

namespace Agrinesia\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Agrinesia\Http\Controllers\Controller;
use Agrinesia\Models\MitraSale;
use Agrinesia\Models\AreaCode;
use Agrinesia\Models\Brand;

class ReportController extends Controller
{
    public function mitraReports()
    {
        $areas = AreaCode::pluck('area_name','id')->toArray();
        $mitra = MitraSale::pluck('mitra_name','mitra_name')->toArray();
        $days = MitraSale::pluck('sale_day','sale_day')->toArray();
        $brands = Brand::pluck('brand_name','id')->toArray();
        $varian = MitraSale::pluck('product_name','product_name')->toArray();
        
        return view('back.pages.mitraReports',compact('areas','mitra','days','brands','varian'));
    }

    public function executeReports(Request $request)
    {
       $mitra = $request->input('mitra');
       $types = $request->input('mitra_type');
       $from = $request->input('from_date');
       $to = $request->input('to_date');
       $day = $request->input('day');
       $brands = $request->input('brand');
       $variants = $request->input('variant');
       
       $data = MitraSale::whereIn('area_code',$area)->get();
       dd($source);
    }
}
