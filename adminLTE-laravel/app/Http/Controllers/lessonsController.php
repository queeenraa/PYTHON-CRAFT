<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lessonsController extends Controller
{
    public function index()
    {
        return view('layouts.lessons');
    }
}
