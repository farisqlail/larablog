@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $post->title }} - <span>{{ $post->category->name }}</span>
                    </div>

                    <div class="card-body">
                     <p>{{ $post->content }}</p>
                </div>
            </div><br>

            <h2>Komentar</h2>
                <div class="card">
                        <div class="card-header">
                            Tambahkan Komentar
                        </div>
    
                        <div class="card-body">
                            <form action="{{ route('post.comment.store', $post) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Tulis Komentar..."></textarea>
                                </div>
    
                                <button type="submit" class="btn btn-primary">Komentar</button>
                         </form>
                    </div>
                </div><br>

            @foreach ($post->comments()->get() as $comment)

            <div class="card">
                    <div class="card-header">
                        <h5>{{ $comment->user->name }}</h5>
                         - <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>

                    <div class="card-body">
                     <p>{{ $comment->message }}</p>
                </div>
            </div><br>

            @endforeach

            </div>
        </div>
    </div>

@endsection