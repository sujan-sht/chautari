@php
$cat_sec=App\Models\CategorySection::where('status',1)->first();
$category=App\Models\Category::where('id',$cat_sec->category_id)->first();
@endphp
<!--PHOTO GALLERY-->
<section class="photo-gallery-section">
    <div class="container-fluid">
        <h2><a href="photo.php">{{$category->name}}</a></h2>
        <div class="owl-carousel photo-gallery-carousel owl-theme">
            <div class="item">
                <img src="assets/images/person2.jpg" alt="Photo Gallery" class="img-fluid">
                <div class="photo-overlay"></div>
                <div class="photo-caption">
                    <a href="photo.php">सुन तस्करी प्रकरण : गोरेका भाइ रमेश अदालतमा हाजिर</a>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/news2.jpg" alt="Photo Gallery" class="img-fluid">
                <div class="photo-overlay"></div>
                <div class="photo-caption">
                    <a href="photo.php">‘सबै ठिकठाक रहेको’ भन्ने प्रतिवेदन तयार पारेको छ </a>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/nature.jpg" alt="Photo Gallery" class="img-fluid">
                <div class="photo-overlay"></div>
                <div class="photo-caption">
                    <a href="photo.php">अख्तियारले सिक्टा सिँचाइ नहरमा गुणस्तरहिन काम </a>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/road.jpg" alt="Photo Gallery" class="img-fluid">
                <div class="photo-overlay"></div>
                <div class="photo-caption">
                    <a href="photo.php">मात्र अध्ययन, छैन कार्यान्वयन : सरकारले सार्वजनिक गर्न नचाहेको उच्चस्तरीय
                        शिक्षा</a>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/traffic.jpg" alt="Photo Gallery" class="img-fluid">
                <div class="photo-overlay"></div>
                <div class="photo-caption">
                    <a href="photo.php">गुगललाई उछिन्दै टिकटक बन्‍यो विश्वको सबैभन्दा लोकप्रिय वेबसाइट</a>
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