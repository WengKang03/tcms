@extends('layouts.admin-dashboard')

@section('title')
View Attendance
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">View Attendance</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin.admin-dashboard" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Attendance</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <input id="accordion_search_bar" class="form-control custom-shadow custom-radius border-0 bg-white"
                    type="search" placeholder="Typing in the date of the record that you want to search."
                    aria-label="Search"><br />
    
                    <div id="accordion" class="custom-accordion mb-4" role="tablist" aria-multiselectable="true">
                        @foreach($data ['attendance_records'] as $attendance_record)
                        <div class="panel card mb-0" id="collapse{{ $attendance_record->attendance_id }}_container">
                            <div class="card-header" role="tab" id="heading{{ $attendance_record->attendance_id }}">
                                <h5 class="m-0">
                                    <a class="custom-accordion-title d-block pt-2 pb-2" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapse{{ $attendance_record->attendance_id }}"
                                        aria-expanded="true" aria-controls="collapse{{ $attendance_record->attendance_id }}">
                                        {{ date('d-m-Y', strtotime($attendance_record->created_at)) }}<span
                                            class="float-right">
    
                                            <i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse{{ $attendance_record->attendance_id }}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-primary" style="text-align:center;overflow-x:auto;">
                                                <th>ID</th>
                                                <th>Grade</th>
                                                <th>Year</th>
                                                <th>Subject</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Operation</th>
                                            </thead>

                                            <tbody style="text-align:center;overflow-x:auto;">
                                                <tr>
                                                    <td>{{ $attendance_record->attendance_id }}</td>
                                                    <td>{{ $attendance_record->attendance_grade }}</td>
                                                    <td>{{ $attendance_record->attendance_year }}</td>
                                                    <td>{{ $attendance_record->attendance_subject }}</td>
                                                    <td>{{ $attendance_record->status }}</td>
                                                    <td>{{ $attendance_record->reason }}</td>
                                                    <td>
                                                        <a href="admin-modify-attendance/{{ $attendance_record->attendance_id }}"
                                                            class="btn waves-effect waves-light btn-light">Edit</a>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>

    </div>
    </div>
    
</div>


@endsection


<script src="{{ asset('adminmart assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminmart assets/libs/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('adminmart assets/libs/moment.js/moment.min.js') }}"></script>

<script>
$(function() {
  var searchTerm, panelContainerId;
  // Create a new contains that is case insensitive
  $.expr[":"].containsCaseInsensitive = function(n, i, m) {
    return (
      jQuery(n)
        .text()
        .toUpperCase()
        .indexOf(m[3].toUpperCase()) >= 0
    );
  };

  $("#accordion_search_bar").on("change keyup paste click", function() {
    searchTerm = $(this).val();

    $("#accordion > .panel").each(function() {
      panelContainerId = "#" + $(this).attr("id");
      $(
        panelContainerId + ":not(:containsCaseInsensitive(" + searchTerm + "))"
      ).hide();
      $(
        panelContainerId + ":containsCaseInsensitive(" + searchTerm + ")"
        
      ).show();
    });
  });

});

$(document).ready(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          showArrows: true,
        });
    });
});

</script>
