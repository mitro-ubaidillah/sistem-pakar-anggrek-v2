@extends('layouts.main')
@section('content')
    <article>
        <h2>{{ $single_post["title"] }}</h2>
        <h5>{{ $single_post["author"] }}</h5>
        <p>{{ $single_post["body"] }}</p>
    </article>

    <a href="/blog" class="btn btn-danger">Back To Blog</a>
@endsection