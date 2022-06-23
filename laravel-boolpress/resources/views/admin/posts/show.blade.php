@extends('layouts.admin')

@section('content')
<div class="bg-dark p-5 text-center">
    <a class="btn btn-primary btn-lg " href="{{ route('admin.posts.index')}}">Back to posts</a>
</div>



    <div class="mt-4 container bg-white d-flex align-items-center">
        <img class="me-3" src="{{$post->cover_image}}" width="300" alt="">
        <div class="post-body">
            <h3>{{$post->title}}</h3>
            <p>Category : {{$post->category ? $post->category->name  : 'Uncategorized'}}</p>
            <p>{{$post->content}}</p>
        </div>
    </div>
@endsection
