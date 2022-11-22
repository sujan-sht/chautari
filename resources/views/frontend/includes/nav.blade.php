<!-- LOGO SECTION -->

<section class="logo-bar">
    <div class="container">
        <div class="logo-bar-wrapper d-flex align-items-center">
            <div class="logo-side">
                <div class="logo">
                    <a href="{{route('home')}}">
                        @if (!empty($setting->logo))
                            @if(file_exists('admin/image/'.$setting->logo))
                                <img src="{{asset('admin/image/'.$setting->logo)}}" class="img-fluid">
                            @else
                                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                            @endif
                        @else
                            <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                        @endif
                        
                    </a>
                </div>
                <div class="date">
                    <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0"
                        allowtransparency="true"
                        src="https://www.ashesh.com.np/linknepali-time.php?dwn=only&font_color=333333&font_size=14&bikram_sambat=0&format=dmyw&api=520111m018"
                        width="165" height="22"></iframe>
                </div>
            </div>
          @if(json_decode($partner->before_header)->img != null)
            <div class="money-image">
                @if (!empty($partner->before_header))
                <a href="{{json_decode($partner->before_header)->url}}">
                    @if(file_exists('uploads/partners/before_header/'.json_decode($partner->before_header)->img))
                        <img src="{{asset('uploads/partners/before_header/'.json_decode($partner->before_header)->img)}}" class="img-fluid">
                    @else
                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
          @endif
        </div>
    </div>
</section>
<!--OPTION BAR-->
<section class="option-bar">
    <div class="container-fluid">
        <div class="option-bar-inner ">
            <div class="login">
                {{-- <a href="javascript:" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-user"></i>
                </a> --}}
                @if (Auth::user())
                <span class="user"><a href="{{route('dashboard')}}" target="_blank">Dashboard</a></span><span class="user">/</span>
                <span class="user"><a href="{{route('logout')}}">Logout</a></span>
                @else
                <span class="user"><a href="{{route('login')}}">LOGIN</a></span>
                {{-- <span class="user">/</span><span class="user"><a href="{{route('register')}}">REGISTER</a></span> --}}
                @endif
                
            </div>
            {{-- <div class="english-button">
                <a href="javascript:">ENGLISH</a>
            </div> --}}
        </div>
        {{-- <div class="hidden-menu" style="display: none;">
            <ul>
                <li><a href="javascript:">प्रदेश १<img src="assets/images/p1.jpg" alt="Pradesh" class="img-fluid"></a>
                </li>
                <li><a href="javascript:">प्देश २<img src="assets/images/p2.jpg" alt="Pradesh" class="img-fluid"></a>
                </li>
                <li><a href="javascript:">परदेश ३<img src="assets/images/p3.png" alt="Pradesh" class="img-fluid"></a>
                </li>
                <li><a href="javascript:">प्ेश ४<img src="assets/images/p4.png" alt="Pradesh" class="img-fluid"></a>
                </li>
                <li><a href="javascript:">प्रदश ५<img src="assets/images/p5.png" alt="Pradesh" class="img-fluid"></a>
                </li>
                <li><a href="javascript:">प्रदे ६<img src="assets/images/p6.png" alt="Pradesh" class="img-fluid"></a>
                </li>
                <li><a href="javascript:">प्रदेश ७<img src="assets/images/p7.png" alt="Pradesh" class="img-fluid"></a>
                </li>
            </ul>
        </div> --}}
    </div>
</section>
<!-- NAVBAR -->

<section class="navbar-top">
    <!-- NAVBAR -->
    <div class="header-wrapper" id="topheader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="javascript:navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item"><a href="javascript:" class="nav-link p-0 pt-1 pr-1"><span class="openNav" onclick="openNav()">&#9776; </span></a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i></a>
                        </li>
                        
                        @php
                            $nav_menus=App\Models\Menu::orderBy('menu_order','ASC')->get();
                        @endphp
                        @foreach ($nav_menus as $nav_menu)
                            @if ($nav_menu->menu_type == 'category')
                                @php
                                    $menu=App\Models\Category::where('id',$nav_menu->menu)->first();
                                    $sub_menus=App\Models\SubCategory::where('parent_id',$menu->id)->where('status',1)->latest()->get();
                                @endphp
                                @if (count($sub_menus)>0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{route('news_category',$menu->slug)}}">
                                        {{$menu->name}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                        @foreach ($sub_menus as $sub_menu)
                                            
                                        <a class="dropdown-item" href="{{route('sub_category',$sub_menu->slug)}}">{{$sub_menu->name}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('news_category',$menu->slug)}}">{{$menu->name}}</a>
                                </li>
                                @endif
                            
                            @elseif($nav_menu->menu_type == 'page')
                            @php
                                $menu=App\Models\Page::where('id',$nav_menu->menu)->first();
                            @endphp
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('custom_page',$menu->slug)}}">{{$menu->name}}</a>
                            </li>
                            @endif
                            
                        
                        @endforeach
                        {{-- @php
                            $menus=App\Models\Category::where('status',1)->latest()->take(12)->get();
                            
                        @endphp
                        @foreach ($menus as $menu)
                        @php
                            $sub_menus=App\Models\SubCategory::where('parent_id',$menu->id)->where('status',1)->latest()->get();
                            
                        @endphp
                         @if (count($sub_menus)>0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('news_category',$menu->slug)}}">
                                {{$menu->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                @foreach ($sub_menus as $sub_menu)
                                    
                                <a class="dropdown-item" href="{{route('sub_category',$sub_menu->slug)}}">{{$sub_menu->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('news_category',$menu->slug)}}">{{$menu->name}}</a>
                        </li>
                        @endif
                        @endforeach --}}
                            
                        
                        
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="category.php">अन्य </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="second-bg">
                    <div class="container">
                        <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <ul>
                                <li><a href="{{route('home')}}"><i class="fas fa-home mr-3"></i>गृहपृ्ठ</a></li>
                                @foreach ($nav_menus as $nav_menu)
                                @if ($nav_menu->menu_type == 'category')
                                    @php
                                        $menu=App\Models\Category::where('id',$nav_menu->menu)->first();
                                        $sub_menus=App\Models\SubCategory::where('parent_id',$menu->id)->where('status',1)->latest()->get();
                                    @endphp
                                    @if (count($sub_menus)>0)
                                    <li>
                                        <a class="samachar-btn" href="{{route('news_category',$menu->slug)}}">
                                            {{$menu->name}}
                                            <span class="fas fa-caret-down second"></span>
                                        </a>
                                        <ul class="samachar-show">
                                            @foreach ($sub_menus as $sub_menu)
                                            <li><a href="{{route('sub_category',$sub_menu->slug)}}">{{$sub_menu->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{route('news_category',$menu->slug)}}">{{$menu->name}}</a>
                                    </li>
                                    @endif
                                
                                @elseif($nav_menu->menu_type == 'page')
                                @php
                                    $menu=App\Models\Page::where('id',$nav_menu->menu)->first();
                                @endphp
                                <li>
                                <a href="{{route('custom_page',$menu->slug)}}">{{$menu->name}}</a>
                                </li>
                                @endif
                                
                            
                            @endforeach
                                {{-- @foreach ($menus as $menu)
                                @php
                                    $sub_menus=App\Models\SubCategory::where('parent_id',$menu->id)->where('status',1)->latest()->get();
                                    
                                @endphp
                                @if (count($sub_menus)>0)
                                <li>
                                    <a class="samachar-btn" href="{{route('news_category',$menu->slug)}}">
                                        {{$menu->name}}
                                        <span class="fas fa-caret-down second"></span>
                                    </a>
                                    <ul class="samachar-show">
                                        @foreach ($sub_menus as $sub_menu)
                                        <li><a href="{{route('sub_category',$sub_menu->slug)}}">{{$sub_menu->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li><a href="{{route('news_category',$menu->slug)}}">{{$menu->name}}</a></li>
                                @endif
                                @endforeach --}}
                                
                            </ul>
                        </div>
                        <span class="openNav last-open" onclick="openNav()">&#9776; </span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
<!-- NAVBAR BOTTOM-->
{{-- <section class="navbar-bottom">
    <div class="container">
        <div class="ok-hot-topics-top">
            <div class="ok-container flx">
                <div class="hot-topic-tag-wrapper">
                    <a href="category.php">
                        <span class="topic-round-thumb">
                            <img src="assets/images/person.jpg" alt="नेपाली चलचित्र" />
                        </span> नेपाी चलचित्र </a>
                    <a href="category.php">
                        <span class="topic-round-thumb">
                            <img src="assets/images/item27.jpg" alt="कोरोना भाइरस" />
                        </span> कोरना भाइरस </a>
                    <a href="category.php">
                        <span class="topic-round-thumb">
                            <img src="assets/images/item4.jpg" alt="नेपाल प्हरी" />
                        </span> नेपाल प्रहरी </a>
                    <a href="category.php">
                        <span class="topic-round-thumb">
                            <img src="assets/images/item12.jpg" alt="अपराध" />
                        </span> अराध </a>
                    <a href="category.php">
                        <span class="topic-round-thumb">
                            <img src="assets/images/item3.jpg" alt="बिउड" />
                        </span> बलिउड </a>
                </div>
                <div class="ok-smart-search">
                    <form method="get" class="ok-top-search" action="#">
                        <input type="text" placeholder="खोज्नहोस" name="search_keyword" class="ok-smart-search-field"
                            autocomplete="off" value="" /> <span class="ok-search-trigger">
                            <img src="assets/images/glass.png" alt="Search" />
                        </span>
                    </form>
                    <div class="ok-sidebar-card-news ok-card-sifaris search-auto-complete-wrap">
                        <div class="ok-smart-results-wrap">
                        </div>
                        <div class="view-all-result">
                            <a href="javascript:void(0);" class="reply-btn okms-view-all-result">सबै रिज्ल्ट
                                हेर्नुस</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> --}}
