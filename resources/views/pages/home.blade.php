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
                                <label>Written By <span>{{ $blog->user()->first()->fullname }}</span> {{ $blog->created_at->diffForHumans() }}</label><br>
                            </div>
                        </div>
                        <div class="blog_content">
                            <p>{{ substr($blog->blog_content, 0, 500) }} <a href="{{ route('blog.show', ['blog' => $blog->blog_id]) }}">...See more</a></p> 
                        </div>
                        <div class="blog_footer">
                            <label>Last edited {{ $blog->updated_at->diffForHumans() }}</label>
                            <div>
                                <label>{{ $blog->likes()->count() }} Likes</label>
                            </div>
                            <div>
                                @can('like', $blog)
                                    @if (in_array( Auth::user()->user_id, $blog->likes()->pluck('user_id')->toArray() )) 
                                        {{-- unlike --}}
                                        <form action="/like/{{ $blog->blog_id }}/{{ Auth::user()->user_id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="like_button" id="btn_like">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </button>
                                        </form>
                                    @else
                                        {{-- like --}}
                                        <form action="/like" method="post">
                                            @csrf
                                            <input type="hidden" name="blog_id" value="{{ $blog->blog_id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                                            <button class="like_button" id="btn_like">
                                                <i class="fa-regular fa-thumbs-up"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endcan
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