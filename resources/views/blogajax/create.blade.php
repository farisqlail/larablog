@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
 
            <div class="card">
                     <div class="card-header">New Blog with Ajax</div>
 
             <div class="card-body">
                     <form id="blogajax">

                             <div class="form-group">
                                 <label for="title">Title</label>
                                 <input type="text" class="form-control" id="title" name="title" autocomplete="off" placeholder="Post Title" required>
                             </div>
 
                             <div class="form-group">
                                 <label for="category">Category</label>
                                 <select name="category_id" id="category_id" class="form-control" required>
                                     @foreach($categories as $category)
                                         <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                     @endforeach
                                 </select>
                             </div>
 
                             <div class="form-group">
                                 <label for="content">Content</label>
                                 <textarea name="content" id="content" rows="5"class="form-control" placeholder="Post Content" required></textarea>
                             </div>
 
                             <div class="form-group">
                                 <button type="button" id="simpan" class="btn btn-primary" value="Save">Upload Blog</button>
                             </div>
                         </form>  
                     </div>
                 </div> 
            </div>
        </div>
    </div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        $(document).ready(function(){
            $('#simpan').on('click', function(){
            var title = $('#title').val();
            var categoryid = $('#category_id').val();
            var content = $('#content').val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/ajaxcreate',
                method: 'POST',
                data: {
                    'title':title,
                    'category_id':categoryid,
                    'content':content
                },
                success:function(data){
                   alert("Berhasil Terupload");
                   window.setTimeout(function(){window.location.href = "/blogajax"}, 1000)
                }
            });
        });
        });
       
    
    </script>

@endsection