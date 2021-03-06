@extends('layouts.master')

@section('title')
Vehiclemodel
@endsection

@push('css')

@endpush
@section('contents')
<div class="page-content-wrapper">

    <div class="page-content">

        @include('layouts.success_errors')
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-purple">
                            <div class="card-head"><header>Vehiclemodel</header></div>
                            <div class="card-body">
                                <a href="{{ url('/vehicle-model/create') }}" class="btn btn-success btn-sm" title="Add New VehicleModel">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>

                                <form method="GET" action="{{ url('/vehicle-model') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>

                                <br/>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th><th>Model</th><th>Note</th><th>Color</th><th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vehiclemodel as $item)
                                            <tr>
                                                <td>{{ $loop->iteration or $item->id }}</td>
                                                <td>{{ $item->model }}</td><td>{{ $item->note }}</td><td>{{ $item->color }}</td>
                                                <td>
                                                    <a href="{{ url('/vehicle-model/' . $item->id) }}" title="View VehicleModel"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                    <a href="{{ url('/vehicle-model/' . $item->id . '/edit') }}" title="Edit VehicleModel"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                    <form method="POST" action="{{ url('/vehicle-model' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete VehicleModel" onclick="return confirm( & quot; Confirm delete? & quot; )"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> {!! $vehiclemodel->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
