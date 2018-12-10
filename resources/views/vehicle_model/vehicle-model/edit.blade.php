@extends('layouts.master')

@section('title')
Vehiclemodel
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/assets/dropzone/dropzone.css')}}">
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
                            <div class="card-head"><header>Edit VehicleModel #{{ $vehiclemodel->id }}</header></div>
                            <div class="card-body">
                                <a href="{{ url('/vehicle-model') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif





                                @isset($vehicle_image)
                                    @foreach($vehiclemodel->images as $image)
                                        <a href="" download="{{url($image->image_path)}}">
                                        <img width="100" src="{{url($image->image_path)}}" alt="">
                                        </a>
                                        <form method="POST" action="{{ url('/vehicle-image' . '/' . $image->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Vehicle" onclick="return confirm(' Confirm delete? ' )"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                        @endforeach


                                    <form action='{{url("vehicles/image_upload/$vehiclemodel->id")}}' class="dropzone" id="vehicle-dropzone-{{$vehiclemodel->id}}">
                                        {{ csrf_field() }}

                                    </form>
                                    @else
                                    <form method="POST" action="{{ url('/vehicle-model/' . $vehiclemodel->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}

                                        @include ('vehicle_model.vehicle-model.form', ['formMode' => 'edit'])
                                    </form>
                                @endisset


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{asset('plugins/assets/dropzone/dropzone.js')}}"></script>

    {{-- jquery validator/ --}}
    <script src="{{asset('plugins/formvalidator/jquery.form-validator.min.js')}}"></script>
    <script>
        $.validate();
    </script>
@endpush