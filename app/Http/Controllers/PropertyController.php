<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        
        $categories = Category::all();

        if($request->get('filterclassification')){
            $checked = $_GET['filterclassification'];
            $properties = DB::table('properties')
            ->select('*')
            ->whereIn('categoryid',$checked)
            ->join('categories', 'categories.category_id', '=', 'properties.categoryid')
            ->paginate(6);
           
        } elseif ($request->get('search')){
            $search = $_GET['search'];
            $properties = DB::table('properties')
            ->select('*')
            ->where('property_name', 'LIKE', "%{$search}%")
            ->join('categories', 'categories.category_id', '=', 'properties.categoryid')
            ->paginate(6);
        }else{
            
            $properties = DB::table('properties')
            ->select('*')
            ->join('categories', 'categories.category_id', '=', 'properties.categoryid')

            ->paginate(6);
        }



        return view('listings.index')
        ->with('properties', $properties)
        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'category_id');

        return view('listings.add_property')
        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'property_name' =>'required',
            'category' =>'required',
            'location' =>'required',
            'cover_img' =>'required',
            'no_of_rooms' =>'required',
            'no_of_bathrooms' =>'required'
        ]);



        $owner = Auth::user()->id;

        
        //create listing
        $property = new Property();
        $property->property_name = $request->input('property_name');
        $property->categoryid = $request->input('category');
        $property->owner = $owner;
        $property->location = $request->input('location');
        $property->no_of_rooms = $request->input('no_of_rooms');
        $property->no_of_bathrooms = $request->input('no_of_bathrooms');
        $property->cover_img = $request->file('cover_img')->store('public/images');
       
        $property->status = "available";
        $property->save();

        return redirect('/profile')->with('success','Property Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name', 'category_id');
        $property = Property::find($id);
        
        
        return view('listings.edit')
        ->with('property', $property)
        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request,[
            'property_name' =>'required',
            'category' =>'required',
            'location' =>'required',
            'cover_img' =>'required',
            'no_of_rooms' =>'required',
            'no_of_bathrooms' =>'required'
        ]);


        $owner = Auth::user()->id;

        
        //create listing
        $property = Property::find($id);
        $property->property_name = $request->input('property_name');
        $property->categoryid = $request->input('category');
        $property->owner = $owner;
        $property->location = $request->input('location');
        $property->no_of_rooms = $request->input('no_of_rooms');
        $property->no_of_bathrooms = $request->input('no_of_bathrooms');
        $property->cover_img = $request->file('cover_img')->store('public/images');
       
        $property->status = "available";
        $property->save();

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();

        return redirect('/profile')->with('success','Property Removed');  
    }

 
}
