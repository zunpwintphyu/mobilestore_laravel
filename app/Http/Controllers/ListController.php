<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\Brand;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $list = Lists::all();
        $lists=new Lists();
        $keyword=$request->keyword;
        if($keyword!=''){
            $lists=$lists->where('name','like','%'.$keyword.'%');
            $lists=$lists->orWhere('model','like','%'.$keyword.'%');
            $lists=$lists->orWhere('price','like','%'.$keyword.'%');
            $lists=$lists->orWhere('quantity','like','%'.$keyword.'%');
        }
        $list = $lists->paginate(4);
        return view('product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('product.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'model' => 'required|max:255',
            'price' => 'required|max:255',
            'quantity' => 'required|numeric',
        ]);
        $list = Lists::create($validatedData);

        return redirect('/lists')->with('success', 'List is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Lists::findOrFail($id);

    // return view('product.edit', compact('list'));

         $brands = Brand::all();
        return view('product.edit',compact('brands','list'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'model' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        Lists::whereId($id)->update($validatedData);

        return redirect('/lists')->with('success', 'List is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = Lists::findOrFail($id);
        $list->delete();

        return redirect('/lists')->with('success', 'List is successfully deleted');
    }
}
