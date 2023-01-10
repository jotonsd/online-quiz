@extends('layouts.dashboard')
@section('title')
    <title>Add Quiz</title>
@endsection
@section('main')
    <h3>Add New Quiz</h3>
    <form class="mt-4" method="post" action="{{route('store.quiz')}}"  enctype="multipart/form-data">
        @csrf
        <div class="row mt-2">
            <div class="col-md-1">
                <label for="title" class="col-form-label"><b>Quiz Name</b></label>
            </div>
            <div class="col-md-11">
                <input type="text" placeholder="Quiz Title" name="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-1">
                <label for="image" class="col-form-label"><b>Image</b></label>
            </div>
            <div class="col-md-11">
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-1">
                <label for="description" class="col-form-label"><b>Description</b></label>
            </div>
            <div class="col-md-11">
                <textarea name="description" id="description" placeholder="Quiz description" class="form-control" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <label class="form-label"><b>Valid From</b></label>
                    </div>
                    <div class="col-md-10">
                        <input name="from_time" type="datetime-local" class="form-control" value="{{ old('from_time') }}">
                        @error('from_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <label class="form-label"><b>Valid Till</b></label>
                    </div>
                    <div class="col-md-10">
                        <input name="to_time" type="datetime-local" class="form-control" value="{{ old('to_time') }}">
                        @error('to_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mt-2">
            <div class="col-md-1">
                <label for="duration" class="form-label "><b>Duration</b></label>
            </div>
            <div class="col-md-11">
                <input class="form-control" placeholder="Duration in Minute" name="duration" type="number" id="duration"  value="{{ old('duration') }}">
                @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center mt-2">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection
