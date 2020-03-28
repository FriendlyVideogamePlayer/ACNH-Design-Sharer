<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use Illuminate\Support\Facades\DB;

class DesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Takes all of the designs from the DB and displays them on the main catalogue
        //$designs = Design::all();
        $designs = DB::table('designs')->paginate(8);
        return view('designCatalogue')->with('designs',$designs);
        
    }

    public function searchDesigns(Request $request)
    {
        // Searches the DB for any design title containg search query
        $inputs = $request->input();
        $designs = DB::table('designs')->where('title', 'LIKE', '%'.$request->filterInput.'%')->paginate(8);
        return view('designCatalogue')->with('designs',$designs);
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
    public function show($id)
    {
        // View a single design - useful for linking to friends
        $design = Design::find($id);
        return view('designSingle')->with('design', $design);
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
