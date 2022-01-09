@extends('layouts.teacher-dashboard')

@section('title')
Modify Personal Information
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modify Personal Information</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/teacher.teacher-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Personal Information</li>
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


                        <form action="teacher-modify-personal-information-update/{{ Auth::id() }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body">

                                @if($teachers->teacher_photo == true)         
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Modify Personal Information</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <img style="width: 200px; height: 200px;"
                                            src="/storage/teacher_images/{{ $teachers->teacher_photo }}">
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                    </div>
                                </div>                                
                                @else
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Modify Personal Information</h4>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                    </div>
                                </div><br>
                                @endif


                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control" placeholder="Teacher ID"
                                                value="{{ Auth::id() }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teacher name:</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Teacher Name" value="{{ $teachers->teacher_name }}">

                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Teacher Phone:</label>
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Teacher Phone" value="{{ $teachers->teacher_phone }}">

                                            @error('phone')
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
                                            <label>Teacher Email address:</label>
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Teacher Email Address"
                                                value="{{ $teachers->teacher_email }}">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-3">
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

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select name="gender"
                                                class="form-control  @error('gender') is-invalid @enderror">
                                                <option value="male"
                                                    {{ $teachers->teacher_gender == "male" ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ $teachers->teacher_gender == "female" ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>

                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Subject Type:</label>
                                            <select name="subject"
                                                class="form-control  @error('subject') is-invalid @enderror">
                                                <option value="malay"
                                                    {{ $teachers->teacher_subject == "malay" ? 'selected' : '' }}>
                                                    Malay</option>
                                                <option value="english"
                                                    {{ $teachers->teacher_gender == "english" ? 'selected' : '' }}>
                                                    English</option>
                                                <option value="chinese"
                                                    {{ $teachers->teacher_subject == "chinese" ? 'selected' : '' }}>
                                                    Chinese</option>
                                                <option value="mathematic"
                                                    {{ $teachers->teacher_subject == "mathematic" ? 'selected' : '' }}>
                                                    Mathematic</option>
                                                <option value="science"
                                                    {{ $teachers->teacher_subject == "science" ? 'selected' : '' }}>
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

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Photo:</label>
                                            <input type="file" name="photo"
                                                class="form-control-file @error('photo') is-invalid @enderror"
                                                placeholder="Teacher Photo" value="{{ $teachers->teacher_photo }}">

                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Created At:</label>
                                            <input type="text" name="create_at"
                                                class="form-control @error('create_at') is-invalid @enderror"
                                                placeholder="Created At" value="{{ $teachers->created_at }}" readonly>

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
                                                placeholder="Updated At" value="{{ $teachers->updated_at }}" readonly>

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
                                        <a href="/teacher.teacher-dashboard" class="btn btn-danger">Back</a>
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
