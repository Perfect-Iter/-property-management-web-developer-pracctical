@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="show-results mt-5">
                <div class="float-left">
                    <h5 class="text-dark mb-0 pt-2">Filter Results</h5>
                    
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg-3">
            <div class="left-sidebar">
                <form action="{{ URL::current() }}" method="get">
                <div class="accordion" id="accordionExample">
                    <div class="card mt-4">
                        <a data-toggle="collapse" href="#collapseOne" class="job-list" aria-expanded="true" aria-controls="collapseOne">
                            <div class="card-header" id="headingOne">
                                <h6 class="mb-0 text-dark f-18">Listing Classifications</h6>
                            </div>
                        </a>
                        
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                <div class="card-body p-0">
                                    @foreach ($categories as $category)
                                    @php
                                        $checked = [];
                                        if(isset($_GET['filterclassification'])){
                                            $checked = $_GET['filterclassification'];
                                        }
                                    @endphp
                                    <div class="listing custom-control custom-checkbox">
                                        <input type="checkbox" name="filterclassification[]" value="{{$category->id}}" class="listing custom-control-input all-select"
                                        @if(in_array($category->id, $checked))  checked  @endif
                                            
                                        >
                                        <label class="custom-control-label ml-1 text-muted f-15" for="customCheckAll">{{$category->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                    <button class="btn btn-primary mt-3">Filter</button>
                </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
        <section class="">
                <div class="container ">
                    <div class="table-settings mb-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col col-md-10 col-lg-3 col-xl-8">
                                <form action="" method="get">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-search"></span></span>
                                        <input type="text" name="search" class="form-control" id="searchasset" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                    </div>
                                </form>
                            </div>
              
                        </div>
                    </div>
                    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md row-cols-xl-2 justify-content-center">
                        @if (count($properties) > 0)
                        @foreach ($properties as $row)
                        <div class="col mb-5">
                            <div class="card h-100">

                                <img class="card-img-top" src="{{ Storage::url($row->cover_img) }}"  />

                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <div class="d-flex justify-content-between">
                                            <h5 class="fw-bolder">{{$row->property_name}}</h5>
                                            <small>{{$row->name}}</small>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center" >
                                            <div class="">
                                                <small class="mx-2">{{$row->no_of_rooms}} <i class="fa-solid fa-bed"></i></small>
                                                <small class="">{{$row->no_of_bathrooms}} <i class="fa-solid fa-bath"></i></small>
                                            </div>
                                            <p class="">Available</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    @if ($row->status == "available")
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/lease/create/{{$row->id}}">Lease</a></div>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No Listings Available</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination job-pagination justify-content-center mt-5 mb-5">
                                    {{$properties->onEachSide(1)->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>

</div>

@endsection