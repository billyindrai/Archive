<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('wisata.daftar_wisata');
    }
    
    public function wisata(){
        return view('wisata.wisata');
    }
}
