@extends('layouts.admin-dashboard')

@section('title')
View Teacher Attendance Index
@endsection


@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">View Teacher Attendance Index</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin.admin-dashboard" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Teacher Attendance Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">


        @if(session('status'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>{{ session('status') }}</strong>
            </div>
        @endif


        <input id="myInput" class="form-control custom-shadow custom-radius border-0 bg-white" type="search"
            placeholder="Typing in the date of the record that you want to search." aria-label="Search"><br />

            <div class="row" id="myList">
                @foreach($teachers as $teacher)
                    <div class="col-lg-3 col-md-6" style="vertical-align: middle;">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                
                                <h4 class="card-title">{{ $teacher->teacher_name }}</h4><br />                     
    
                                <p class="card-text">{{ $teacher->teacher_phone }}</p>
                                <p class="card-text">{{ $teacher->teacher_email }}</p>
                                <a href="/admin.admin-view-attendance/{{ $teacher->teacher_id }}"
                                    class="btn btn-primary btn-circle"><i class="fas fa-bars"></i></a>
    
                                <a href="javascript:void(0)" class="btn btn-danger deletebtn btn-circle"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
        </div>
    </div>
    @endsection

@section('scripts')

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>