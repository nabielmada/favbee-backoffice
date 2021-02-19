<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\Diskon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $product_count = Product::count();
        return view('master.product',compact('product',
                                             'product_count'));
    }

    public function getDb(Request $request)
    {
        $kategori = Kategori::all();
        $tag      = Tag::all(); 
        $diskon   = Diskon::all();

        return view('master.product_add',compact('kategori',
                                                 'tag',
                                                 'diskon'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'kategori' => 'required',
            'stock'    => 'required',
            'harga'    => 'required',
            'des'      => 'required',
            'avatar'   => 'required',
            'avatar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        foreach($request->file('avatar') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/product', $name);  
                $data[] = $name;  
            }

        $product    = new Product;
        
        $product->nama      = $request->nama;
        $product->kategori  = $request->kategori;
        $product->stock     = $request->stock;
        $product->disc      = $request->disc;
        $product->harga     = $request->harga;
        $product->des       = $request->des;
        $product->avatar    = json_encode($data);
        $product->userid    = $request->userid;

        $product->save();

        $tag = $request->tag;
        
        foreach ($tag as $t) {
            $product_d = new ProductDetail;;

            $product_d->tag   = $t;
            $product->ProductDetail()->save($product_d);
        }
        

        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_detail = Product::find($id);
        return view('master.product',compact('product_detail'))->renderSections()['content'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product');
    }
}
