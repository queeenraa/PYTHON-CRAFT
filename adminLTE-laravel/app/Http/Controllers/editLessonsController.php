<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editLessonsController extends Controller
{
    public function index()
    {
        return view('layouts.ssseditLessons');
    }
}
