@extends('layouts.dashboard')
@section('title')
    <title>Add Questions</title>
@endsection
@section('main')
    <h3>UPdate Question</h3>
    <div class="text-center mt-4">
        <div>
            <form method="post" action="{{route('update.question',$data->id)}}">
                @csrf
                <div class="form-group mt-2">
                    <input type="text" placeholder="Question" name="question" value="{{ $data->question }}" required class="form-control">
                </div>
                <input type="hidden" name="quiz_id" value="{{$data->quiz_id}}" readonly required>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option A" name="option_a" value="{{ $data->option_a }}" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option B" name="option_b" value="{{ $data->option_b }}" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option C" name="option_c" value="{{ $data->option_c }}" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option D" name="option_d" value="{{ $data->option_d }}" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="correct_option" required>
                        <option selected disabled value>-- Select Correct Option --</option>
                        <option value="option_a" {{ $data->correct_option == "option_a" ? "selected" : "" }}>A</option>
                        <option value="option_b" {{ $data->correct_option == "option_b" ? "selected" : "" }}>B</option>
                        <option value="option_c" {{ $data->correct_option == "option_c" ? "selected" : "" }}>C</option>
                        <option value="option_d" {{ $data->correct_option == "option_d" ? "selected" : "" }}>D</option>
                    </select>
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
