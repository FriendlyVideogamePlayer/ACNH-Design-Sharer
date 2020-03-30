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
        $designs = DB::table('designs')->where('approved', 1)->orderByDesc('created_at')->paginate(9);
        return view('designCatalogue')->with('designs',$designs);
    }

    // Searches the DB for any design title containg search query
    public function searchDesigns(Request $request)
    {
        $designs;
        // If both fields are empty but a search is made -> return all as usual
        if($request->filterInput === NULL && $request->filterSelect === "All") {
            $designs = DB::table('designs')->where('approved', 1)->orderByDesc('created_at')->paginate(9);

        }
        // If search field is empty but a design type selected -> show designs with that type
        elseif($request->filterInput === NULL) {
            $designs = DB::table('designs')
                ->where('designtype', 'LIKE', '%'.$request->filterSelect.'%')
                ->where('approved', 1)
                ->orderByDesc('created_at')
                ->paginate(9);
                $designs->appends(['filterInput' => $request->filterInput, 'filterSelect' => $request->filterSelect]);
        }
        // If select is empty but search field isn't -> show designs including search term
        elseif($request->filterSelect === "All") {
            $designs = DB::table('designs')
                ->where('title', 'LIKE', '%'.$request->filterInput.'%')
                ->where('approved', 1)
                ->orWhere('description', 'LIKE', '%'.$request->filterInput.'%')
                ->where('approved', 1)
                ->orderByDesc('created_at')
                ->paginate(9);
                $designs->appends(['filterInput' => $request->filterInput, 'filterSelect' => $request->filterSelect]);
        }
        // If select and search field aren't empty match items containing both
        else {
            //DB::enableQueryLog(); // Enable query log
            $designs = DB::table('designs')
                ->where('title', 'LIKE', '%'.$request->filterInput.'%')
                ->where('designtype', 'LIKE', '%'.$request->filterSelect.'%')
                ->where('approved', 1)
                ->orWhere('description', 'LIKE', '%'.$request->filterInput.'%')
                ->where('designtype', 'LIKE', '%'.$request->filterSelect.'%')
                ->where('approved', 1)
                ->orderByDesc('created_at')
                ->paginate(9);
                $designs->appends(['filterInput' => $request->filterInput, 'filterSelect' => $request->filterSelect]);
                //dd(DB::getQueryLog()); // Show results of log
        }

        return view('designCatalogue')->with(['designs' => $designs, 'searchMessage' => 'Displaying results for "'.$request->filterInput.'" in "'.$request->filterSelect.'"']);
    }

    public function showUnapprovedDesigns()
    {
        //Takes all of the designs from the DB that are yet to be approved and displays them in the catalogue
        $designs = DB::table('designs')->where('approved', 0)->paginate(9);

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
            'username' => 'required|string|min:3|max:50',
            'title' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:150',
            'imageLink' => 'required|string|min:21|max:38',
            'designType' => 'required'
        ]);

        $design = new Design;
        $design->title = $request->input('title');
        $design->description = $request->input('description');
        $design->username = $request->input('username');
        $design->designtype = $request->input('designType');
        $design->approved = 0;
        $design->imagelink = $request->input('imageLink');

        // ensure image link is from Imgur
        if(strpos($request->input('imageLink'), 'https://i.imgur.com/') === false) {
            return view('/upload')->with('errorMessage', 'Did not add to design queue. Image must be from Imgur and must use the i.imgur link.');
        }

        // ensure image link returns 200 status
        if(!@imagecreatefromjpeg($design->imagelink)) {
            return view('/upload')->with('errorMessage', 'Did not add to design queue. Imgur link returned 404 (Not Found).');
        }

        $design->save();
        return view('/upload')->with('successMessage', 'Design has been added to design queue!');
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

    // Shows the approve view
    public function approveDesigns()
    {
        $designs = DB::table('designs')->where('approved', 0)->paginate(9);
        return view('approve')->with('designs',$designs);
    }

    // If a design has been approved -> set approved to true
    public function uploadDesigns(Request $request)
    {
        DB::table('designs')
            ->where('id', $request->input('id'))
            ->update(['approved' => 1]);

        return redirect('/approvedesigns')->with('successMessage', 'Design '.$request->input('id').' with a title of '.$request->input('title').' has been approved!');
    }

    // If a design has been disapproved -> remove it from designs table
    public function removeDesigns(Request $request)
    {
        DB::table('designs')->where('id', $request->input('id'))->delete();

        return redirect('/approvedesigns')->with('removeMessage', 'Design '.$request->input('id').' with a title of '.$request->input('title').' has been disapproved!');
    }

}
