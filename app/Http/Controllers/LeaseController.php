<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $property = Property::find($id);

        return view('lease.create')
        ->with('property', $property);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $tenant = Auth::user()->id;

        $property_id = $request->input('propertyid');

        $property = Property::find($property_id);

        $property_owner = $property->owner;
        
        //create listing
        $lease = new Lease();
        $lease->propertyid = $property_id;
        $lease->property_owner = $property_owner;
        $lease->tenant = $tenant;
        $lease->lease_type = $request->input('lease_type');
        $lease->purpose_for_lease = $request->input('purpose_for_lease');
        $lease->no_of_occupants = $request->input('no_of_occupants');
        $lease->parking = $request->input('parking');
        $lease->no_of_pets = $request->input('no_of_pets');
        $lease->lease_type = $request->input('lease_type');
        $lease->lease_status = "pending";

        $lease->save();

        return redirect('/profile');
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


    public function approveLease($id)
    {
        //
        $lease = DB::table('leases')
        ->select('*')
        ->where('lease_id',$id)
        ->get();   


        $lease->lease_status = "available";
        $lease->save();

        return redirect('/profile');

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
