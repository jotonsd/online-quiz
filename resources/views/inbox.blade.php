@extends('layouts.dashboard')
@section('title')
    <title>Inbox</title>
@endsection
@section('main')
    <h3>Inbox</h3>
    <div class="text-center mt-4">
        <table class="table table-bordered">
            <thead>
            <tr class="bg-primary text-white">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $item)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td><a href="{{ route('inbox_details', $item->id) }}">{{$item->name}}</a></td>
                    <td>{{$item->email}}</td>
                    <td>{{ substr($item->description, 0, 80)}}</td>
                    <td>{{$item->status == 0 ? 'Unseen' : 'Seen'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
