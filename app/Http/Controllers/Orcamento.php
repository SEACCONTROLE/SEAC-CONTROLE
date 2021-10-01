<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Orcamento extends Controller
{
    public function index(){
        return view('orcamento');
    }
}
