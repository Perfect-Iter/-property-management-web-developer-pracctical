@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>{{Auth::user()->name}}</h4>
                  <p class="text-secondary mb-1">{{Auth::user()->email}}</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
            <!-- Property section -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-right">
                    </div>
                    <div class="d-flex justify-content-between px-4">
                        <h3 class="box-title">My Property List</h3>
                        <a href="/listings/create" class="btn btn-primary ">Create Listing</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                @if (count($property) > 0)
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">ID</th>
                                                <th></th>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Classification</th>
                                                <th class="border-top-0">Rooms</th>
                                                <th class="border-top-0">bathrooms</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">#</th>
    
                                                <th class="border-top-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($property as $row)
                                            <tr>
                                                <td >{{$row->id}}</td>
                                                <td><img class="" style="width: 50px; height: 50px;" src="{{ Storage::url($row->cover_img) }}"  /></td>
                                                <td >{{$row->property_name}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->no_of_rooms}}</td>
                                                <td>{{$row->no_of_bathrooms}}</td>
                                                <td>{{$row->status}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-between">
                                                        <a href="/listings/edit/{{$row->id}}" class="btn btn-sm btn-primary">Edit</a>
                                                    
                                                        {!! Form::open(['route' => ['listings.deleteListing',$row->id], 'method'=>'POST','class'=>'']) !!}

                                                            {{Form::Submit('Remove', ['class'=>'btn btn-sm btn-danger'])}}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>                                        
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <p class="text-center mt-5 pt-5">No Property Available</p>
                                @endif
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <!-- Lease tracker -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-right">
                </div>
                <h3 class="text-center">Lease Tracker</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                           
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Property</th>
                                            <th class="border-top-0">Lease Type</th>
                                            <th class="border-top-0">purpose_for_lease</th>
                                            <th class="border-top-0">no_of_occupants</th>
                                            <th class="border-top-0">parking</th>
                                            <th class="border-top-0">Pets</th>
                                            <th class="border-top-0">status</th>
                                            <th class="border-top-0">#</th>

                                            <th class="border-top-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($leases) > 0)
                                        @foreach ($leases as $lease)
                                            <tr>
                                                <td >{{$lease->property_name}}</td>
                                                <td >{{$lease->lease_type}}</td>
                                                <td>{{$lease->purpose_for_lease}}</td>
                                                <td>{{$lease->no_of_occupants}}</td>
                                                <td>{{$lease->parking}}</td>
                                                <td>{{$lease->no_of_pets}}</td>
                                                <td>{{$lease->lease_status}}</td>
                                                <td><a href="#" class="btn btn-sm btn-danger">remove</a></td>
                                            </tr>                                        
                                        @endforeach
                                    @else
                                        <p>No Property Available</p>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>        


        @if (count($property_lease) > 0)
        <!-- Lease tracker -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-right">
                </div>
                <h3 class="text-center">Lease Requests</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                           
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Request User</th>
                                            <th class="border-top-0">Property</th>
                                            <th class="border-top-0">Lease Type</th>
                                            <th class="border-top-0">purpose_for_lease</th>
                                            <th class="border-top-0">no_of_occupants</th>
                                            <th class="border-top-0">parking</th>
                                            <th class="border-top-0">Pets</th>
                                            <th class="border-top-0">status</th>
                                            <th class="border-top-0">#</th>

                                            <th class="border-top-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach ($property_lease as $lease)
                                            <tr>
                                                <td >{{$lease->lease_id}}</td>
                                                <td >{{$lease->email}}</td>
                                                <td >{{$lease->property_name}}</td>
                                                <td >{{$lease->lease_type}}</td>
                                                <td>{{$lease->purpose_for_lease}}</td>
                                                <td>{{$lease->no_of_occupants}}</td>
                                                <td>{{$lease->parking}}</td>
                                                <td>{{$lease->no_of_pets}}</td>
                                                <td>{{$lease->lease_status}}</td>

                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        {!! Form::open(['route' => ['lease.approveLease',$lease->lease_id], 'method'=>'POST','class'=>'']) !!}

                                                        {{Form::Submit('Approve', ['class'=>'btn btn-sm btn-success'])}}
                                                        {!! Form::close() !!}
                                                        <a href="#" class="btn btn-sm btn-danger">Decline</a>
                                                    </div>

                                                </td>
                                            </tr>                                        
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        @else
        <div class=""></div>
        @endif

        </div>
      </div>
</div>

<style>
    table,
    /* setting the text-align property to center*/
    td {
        padding: 5px;
        text-align: center;
    }
</style>

@endsection
    


