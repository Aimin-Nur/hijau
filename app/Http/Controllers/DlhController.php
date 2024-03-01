<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DlhController extends Controller
{
    public function index(){
        return view('DLH.index');
    }
}
