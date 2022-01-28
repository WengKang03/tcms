@extends('layouts.teacher-dashboard')

@section('title')
Modify Study Material
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modify Study Material</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="teacher.teacher-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Study Material</li>
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

                        <h4 class="card-title">Modify Material</h4>
                        <form action="/teacher-modify-material-information-update/{{ $materials->material_id }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body"><br>

                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control" placeholder="Teacher ID"
                                                value="{{ $materials->material_id }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>File :</label>
                                            <input type="file" name="file"
                                                class="form-control-file @error('file') is-invalid @enderror"
                                                placeholder="Material Image" value="{{ $materials->material_file }}">

                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Material Grade:</label>
                                            <select name="grade"
                                            class="form-control  @error('grade') is-invalid @enderror">
                                            <option value="primary"
                                                {{ $materials->material_grade == "primary" ? 'selected' : '' }}>
                                                Primary</option>
                                            <option value="secondary"
                                                {{ $materials->material_grade == "secondary" ? 'selected' : '' }}>
                                                Secondary</option>
                                        </select>

                                            @error('grade')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Material Year:</label>
                                            <select name="year"
                                            class="form-control  @error('year') is-invalid @enderror">
                                            <option value="1"
                                                {{ $materials->material_year == "1" ? 'selected' : '' }}>
                                                1</option>
                                            <option value="2"
                                                {{ $materials->material_year == "2" ? 'selected' : '' }}>
                                                2</option>
                                            <option value="3"
                                                {{ $materials->material_year == "3" ? 'selected' : '' }}>
                                                3</option>
                                            <option value="4"
                                                {{ $materials->material_year == "4" ? 'selected' : '' }}>
                                                4</option>
                                            <option value="5"
                                                {{ $materials->material_year == "5" ? 'selected' : '' }}>
                                                5</option>
                                            <option value="6"
                                                {{ $materials->material_year == "6" ? 'selected' : '' }}>
                                                6</option>
                                        </select>

                                            @error('year')
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
                                                    {{ $materials->material_subject == "malay" ? 'selected' : '' }}>
                                                    Malay</option>
                                                <option value="english"
                                                    {{ $materials->material_subject == "english" ? 'selected' : '' }}>
                                                    English</option>
                                                <option value="chinese"
                                                    {{ $materials->material_subject == "chinese" ? 'selected' : '' }}>
                                                    Chinese</option>
                                                <option value="mathematic"
                                                    {{ $materials->material_subject == "mathematic" ? 'selected' : '' }}>
                                                    Mathematic</option>
                                                <option value="science"
                                                    {{ $materials->material_subject == "science" ? 'selected' : '' }}>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Description :</label>
                                                <textarea name="desc"
                                                class="form-control-file @error('desc') is-invalid @enderror"
                                                placeholder="Material description" value="{{  $materials->material_desc }}" ></textarea>
        
                                                @error('desc')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Created By</label>
                                                <textarea name="created_by"
                                                class="form-control-file @error('created_by') is-invalid @enderror"
                                                placeholder="Material Created By" value="{{  $materials->created_by }}" ></textarea>
        
                                                @error('created_by')
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
                                                placeholder="Created At" value="{{ $materials->created_at }}" readonly>

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
                                                placeholder="Updated At" value="{{ $materials->updated_at }}" readonly>

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
                                        <a href="/teacher.teacher-manage-material-information" class="btn btn-danger">Back</a>
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
