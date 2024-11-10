<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  product()
    {

        $models = Product::orderBy('id', 'desc')->paginate(3);
        $company = Company::all();
        return view('/product.index', ['models' => $models, 'companies' => $company]);
    }

    public function create()
    {
        $models = Company::all();
        return view('product.create', ['models' => $models]);
    }

    public function store(ProductStoreRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;
            $file->move('img_uploded/', $filename);
            $data['img'] = 'img_uploded/' . $filename;
        }

        $post = Product::create($data);
        return redirect('/product.index')->with('success', 'Post successfully added');
    }

    public function delete(Product $id)
    {
        $id->delete();
        return redirect('/product')->with('success', 'Post successfully deleted');
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;
            $file->move('img_uploded/', $filename);
            $product->img = 'img_uploded/' . $filename; 
        } else {
            $product->img = $request->input('old_img');
        }
    
        $product->company_id = $request->company_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
    
        $product->save(); 
    
        return redirect()->route('product.index')->with('success', 'Mahsulot muvaffaqiyatli yangilandi.');
    }
    
    
}

