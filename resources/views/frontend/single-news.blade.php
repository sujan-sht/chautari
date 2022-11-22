@extends('frontend.layouts.app')

@section('content')
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','३','४','५','','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
?>
{{-- <nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">गृहपृष्ठ</a></li>
<li class="breadcrumb-item"><a href="category.php">समचार</a></li>
<li class="breadcrumb-item active" aria-current="page">भारतमा कैदिन डेढ लखभन्दा.....</li>
</ol>
</div>
</nav> --}}
<div class="news-details-section">
    <div class="container">
        <h2>{{$news->title}}</h2>
        <div class="author-details d-flex align-items-center justify-content-start">
            <div class="author d-flex align-items-center mr-3">
                <div class="author-image">
                    <img src="{{asset('frontend/assets/images/person.jpg')}}" alt="Author" class="img-fluid">
                </div>
                <p>{{$news->author}}</p>
            </div>
            <div class="author-date d-flex align-items-center mr-3">
                <i class="far fa-clock f-20 mr-2"></i>
                <p>@if($news->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                    {{ ent_to_nepali_num_convert($news->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                    @elseif($news->created_at->diffInHours(\Carbon\Carbon::now())<24)
                    {{ ent_to_nepali_num_convert($news->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                    @else
                    {{ ent_to_nepali_num_convert($news->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                    @endif</p>
            </div>
            {{-- <div class="comment d-flex align-items-center">
                <i class="far fa-comment-alt f-20 mr-2"></i>
                <p>१११</p>
            </div> --}}
        </div>
        <!--AD SECTION-->
          @if(json_decode($partner->single_after_header)->img != null)
        <div class="money-image-section">
            <div class="money-image">
                    @if (!empty($partner->single_after_header))
                    <a href="{{json_decode($partner->single_after_header)->url}}">
                        @if(file_exists('uploads/partners/single_after_header/'.json_decode($partner->single_after_header)->img))
                        <img src="{{asset('uploads/partners/single_after_header/'.json_decode($partner->single_after_header)->img)}}"
                            class="img-fluid">
                        @endif
                    </a>
                    @endif
            </div>
        </div>
          @endif
        <div class="share-buttons">
            <div class="sharethis-inline-share-buttons"></div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="news-details-left">
                   @if(json_decode($partner->after_single_headline)->img != null)
                    <div class="money-image-section">
                        <div class="money-image">
                            @if (!empty($partner->after_single_headline))
                            <a href="{{json_decode($partner->after_single_headline)->url}}">
                                @if(file_exists('uploads/partners/after_single_headline/'.json_decode($partner->after_single_headline)->img))
                                <img src="{{asset('uploads/partners/after_single_headline/'.json_decode($partner->after_single_headline)->img)}}"
                                    class="img-fluid">
                        @endif
                            </a>
                            @endif
                        </div>
                    </div>
                  @endif
                    <div class="news-details-first-img">
                        <a href="javascript:">
                            @if (!empty($news->featured_img))
                            @if(file_exists('uploads/featured_img/'.$news->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$news->featured_img)}}" class="img-fluid">
                            @endif
                            @endif
                        </a>
                    </div>
                   @if(json_decode($partner->single_news)->img != null)
                    <div class="money-image">
                        @if (!empty($partner->single_news))
                            <a href="{{json_decode($partner->single_news)->url}}">
                                @if(file_exists('uploads/partners/single_news/'.json_decode($partner->single_news)->img))
                                <img src="{{asset('uploads/partners/single_news/'.json_decode($partner->single_news)->img)}}"
                                    class="img-fluid">
                            @endif
                            </a>
                            @endif
                    </div>
                  @endif
                    <div class="about-news">
                        {!! $news->description !!}
                    </div>
                    {{-- <div class="money-image mb-2s">
                        <a href="javascript:">
                            <img src="assets/images/bajaj.gif" alt="Money Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="money-image">
                        <a href="javascript:">
                            <img src="assets/images/jagadamba.gif" alt="Money Image" class="img-fluid">
                        </a>
                    </div> --}}
                   
                    {{-- <div class="comment-section">
                        <!-- <h2>प्रतिक्रिय</h2> -->
                        <div class="heading">
                            <h1> <a href="category.php"> प्रतिक्रिया</a></h1>

                        </div>
                        <p class="message">(You must login first) </p>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <form action="">
                                    <input type="text" id="fname" name="fname" placeholder="नम">
                                </form>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <form action="">
                                    <input type="text" id="email" name="email" placeholder="इमेल">
                                </form>
                            </div>
                            <div class="col-lg-12">
                                <form action="">
                                    <textarea name="comment" id="details-comment" rows="3"
                                        placeholder="आफ्न टिप्पणी टाप गर्नुहोस्"></textarea>
                                </form>
                            </div>
                        </div>
                        <a href="javascript:" class="comment-submit">प्रतिक्रिय दिनुहोस्</a>
                    </div> --}}
                </div>
                {{-- <div class=" align-items-center justify-content-start vh-100 comment-part">
                    <div class=" justify-content-start mb-4">

                        <!-- <h5 class="comment-heading">टिपपणीहरू</h5> -->
                        <div class="heading">
                            <h1> <a href="category.php">टिप्पणीहू </a></h1>

                        </div>

                    </div>
                    <div class="detail-part">
                        <div class="review box">
                            <!--top------------------------->
                            <div class="box-top">
                                <!--profile----->
                                <div class="profile">
                                    <!--img---->
                                    <div class="profile-img">
                                        <img src="assets/images/news4.jpg" alt="Profile Image" class="img-fluid" />
                                    </div>
                                    <!--name-and-username-->
                                    <div class="name-user">
                                        <strong>धिरज तण्डुकार</strong>
                                        <span>२० अगस्ट, २०२१</span>
                                    </div>
                                </div>
                            </div>
                            <!--Comments---------------------------------------->
                            <div class="client-comment">
                                <p>प्रोविडेन्ट ेम्पोरिबस र्किटेक्टो एस्पिरिओरे नोबिस मायोेस निसी ए। परोविडेन्ट
                                    टेम्पोरिब
                                    आर्किटेकटो एस्पिरिरेस नोबिस मयोरेस निसी । प्रोविडेन्ट टेम्पोरिस आर्किटेकटो
                                    एस्पिरओरेस
                                    नोबिस मायोरेस निसी ए। </p>
                            </div>
                        </div>
                        <div class="review box mt-3">
                            <!--top------------------------->
                            <div class="box-top">
                                <!--profile----->
                                <div class="profile">
                                    <!--img---->
                                    <div class="profile-img">
                                        <img src="assets/images/author.jpg" alt="Profile Image" class="img-fluid" />
                                    </div>
                                    <!--name-and-username-->
                                    <div class="name-user">
                                        <strong>धिरज तण्ुकार</strong></strong>
                                        <span>२० अगस्ट, २०२१</span>
                                    </div>
                                </div>
                            </div>
                            <!--Comments---------------------------------------->
                            <div class="client-comment">
                                <p>प्रोविडेन्ट टेम्पोरिस आर्किटेकटो एस्पिरिओरेस नोबिस मायोरेस निसी ए। प्रोविडेनट
                                    टेम्पोरिबस
                                    आर्किेक्टो एस्पिरिओरेस नोबि मायोरेस निी ए। प्रोविेन्ट टेम्परिबस आर्किटेक्टो
                                    एस्िरिओरेस
                                    नबिस मायोरे निसी ए। </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-4">
                <div class="news-details-ads detail-page-ad double-money">
                    <div class="news-short-ads">
                        {{-- @foreach (json_decode($partner->single_sidebar) as $sponsor) --}}
                      		@if(json_decode($partner->single_sidebar1)->img != null)
                            <div class="money-image">
                                <a href="{{json_decode($partner->single_sidebar1)->url}}">
                                    @if (!empty($partner->single_sidebar1))
                                        @if(file_exists('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar1)->img))
                                            <img src="{{asset('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar1)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                      	@endif
                      		@if(json_decode($partner->single_sidebar2)->img != null)
                            <div class="money-image">
                                <a href="{{json_decode($partner->single_sidebar2)->url}}">
                                    @if (!empty($partner->single_sidebar2))
                                        @if(file_exists('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar2)->img))
                                            <img src="{{asset('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar2)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                      		@endif
                      		@if(json_decode($partner->single_sidebar3)->img != null)
                            <div class="money-image">
                                <a href="{{json_decode($partner->single_sidebar3)->url}}">
                                    @if (!empty($partner->single_sidebar3))
                                        @if(file_exists('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar3)->img))
                                            <img src="{{asset('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar3)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                      	@endif
                        {{-- @endforeach --}}
                    </div>
                    
                </div>
                <div class="top-all added-top">
                    <h2><a href="javascript:">लोप्रिय समाचार</a></h2>
                    <span><a href="javascript:">बै</a></span>
                </div>
                @php
                    $posts=App\Models\Post::where('status','published')->take(5)->get();
                    // dd($posts);
                @endphp
                <div class="news-short-inner-right">
                    <div class="short-news-div">
                        @foreach ($posts as $post)
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
                                        <p>@if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनट अगाडि
                                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगडि
                                            @else
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} िन अगाडि
                                            @endif</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--DOUBLE SECTION-->
<section class="double">
    <div class="container">
        <div class="heading">
            <h1> <a href="javascript:">सम्बन्धित समाचार</a></h1>

        </div>
        @php
            $related_posts=App\Models\Post::where('category',$news->category)->where('status','published')->latest()->take(6)->get();
            // dd($related);
        @endphp
        <div class="sambandhit-samachar">
            <div class="row">
                @foreach ($related_posts as $related_post)
                    
                
                <div class="col-lg-4 col-md-4">
                    <div class="news related-img">
                        <a href="{{route('single_news',$related_post->slug)}}"> 
                            @if (!empty($related_post->featured_img))
                                @if(file_exists('uploads/featured_img/'.$related_post->featured_img))
                                    <img src="{{asset('uploads/featured_img/'.$related_post->featured_img)}}" class="img-fluid">
                                @else
                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                @endif
                            @else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                            @endif
                        </a>
                    </div>
                    <div class="news-related-desc">
                        <a href="{{route('single_news',$related_post->slug)}}">
                            <h6 class="line-clamp-2">{{$related_post->title}}</h6>
                        </a>
                        <div class="author-date d-flex align-items-center mt-2">
                            <i class="far fa-clock f-20 mr-2"></i>
                            <p>@if($related_post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                {{ ent_to_nepali_num_convert($related_post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनट अगाडि
                                @elseif($related_post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                {{ ent_to_nepali_num_convert($related_post->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                                @else
                                {{ ent_to_nepali_num_convert($related_post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                @endif</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
<!--AD SECTION-->
@if(json_decode($partner->before_footer)->img != null)
<div class="money-image mb-3">
    @if (!empty($partner->before_footer))
    <a href="{{json_decode($partner->before_footer)->url}}">
        @if(file_exists('uploads/partners/before_footer/'.json_decode($partner->before_footer)->img))
            <img src="{{asset('uploads/partners/before_footer/'.json_decode($partner->before_footer)->img)}}" class="img-fluid">
        @endif
    </a>
    @endif
</div>
@endif
@endsection
