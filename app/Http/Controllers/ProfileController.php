<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owner = Auth::user()->id;
        $tenant = Auth::user()->id;
        
        $property = DB::table('properties')
        ->select('*')
        ->where('owner',$owner)
        ->join('categories', 'categories.category_id', '=', 'properties.categoryid')
        ->get();

 
        $property_lease = DB::table('leases')
        ->select('*')
        ->where('property_owner',$owner)
        ->where('lease_status', '=',"pending")
        ->join('properties', 'properties.id', '=', 'leases.propertyid')
        ->join('users', 'users.id', '=', 'leases.tenant')
        ->get();            



        $leases = DB::table('leases')
        ->select('*')
        ->where('tenant',$tenant)
        ->orWhere('property_owner',$owner)
        ->join('properties', 'properties.id', '=', 'leases.propertyid')
        ->get();



        return view('owner.index')
        ->with('property', $property)
        ->with('property_lease', $property_lease)
        ->with('leases', $leases);
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
