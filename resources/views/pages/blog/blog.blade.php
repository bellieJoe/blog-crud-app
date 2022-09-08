@extends('app')
@section('title', ' - Blogs')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/pages/blog/blog.css') }}">

    <section id="blog_section">
        <div class="container">
            <div class="blogs_list">
                <h5 class="fw-bold">My Blogs</h5>
                @foreach ($blogs as $blog)
                    <div class="blog shadow-sm">
                        <div class="blog_header">
                            <div>
                                <h6>{{ $blog->blog_title }}</h6>
                                <label>Written By <span>{{ $blog->user()->first()->fullname }}</span> {{ $blog->created_at->diffForHumans() }}</label><br>
                            </div>
                            <div class="blog_header_settings">
                                <button class=" blog_header_button" v-on:click="openSetting({{ $blog->blog_id }})" >
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="shadow-sm" v-if="opened_setting && opened_setting == '{{ $blog->blog_id }}'"  >
                                    <li><a href="/blog/{{ $blog->blog_id }}/edit" class="text-secondary"> Edit</a></li>
                                    <li><button data-bs-toggle="modal" data-bs-target="#bs_modal_blog_del_{{ $blog->blog_id }}" class="text-danger"> Delete</button></li>
                                </ul>
                            </div>
                            <div class="modal fade" id="bs_modal_blog_del_{{ $blog->blog_id }}">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <form class="modal-content" method="POST" action="{{ route('blog.destroy', ['blog' => $blog->blog_id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h6 class="modal-title text-danger">Warning</h6>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete <span class="fw-bold">{{ $blog->blog_title }}?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <div class="blog_content">
                            <p>{{ substr($blog->blog_content, 0, 500) }} <a href="{{ route('blog.show', ['blog' => $blog->blog_id]) }}">...See more</a></p> 
                        </div>
                        <div class="blog_footer">
                            <label>Last edited {{ $blog->updated_at->diffForHumans() }}</label>
                            <div>
                                <label>{{ $blog->likes->count() }} Likes</label>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $blogs }}
            </div>
        </div>
    </section>
    
    <script src="{{ asset('js/pages/blog/blog.js') }}"></script>

@endsection