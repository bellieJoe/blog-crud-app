
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">

<section  id="nav_section">
    <nav class="container">
        <button class="btn btn-lg btn-outline btn-menu" id="btn_menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="logo">
            <a href="/blog">BLOG App</a>
        </div>
        <ul class="links_list" id="links_container">
            <li >
                <div class="nav_group">
                    <div>
                        <i class="fa-solid fa-blog"></i>
                        Blogs
                    </div>
                    <ul>
                        <li><a href="/blog">My Blogs</a></li>
                        <li><a href="/blog/create">Write Blog</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="/settings">
                    <i class="fa-solid fa-gear"></i>
                    Settings
                </a>
            </li>
            <li>
                <a href="/user/logout" >
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Sign Out
                </a>
            </li>
        </ul>
    </nav>

    <script src="{{ asset('js/nav.js') }}"></script>
    
</section>

