@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="card-header">{{ __('Home') }}</div>
              <div class="">

                {{-- This for Afichier the Posts of Users In Home, The Post Conatain Like and Follow and Pagination --}}
                
                @foreach($posts as $post)
                <div class="border rounded p-3 mb-3 bg-white">
                    <div class="row">
                        <div class="col">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="col-auto ml-auto text-muted">
                            <p>{{ $post->created_at }}</p>
                        </div>
                      </div>
                 <p>{{ $post->content }}</p>
                 <div class="row">
                    <div class="col">
                        <form action="{{ route('like', $post) }}" method="post">
                            @csrf
                            <button class="btn">Like: {{ $post->likes->count() }}</button>
                        </form>
                        <form action="{{ route('unlike', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn">UnLike</button>             
                         </form>
                    </div>
                    <div class="col-auto ml-auto text-muted">
                        @if(auth()->user()->followings->contains($user))
                        <form action="{{ route('unfollow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Unfollow</button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Follow</button>
                        </form>
                    @endif
                        Posted By: {{ $post->user->name }}
                    </div>
                  </div>
                </div>
                @endforeach  
             </div>
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection

