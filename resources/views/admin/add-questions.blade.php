@extends('layouts.dashboard')
@section('title')
    <title>Add Questions</title>
@endsection
@section('main')
    <h3>Add Question for the Quiz: {{$quiz_list->title}}</h3>
    <div class="text-center mt-4">
        <div>
            <form method="post" action="{{route('store.question')}}">
                @csrf
                <div class="form-group mt-2">
                    <input type="text" placeholder="Question" name="question" required class="form-control">
                </div>
                <input type="hidden" name="quiz_id" value="{{$quiz_id}}" readonly required>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option A" name="option_a" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option B" name="option_b" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option C" name="option_c" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <input type="text" placeholder="Option D" name="option_d" required class="form-control">
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="correct_option" required>
                        <option selected disabled value>-- Select Correct Option --</option>
                        <option value="option_a">A</option>
                        <option value="option_b">B</option>
                        <option value="option_c">C</option>
                        <option value="option_d">D</option>
                    </select>
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-4">
        <table class="table table-bordered">
            <thead>
            <tr class="bg-primary text-white">
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">A</th>
                <th scope="col">B</th>
                <th scope="col">C</th>
                <th scope="col">D</th>
                <th scope="col">Correct</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
            @foreach($questions as $question)
                <tr>
                    <th scope="row">{{$sl++}}</th>
                    <td>{{$question->question}}</td>
                    <td>{{$question->option_a}}</td>
                    <td>{{$question->option_b}}</td>
                    <td>{{$question->option_c}}</td>
                    <td>{{$question->option_d}}</td>
                    <td>{{$question->correct_option}}</td>
                    <td>
                        <a href="{{ route('edit.question', $question->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('delete.question', $question->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
function correctAnswer(){
    let a = document.getElementsByName('option_a')
    alert('a');
}
    </script>
@endsection
