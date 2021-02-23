<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webmenu;
use App\Models\Product;


class ApiController extends Controller
{
    public function webmenu()
    {
        $webmenu = Webmenu::all();

             return response() -> json([
                 'success' => true,
                 'message' => 'List Data Web Menu',
                 'webmenu' => $webmenu
             ], 200);
        
    }

    public function product()
    {
        $product = Product::all();

            return response() -> json([
                'success' => true,
                'message' => 'List Data Product',
                'product' => $product
            ], 200);
    }
}
