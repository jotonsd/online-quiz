@extends('layouts.dashboard')
@section('title')
    <title>Add Quiz</title>
@endsection
@section('main')
    <h3>Add New Quiz</h3>
    <form class="mt-4" method="post" action="{{route('store.quiz')}}">
        @csrf
        <div class="form-group row mt-2">
            <div class="col-md-1">
                <label for="staticEmail" class="col-form-label"><b>Quiz Name</b></label>            
            </div>
            <div class="col-md-11">
                <input type="text" placeholder="Quiz Title" name="title" required class="form-control">        
            </div>
        </div>   
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="row">                    
                    <div class="col-md-2">                        
                        <label class="form-label"><b>Valid From</b></label>
                    </div>
                    <div class="col-md-10">
                        <input name="from_time" type="datetime-local" class="form-control">                        
                    </div>
                </div>                
            </div>

            <div class="col-md-6">
                <div class="row">                    
                    <div class="col-md-2">                        
                        <label class="form-label"><b>Valid Till</b></label>
                    </div>
                    <div class="col-md-10">
                        <input name="to_time" type="datetime-local" class="form-control">                       
                    </div>
                </div>                 
            </div>
        </div>
        <div class="form-group row mt-2">
            <div class="col-md-1">
                <label for="duration" class="form-label "><b>Duration</b></label>                
            </div>
            <div class="col-md-11">
                <input class="form-control" placeholder="Duration in Minute" name="duration" type="number" id="duration" required>                
            </div>
        </div>                  
        <div class="text-center mt-2">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection
