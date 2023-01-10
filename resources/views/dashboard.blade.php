@extends('layouts.dashboard')
@section('title')
    <title>Dashboard</title>
@endsection
@section('main')
    <h3>Dashboard</h3>
    <div class="row">
    	@if(session('user_role')=='admin')
    	<div class="col-md-3">
	    	<div class="card text-white bg-primary">
			  <div class="card-body">
			    <h4 class="card-title">Total User</h4>
			    <h2 class="card-text">{{ count(App\Models\User::all()) }}</h2>
			  </div>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<div class="card text-white bg-success">
			  <div class="card-body">
			    <h4 class="card-title">Total Quizes</h4>
			    <h2 class="card-text">{{ count(App\Models\Quiz::all()) }}</h2>
			  </div>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<div class="card text-white bg-info">
			  <div class="card-body">
			    <h4 class="card-title">Total Questions</h4>
			    <h2 class="card-text">{{ count(App\Models\Question::all()) }}</h2>
			  </div>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<div class="card text-white bg-danger">
			  <div class="card-body">
			    <h4 class="card-title">Total Candidate</h4>
			    <h2 class="card-text">{{ count(App\Models\ExamCandidate::get()->unique('user_id')) }}</h2>
			  </div>
			</div>
    	</div>
        @endif
    </div>
@endsection
