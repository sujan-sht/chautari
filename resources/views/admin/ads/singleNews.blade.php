@extends('admin.includes.main')
@section('title')Ad Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<!-- Main content -->
<section class="content">
    <form action="{{route('singleNewsAd.store',encrypt($ads->id))}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{-- homepage ad section --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Before Header</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if ($ads->single_news!=null)
                            <div id="single_news" class="row">
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy"
                                            src="{{ asset('uploads/partners/single_news/'.json_decode($ads->single_news)->img) }}" alt=""
                                            class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_single_news"
                                            value="{{ json_decode($ads->single_news)->img}}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="single_news_url">URL:</label>
                                <input type="text" class="form-control" id="single_news_url" name="single_news_url" value="{{old('single_news_url',json_decode($ads->single_news)->url)}}">
                            </div>
                            @else
                            <div class="form-group">
                                <div id="single_news" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="single_news_url">URL:</label>
                                    <input type="text" class="form-control" id="single_news_url" name="single_news_url" value="{{old('single_news_url')}}">
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">After Headline</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if ($ads->after_single_headline!=null)
                            <div id="after_single_headline" class="row">
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy"
                                            src="{{ asset('uploads/partners/after_single_headline/'.json_decode($ads->after_single_headline)->img) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_after_single_headline"
                                            value="{{ json_decode($ads->after_single_headline)->img }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <label for="after_single_headline">URL:</label>
                                <input type="text" class="form-control" id="after_single_headline" name="after_single_headline_url" value="{{old('after_single_headline_url',json_decode($ads->after_single_headline)->url)}}">
                            </div>
                            @else
                            <div class="form-group">
                                <div id="after_single_headline" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="after_single_headline_url">URL:</label>
                                    <input type="text" class="form-control" id="after_single_headline_url" name="after_single_headline_url" value="{{old('after_single_headline_url')}}">
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sidebar</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <div id="single_sidebar" class="row">
                                @if(is_array(json_decode($ads->single_sidebar)))
                                @foreach (json_decode($ads->single_sidebar) as $key => $photo)
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy" src="{{ asset('uploads/partners/single_sidebar/'.$photo) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_single_sidebar[]" value="{{ $photo }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div> --}}
                        @if ($ads->single_sidebar1!=null)
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="single_sidebar1" class="row">
                                    <div class="col-lg-6 col-md-6 remove">
                                        <div class="img-upload-preview">
                                            <img loading="lazy"
                                                src="{{ asset('uploads/partners/single_sidebar/'.json_decode($ads->single_sidebar1)->img) }}"
                                                alt="" class="img-responsive" style="max-height:150px;">
                                            <input type="hidden" name="single_sidebar1" value="{{ json_decode($ads->single_sidebar1)->img }}">
                                            <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="single_sidebar1_url">URL:</label>
                                    <input type="text" class="form-control" id="single_sidebar1_url" name="single_sidebar1_url" value="{{old('single_sidebar1_url',json_decode($ads->single_sidebar1)->url)}}">
                                </div>
                            </div>
       
                        </div>
                        @else
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="single_sidebar1" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="single_sidebar1_url">URL:</label>
                                    <input type="text" class="form-control" id="single_sidebar1_url" name="single_sidebar1_url" value="{{old('single_sidebar1_url')}}">
                                </div>
                            </div>
       
                        </div>
                        @endif

                        @if ($ads->single_sidebar2!=null)
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="single_sidebar2" class="row">
                                    <div class="col-lg-6 col-md-6 remove">
                                        <div class="img-upload-preview">
                                            <img loading="lazy"
                                                src="{{ asset('uploads/partners/single_sidebar/'.json_decode($ads->single_sidebar2)->img) }}"
                                                alt="" class="img-responsive" style="max-height:150px;">
                                            <input type="hidden" name="single_sidebar2" value="{{ json_decode($ads->single_sidebar2)->img }}">
                                            <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="single_sidebar2_url">URL:</label>
                                    <input type="text" class="form-control" id="single_sidebar2_url" name="single_sidebar2_url" value="{{old('single_sidebar2_url',json_decode($ads->single_sidebar2)->url)}}">
                                </div>
                            </div>
       
                        </div>
                        @else
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="single_sidebar2" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="single_sidebar_url">URL:</label>
                                    <input type="text" class="form-control" id="single_sidebar2_url" name="single_sidebar2_url" value="{{old('single_sidebar2_url')}}">
                                </div>
                            </div>
       
                        </div>
                        @endif

                        @if ($ads->single_sidebar3!=null)
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="single_sidebar3" class="row">
                                    <div class="col-lg-6 col-md-6 remove">
                                        <div class="img-upload-preview">
                                            <img loading="lazy"
                                                src="{{ asset('uploads/partners/single_sidebar/'.json_decode($ads->single_sidebar3)->img) }}"
                                                alt="" class="img-responsive" style="max-height:150px;">
                                            <input type="hidden" name="single_sidebar3" value="{{ json_decode($ads->single_sidebar3)->img }}">
                                            <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="single_sidebar3_url">URL:</label>
                                    <input type="text" class="form-control" id="single_sidebar3_url" name="single_sidebar3_url" value="{{old('single_sidebar3_url',json_decode($ads->single_sidebar3)->url)}}">
                                </div>
                            </div>
       
                        </div>
                        @else
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="single_sidebar3" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="single_sidebar3_url">URL:</label>
                                    <input type="text" class="form-control" id="single_sidebar3_url" name="single_sidebar3_url" value="{{old('single_sidebar3_url')}}">
                                </div>
                            </div>
       
                        </div>
                        @endif

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">After Header</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if ($ads->single_after_header!=null)
                            <div id="single_after_header" class="row">
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy"
                                            src="{{ asset('uploads/partners/single_after_header/'.json_decode($ads->single_after_header)->img) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_single_after_header"
                                            value="{{ json_decode($ads->single_after_header)->img }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="single_after_header">URL:</label>
                                <input type="text" class="form-control" id="single_after_header" name="single_after_header_url" value="{{old('single_after_header_url',json_decode($ads->single_after_header)->url)}}">
                            </div>
                            @else
                            <div class="form-group">
                                <div id="single_after_header" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="single_after_header_url">URL:</label>
                                    <input type="text" class="form-control" id="single_after_header_url" name="single_after_header_url" value="{{old('single_after_header_url')}}">
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="my-3">
            <input type="submit" value="Submit" class="btn btn-success">
        </div>        
    </form>
</section>
<!-- /.content -->
@endsection
@section('scripts')
<script type="text/javascript">
    $('.remove-files').on('click', function () {
        $(this).parents(".remove").remove();
    });
    $(document).ready(function (e) {

        $("#single_news").spartanMultiImagePicker({
            fieldName: 'single_news',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-6 col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#after_single_headline").spartanMultiImagePicker({
            fieldName: 'after_single_headline',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-6 col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#single_after_header").spartanMultiImagePicker({
            fieldName: 'single_after_header',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-6 col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });



        // $("#single_sidebar").spartanMultiImagePicker({
        //     fieldName: 'single_sidebar[]',
        //     maxCount: 10,
        //     rowHeight: '200px',
        //     groupClassName: 'col-lg-6 col-md-6',
        //     maxFileSize: '',
        //     dropFileLabel: "Drop Here",
        //     onExtensionErr: function (index, file) {
        //         console.log(index, file, 'extension err');
        //         alert('Please only input png or jpg type file')
        //     },
        //     onSizeErr: function (index, file) {
        //         console.log(index, file, 'file size too big');
        //         alert('File size too big');
        //     }
        // });

        $("#single_sidebar1").spartanMultiImagePicker({
            fieldName: 'single_sidebar1',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-6 col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#single_sidebar2").spartanMultiImagePicker({
            fieldName: 'single_sidebar2',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-6 col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#single_sidebar3").spartanMultiImagePicker({
            fieldName: 'single_sidebar3',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-6 col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });



    });

</script>
@endsection
