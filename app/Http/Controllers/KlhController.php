<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlhController extends Controller
{
    public function index(){
        return view('KLH.index');
    }
}
