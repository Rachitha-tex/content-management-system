@extends('layouts.app')
@section('content')
    <h1>Posts</h1>

    @if (count($posts)>0)
        @foreach ($posts as $post)
        <div class="jumbotron">
            <h1><a href="/posts/{{$post->id}}">{{$post->title}}</a> </h1>
            <small>Written on {{$post->created_at}} {{-- by {{$post->user->name}} --}}</small>
        </div>
        @endforeach
        {{$posts->links('pagination::bootstrap-4')}}
        @else
        <p>No posts available</p>
    @endif
@endsection