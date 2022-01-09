@extends('layouts.student-dashboard')

@section('title')
Create Subejct Enrol
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Create Subject Enrol</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/student.student-dashboard"
                                    class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Subject Enrol</li>
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
                        <h4 class="card-title">Subject Enrol List</h4>
                        <form action="/create-subject-enrol" method="POST">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>User Name:</label>
                                            <textarea 
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Please write down your name."
                                                name="name">{{ old('name') }}</textarea>
    
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Grade Type:</label>
                                                <select name="grade"
                                                    class="form-control @error('grade') is-invalid @enderror" 
                                                    placeholder="Material Grade" value="{{ old('grade') }}">
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
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Year Type:</label>
                                            <select name="year" 
                                                class="form-control @error('year') is-invalid @enderror"
                                                placeholder="Material Year" value="{{ old('year') }}">
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
                                </div>
    
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subject Type:</label>
                                            <textarea 
                                                class="form-control @error('subject') is-invalid @enderror"
                                                placeholder="Please write down the subject that you want to enrol."
                                                name="subject">{{ old('subject') }}</textarea>
    
                                            @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
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
@endsection

@section('scripts')

@endsection