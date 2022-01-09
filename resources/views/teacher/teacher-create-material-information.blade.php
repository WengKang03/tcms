@extends('layouts.teacher-dashboard')

@section('title')
Craete Study Material
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Craete Study Material</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/teacher.teacher-dashboard"
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
                        <h4 class="card-title">New Study Material</h4>
                        <form action="/material-create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>File:</label>
                                            <input type="file" name="file"
                                                class="form-control-file @error('file') is-invalid @enderror"
                                                placeholder="Material File" value="{{ old('material_file') }}" >

                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Grade Type:</label>
                                            <select name="grade"
                                                class="form-control @error('grade') is-invalid @enderror" 
                                                placeholder="Material Grade" value="{{ old('material_grade') }}">
                                                <option value="primary">Primary</option>
                                                <option value="secondary">Secondary</option>
                                            </select>

                                        @error('grade')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><br>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Year Type:</label>
                                        <select name="year" 
                                            class="form-control @error('year') is-invalid @enderror"
                                            placeholder="Material Year" value="{{ old('material_year') }}">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
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
                                            class="form-control @error('subject') is-invalid @enderror"
                                            placeholder="Material Subject" value="{{ old('material_subject') }}">
                                                <option value="bm">BM</option>
                                                <option value="bi">BI</option>
                                                <option value="bc">BC</option>
                                                <option value="math">Math</option>
                                                <option value="sc">SC</option>
                                        </select>

                                        @error('subject')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea name="desc"
                                        class="form-control-file @error('desc') is-invalid @enderror"
                                        placeholder="Material description" value="{{ old('material_desc') }}" ></textarea>

                                        @error('desc')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Created By :</label>
                                        <textarea name="created_by"
                                        class="form-control-file @error('created_by') is-invalid @enderror"
                                        placeholder="Material created_by" value="{{ old('created_by') }}" ></textarea>

                                        @error('created_by')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div><br>
                    
                            <div class="row">
                            <div class="form-actions">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
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
