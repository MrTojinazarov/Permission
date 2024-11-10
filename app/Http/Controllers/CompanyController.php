<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function  index()
    {
        $models = Company::all();
        return view('company.index', ['models' => $models]);
    }
    
    public function create()
    {
        $models = Client::all();
        return view('company.create', ['models'=> $models]);
    }

    public function store(CompanyStoreRequest $request)
    {
        $data = $request->all();

        Company::create($data);
        return redirect('/company');
    }

    public function delete($id)
    {
        $model = Company::find($id);
        $model->delete();
        return redirect('/company')->with('success', 'Category successfully deleted');
    }

    public function addProduct($id)
    {
        $models = Company::find($id);
        return view('company.addProduct', ['models'=> $models]);
    }
}
