@extends('layouts.front')

@section('content')
@include('includes.frontnavbar')

<section class="news-details">
    <div class="container" style="padding: 60px 0;">
        <h1>{{ $post->title }}</h1>

        <p style="margin-top: 10px;">
            <strong>By:</strong> {{ $post->author_name }}
            &nbsp; | &nbsp;
            <strong>Date:</strong> {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
        </p>

        @if(!empty($post->image))
            <div style="margin: 25px 0;">
                <img src="{{ asset('storage/'.$post->image) }}" alt="" style="max-width: 100%; border-radius: 12px;">
            </div>
        @endif

        <div>
            {!! $post->body !!}
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('home') }}#news">← Back to News</a>
        </div>
    </div>
</section>

@include('includes.frontfooter')
@endsection
