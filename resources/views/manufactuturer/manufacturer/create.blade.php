@extends('layouts.master')

@section('title')
Manufacturer
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
                            <div class="card-head"><header>Manufacturer</header></div>
                            <div class="card-body">
                                <a href="{{ url('/manufacturer') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif

                                <form method="POST" action="{{ url('/manufacturer') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    @include ('manufactuturer.manufacturer.form', ['formMode' => 'create'])

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
