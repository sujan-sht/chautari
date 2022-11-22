@php
$cat_sec=App\Models\CategorySection::where('status',1)->first();
$category=App\Models\Category::where('id',$cat_sec->category_id)->first();
@endphp
<!--ANTARBARTA-->
<section class="antarbarta-section">
    <div class="container-fluid">
        <div class="antarbarta">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="heading">
                        <h1> <a href="">{{$category->name}}</a></h1>
                        <span class="view-all">
                            <a href="">सबै</a>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="news-details.php">
                                        <img src="assets/images/news5.jpg" alt="Antarbarta Image" class="img-fluid">
                                    </a>
                                </div>
                                <h6 class="antarbartaTitle"><a href="news-details.php"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> संघीयताबारे उठेका
                                        प्रश्नको जवाफ संघीय सरकारले दिनुपर्छ</a></h6>
                                <p class="line-clamp-3">हाम्रो पार्टी (नेकपा एमाले) को वडा, पालिकादेखि राष्ट्रिय
                                    महाधिवेशनमा
                                    केही समय व्यस्त भएँ । अनि गाउँमा पार्टीका कार्यक्रमहरू लिएर गइरहेका छौँ । अखिल महिला
                                    सङ्घको
                                    राष्ट्रिय सम्मेलनको मिति तय भएको छ । त्यसमा पनि समय दिइरहेकी छु ।</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="news-details.php">
                                        <img src="assets/images/news1.jpg" alt="Antarbarta Image" class="img-fluid">
                                    </a>
                                </div>
                                <h6 class="antarbartaTitle"><a href="news-details.php"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> निजामती सेवामा ट्रेड युनियन
                                        अभ्यास :
                                        एक चिरफार</a></h6>
                                <p class="line-clamp-3">हाम्रो पार्टी (नेकपा एमाले) को वडा, पालिकादेखि राष्ट्रिय
                                    महाधिवेशनमा
                                    केही समय व्यस्त भएँ । अनि गाउँमा पार्टीका कार्यक्रमहरू लिएर गइरहेका छौँ । अखिल महिला
                                    सङ्घको
                                    राष्ट्रिय सम्मेलनको मिति तय भएको छ । त्यसमा पनि समय दिइरहेकी छु ।</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="news-details.php">
                                        <img src="assets/images/news3.jpg" alt="Antarbarta Image" class="img-fluid">
                                    </a>
                                </div>
                                <h6 class="antarbartaTitle"><a href="news-details.php"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> राजनीतिक दल र
                                        प्रधानन्यायाधीश
                                        एकअर्काका</a></h6>
                                <p class="line-clamp-3 antarbartaPara">हाम्रो पार्टी (नेकपा एमाले) को वडा, पालिकादेखि
                                    राष्ट्रिय
                                    महाधिवेशनमा
                                    केही समय व्यस्त भएँ । अनि गाउँमा पार्टीका कार्यक्रमहरू लिएर गइरहेका छौँ । अखिल महिला
                                    सङ्घको
                                    राष्ट्रिय सम्मेलनको मिति तय भएको छ । त्यसमा पनि समय दिइरहेकी छु ।</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="news-details.php">
                                        <img src="assets/images/person.jpg" alt="Antarbarta Image" class="img-fluid">
                                    </a>
                                </div>
                                <h6 class="antarbartaTitle"><a href="news-details.php"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> संघीयताबारे उठेका
                                        प्रश्नको जवाफ संघीय सरकारले दिनुपर्छ</a></h6>
                                <p class="line-clamp-3">हाम्रो पार्टी (नेकपा एमाले) को वडा, पालिकादेखि राष्ट्रिय
                                    महाधिवेशनमा
                                    केही समय व्यस्त भएँ । अनि गाउँमा पार्टीका कार्यक्रमहरू लिएर गइरहेका छौँ । अखिल महिला
                                    सङ्घको
                                    राष्ट्रिय सम्मेलनको मिति तय भएको छ । त्यसमा पनि समय दिइरहेकी छु ।</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="news-details.php">
                                        <img src="assets/images/news2.jpg" alt="Antarbarta Image" class="img-fluid">
                                    </a>
                                </div>
                                <h6 class="antarbartaTitle"><a href="news-details.php"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> संघीयताबारे उठेका
                                        प्रश्नको जवाफ संघीय सरकारले दिनुपर्छ</a></h6>
                                <p class="line-clamp-3">हाम्रो पार्टी (नेकपा एमाले) को वडा, पालिकादेखि राष्ट्रिय
                                    महाधिवेशनमा
                                    केही समय व्यस्त भएँ । अनि गाउँमा पार्टीका कार्यक्रमहरू लिएर गइरहेका छौँ । अखिल महिला
                                    सङ्घको
                                    राष्ट्रिय सम्मेलनको मिति तय भएको छ । त्यसमा पनि समय दिइरहेकी छु ।</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="news-details.php">
                                        <img src="assets/images/news1.jpg" alt="Antarbarta Image" class="img-fluid">
                                    </a>
                                </div>
                                <h6 class="antarbartaTitle"><a href="news-details.php"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> संघीयताबारे उठेका प्रश्नको
                                        जवाफ
                                        संघीय सरकारले दिनुपर्छ</a></h6>
                                <p class="line-clamp-3 antarbartaPara">हाम्रो पार्टी (नेकपा एमाले) को वडा, पालिकादेखि
                                    राष्ट्रिय
                                    महाधिवेशनमा
                                    केही समय व्यस्त भएँ । अनि गाउँमा पार्टीका कार्यक्रमहरू लिएर गइरहेका छौँ । अखिल महिला
                                    सङ्घको
                                    राष्ट्रिय सम्मेलनको मिति तय भएको छ । त्यसमा पनि समय दिइरहेकी छु ।</p>
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
            </a>
        </div>
    </div>
</section>