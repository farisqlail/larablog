@extends('layouts.app')

@section('content')

    <div class="container">
       <div class="row">
           <div class="col-md-8 col-md-offset-2">

           <div class="card">
                    <div class="card-header">Edit Blog</div>

            <div class="card-body">
                    <form class="" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Post Title">
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
                                <textarea name="content" rows="5" class="form-control" placeholder="Post Content"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Image</label>
                            {{-- <img src="{{ asset(auth()->user()->images) }}" alt="" height="128"> --}}
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

