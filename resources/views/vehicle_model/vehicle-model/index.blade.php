@extends('layouts.master')

@section('title')
    View Inventory
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endpush

@section('contents')

    <!-- start page content -->
    <div class="page-content-wrapper">

        <div class="page-content">

            @include('layouts.success_errors')

            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-purple">
                                <div class="card-head">

                                    <header>  <a href="{{ url('/vehicle-model/create') }}" class="btn btn-success btn-sm" title="Add New Manufacturer">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                        </a> View Inventory</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>

                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table id="vehicle_table" class="table table-striped table-hover table-bordered table-list" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Serial Number</th>
                                                <th>Manufacturer</th>
                                                <th>Model </th>
                                                <th>Registration Number</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="row">
            </div> --}}


        </div>
    </div>

    <div class="modal fade" id="mTopRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">More Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12" id="vehicle_details"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- data tables -->
    <script src="{{asset('plugins/assets/datatables/jquery.dataTables.min.js')}}" ></script>
    <script src="{{asset('plugins/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>

    <script>
        $(document).ready(function () {

            $('#mTopRight').on('show.bs.modal', function (e) {
                var html = '<table class="table table-striped table-hover table-bordered table-list" align="center"><tr><td><b>Color</b></td></tr><tr><td>' + $(e.relatedTarget).data('color') + '</td></tr><tr><td><b>Manufacturing Year</b></td></tr><tr><td>' + $(e.relatedTarget).data('manufacturing_year') + '</td></tr><tr><td><b>Registration Number</b></td></tr><tr><td>' + $(e.relatedTarget).data('registration_number') + '</td></tr><tr><td><b>Note</b></td></tr><tr><td>' + $(e.relatedTarget).data('note') + '</td></tr></table>';
                $(this).find('#vehicle_details').html(html);
            })

            oTable = $('#vehicle_table').DataTable({

                "processing": true,
                "serverSide": true,
                "render": true,
                "ajax": "{{URL::route('vehicles.datatable')}}",
                paging: true,
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'manufacturer_id', name: 'manufacturer_id'},
                    {data: 'model', name: 'model'},
                    {data: 'registration_number', name: 'registration_number'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush