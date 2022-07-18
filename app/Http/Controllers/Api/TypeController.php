<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('slug')){
            $types = Type::where('slug', $request->query('slug'))->get();
        } else {
            $types = Type::all();
            /* $types = Type::where('slug', 'vegetariano')->get(); */
        }

        return response()->json($types);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if($slug == 'tutti'){
            $types = Type::with(["users"])->get();
        }
        else{
            $types = Type::where("slug", $slug)->with(["users"])->get();
        }
        
        if(empty($types)){
            return response()->json([
                "success" => false,
                "errors" => ["message"=>"Ristorante non trovato"]
            ], 404);
            //return response()->json(["message"=>"Post not Found"], 404);
        }
        return response()->json($types);
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
    public function destroy($id)
    {
        //
    }
}
