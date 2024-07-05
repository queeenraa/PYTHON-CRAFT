<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function __construct()
    {
        $this->middleware('role-admin');
    }

}
