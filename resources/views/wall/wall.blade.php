@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row">
            {{dd($profiles)}}
            @foreach ($profiles as $profile)

                <div class="col-md-3 text-center" style="margin-top: 20px;margin-bottom:20px;">
                    <a href="profile/{{$profile->id}}">
                        <img style="border-radius: 999px; height: 100px;" src="{{ $profile->image }}">
                        <p style="padding-top: 10px;">{{ $profile->title }}</p>
                    </a>
                </div>
                
            @endforeach
        </div> --}}


        @foreach ($posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}" alt="" srcset="">
                </a>
            </div>
        @endforeach


    </div>
@endsection
