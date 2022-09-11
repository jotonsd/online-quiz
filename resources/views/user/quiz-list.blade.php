@extends('layouts.dashboard')
@section('title')
    <title>Dashboard</title>
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
            </tr>
            </thead>
            <tbody>
            @php
                $sl=1;
            @endphp
            @foreach($quiz_list as $quiz)
                <tr>
                    <th scope="row">{{$sl++}}</th>
                    <td><a href="/give-quiz/{{$quiz->id}}">{{$quiz->title}}</a></td>
                    <td>{{$quiz->from_time}}</td>
                    <td>{{$quiz->to_time}}</td>
                    <td>{{$quiz->duration}} minutes</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
