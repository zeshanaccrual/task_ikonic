<?php

namespace App\Http\Controllers;

use App\Models\MeterReading;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       
        return view('dashboard');
    }
}
