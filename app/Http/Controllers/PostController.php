<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostController extends Controller
{

    public function index()
    {
//        $Customers = Customer::all();
//        return inertia('Posts/Index',compact('Customers'));
        return Inertia::render('index',[
           'customers' => Customer::all()->map(function ($customers){
              return[
                'id' => $customers->id,
                'name' => $customers->name,
                'email' => $customers->email,
              ];
           }),
        ]);
    }

    public function create()
    {
        return Inertia::render('create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:2|max:10',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|unique:customers,phone|max:14|min:10',
        ]);
        Customer::create($validation);
        return Redirect::route('customer.index')->with('message','Create successfully');
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $customers = Customer::find($id);
        return Inertia::render('edit',compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|min:2|max:10',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|unique:customers,phone|max:14|min:10',
        ]);
        Customer::where('id',$id)->update($validation);
        return Redirect::route('customer.index')->with('message','edit successfully');
    }

    public function destroy($id)
    {
        Customer::find($id)->delete();
        return Redirect::route('customer.index');
    }
}
