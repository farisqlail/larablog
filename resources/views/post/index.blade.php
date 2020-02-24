@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                       <a href="{{ route('post.detail', $post) }}" class="text-dark">{{ $post->title }}</a>

                        <div class="d-flex justify-content-end">
                           <form class="" action="{{ route('post.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')

                        @if ( Auth::user('name') )
                                <button type="submit" class="ml-auto btn btn-sm btn-danger">Delete</button>
                           </form>&nbsp
                                <a href="{{ route('post.update', $post )}}" class="btn btn-sm btn-success">Edit</a>
                        @endif
                        </div>
                    </div>

                    <div class="card-body">
                    <img src="{{ asset('storage/'.$post->image) }}" height="128" alt="">
                     <p>{{ str_limit($post->content, 100, '...') }}</p>
                </div>
            </div><br>
            @endforeach
        </div>
    </div>


@endsection