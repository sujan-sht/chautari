@extends('frontend.layouts.app')

@section('content')


<!--AD SECTION-->
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','','४','५','६','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
?>
@if(json_decode($partner->after_header1)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header1)->url}}">
                @if (!empty($partner->after_header1))
                    @if(file_exists('uploads/partners/after_header/'.json_decode($partner->after_header1)->img))
                        <img src="{{asset('uploads/partners/after_header/'.json_decode($partner->after_header1)->img)}}" class="img-fluid">
                    @endif
                @endif
            </a>
        </div>
    </div>
</section>
@endif
@if(json_decode($partner->after_header2)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header2)->url}}">
                @if (!empty($partner->after_header2))
                    @if(file_exists('uploads/partners/after_header/'.json_decode($partner->after_header2)->img))
                        <img src="{{asset('uploads/partners/after_header/'.json_decode($partner->after_header2)->img)}}" class="img-fluid">
                    @endif
                @endif
            </a>
        </div>
    </div>
</section>
@endif
@if(json_decode($partner->after_header3)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header3)->url}}">
                @if (!empty($partner->after_header3))
                    @if(file_exists('uploads/partners/after_header/'.json_decode($partner->after_header3)->img))
                        <img src="{{asset('uploads/partners/after_header/'.json_decode($partner->after_header3)->img)}}" class="img-fluid">
                    @endif
                @endif
            </a>
        </div>
    </div>
</section>
@endif
@foreach ($headline_news as $key => $news)
    <!-- MAIN HEADING -->
    @php
        $user_detail=App\Models\User::where('name',$news->author)->first();
    @endphp
    <section class="main-new-first">
        <div class="container-fluid">
            <div class="main-news-first-start">
                <h2><a href="{{route('single_news',$news->slug)}}">{{$news->title}}
                    </a>
                </h2>
                <div class="author-details d-flex align-items-center">
                    <div class="author d-flex align-items-center mr-3">
                        <div class="author-image">
                            @if ($user_detail->profile_image!=null)
                                <img src="{{asset('admin/image/'.$user_detail->profile_image)}}" alt="Author" class="img-fluid">
                            @else
                                <img src="{{asset('frontend/assets/images/person.jpg')}}" alt="Author" class="img-fluid">
                            @endif
                        </div>
                        <p>{{$news->author}}</p>
                    </div>
                    <div class="author-date d-flex align-items-center mr-3">
                        <i class="far fa-clock f-20 mr-2"></i>
                        <p>
                            @if($news->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($news->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                            @elseif($news->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($news->created_at->diffInHours(\Carbon\Carbon::now())) }}घण्टा अगाडी 
                            @else
                            {{ ent_to_nepali_num_convert($news->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगडि
                            @endif
                        </p>
                    </div>
                    
                    {{-- <div class="comment d-flex align-items-center">
                        <i class="far fa-comment-alt f-20 mr-2"></i>
                        <p>११</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    @php
        
        $last_key = $headline_no-1;
    @endphp
    {{-- @if($key==$last_key)  --}}
    
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                <a href="{{route('single_news',$news->slug)}}">
                    @if (!empty($news->headline_image))
                        @if(file_exists('uploads/headline_img/'.$news->headline_image))
                            <img src="{{asset('uploads/headline_img/'.$news->headline_image)}}" class="img-fluid">
                        @endif
                    @endif
                </a>
            </div>
        </div>
    </section>
    {{-- @endif --}}

@endforeach


@foreach ($cat_sec as $key => $item)
@if ($item->layout=='layout1')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(6)->get();
    @endphp
    <!--NEWS-->
    @if (!blank($posts))
        
    
<section class="news">
    <div class="container-fluid">
        <div class="news-short">
            <div class="heading">
                <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                <span class="view-all">
                    <a href="{{route('news_category',$category->slug)}}">सब</a>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        {{-- @foreach ($posts as $key => $post) --}}
                            
                        {{-- @if ($key==0) --}}
                        <div class="col-lg-8 col-md-12">
                            <div class="news-short-left">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="news-short-inner-left">
                                            <a href="{{route('single_news',$posts[0]->slug)}}">
                                                <div class="news-short-inner-image">
                                                    @if ($posts[0]->video!=null)
                                                        @if (!empty($posts[0]->featured_img))
                                                            @if(file_exists('uploads/featured_img/'.$posts[0]->featured_img))
                                                                <video class="card-img-top" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{{$post->video}}">
                                                                </video>
                                                            @else
                                                                <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{{$post->video}}">
                                                                </video>
                                                            @endif
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                                        @endif
                                                        
                                                    @else
                                                        @if (!empty($posts[0]->featured_img))
                                                            @if(file_exists('uploads/featured_img/'.$posts[0]->featured_img))
                                                                <img src="{{asset('uploads/featured_img/'.$posts[0]->featured_img)}}" class="card-img-top">
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                                            @endif
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                                        @endif
                                                    @endif
                                                </div>
                                                <h4>{{$posts[0]->title}}</h4>
                                                <p class="line-clamp-4">
                                                    @if ($posts[0]->excerpt!=null)
                                                        {{$posts[0]->excerpt}}
                                                    @else
                                                        {!! Str::words($posts[0]->description , 53, ' ...') !!}
                                                    @endif
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                        {{-- @endforeach --}}

                        <div class="col-lg-4 col-md-12">
                            

                            <div class="news-short-inner-right">
                              
                                <div class="short-news-div">
                                    @foreach ($posts as $key => $post)
                        				@if ($key!=0 )
                                    <div class="short-news">
                                        <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                            <div class="short-news-image">
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                @endif
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>{{$post->title}}</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>
                                                        @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा अगाडी 
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडी 
                            @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                  @endif

                        @endforeach
                                </div>
                            </div>
                        
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="partner-side">
                        
                        {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                        @if(json_decode($item->section1)->img != null)
                        <div class="partner-image-single mb-3">
                            @if (!empty($item->section1))
                            <a href="{{json_decode($item->section1)->url}}">
                                    @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                        <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                
                            </a>
                            @endif
                        </div>
                      	@endif
                        @if(json_decode($item->section2)->img!=null)
                        <div class="partner-image-single mb-3">
                            @if (!empty($item->section2))
                            <a href="{{json_decode($item->section2)->url}}">
                                    @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section2)->img))
                                        <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section2)->img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                
                            </a>
                            @endif
                        </div>
                        @endif
                        @if(json_decode($item->section3)->img!=null)
                        <div class="partner-image-single mb-3">
                            @if (!empty($item->section3))
                            <a href="{{json_decode($item->section3)->url}}">
                                    @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section3)->img))
                                        <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section3)->img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                
                            </a>
                            @endif
                        </div>
                        @endif
                        {{-- @endforeach --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--AD SECTION-->
@if(json_decode($item->category_partner)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            @if (!empty($item->category_partner))
            <a href="{{json_decode($item->category_partner)->url}}">
                @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                    <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                @endif
            </a>
            @endif
        </div>
    </div>
</section>
@endif
</div>
@endif
@if ($item->layout=='layout2')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(10)->get();
    @endphp
    <!--SHARE BAZAR-->
    <section class="share-bazar-section">
        <div class="container-fluid">
            <div class="share-bazar">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="heading">
                                    <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                                    <span class="view-all">
                                        <a href="{{route('news_category',$category->slug)}}">सबै</a>
                                    </span>
                                </div>
                                <div class="card big-card mb-4">
                                    @foreach ($posts as $key => $post)
                                    @if ($key==0)
                                    
                                    <a href="{{route('single_news',$post->slug)}}">
                                        @if ($post->video!=null)
                                            @if (!empty($post->featured_img))
                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                
                                                    <video class="card-img-top" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                    </video>
                                                @else
                                                {{-- <iframe class="card-img-top" src="{!! $post->video !!}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen poster="{{asset('placeholder.jpg')}}"></iframe> --}}
                                                <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                </video>
                                                    
                                                @endif
                                            @else
                                            
                                            
                                            <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                            </video>
                                            @endif
                                            
                                        @elseif($post->video_url!=null)
                                            <iframe width="560" height="315" src="{{$post->video_url}}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @else
                                            @if (!empty($post->featured_img))
                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                    <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top">
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                                @endif
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                            @endif
                                        @endif
                                        
                                    <div class="card-body">
                                        <h3 class="card-text line-clamp-2 mb-2"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a> </h3>
                                        <p class="time">
                                          @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                          {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिेट अगाडी
                                          @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                          {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा अगाी
                                          @else
                                          {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }}दिन गाडी 
                                          @endif
                                         </p>
    
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach ($posts as $key => $post)
                                    @if ($key!=0 && $key<5)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card">
                                            <a href="{{route('single_news',$post->slug)}}">
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top small-card-img">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                @endif
                                                
                                            <div class="card-body">
                                                <h5 class="card-text  line-clamp-2 mb-2"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a>
                                                </h5>
                                                <p class="time">@if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिेट अगाडी 
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा  अाडि
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                            @endif</p>
    
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                   
    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="top-all added-top">
                                    <h2><a href="javascript:">प माचार</a></h2>
                                    <span><a href="javascript:">सै</a></span>
                                </div>
                                <div class="news-short-inner-right">
                                    <div class="short-news-div">
                                        @foreach ($posts as $key => $post)
                                        @if ($key>4)
                                        <div class="short-news">
                                            <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                <div class="short-news-image">
                                                    @if (!empty($post->featured_img))
                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                            @endif
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                                </div>
                                                <div class="short-news-desc">
                                                    <h6>{{$post->title}}</h6>
                                                    <div class="author-date d-flex align-items-center">
                                                        <i class="far fa-clock f-20 mr-2"></i>
                                                        <p>
                                                            @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिेट अगाडी 
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा अगडि
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दन अगडि
                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="partner-side">
                            
                            {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                            @if(json_decode($item->section1)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section1))
                                <a href="{{json_decode($item->section1)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section2)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section2))
                                <a href="{{json_decode($item->section2)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section2)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section2)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section3)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section3))
                                <a href="{{json_decode($item->section3)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section3)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section3)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            {{-- @endforeach --}}
                            
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <!--AD SECTION-->
    
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}">
                    @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                        <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
        </div>
    </section>
@endif
</div>
@endif


@if ($item->layout=='layout3')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(10)->get();
    @endphp
    <!--PHOTO GALLERY-->
    <section class="photo-gallery-section">
        <div class="container-fluid">
            <h2><a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h2>
            <div class="owl-carousel photo-gallery-carousel owl-theme">
                @foreach ($posts as $post)
                <div class="item">
                    @if (!empty($post->featured_img))
                        @if(file_exists('uploads/featured_img/'.$post->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                        @else
                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                        @endif
                    @else
                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                    @endif
                    <div class="photo-overlay"></div>
                    <div class="photo-caption">
                        <a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!--AD SECTION-->
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}">
                    @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                        <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif
</div>
@endif

@if ($item->layout=='layout4')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(12)->get();
    @endphp
    <!--ANTARBARTA-->
    <section class="antarbarta-section">
        <div class="container-fluid">
            <div class="antarbarta">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="heading">
                            <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                            <span class="view-all">
                                <a href="{{route('news_category',$category->slug)}}">सै</a>
                            </span>
                        </div>
                        <div class="row">
                            @foreach ($posts as $post)
                                
                            
                            <div class="col-lg-4">
                                <div class="antarbarta-card">
                                    <div class="antarbarta-image">
                                        <a href="{{route('single_news',$post->slug)}}">
                                            @if (!empty($post->featured_img))
                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                    <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                @endif
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                            @endif
                                        </a>
                                    </div>
                                    <h6 class="antarbartaTitle"><a href="{{route('single_news',$post->slug)}}"><span><i
                                                    class="fas fa-quote-left"></i>&nbsp;</span> {{$post->title}}</a></h6>
                                    <p class="line-clamp-3">
                                        @if ($post->excerpt!=null)
                                            {{ Str::words($post->excerpt , 15, ' ...') }}
                                        @else
                                            {!! Str::words($post->description , 15, ' ...') !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-12">
                        <div class="partner-side">
                            
                            {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                            @if(json_decode($item->section1)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section1))
                                <a href="{{json_decode($item->section1)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section2)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section2))
                                <a href="{{json_decode($item->section2)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section2)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section2)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section3)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section3))
                                <a href="{{json_decode($item->section3)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section3)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section3)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            {{-- @endforeach --}}
                            
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <!--AD SECTION-->
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}">
                    @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                        <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif
</div>
@endif

@if ($item->layout=='layout5')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $sub_category=App\Models\SubCategory::where('parent_id',$category->id)->get();
   
    @endphp
<!--PRADESH SAMACHAR-->
<sesction class="pradesh">
    <div class="container-fluid">
        
        <div class="heading">
            <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
            <span class="view-all">
                <a href="{{route('news_category',$category->slug)}}">बै</a>
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    @foreach ($sub_category as $key => $sub_cat)
                        
                    
                    <li class="nav-item">
                        <a class="nav-link @if($key == 0) active @endif" data-toggle="pill" href="#{{$sub_cat->name}}" role="tab" aria-controls="pills-one"
                            aria-selected="true">{{$sub_cat->name}}</a>
                    </li>
                    @endforeach
                    
                </ul>
                <div class="tab-content mt-3">
                    @foreach ($sub_category as $key => $sub_cat)

                    @php
                        $sub_posts=App\Models\Post::where('subcategory',$sub_cat->id)->where('status','published')->where('status','published')->get();
                        
                    @endphp
                    <div @if($key == 0) class="tab-pane active show" @else class="tab-pane" @endif id="{{$sub_cat->name}}" role="tabpanel" aria-labelledby="all-tab">
                        <div class="pradesh-wrapper">
                            <div class="row">
                                @if ($sub_posts != null)
                                    
                                
                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                                @if ($count<5)
                                                    @if ($count==0 )
                                                    <div class="pradesh-samachar-top">
                                                        @if (!empty($post->featured_img))
                                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                            @endif
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                        @endif
                                                        <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                    @else
                                                    <div class="news-short-inner-right">
                                                        <div class="short-news-div pradesh-small">
                                                            <div class="short-news">
                                                                <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                                    <div class="short-news-image">
                                                                        @if (!empty($post->featured_img))
                                                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                                            @else
                                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                            @endif
                                                                        @else
                                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                        @endif
                                                                    </div>
                                                                    <div class="short-news-desc">
                                                                        <h6>{{$post->title}}</h6>
                                                                        <div class="author-date d-flex align-items-center">
                                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                                            <p>
                                                                                @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मनेट अगाडि
                                                                                @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा अगाडि
                                                                                @else
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                                @if ($count>4 && $count <10)
                                                    @if ($count==5 )
                                                    <div class="pradesh-samachar-top">
                                                        @if (!empty($post->featured_img))
                                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                            @endif
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                        @endif
                                                        <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                    @else
                                                    <div class="news-short-inner-right">
                                                        <div class="short-news-div pradesh-small">
                                                            <div class="short-news">
                                                                <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                                    <div class="short-news-image">
                                                                        @if (!empty($post->featured_img))
                                                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                                            @else
                                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                            @endif
                                                                        @else
                                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                        @endif
                                                                    </div>
                                                                    <div class="short-news-desc">
                                                                        <h6>{{$post->title}}</h6>
                                                                        <div class="author-date d-flex align-items-center">
                                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                                            <p>
                                                                                @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                                                                                @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा अगाडि
                                                                                @else
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडी 
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                                @if ($count>9 && $count <15)
                                                    @if ($count==10 )
                                                    <div class="pradesh-samachar-top">
                                                        @if (!empty($post->featured_img))
                                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                            @endif
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                        @endif
                                                        <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                    @else
                                                    <div class="news-short-inner-right">
                                                        <div class="short-news-div pradesh-small">
                                                            <div class="short-news">
                                                                <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                                    <div class="short-news-image">
                                                                        @if (!empty($post->featured_img))
                                                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                                            @else
                                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                            @endif
                                                                        @else
                                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                        @endif
                                                                    </div>
                                                                    <div class="short-news-desc">
                                                                        <h6>{{$post->title}}</h6>
                                                                        <div class="author-date d-flex align-items-center">
                                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                                            <p>
                                                                                @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगडी 
                                                                                @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घण्टा अगाड
                                                                                @else
                                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} िन अगाडि
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</sesction>
</div>
@endif
@endforeach

@endsection
