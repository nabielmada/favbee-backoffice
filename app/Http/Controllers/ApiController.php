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

    public function webmenu_edit(Request $request)
    {
        $webmenu = Webmenu::find(1);

        $webmenu->deskripsi_heading = $request->deskripsi_heading;
        $webmenu->deskripsi_sub = $request->deskripsi_sub;
        $webmenu->userid = $request->userid;

        $webmenu->save();

        return response() -> json([
            'success' => true,
            'message' => 'List Edit Web Menu',
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

    public function product_detail($id)
    {
        // $product = Product::where('nama', $nama)->get();

        // $nama = $product->nama;

         $product = Product::find($id);

            return response() -> json([
                'success' => true,
                'message' => 'List Detail Product',
                'product' => $product
            ], 200);
    }
}
