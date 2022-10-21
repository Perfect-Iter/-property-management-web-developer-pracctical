@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="form-area w-50 mx-auto">

            <h3 class="text-center">Add a New Listing</h3>

            {!! Form::open(['route' => 'listings.createListing', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name','Property Name')}}
                {{Form::text('property_name', '',['class'=>'mb-3 form-control'])}}
            </div>
            <div class="form-group ">
                {{Form::label('classification','Classification',  ['class' => 'mb-3  '])}}
                {{ Form::select('category', $categories,null, ['class' => 'mb-3  form-control',]) }}
               
            </div>
            <div class="form-group">
                {{Form::label('location','Location')}}
                {{Form::text('location', '',['class'=>'form-control mb-3 '])}}
            </div>
            <div class="form-group">
                {{Form::label('img','Cover Image')}}
                {{Form::file('cover_img',['class'=>'form-control mb-3'])}}
            </div>
            <div class="form-group">
                {{Form::label('rooms','Number of bedrooms')}}
                {{Form::number('no_of_rooms', '',['class'=>'form-control mb-3 '])}}
            </div>
            <div class="form-group">
                {{Form::label('bathrooms','Number of bathrooms')}}
                {{Form::number('no_of_bathrooms', '',['class'=>'form-control mb-3 '])}}
            </div>
        
            {{Form::submit('Submit',['class'=>'btn btn-primary mt-3'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection