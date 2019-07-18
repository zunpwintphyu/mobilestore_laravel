<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
class ListApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lists=new Lists();

    $lists = $lists->get();
    return response()->json($lists);
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
            'model' => 'required|max:255',
            'price' => 'required|max:255',
            'quantity' => 'required|numeric',
        ]);
        $list = Lists::create($validatedData);
        return response()->json(['error'=>false,'message'=>'Product Successfully saved!']);

        }

        public function delete($id)
    {
        $list = Lists::findOrFail($id);
        $list->delete();

        return response()->json(['error'=>false,'message'=>'Prduct delete Successfully!']);
    }


    public function update(Request $request,$id)
    {
        $list=Lists::find($id);
        $list= $list->update([
                     'name' => $request->name,
                     'model' => $request->model,
                     'price' => $request->price,
                     'quantity' => $request->quantity,
                 ]);

            dd($list);
        // $list = Lists::where('id', $request->id)->update($request->all());
        return response()->json(['error'=>false,'message'=>'Product Edit Successfully!']);
    }
    }


