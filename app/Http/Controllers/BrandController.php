<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $brands = Brand::all();
        $brands=new Brand();
        $keyword=$request->keyword;
        if($keyword!=''){
            $brands=$brands->where('name','like','%'.$keyword.'%');
            $brands=$brands->orWhere('model','like','%'.$keyword.'%');
        }
        $brands = $brands->paginate(4);

        return view('brand.index1', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create1');
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
            'url' => 'required|max:255',
        ]);
        $brand = Brand::create($validatedData);

        return redirect('/brands')->with('success', 'New Model is successfully saved');
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
        $brand = Brand::findOrFail($id);

        return view('brand.edit1', compact('brand'));
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
            'url' => 'required|max:255',
        ]);
        Brand::whereId($id)->update($validatedData);

        return redirect('/brands')->with('success', 'Brand Model is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect('/brands')->with('success', 'Brand Model is successfully deleted');
    }
}
