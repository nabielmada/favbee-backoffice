<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

        /**
     * API_KEY
     *
     * @var string
     */
    protected $API_KEY = '9984da530e9c4909b88fb6d55833b230'; 
    
    /**
     * getProvinces
     *
     * @return void
     */
    public function getProvinces()
    {
        
        $response = Http::withHeaders([
            'key' => $this->API_KEY
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response['rajaongkir']['results'];

        return response()->json([
            'success' => true,
            'message' => 'Get All Provinces',
            'data'    => $provinces    
        ]);
    }
    
    /**
     * getCities
     *
     * @param  mixed $id
     * @return void
     */
    public function getCities($id)
    {
        
        $response = Http::withHeaders([
            'key' => $this->API_KEY
        ])->get('https://api.rajaongkir.com/starter/city?&province='.$id.'');

        $cities = $response['rajaongkir']['results'];

        return response()->json([
            'success' => true,
            'message' => 'Get City By ID Provinces : '.$id,
            'data'    => $cities    
        ]);
    }
        
    /**
     * checkOngkir
     *
     * @param  mixed $request
     * @return void
     */
    public function checkOngkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => $this->API_KEY
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'            => $request->origin,
            'destination'       => $request->destination,
            'weight'            => $request->weight,
            'courier'           => $request->courier
        ]);

        $ongkir = $response['rajaongkir']['results'];

        return response()->json([
            'success' => true,
            'message' => 'Result Cost Ongkir',
            'data'    => $ongkir    
        ]);
    }

}
