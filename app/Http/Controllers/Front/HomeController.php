<?php

namespace Agrinesia\Http\Controllers\Front;

use Illuminate\Http\Request;
use Agrinesia\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.pages.home');
    }

    public function bogorIndex()
    {
        return view('front.pages.bogor');
    }
}
