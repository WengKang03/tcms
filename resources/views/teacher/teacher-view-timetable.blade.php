@extends('layouts.teacher-dashboard')

@section('title')
View timetable
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">View Timetable</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/teacher.teacher-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Timetable</li>
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
                    <h4 class="card-title">Timetable List</h4>
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
                                <th>Image</th>
                                <th>Grade</th>
                                <th>Year</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </thead>

                            <tbody style="text-align:center;overflow-x:auto;">
                                @foreach($timetable as $timetable)
                                    <tr>
                                        <td>{{ $timetable->timetable_id }}</td>
                                        <td><img src="{{ asset('storage/'. $timetable->timetable_image ) }}" width="50px"></td>
                                        <td>{{ $timetable->timetable_grade }}</td>
                                        <td>{{ $timetable->timetable_year }}</td>
                                        <td>{{ $timetable->created_at }}</td>
                                        <td>{{ $timetable->updated_at }}</td>
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
@endsection

@section('scripts')

@endsection