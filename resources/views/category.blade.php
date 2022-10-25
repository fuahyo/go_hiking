@extends('layouts.main')

@section('container')
    <h1 class="mb-5" >Posts Category : {{$category}}</h1>
    @foreach ($posts as $post)
        <article class="mb-1">
            <h3> 
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a> 
            </h3>
            <!-- <h5> By: {{ $post->author }} </h5> -->
            <p> {{ $post->excerpt }} </p>
        </article>
    @endforeach
    <a href="/categories">Back To Categories</a>
@endsection

