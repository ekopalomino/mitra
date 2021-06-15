<?php

namespace Agrinesia\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Agrinesia\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.pages.dashboard');
    }
}
