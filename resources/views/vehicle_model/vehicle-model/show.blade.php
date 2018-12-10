@extends('layouts.master')

@section('title')
Vehicle Model
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
                            <div class="card-head"><header>Vehicle Model {{ $vehiclemodel->id }}</header></div>
                    <div class="card-body">

                        <a href="{{ url('/vehicle-model') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/vehicle-model/' . $vehiclemodel->id . '/edit') }}" title="Edit VehicleModel"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('vehiclemodel' . '/' . $vehiclemodel->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete VehicleModel" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vehiclemodel->id }}</td>
                                    </tr>
                                    <tr><th> Model </th><td> {{ $vehiclemodel->model }} </td></tr><tr><th> Note </th><td> {{ $vehiclemodel->note }} </td></tr><tr><th> Color </th><td> {{ $vehiclemodel->color }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
