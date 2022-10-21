@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Lease Request Form</h3>


        <div class=" card p-4 form-area w-50 mx-auto mt-3">
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Property</label>
                            <input name="first_name" class="form-control" id="first_name" type="text"
                                    value="{{ $property->property_name }}"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="last_name">Status</label>
                            <input name="last_name" class="form-control" id="last_name" type="text"
                                    value="{{ $property->status }}"
                                    disabled>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::open(['route' => ['lease.addLease', $property->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group d-none">
                {{Form::label('name','Property ID')}}
                {{Form::text('propertyid', $property->id,['class'=>'mb-3 form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('lease_type','Lease Type',['class'=>'mb-3 '])}}
                {{Form::select('lease_type', array('fixed' => 'fixed', 'month-to-month' => 'month-to-month'),['class'=>'mb-3 form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('purpose','Purpose for Lease',['class'=>'mb-3 '])}}
                {{Form::select('purpose_for_lease', array('resident' => 'resident', 'subletting' => 'subletting'),['class'=>'form-control mb-3 '])}}
            </div>
            <div class="form-group">
                {{Form::label('parking','Do you require Parking?',['class'=>'mb-3 '])}}
                {{Form::select('parking', array('yes' => 'yes', 'no' => 'no'),['class'=>'form-control mb-3 '])}}
            </div>
            <div class="form-group">
                {{Form::label('pets','Do you Have Any Pets?',['class'=>'mb-3 '])}}
                {{Form::select('no_of_pets', array('yes' => 'yes', 'no' => 'no'),['class'=>'form-control mb-3 '])}}
            </div>
            <div class="form-group">
                {{Form::label('occupation','How many occupants will be living here?',['class'=>'mb-3 '])}}
                {{Form::number('no_of_occupants', '',['class'=>'form-control mb-3 '])}}
            </div>       
            {{Form::submit('Submit',['class'=>'btn btn-primary mt-3'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection