@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($followings as $followed)
    {{$followed->name}}<br><br><br>
    @endforeach
</div>
@endsection
