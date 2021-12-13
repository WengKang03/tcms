@extends('layouts.admin-dashboard')

@section('title')
Modify Student Information
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modify Sudent Information</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin.admin-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Student Information</li>
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



                        <h4 class="card-title">Modify Student Information</h4>
                        <form action="admin-modify-student-information-update/{{ $students->student_id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body"><br>

                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control" placeholder="Student ID"
                                                value="{{ $students->student_id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Student name:</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Student Name" value="{{ $students->student_name }}">

                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Phone:</label>
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Student Phone" value="{{ $students->student_phone }}">

                                            @error('phone')
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
                                            <label>Student Email address:</label>
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Student Email Address"
                                                value="{{ $students->student_email }}">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror">

                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select name="gender"
                                                class="form-control  @error('gender') is-invalid @enderror">
                                                <option value="male"
                                                    {{ $students->student_gender == "male" ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ $students->student_gender == "female" ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>

                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div><br>

                                <div class="col-md-3" style="">
                                    <div class="form-group">
                                        <label>Grade Type:</label>
                                        <select name="grade_type"
                                            class="form-control @error('grade_type') is-invalid @enderror">
                                            <option value="Primary"
                                                {{ $students->student_grade == "Primary" ? 'selected' : '' }}>
                                                Primary</option>
                                            <option value="Secondary"
                                                {{ $students->student_grade == "Secondary" ? 'selected' : '' }}>
                                                Secondary</option>
                                        </select>

                                        @error('grade_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><br>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Year Type:</label>
                                        <select name="year_type" 
                                            class="form-control @error('year_type') is-invalid @enderror">
                                            <option value="1"
                                                {{ $students->student_year == "1" ? 'selected' : '' }}>
                                                1</option>
                                            <option value="2"
                                                {{ $students->student_year == "2" ? 'selected' : '' }}>
                                                2</option>
                                            <option value="3"
                                                {{ $students->student_year == "3" ? 'selected' : '' }}>
                                                3</option>
                                            <option value="4"
                                                {{ $students->student_year == "4" ? 'selected' : '' }}>
                                                4</option>
                                            <option value="5"
                                                {{ $students->student_year == "5" ? 'selected' : '' }}>
                                                5</option>
                                            <option value="6"
                                                {{ $students->student_year == "6" ? 'selected' : '' }}>
                                                6</option>
                                        </select>

                                        @error('year_type')
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
                                                placeholder="Created At" value="{{ $students->created_at }}" readonly>

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
                                                placeholder="Updated At" value="{{ $students->updated_at }}" readonly>

                                            @error('updated_at')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="admin.admin-manage-student" class="btn btn-danger">Back</a>
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
