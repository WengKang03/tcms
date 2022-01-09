@extends('layouts.teacher-dashboard')

@section('title')
Create Attendance
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Create Attendance</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/teacher.teacher-dashboard"
                                    class="text-muted">Home</a></li>
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
                        <h4 class="card-title">Today Attendance</h4>
                        <form action="/create-attendance" method="POST">
                            {{ csrf_field() }}
                            <div class="form-body">

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
                                            <label>Today Date:</label>
                                            <input type="text" class="form-control" value="<?php echo date('Y-m-d');?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <input type="hidden" name="teacher_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="current_date" value="<?php echo date('Y-m-d');?>">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Grade Type:</label>
                                                <select name="grade"
                                                    class="form-control @error('grade') is-invalid @enderror" 
                                                    placeholder="Material Grade" value="{{ old('attendance_grade') }}">
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
                                                placeholder="Material Year" value="{{ old('attendance_year') }}">
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
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Subject Type:</label>
                                            <select name="subject" 
                                                class="form-control @error('subject') is-invalid @enderror"
                                                placeholder="Material Subject" value="{{ old('attendance_subject') }}">
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
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status :</label>
                                            <textarea
                                                class="form-control @error('status') is-invalid @enderror"
                                                placeholder="Please write down student who absent in class."
                                                name="status">{{ old('status') }}</textarea>

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
                                            <textarea 
                                                class="form-control @error('reason') is-invalid @enderror"
                                                placeholder="Please write down the reason."
                                                name="reason">{{ old('reason') }}</textarea>

                                            @error('reason')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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

<script src="{{ asset('adminmart assets/libs/jquery/dist/jquery.min.js') }}"></script>

<script>
$(document).ready(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          showArrows: true,
        });
    });
});

</script>