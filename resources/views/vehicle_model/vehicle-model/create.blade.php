@extends('layouts.master')

@section('title')
Vehiclemodel
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/assets/dropzone/dropzone.css')}}">
    <!--select2-->
    <link href="{{ asset('plugins/assets/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/assets/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

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
                                <div class="card-head">
                                    <header>Vehiclemodel</header>
                                </div>
                                <div class="card-body">
                                    <a href="{{ url('/vehicle-model') }}" title="Back">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                                  aria-hidden="true"></i> Back
                                        </button>
                                    </a>
                                    <br/>
                                    <br/>

                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <form method="POST" action="{{ url('/vehicle-model') }}" accept-charset="UTF-8"
                                          class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        @include ('vehicle_model.vehicle-model.form', ['formMode' => 'create'])

                                    </form>


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
    <script src="{{ asset('plugins/assets/select2/js/select2.js') }}" ></script>

    <script>
        $(document).ready(function () {

            //hiding the reason
            $('#cReason').hide();

            $('.select2, .select2-multiple').select2({
                theme: "bootstrap",
            });
        });

    </script>

    {{-- jquery validator/ --}}
    <script src="{{asset('plugins/formvalidator/jquery.form-validator.min.js')}}"></script>
    <script>
        $.validate();
    </script>
@endpush
