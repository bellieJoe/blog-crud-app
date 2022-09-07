@extends('app')
@section('title', ' - Home')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">

    <section id="home_section">
        <div class="container">
            <div class="blogs_list">
                <h5 class="fw-bold">Blog Stream</h5>
                @foreach ($blogs as $blog)
                    <div class="blog shadow-sm">
                        <div class="blog_header">
                            <div>
                                <h6>{{ $blog->blog_title }}</h6>
                                <label>Written By <span>{{ $blog->fullname }}</span> {{ $blog->created_at->diffForHumans() }}</label><br>
                            </div>
                        </div>
                        <div class="blog_content">
                            <p>{{ substr($blog->blog_content, 0, 500) }} <a href="{{ route('blog.show', ['blog' => $blog->blog_id]) }}">...See more</a></p> 
                        </div>
                        <div class="blog_footer">
                            <label>Last edited {{ $blog->updated_at->diffForHumans() }}</label>
                            <div>
                                <button class="like_button" id="btn_like">
                                    <i class="fa-regular fa-thumbs-up"></i>
                                    {{-- <i class="fa-solid fa-thumbs-up"></i> --}}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $blogs }}
            </div>
        </div>
    </section>

    <script src="{{ asset('js/pages/home.js') }}"></script>

@endsection