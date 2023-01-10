@extends('layouts.dashboard')
@section('title')
    <title>Quiz List</title>
@endsection
@section('main')
    <h3>Quiz List</h3>
    <div class="text-center mt-4">
        <table class="table table-bordered">
            <thead>
            <tr class="bg-primary text-white">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Duration</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($quiz_list as $key=> $quiz)
                <tr>
                    <th scope="row">{{$key++}}</th>
                    <td><a style="text-decoration: none;" href="/add-question/{{$quiz->id}}" target="_blank">{{$quiz->title}}</a></td>
                    <td>{{$quiz->from_time}}</td>
                    <td>{{$quiz->to_time}}</td>
                    <td>{{$quiz->duration}} minutes</td>
                    <td>
                        <a href="{{ route('edit.quiz', $quiz->id) }}" class="btn btn-sm btn-info">Edit</a>
                        {{-- <a href="{{ route('delete.quiz', $quiz->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
