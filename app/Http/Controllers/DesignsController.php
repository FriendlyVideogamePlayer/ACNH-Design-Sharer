<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use App\Upload;
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

    // Searches the DB for any design title containg search query
    public function searchDesigns(Request $request)
    {
        $designs;
        var_dump($request->filterSelect);
        var_dump($request->filterInput);
        // If both fields are empty but a search is made -> return all as usual
        if($request->filterInput === NULL && $request->filterSelect === "All") {
            $designs = DB::table('designs')->paginate(8);
            
        }
        // If search field is empty but a design type selected -> show designs with that type
        elseif($request->filterInput === NULL) {
            $designs = DB::table('designs')
                ->where('designtype', 'LIKE', '%'.$request->filterSelect.'%')
                ->paginate(8);
                $designs->appends(['filterInput' => $request->filterInput, 'filterSelect' => $request->filterSelect]);
        }
        // If select is empty but search field isn't -> show designs including search term
        elseif($request->filterSelect === "All") {
            $designs = DB::table('designs')
                ->where('title', 'LIKE', '%'.$request->filterInput.'%')
                ->orWhere('description', 'LIKE', '%'.$request->filterInput.'%')
                ->paginate(8);
                $designs->appends(['filterInput' => $request->filterInput, 'filterSelect' => $request->filterSelect]);
        }
        // If select and search field aren't empty match items containing both
        else {
            $designs = DB::table('designs')
                ->where('designtype', 'LIKE', '%'.$request->filterSelect.'%')
                ->where('title', 'LIKE', '%'.$request->filterInput.'%')
                ->orWhere('description', 'LIKE', '%'.$request->filterInput.'%')
                ->paginate(8);
                $designs->appends(['filterInput' => $request->filterInput, 'filterSelect' => $request->filterSelect]);
        }

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
        //Adds a new design to the DB
        $this->validate($request, [
            'username' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        $upload = new Upload;
        $upload->username = $request->input('username');
        $upload->title = $request->input('title');
        $upload->description = $request->input('description');
        $upload->designtype = $request->input('designType');
        $upload->save();
        
        return redirect('/designs')->with('success', 'Design added!');
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
