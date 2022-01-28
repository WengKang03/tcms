@extends('layouts.admin-dashboard')

@section('title')
Modify Subejct Enrol
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modify Subject Enrol</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="admin.admin-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Modify Subject Enrol</li>
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



                        <h4 class="card-title">Modify Subject Enrol</h4>
                        <form action="/admin-modify-subject-enrol-update/{{ $subject_enrols->enrol_id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body"><br>

                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control" placeholder="Subject Enrol ID"
                                                value="{{ $subject_enrols->enrol_id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Student name:</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Student Name" value="{{ $subject_enrols->student_name }}">

                                            @error('name')
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
                                                    {{ $subject_enrols->enrol_grade == "none" ? 'selected' : '' }}>
                                                    None</option>
                                                <option value="Primary"
                                                    {{ $subject_enrols->enrol_grade == "primary" ? 'selected' : '' }}>
                                                    Primary</option>
                                                <option value="Secondary"
                                                    {{ $subject_enrols->enrol_grade == "secondary" ? 'selected' : '' }}>
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
                                                {{ $subject_enrols->enrol_year == "none" ? 'selected' : '' }}>
                                                None</option>
                                            <option value="1"
                                                {{ $subject_enrols->enrol_year == "1" ? 'selected' : '' }}>
                                                1</option>
                                            <option value="2"
                                                {{ $subject_enrols->enrol_year == "2" ? 'selected' : '' }}>
                                                2</option>
                                            <option value="3"
                                                {{ $subject_enrols->enrol_year == "3" ? 'selected' : '' }}>
                                                3</option>
                                            <option value="4"
                                                {{ $subject_enrols->enrol_year == "4" ? 'selected' : '' }}>
                                                4</option>
                                            <option value="5"
                                                {{ $subject_enrols->enrol_year == "5" ? 'selected' : '' }}>
                                                5</option>
                                            <option value="6"
                                                {{ $subject_enrols->enrol_year == "6" ? 'selected' : '' }}>
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
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Subject Type:</label>
                                            <textarea name="subject"
                                                class="form-control-file @error('subject') is-invalid @enderror"
                                                placeholder="Subject Types" value="{{  $subject_enrols->enrol_type }}" ></textarea>

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
                                            <label>Created At:</label>
                                            <input type="text" name="create_at"
                                                class="form-control @error('create_at') is-invalid @enderror"
                                                placeholder="Created At" value="{{ $subject_enrols->created_at }}" readonly>

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
                                                placeholder="Updated At" value="{{ $subject_enrols->updated_at }}" readonly>

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
                                        <a href="/admin.admin-view-subject-enrol" class="btn btn-danger">Back</a>
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
