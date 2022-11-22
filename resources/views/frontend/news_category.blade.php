@extends('frontend.layouts.app')

@section('content')
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','३','४','५','६','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
?>
<nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">गृहपृष्ठ</a></li>
            
                @if (Route::is('news_category'))
                <li class="breadcrumb-item active" aria-current="page">{{$cat->name}}</li>
                @else
                @php
                    $category=App\Models\SubCategory::where('id',$sub_cat->id)->first();
                @endphp
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$sub_cat->name}}</li>
                @endif
                
            
        </ol>
    </div>
</nav>
<section class="category-page">
    <div class="container">
        <div class="news-container-main">
            <h6 class="category-heading">{{Route::is('news_category') ? $cat->name : $sub_cat->name}}</h6>
            @if (count($news)>0)
                
            
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="card big-card category-big-news bg-dark">
                        <a href="{{route('single_news',$news[0]->slug)}}">
                            @if (!empty($news[0]->featured_img))
                            @if(file_exists('uploads/featured_img/'.$news[0]->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$news[0]->featured_img)}}" class="card-img">
                            @else
                            <img src="{{asset('placeholder.jpg')}}')}}" class="card-img">
                            @endif
                            @else
                            <img src="{{asset('placeholder.jpg')}}" class="card-img">
                            @endif
                            
                            <div class="card-img-overlay">
                                <h2 class="card-title"><a
                                        href="{{route('single_news',$news[0]->slug)}}">{{$news[0]->title}}</a></h2>
                                <span class="time">@if($news[0]->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                    {{ ent_to_nepali_num_convert($news[0]->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                                    @elseif($news[0]->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                    {{ ent_to_nepali_num_convert($news[0]->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                                    @else
                                    {{ ent_to_nepali_num_convert($news[0]->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                    @endif</span>
                                <p></p>
                            </div>
                    </div> <!-- card close -->

                </div><!-- col close -->

                <div class="col-md-5 col-lg-4">
                    @foreach ($news as $key => $khabar)
                    @if ($key!=0 && $key<3)
                    <div class="card medium-card text-white">
                        <a href="{{route('single_news',$khabar->slug)}}">
                            @if (!empty($khabar->featured_img))
                            @if(file_exists('uploads/featured_img/'.$khabar->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$khabar->featured_img)}}" class="card-img">
                            @else
                            <img src="{{asset('placeholder.jpg')}}')}}" class="card-img">
                            @endif
                            @else
                            <img src="{{asset('placeholder.jpg')}}" class="card-img">
                            @endif

                            <div class="card-img-overlay">
                                <h4 class="card-title"><a
                                        href="{{route('single_news',$khabar->slug)}}">{{$khabar->title}}</a>
                                </h4>

                                <p class="card-text time">@if($khabar->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                    {{ ent_to_nepali_num_convert($khabar->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                                    @elseif($khabar->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                    {{ ent_to_nepali_num_convert($khabar->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                                    @else
                                    {{ ent_to_nepali_num_convert($khabar->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                    @endif</p>
                            </div>
                    </div>
                    @endif
                    @endforeach
                </div> <!-- col close -->

            </div>
            
            <div class="additional-news">
                <h6><a href="#">थप समाचार</a></h6>
                <div class="row">

                    @foreach ($news as $key => $additional)
                    @if ($key>2)
                        
                    
                    <div class="col-lg-6 col-md-6">
                        <a href="{{route('single_news',$additional->slug)}}" class="category-link">
                            <div class="category-news">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="news-image">
                                            @if (!empty($additional->featured_img))
                                            @if(file_exists('uploads/featured_img/'.$additional->featured_img))
                                            <img src="{{asset('uploads/featured_img/'.$additional->featured_img)}}" class="card-img">
                                            @else
                                            <img src="{{asset('placeholder.jpg')}}')}}" class="card-img">
                                            @endif
                                            @else
                                            <img src="{{asset('placeholder.jpg')}}" class="card-img">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="news-extended">
                                            <h4>{{$additional->title}}</h4>
                                            
                                            <p>
                                                @if ($additional->excerpt!=null)
                                                        {{ Str::words($additional->excerpt,22)}}
                                                    @else
                                                        {!! Str::words($additional->description , 22, ' ...') !!}
                                                    @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @php
                // $latest_featured=App\Models\Post::where('featured',1)->latest()->first();
                $featured=App\Models\Post::where('featured',1)->latest()->take(5)->get();
                // dd($featured);
            @endphp
            @if ($featured != null)
            <h6 class="category-heading">बिशेष समाचार</h6>
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    @foreach ($featured as $key => $feature)
                    @if ($key<=1)
                    <div class="card medium-card text-white">
                        <a href="{{route('single_news',$feature->slug)}}">
                            @if (!empty($feature->featured_img))
                            @if(file_exists('uploads/featured_img/'.$feature->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$feature->featured_img)}}" class="card-img">
                            @else
                            <img src="{{asset('placeholder.jpg')}}')}}" class="card-img">
                            @endif
                            @else
                            <img src="{{asset('placeholder.jpg')}}" class="card-img">
                            @endif
                        </a>
                        <div class="card-img-overlay">
                            <h4 class="card-title"><a href="{{route('single_news',$feature->slug)}}">{{$feature->title}}</a>
                            </h4>

                            <p class="card-text time">@if($feature->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                                @elseif($feature->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                                @else
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                @endif</p>
                        </div>
                    </div> <!-- card close -->
                    @endif
                    @endforeach
                    
                </div> <!-- col close -->
                @foreach ($featured as $key => $feature)
                @if ($key==2)
                <div class="col-md-6 col-lg-6">
                    <div class="card big-card category-big-news bg-dark">
                        <a href="{{route('single_news',$feature->slug)}}">
                            @if (!empty($feature->featured_img))
                            @if(file_exists('uploads/featured_img/'.$feature->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$feature->featured_img)}}" class="card-img">
                            @else
                            <img src="{{asset('placeholder.jpg')}}')}}" class="card-img">
                            @endif
                            @else
                            <img src="{{asset('placeholder.jpg')}}" class="card-img">
                            @endif
                            </a>
                        <div class="card-img-overlay">
                            <h2 class="card-title"><a href="{{route('single_news',$feature->slug)}}">{{$feature->title}}</a></h2>
                            <span class="time">@if($feature->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                                @elseif($feature->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                                @else
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                @endif</span>
                            <p></p>
                        </div>
                    </div> <!-- card close -->

                </div><!-- col close -->
                @endif
                @endforeach
                <div class="col-md-3 col-lg-3">
                    @foreach ($featured as $key => $feature)
                    @if ($key>2 && $key<=4)
                        
                    
                    <div class="card medium-card text-white">
                        <a href="{{route('single_news',$feature->slug)}}">
                            @if (!empty($feature->featured_img))
                            @if(file_exists('uploads/featured_img/'.$feature->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$feature->featured_img)}}" class="card-img">
                            @else
                            <img src="{{asset('placeholder.jpg')}}')}}" class="card-img">
                            @endif
                            @else
                            <img src="{{asset('placeholder.jpg')}}" class="card-img">
                            @endif
                        </a>
                        <div class="card-img-overlay">
                            <h4 class="card-title"><a href="{{route('single_news',$feature->slug)}}">{{$feature->title}}</a>
                            </h4>

                            <p class="card-text time">@if($feature->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाडि
                                @elseif($feature->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाडि
                                @else
                                {{ ent_to_nepali_num_convert($feature->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाडि
                                @endif</p>
                        </div>
                    </div> <!-- card close -->
                    @endif
                    @endforeach
                </div> <!-- col close -->
            </div>
            @endif
        </div>
    </div>
    {{-- <div class="pagination-div">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link page-prev" href="#">&laquo;</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link page-next" href="#">&raquo;</a>
                </li>
            </ul>
        </nav>
    </div> --}}
</section>
@endsection
