@extends('layouts.teacher-dashboard')

@section('title')
Modify Attendance
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modify Attendance</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/teacher.teacher-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Attendance</li>
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


                        <h4 class="card-title">Modify Attendance</h4>
                        <form action="/teacher-modify-attendance-update/{{ $attendance_record->attendance_id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body"><br>

                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control" placeholder="User ID"
                                                value="{{ Auth::id() }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Teacher name:</label>
                                            <input type="text" class="form-control" placeholder="User Name"
                                                value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Created Date:</label>
                                            <input type="text" class="form-control"
                                                value="{{ date('Y-m-d', strtotime($attendance_record->created_at)) }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <input type="hidden" name="teacher_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="current_date"
                                        value="{{ date('d-m-Y', strtotime($attendance_record->created_at)) }}">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Grade:</label>
                                            <select name="grade"
                                            class="form-control  @error('grade') is-invalid @enderror">
                                            <option value="primary"
                                                {{ $attendance_record->attendance_grade == "primary" ? 'selected' : '' }}>
                                                Primary</option>
                                            <option value="secondary"
                                                {{ $attendance_record->attendance_grade == "Secondary" ? 'selected' : '' }}>
                                                Secondary</option>
                                        </select>

                                            @error('grade')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Year:</label>
                                            <select name="year"
                                            class="form-control  @error('year') is-invalid @enderror">
                                            <option value="1"
                                                {{ $attendance_record->attendance_year == "1" ? 'selected' : '' }}>
                                                1</option>
                                            <option value="2"
                                                {{ $attendance_record->attendance_year == "2" ? 'selected' : '' }}>
                                                2</option>
                                            <option value="3"
                                                {{ $attendance_record->attendance_year == "3" ? 'selected' : '' }}>
                                                3</option>
                                            <option value="4"
                                                {{ $attendance_record->attendance_year == "4" ? 'selected' : '' }}>
                                                4</option>
                                            <option value="5"
                                                {{ $attendance_record->attendance_year == "5" ? 'selected' : '' }}>
                                                5</option>
                                            <option value="6"
                                                {{ $attendance_record->attendance_year == "6" ? 'selected' : '' }}>
                                                6</option>
                                        </select>

                                            @error('year')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Subject Type:</label>
                                            <select name="subject"
                                                class="form-control  @error('subject') is-invalid @enderror">
                                                <option value="malay"
                                                    {{ $attendance_record->attendance_subject == "malay" ? 'selected' : '' }}>
                                                    Malay</option>
                                                <option value="english"
                                                    {{ $attendance_record->attendance_subject == "english" ? 'selected' : '' }}>
                                                    English</option>
                                                <option value="chinese"
                                                    {{ $attendance_record->attendance_subject == "chinese" ? 'selected' : '' }}>
                                                    Chinese</option>
                                                <option value="mathematic"
                                                    {{ $attendance_record->attendance_subject == "mathematic" ? 'selected' : '' }}>
                                                    Mathematic</option>
                                                <option value="science"
                                                    {{ $attendance_record->attendance_subject == "science" ? 'selected' : '' }}>
                                                    Science</option>
                                            </select>

                                            @error('subject')
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
                                                <label>Status: </label>
                                                <textarea name="status"
                                                class="form-control-file @error('status') is-invalid @enderror"
                                                placeholder="Status" value="{{  $attendance_record->status }}" ></textarea>
        
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reason :</label>
                                                <textarea name="reason"
                                                class="form-control-file @error('reason') is-invalid @enderror"
                                                placeholder="Reason" value="{{  $attendance_record->reason }}" ></textarea>
        
                                                @error('reason')
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
                                        <a href="/teacher.teacher-manage-attendance" class="btn btn-danger">Back</a>
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
