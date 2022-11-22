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
<footer class="main-footer">
    
    <div class="container">
        <div class="footer-desc">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-img">
                        @if (!empty($setting->logo))
                            @if(file_exists('admin/image/'.$setting->logo))
                                <img src="{{asset('admin/image/'.$setting->logo)}}" class="img-fluid">
                            @else
                                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                            @endif
                        @else
                            <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                        @endif
                    </div>
                    <div class="site-detail">
                        <ul>
                            <li><span>सम्पादक :</span>जीवन कुमार ाही </li>
                            <li><span>रेित्रेशन नमब :</span>२२७७६/०७६/०७७</li>
                            <li><span>म्नीको ना :</span>{{$setting->title}}</li>
                            <li><span>सम्प्क :</span>{{$setting->contact}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-links">
                        <h5>जरुरि लिंकहरुु</h5>
                    </div>
                    <div class="links-listing">
                        <ul>
                            <li><a href="{{route('home')}}">गह पृष्ठ</a> </li>
                            @foreach (App\Models\Page::all() as $key => $link)
                            <li><a href="{{ route('custom_page',['slug' => $link->slug]) }}">{{$link->name}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-links">
                        <h5>न्यूज अपडेट </h5>
                    </div>
                    <div class="site-detail">
                        <div class="links-listing">
                            @php
                                $categories=App\Models\Category::where('status',1)->take(6)->get();
                            @endphp
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-links">
                        <h5>फेसबु फोलो गर्नुहस </h5>
                    </div>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fformal.khabar.5&tabs=timeline&width=0&height=0&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="0" height="0" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </div>
    @php
        $social=App\Models\SocialSetting::first();
    @endphp
    <div class="copyright">
        <div class="social-buttons">
            <a href="{{$social->facebook}}" class="social-buttons__button social-button social-button--facebook"
                aria-label="Facebook">
                <span class="social-button__inner">
                    <i class="fab fa-facebook-f"></i>
                </span>
            </a>
            <a href="{{$social->youtube}}" class="social-buttons__button social-button social-button--youtube"
                aria-label="Youtube">
                <span class="social-button__inner">
                    <i class="fab fa-youtube"></i>
                </span>
            </a>
            <a href="{{$social->instagram}}" class="social-buttons__button social-button social-button--instagram"
                aria-label="Instagram">
                <span class="social-button__inner">
                    <i class="fab fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="copyright-part">
            <div class="col-md-6">
            <p>Powered By <a href="https://the-corporate.com/">The-Corporate.Com</a></p>
            </div>
            <div class="col-md-6">
            <p>Designed & Developed By <a href="https://itarrow.com">IT Arrow Pvt. Ltd.</a></p>
            </div>
        </div>
 
    </div>
    <div class="scrollTop float-right">
        <i class=" fas fa-chevron-up" onclick="topFunction()" id="myBtn"></i>
    </div>
</footer>
