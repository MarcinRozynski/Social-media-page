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

        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="post-content pb-4">
                        <div class="post-media w-100 py-4 px-4">

                        
                            <a href="profile/{{$post->user->id}}">
                                <div class="row">
                                    <img class="rounded-circle main-page profile-image" src="{{ asset($post->user->profile->image) }}" alt="" srcset="">
                                    <div class="wall-nickname">
                                        <span>{{$post->user->profile->title}}</span>
                                    </div>
                                </div>
                            </a>



                        </div>
                        <a href="/p/{{ $post->id }}">
                            <img class="w-100" src="/storage/{{ $post->image }}" alt="" srcset="">
                        </a>
                        <div class="post-media w-100 py-4 px-4">
                            <div class="row">
                                <div class="col-12">
                                    <a href=""><i class="far fa-heart main-page-icons pr-1"></i></a>
                                    {{-- <a href=""><i class="fas fa-comment main-page-icons pl-1"></i></a> --}}
                                </div>
                                
                                <div class="col-12">
                                    <span><b>Liczba polubień: </b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <p>Możesz znać:</p>
                @foreach ($posts as $post)
                    <a href="profile/{{$post->user->id}}">
                        <div class="row py-4 px-4">
                            <img class="rounded-circle main-page profile-image you-may-know" src="{{ asset($post->user->profile->image) }}" alt="" srcset="">
                            <div class="wall-nickname">
                                <span>{{$post->user->profile->title}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

    </div>




    </div>
@endsection
