<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Konsumen;

class DashboardController extends Controller
{
    public function index()
    {
        $product    = Product::count();
        $konsumen   = Konsumen::count();
        return view('dashboard', compact('product',
                                         'konsumen'));
    }
}
