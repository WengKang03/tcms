@extends('layouts.admin-dashboard')

@section('title')
Craete Users Timetable
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Craete Users Timetable</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin.admin-dashboard"
                                    class="text-muted">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Users Timetable</li>
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
                        <h4 class="card-title">New Timetable</h4>
                        <form action="/timetable-create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" name="image"
                                                class="form-control-file @error('image') is-invalid @enderror"
                                                placeholder="Timetable Image" value="{{ old('timetable_image') }}" >

                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Grade Type:</label>
                                            <select name="grade"
                                                class="form-control @error('grade') is-invalid @enderror" 
                                                placeholder="Timetable Grade" value="{{ old('timetable_grade') }}">
                                                <option value="None">None</option>
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Year Type:</label>
                                        <select name="year" 
                                            class="form-control @error('year') is-invalid @enderror"
                                            placeholder="Timetable Year" value="{{ old('timetable_year') }}">
                                                <option value="None">None</option>
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
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label>Users Type:</label>
                                        <textarea 
                                        class="form-control @error('usertype') is-invalid @enderror"
                                        placeholder="Please write down the User."
                                        name="usertype">{{ old('usertype') }}</textarea>
                                        </select>

                                    @error('usertype')
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
