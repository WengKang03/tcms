<link
    href="{{ asset('adminmart assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap5.css') }}"
    rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('adminmart assets/css/style.min.css') }}" rel="stylesheet">

@extends('layouts.admin-dashboard')

@section('title')
Manage User Timetable
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Manage User Timetable</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="admin.admin-dashboard" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">User Timetable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Delete Model -->
        <div class="modal fade" id="deletemodelpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="delete_model_form" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <div class="modal-body">
                            <input type="hidden" id="delete_timetable_record" />
                            <h4 style="text-align: center;">Are you sure to delete this timetable?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes, delete it</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Timetable List</h4>
                        <div class="table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered no-wrap">

                                @if(session('status'))
                                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">??</span>
                                        </button>
                                        <strong>{{ session('status') }}</strong>
                                    </div>
                                @endif

                                <thead style="text-align:center;overflow-x:auto;">
                                    <th>ID</th>
                                    <th>File</th>
                                    <th>Usertype</th>
                                    <th>Grade</th>
                                    <th>Year</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Operation</th>
                                </thead>

                                <tbody style="text-align:center;overflow-x:auto;">
                                    @foreach($timetable as $timetable)
                                        <tr>
                                            <td>{{ $timetable->timetable_id }}</td>
                                            <td><a href="/storage/timetable_image/{{ $timetable->timetable_image }}" class="btn waves-effect waves-light btn-light btn-circle"><i class="fas fa-file"></i></a></td>
                                            <td>{{ $timetable->usertype }}</td>
                                            <td>{{ $timetable->timetable_grade }}</td>
                                            <td>{{ $timetable->timetable_year }}</td>
                                            <td>{{ $timetable->created_at }}</td>
                                            <td>{{ $timetable->updated_at }}</td>
                                            <td>
                                                <a href="admin-modify-user-timetable/{{ $timetable->timetable_id }}" class="btn waves-effect waves-light btn-light btn-circle"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger deletetimetabletbtn btn-circle"><i class="fas fa-trash-alt"></i></a>
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
</div>
@endsection

@section('scripts')

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myList div").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });


$('#dataTable').on('click', '.deletetimetabletbtn', function () {

$tr = $(this).closest('tr');

var data = $tr.children("td").map(function () {
    return $(this).text();
}).get();

$('#delete_timetable_record').val(data[0]);

$('#delete_model_form').attr('action', '/admin-timetable-delete/' + data[0]);

$('#deletemodelpop').modal('show');
});

});
</script>