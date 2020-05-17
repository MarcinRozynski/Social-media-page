@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($followers as $follower)
    {{$follower->name}}<br><br><br>
    @endforeach
</div>
@endsection
