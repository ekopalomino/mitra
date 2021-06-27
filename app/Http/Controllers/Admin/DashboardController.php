<?php

namespace Agrinesia\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Agrinesia\Http\Controllers\Controller;
use Agrinesia\Models\MitraSale;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        //Widget
        $previous = MitraSale::sum('sales_val_a');
        $sales = MitraSale::sum('sales_val_b');
        $target = MitraSale::sum('sales_target');
        $achievements = ($sales / $target) * 100 ;
        $growth = ($sales / $previous) * 100;

        //Total Bar Charts
        $data = MitraSale::select(DB::raw('sum(sales_val_b) as Sales'),DB::raw('sum(sales_target) as Target'),'sale_date as Date',DB::raw('sum(sales_val_b)/sum(sales_target)*100 as Achievement'))->groupBy('sale_date')->get();
        $array[] = ['Date','Sales','Target','Achievement'];
        foreach($data as $key=>$value) {
        	$array[++$key] = [$value->Date,(int)$value->Sales,(int)$value->Target,(int)$value->Achievement];
        }

        //Contribution per Brand
        $contributions = MitraSale::select('brands.brand_name as Brand',DB::raw('brand_code'),DB::raw('sum(sales_val_b)/('.$sales.')*100 as Contrib'))
                                    ->join('brands','brands.id','mitra_sales.brand_code')
                                    ->groupBy('mitra_sales.brand_code','brands.brand_name')
                                    ->get();
        $contribs[] = ['Brand','Contrib'];
        foreach($contributions as $key=>$value) {
            $contribs[++$key] = [$value->Brand,(int)$value->Contrib];
        }
        
        //Top 10 Variant
        $variants = MitraSale::select(DB::raw('sum(sales_val_b) as Sales'),'product_name as Product')->orderBy('Sales','desc')->groupBy('product_name')->take(10)->get();
        $top[] = ['Product','Sales'];
        foreach($variants as $key=>$value) {
            $top[++$key] = [$value->Product,(int)$value->Sales]; 
        }
        
        return view('back.pages.dashboard',compact('sales','target','achievements','growth'))->with('data',json_encode($array))->with('variants',json_encode($top))->with('contributions',json_encode($contribs));
    }
}
