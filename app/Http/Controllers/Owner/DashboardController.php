<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $ownerName = Auth::guard('owners')->user()->name;

        return view('owner.dashboard', compact('ownerName'));
    }
}
