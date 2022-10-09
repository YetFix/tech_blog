<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCOntroller extends Controller
{
    public function index(){
        return view('Admin.dashboard');
    }
}
