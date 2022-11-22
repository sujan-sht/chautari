@php
$cat_sec=App\Models\CategorySection::where('status',1)->first();
$category=App\Models\Category::where('id',$cat_sec->category_id)->first();
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
                                <h1> <a href="">{{$category->name}}</a></h1>
                                <span class="view-all">
                                    <a href="">सबै</a>
                                </span>
                            </div>
                            <div class="card big-card mb-4">
                                <a href="news-details.php"><img class="card-img-top" src="assets/images/item27.jpg"
                                        alt=""></a>
                                <div class="card-body">
                                    <h3 class="card-text line-clamp-2 mb-2"><a href="">रियल मड्रिडले भाग्यले जित्यो,
                                            घरेलु
                                            टिमलाई पहिलो भिएआर
                                            घातक</a> </h3>
                                    <p class="time">२९ मिनेट अगाडि</p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <a href=""><img class="card-img-top small-card-img"
                                                src="assets/images/item9.jpg" alt=""></a>
                                        <div class="card-body">
                                            <h5 class="card-text  line-clamp-2 mb-2"><a href="">ह्यारी केन र डेल अली
                                                    बिहीन
                                                    टोटनह्यामको शानदार
                                                    जित</a>
                                            </h5>
                                            <p class="time">२९ मिनेट अगाडि</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <a href=""><img class="card-img-top small-card-img"
                                                src="assets/images/item27.jpg" alt=""></a>
                                        <div class="card-body">
                                            <h5 class="card-text  line-clamp-2 mb-2"><a href="">ह्यारी केन र डेल अली
                                                    बिहीन
                                                    टोटनह्यामको शानदार
                                                    जित</a>
                                            </h5>
                                            <p class="time">२९ मिनेट अगाडि</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <a href=""><img class="card-img-top small-card-img"
                                                src="assets/images/item12.jpg" alt=""></a>
                                        <div class="card-body">
                                            <h5 class="card-text  line-clamp-2 mb-2"><a href="">रियल मड्रिडले भाग्यले
                                                    जित्यो</a>
                                            </h5>
                                            <p class="time">२९ मिनेट अगाडि</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <a href=""><img class="card-img-top small-card-img"
                                                src="assets/images/item4.jpg" alt=""></a>
                                        <div class="card-body">
                                            <h5 class="card-text  line-clamp-2 mb-2"><a href="">९ मिनेटमा ३ गोल, किशोर
                                                    खेलाडी
                                                    चम्किए</a> </h5>
                                            <p class="time">२९ मिनेट अगाडि</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="top-all added-top">
                                <h2><a href="news-details.php">लोकप्रिय समाचार</a></h2>
                                <span><a href="category.php">सबै</a></span>
                            </div>
                            <div class="news-short-inner-right">
                                <div class="short-news-div">
                                    <div class="short-news">
                                        <a href="news-details.php" class="d-flex">
                                            <div class="short-news-image">
                                                <img src="assets/images/news3.jpg" alt="News Image Small"
                                                    class="img-fluid">
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>‘सबै ठिकठाक रहेको’ भन्ने प्रतिवेदन तयार पारेको छ ।</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>१ घन्टा अगाडि</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="short-news">
                                        <a href="news-details.php" class="d-flex">
                                            <div class="short-news-image">
                                                <img src="assets/images/news4.jpg" alt="News Image Small"
                                                    class="img-fluid">
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>‘सबै ठिकठाक रहेको’ भन्ने प्रतिवेदन तयार पारेको छ ।</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>१ घन्टा अगाडि</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="short-news">
                                        <a href="news-details.php" class="d-flex">
                                            <div class="short-news-image">
                                                <img src="assets/images/news5.jpg" alt="News Image Small"
                                                    class="img-fluid">
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>‘सबै ठिकठाक रहेको’ भन्ने प्रतिवेदन तयार पारेको छ ।</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>१ घन्टा अगाडि</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="short-news">
                                        <a href="news-details.php" class="d-flex">
                                            <div class="short-news-image">
                                                <img src="assets/images/news1.jpg" alt="News Image Small"
                                                    class="img-fluid">
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>‘सबै ठिकठाक रहेको’ भन्ने प्रतिवेदन तयार पारेको छ ।</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>१ घन्टा अगाडि</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="short-news">
                                        <a href="news-details.php" class="d-flex">
                                            <div class="short-news-image">
                                                <img src="assets/images/news3.jpg" alt="News Image Small"
                                                    class="img-fluid">
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>‘सबै ठिकठाक रहेको’ भन्ने प्रतिवेदन तयार पारेको छ ।</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>१ घन्टा अगाडि</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="partner-side">
                        <div class="partner-image-single mb-3">
                            <a href="javascript:">
                                <img src="assets/images/partner1.jpg" alt="Partner" class="img-fluid">
                            </a>
                        </div>
                        <div class="partner-image-single mb-3">
                            <a href="javascript:">
                                <img src="assets/images/partner2.gif" alt="Partner" class="img-fluid">
                            </a>
                        </div>
                        <div class="partner-image-single mb-3">
                            <a href="javascript:">
                                <img src="assets/images/partner3.gif" alt="Partner" class="img-fluid">
                            </a>
                        </div>
                        <div class="partner-image-single mb-3">
                            <a href="javascript:">
                                <img src="assets/images/partner1.jpg" alt="Partner" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--AD SECTION-->
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="news-details.php">
                @if (!empty($cat_sec->category_partner))
                    @if(file_exists('uploads/partners/category_partner/'.$cat_sec->category_partner))
                        <img src="{{asset('uploads/partners/category_partner/'.$cat_sec->category_partner)}}" class="img-fluid">
                    @endif
                
                @endif
                {{-- <img src="assets/images/bajaj.gif" alt="Money Image" class="img-fluid"> --}}
            </a>
        </div>
    </div>
</section>
