@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

        <div class="container">
            <h1>Kobo Survey Data</h1>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name of Surveyor</th>
                        <th>Location of Survey</th>
                        <th>Containment Type</th>
                        <th>Primary Source of Water</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('home.kobodatatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name_of_surveyor', name: 'name_of_surveyor'},
            {data: 'location_of_survey', name: 'location_of_survey'},
            {data:'kind_of_containment',name:'kind_of_containment'},
            {data:'primary_source_of_water',name:'primary_source_of_water'},
            {data:'date',name:'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
  $('#table').DataTable( {
    columnDefs: [ {
      targets: 6,
      render: $.fn.dataTable.render.moment( 'Do MMM YYYY' )
    } ]
  } );
</script>
@endsection
