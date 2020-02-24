@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            <div class="card">
                    <div class="card-header">Edit Blog</div>

            <div class="card-body">
                <form class="" action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Post Title" value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" rows="5" class="form-control" placeholder="Post Content">{{ $post->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Images</label>
                            <img src="{{ asset('storage/'. $post->image) }}" height="128" alt="">
                            <input type="file" class="form-control-file" name="image">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" value="Save">Post Blog</button>
                        </div>
                    </form>  
                    </div>
                </div>  
            </div>
        </div>
    </div>

@endsection