@extends('layouts.dashboard')
@section('title')
    <title>Inbox Details</title>
@endsection
@section('main')
    <h3>Inbox Details</h3>
    <h4>{{ $data->name }}</h4>
    <h4>{{ $data->email }}</h4>
    <h5>Details:</h5>
    <p>{{ $data->description }}</p>
@endsection
