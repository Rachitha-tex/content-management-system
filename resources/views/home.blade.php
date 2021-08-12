@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-success mb-4">Create Post</a>
                    <h3>Your Blog Post</h3>
                    @if (count($posts)>0)
                    <table class="table-striped mt-5">
                        <tr>
                            <th colspan="3">Title</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr style="margin-bottom: 20px;">
                                <td>{{$post->title}}</td>
                                <td colspan="2"><a href="/posts/{{$post->id}}/edit" class="btn btn-primary" style="margin-left:220px;">Edit</a></td>
                               <td>{!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!} </td> 
                            </tr>
                        @endforeach
                    </table>
                    @else
                       <p>You have no post</p>
                    @endif
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
