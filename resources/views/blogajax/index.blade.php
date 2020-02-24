@extends('layouts.app')

@section('content')

<div class="container">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              
              @foreach ($blogs as $blog)
        
              <div class="card">
                <div class="card-header">
                <a href="" class="text-dark">{{ $blog->title }}</a>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger" data-id="{{ $blog->id }}">Hapus</button>
                      &nbsp;
                      <a href="" class="btn btn-success">Edit</a>
                  </div>
                </div>
                    <div class="card-body">
                    <p>{{ $blog->content }}</p>
                      </div>
                  </div><br>
          @endforeach
        </div>
    </div>
@endsection

@section('script')

    <script>
      $(document).ready(function(){
          $('.destroy')on('click', function(){
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                url: '/blogajax/delete',
                method: 'GET',
                type: 'DELETE',
                data: {
                  'delete': 1,
                  'id': id,
                  '_token': token,
                },
                success:function(data){
                  alert("Berhasil Dihapus");
                  window.setTimeout(function(){window.location.reload()}, 2000);
                }
            })
          })
      });
    </script>

@endsection