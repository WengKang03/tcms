@extends('layouts.admin-dashboard')

@section('title')
Modify Users Timetable
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modify Users Timetable</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin.admin-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Users Timetable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ session('status') }}</strong>
                            </div>
                        @endif



                        <h4 class="card-title">Modify Timetable Information</h4>
                        <form action="/admin-modify-user-timetable-update/{{ $timetables->timetable_id }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body"><br>

                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control" placeholder="Teacher ID"
                                                value="{{ $timetables->timetable_id }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image :</label>
                                            <input type="file" name="image"
                                                class="form-control-file @error('image') is-invalid @enderror"
                                                placeholder="Timetable Image" value="{{ $timetables->timetable_image}}">

                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Grade :</label>
                                            <select name="grade"
                                                class="form-control  @error('grade') is-invalid @enderror">
                                                <option value="None"
                                                    {{ $timetables->timetable_grade == "none" ? 'selected' : '' }}>
                                                    None</option>
                                                <option value="Primary"
                                                    {{ $timetables->timetable_grade == "primary" ? 'selected' : '' }}>
                                                    Primary</option>
                                                <option value="Secondary"
                                                    {{ $timetables->timetable_grade == "secondary" ? 'selected' : '' }}>
                                                    Secondary</option>
                                            </select>

                                            @error('grade')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Year :</label>
                                            <select name="year" 
                                            class="form-control @error('year') is-invalid @enderror">
                                            <option value="None"
                                                {{ $timetables->timetable_year == "none" ? 'selected' : '' }}>
                                                None</option>
                                            <option value="1"
                                                {{ $timetables->timetable_year == "1" ? 'selected' : '' }}>
                                                1</option>
                                            <option value="2"
                                                {{ $timetables->timetable_year == "2" ? 'selected' : '' }}>
                                                2</option>
                                            <option value="3"
                                                {{ $timetables->timetable_year == "3" ? 'selected' : '' }}>
                                                3</option>
                                            <option value="4"
                                                {{ $timetables->timetable_year == "4" ? 'selected' : '' }}>
                                                4</option>
                                            <option value="5"
                                                {{ $timetables->timetable_year == "5" ? 'selected' : '' }}>
                                                5</option>
                                            <option value="6"
                                                {{ $timetables->timetable_year == "6" ? 'selected' : '' }}>
                                                6</option>
                                        </select>

                                            @error('year')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>User Type:</label>
                                            <select name="usertype" 
                                            class="form-control @error('usertype') is-invalid @enderror">
                                            <option value="Student"
                                                {{ $timetables->usertype == "student" ? 'selected' : '' }}>
                                                Student</option>
                                            <option value="BM Teacher"
                                                {{ $timetables->timetable_year == "bm teacher" ? 'selected' : '' }}>
                                                BM Teacher</option>
                                            <option value="BI Teacher"
                                                {{ $timetables->timetable_year == "bi teacher" ? 'selected' : '' }}>
                                                BI Teacher</option>
                                            <option value="BC Teacher"
                                                {{ $timetables->timetable_year == "bc teacher" ? 'selected' : '' }}>
                                                BC Teacher</option>
                                            <option value="Math Teacher"
                                                {{ $timetables->timetable_year == "math teacher" ? 'selected' : '' }}>
                                                Math Teacher</option>
                                            <option value="SC Teacher"
                                                {{ $timetables->timetable_year == "sc teacher" ? 'selected' : '' }}>
                                                SC Teacher</option>
                                        </select>

                                            @error('usertype')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Created At:</label>
                                            <input type="text" name="create_at"
                                                class="form-control @error('create_at') is-invalid @enderror"
                                                placeholder="Created At" value="{{ $timetables->created_at }}" readonly>

                                            @error('create_at')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Updated At:</label>
                                            <input type="text" name="updated_at"
                                                class="form-control @error('updated_at') is-invalid @enderror"
                                                placeholder="Updated At" value="{{ $timetables->updated_at }}" readonly>

                                            @error('updated_at')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="/admin.admin-manage-user-timetable" class="btn btn-danger">Back</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>
@endsection

@section('scripts')

@endsection