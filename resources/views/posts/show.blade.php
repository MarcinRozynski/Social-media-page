@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="" srcset="">
        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-body no-padding-bottom">
                    <img class="rounded-circle main-page profile-image you-may-know inline" src="{{ asset($post->user->profile->image) }}" alt="" srcset="">
                    <h3 class="inline">{{ $post->user->username }}</h3>
                    <p>{{ $post->caption }}</p>
                    {{-- <a href="{{action('PostsController@updateLikes')}}"><i class="far fa-heart main-page-icons pr-1"></i></a> --}}
                </div>

                <hr />
      
               <div class="card-body card-body-comments">
                {{-- <h5>Display Comments</h5> --}}
            
                @include('posts.partials.replys', ['comments' => $post->comments, 'post_id' => $post->id])

               </div>


               <hr />

                <div class="card-body">
                    <h5>Leave a comment</h5>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                        </div>
                    </form>
                    <like-component :post="{{ $post->id }}"></like-component>
                </div>

            </div>

        </div>

        
    </div>
    
</div>
@endsection
