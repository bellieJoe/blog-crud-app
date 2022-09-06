
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">

<section  id="nav_section">
    <nav class="container">
        <button class="btn btn-lg btn-outline btn-menu" id="btn_menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="logo">
            <a href="/blog">
                BLOG App
            </a>
        </div>
        <div class="links" id="links_container">
            <button class="btn btn-lg btn-outline btn-menu" id="btn_menu_close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <ul class="">
                <li >
                    <a href="/blog" class="nav-link text-light">
                        <i class="fa-solid fa-blog"></i>
                        Blogs
                    </a>
                </li>
                <li>
                    <a href="/blog" class="nav-link text-light">
                        <i class="fa-solid fa-gear"></i>
                        Settings
                    </a>
                </li>
                <li>
                    <a href="/user/logout" class="nav-link text-light">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Sign Out
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="{{ asset('js/nav.js') }}"></script>
    
</section>

