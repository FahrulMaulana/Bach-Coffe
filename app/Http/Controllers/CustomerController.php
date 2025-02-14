<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = produk::all();
        $member = member::where('id_user', $user->id_user)->first();
        return view('customer.dashboard', compact('user', 'products', 'member'));
    }
}
