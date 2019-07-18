<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands=new Brand();

    $brands = $brands->get();
    return response()->json($brands);
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'model' => 'required',
            'url' => 'required',
        ]);

        $brand = Brand::create($validatedData);
        return response()->json(['error'=>false,'message'=>'Brand Successfully saved!']);

        }

        public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json(['error'=>false,'message'=>'Brand delete Successfully!']);
    }

    // public function update(Request $request,$id)
    // {
    // //     $validatedData = $request->validate([
    // //         'name' => 'required|max:255',
    // //         'model' => 'required',
    // //         'url' => 'required',
    // //     ]);

    // // //   $brand->update($request->all());
    // //    $brand = Brand::update($validatedData);
    // //    return response()->json(['error'=>false,'message'=>'Brand Edit Successfully!']);



    //    $brand = Brand::find($id);

    //     $brand->name = $request->input('name');
    //     $brand->model = $request->input('model');
    //     $brand->url= $request->input('url');
    //     $brand->save();

    //     // return "Sucess updating user #" . $brand->id;
    //     // brand = Brand::update($);
    //    return response()->json(['error'=>false,'message'=>'Brand Edit Successfully!']);






     public function update(Request $request,$id)
{

    // $validatedData = $request->validate([
    //              'name' => 'required|max:255',
    //              'model' => 'required',
    //              'url' => 'required',
    //          ]);

            //  $brand->update($request->all());
            //  $brand = Brand::update($validatedData);


            $brand=Brand::find($id);
            $brand= $brand->update([
                         'name' => $request->name,
                         'model' => $request->model,
                         'url' => $request->url,
                     ]);

                dd($brand);
            // $list = Lists::where('id', $request->id)->update($request->all());
            return response()->json(['error'=>false,'message'=>'Brand Edit Successfully!']);
}

}
