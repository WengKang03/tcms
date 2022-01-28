<link
    href="{{ asset('adminmart assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap5.css') }}"
    rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('adminmart assets/css/style.min.css') }}" rel="stylesheet">

@extends('layouts.admin-dashboard')

@section('title')
Manage Teacher
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Manage Teacher</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="admin.admin-dashboard" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Teacher</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Teacher List</h4>
                        <div class="table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered no-wrap">

                                @if(session('status'))
                                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('status') }}</strong>
                                    </div>
                                @endif

                                <thead style="text-align:center;overflow-x:auto;">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Subject</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Operation</th>
                                </thead>

                                <tbody style="text-align:center;overflow-x:auto;">
                                    @foreach($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->teacher_id }}</td>
                                            <td>{{ $teacher->teacher_name }}</td>
                                            <td>{{ $teacher->teacher_phone }}</td>
                                            <td>{{ $teacher->teacher_email }}</td>
                                            <td>{{ $teacher->teacher_gender }}</td>
                                            <td>{{ $teacher->teacher_subject }}</td>
                                            <td>{{ $teacher->created_at }}</td>
                                            <td>{{ $teacher->updated_at }}</td>
                                            <td>
                                                <a href="/admin-modify-teacher-information/{{ $teacher->teacher_id }}"
                                                    class="btn waves-effect waves-light btn-light btn-circle"><i class="fas fa-edit"></i></a>
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
