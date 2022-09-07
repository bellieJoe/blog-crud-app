@extends('app')
@section('title', ' - Home')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">

    <section id="home_section">
        <div class="container">
            <div class="blogs_list">
                @foreach ($blogs as $blog)
                    <div class="blog shadow-sm">
                        <div class="blog_header">
                            <div>
                                <h6>{{ $blog->blog_title }}</h6>
                                <label>Written By <span>{{ $blog->fullname }}</span> {{ $blog->created_at->diffForHumans() }}</label><br>
                            </div>
                            {{-- <div class="blog_header_settings">
                                <button class=" blog_header_button" v-on:click="openSetting({{ $blog->blog_id }})" >
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="shadow-sm" v-if="opened_setting && opened_setting == '{{ $blog->blog_id }}'"  >
                                    <li><a href="/blog/{{ $blog->blog_id }}/edit" class="text-secondary"> Edit</a></li>
                                    <li><button data-bs-toggle="modal" data-bs-target="#bs_modal_blog_del_{{ $blog->blog_id }}" class="text-danger"> Delete</button></li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="blog_content">
                            <p>{{ substr($blog->blog_content, 0, 500) }} <a href="{{ route('blog.show', ['blog' => $blog->blog_id]) }}">...See more</a></p> 
                        </div>
                        <div class="blog_footer">
                            <label>Last edited {{ $blog->updated_at->diffForHumans() }}</label>
                        </div>
                    </div>
                @endforeach
                {{ $blogs }}
            </div>
        </div>
    </section>
@endsection