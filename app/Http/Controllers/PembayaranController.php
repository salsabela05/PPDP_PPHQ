<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    function pembayaran()  {
        return view('app/pembayaran');
    }
}
