<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;

class KetersediaanKamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('ketersediaan.index', compact('kamars'));
    }
}
