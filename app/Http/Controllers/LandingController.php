<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = produk::all();
        return view("customer.landingpage", compact("products"));
    }
}
