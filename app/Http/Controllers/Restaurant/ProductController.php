<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /* Validazioni */
    protected $validations = [
        'name' => 'required|max:100',
        'price' => 'required|numeric|min:0',
        'visible' => 'sometimes|accepted',
        'image' => 'nullable|mimes:jpeg,jpg,bmp,png,svg,gif'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('restaurant.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validations);
        $data = $request->all();
        $newProduct = new Product();
        $newProduct->name = $data['name'];
        if(!empty($data['description'])){
            $newProduct->description = $data['description'];
        }
        $newProduct->price = $data['price'];
        $newProduct->user_id = Auth::id();
        $newProduct->visible = isset($data['visible']);
        if(isset($data['image'])){
            $path_image = Storage::put('uploads', $data['image']);
            $newProduct->image = $path_image;
        }

        $newProduct->save();
        return redirect()->route('restaurant.products.show', $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (Auth::id() !== $product['user_id']) {
            return redirect('/');
        }else{
            return view('restaurant.products.show', compact('product'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if (Auth::id() !== $product['user_id']){
            return redirect('/');
        }else{
            return view('restaurant.products.edit', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate($this->validations);
        $data = $request->all();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->user_id = Auth::id();
        $product->visible = isset($data['visible']);
    
        if(isset($data['image'])){
            Storage::delete($product->image);
            $path_image = Storage::put('uploads', $data['image']);
            $product->image = $path_image;
        }

        $product->update();
        return redirect()->route('restaurant.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('restaurant.products.index');
    }
}
