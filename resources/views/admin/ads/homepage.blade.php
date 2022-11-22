@extends('admin.includes.main')
@section('title')Ad Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<!-- Main content -->
<section class="content">
    <form action="{{route('homepageAd.store',encrypt($ads->id))}}" method="POST" enctype="multipart/form-data">
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
                        @if ($ads->before_header!=null)
                        <div class="form-group">
                            <div id="before_header" class="row">

                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy"
                                            src="{{ asset('uploads/partners/before_header/'.json_decode($ads->before_header)->img) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_header" value="{{ json_decode($ads->before_header)->img }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="before_header_url">URL:</label>
                                <input type="text" class="form-control" id="before_header_url" name="before_header_url" value="{{old('before_header_url',json_decode($ads->before_header)->url)}}">
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <div id="before_header" class="row">
                                
                            </div>
                            <div class="row">
                                <label for="before_header_url">URL:</label>
                                <input type="text" class="form-control" id="before_header_url" name="before_header_url" value="{{old('before_header_url')}}">
                            </div>
                        </div>
                        @endif

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Before Footer</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($ads->before_footer!=null)
                            
                        <div class="form-group">
                            <div id="before_footer" class="row">
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy"
                                            src="{{ asset('uploads/partners/before_footer/'.json_decode($ads->before_footer)->img) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_footer" value="{{ json_decode($ads->before_footer)->img }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="before_footer_url">URL:</label>
                                <input type="text" class="form-control" id="before_footer_url" name="before_footer_url" value="{{old('before_footer_url',json_decode($ads->before_footer)->url)}}">
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <div id="before_footer" class="row">
                                
                            </div>
                            <div class="row">
                                <label for="before_footer_url">URL:</label>
                                <input type="text" class="form-control" id="before_footer_url" name="before_footer_url" value="{{old('before_footer_url')}}">
                            </div>
                        </div>
                        @endif

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        {{-- <div class="row">
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
                            <div id="after_header" class="row">
                                @if(is_array(json_decode($ads->after_header)))
                                @foreach (json_decode($ads->after_header) as $key => $photo)
                                
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy" src="{{ asset('uploads/partners/after_header/'.$photo) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_after[]" value="{{ $photo }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                    
                                </div>
                                @endforeach
                                @endif
                            </div>
                            @for ($i = 0; $i < 3; $i++)
                                
                            
                            <div class="row" id="after_show">
                                <label for="after_header_url{{$i+1}}">URL{{$i+1}}:</label>
                                <input type="text" class="form-control mx-2 mb-4" id="after_header_url{{$i+1}}" name="after_header_url{{$i+1}}" value="">
                            </div>
                            @endfor
                            
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div> --}}
        <div class="row">
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
                        @if ($ads->after_header1!=null)
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="after_header1" class="row">
                                    <div class="col-lg-6 col-md-6 remove">
                                        <div class="img-upload-preview">
                                            <img loading="lazy"
                                                src="{{ asset('uploads/partners/after_header/'.json_decode($ads->after_header1)->img) }}"
                                                alt="" class="img-responsive" style="max-height:150px;">
                                            <input type="hidden" name="after_header1" value="{{ json_decode($ads->after_header1)->img }}">
                                            <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="after_header1_url">URL:</label>
                                    <input type="text" class="form-control" id="after_header1_url" name="after_header1_url" value="{{old('after_header1_url',json_decode($ads->after_header1)->url)}}">
                                </div>
                            </div>
       
                        </div>
                        @else
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="after_header1" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="after_header1_url">URL:</label>
                                    <input type="text" class="form-control" id="after_header1_url" name="after_header1_url" value="{{old('after_header1_url')}}">
                                </div>
                            </div>
       
                        </div>
                        @endif

                        @if ($ads->after_header2!=null)
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="after_header2" class="row">
                                    <div class="col-lg-6 col-md-6 remove">
                                        <div class="img-upload-preview">
                                            <img loading="lazy"
                                                src="{{ asset('uploads/partners/after_header/'.json_decode($ads->after_header2)->img) }}"
                                                alt="" class="img-responsive" style="max-height:150px;">
                                            <input type="hidden" name="after_header2" value="{{ json_decode($ads->after_header2)->img }}">
                                            <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="after_header2_url">URL:</label>
                                    <input type="text" class="form-control" id="after_header2_url" name="after_header2_url" value="{{old('after_header2_url',json_decode($ads->after_header2)->url)}}">
                                </div>
                            </div>
       
                        </div>
                        @else
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="after_header2" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="after_header2_url">URL:</label>
                                    <input type="text" class="form-control" id="after_header2_url" name="after_header2_url" value="{{old('after_header2_url')}}">
                                </div>
                            </div>
       
                        </div>
                        @endif

                        @if ($ads->after_header3!=null)
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="after_header3" class="row">
                                    <div class="col-lg-6 col-md-6 remove">
                                        <div class="img-upload-preview">
                                            <img loading="lazy"
                                                src="{{ asset('uploads/partners/after_header/'.json_decode($ads->after_header3)->img) }}"
                                                alt="" class="img-responsive" style="max-height:150px;">
                                            <input type="hidden" name="after_header3" value="{{ json_decode($ads->after_header3)->img }}">
                                            <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="after_header3_url">URL:</label>
                                    <input type="text" class="form-control" id="after_header3_url" name="after_header3_url" value="{{old('after_header3_url',json_decode($ads->after_header3)->url)}}">
                                </div>
                            </div>
       
                        </div>
                        @else
                        <div class="form-group">
                            
                            <div class="form-group">
                                <div id="after_header3" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="after_header3_url">URL:</label>
                                    <input type="text" class="form-control" id="after_header3_url" name="after_header3_url" value="{{old('after_header3_url')}}">
                                </div>
                            </div>
       
                        </div>
                        @endif
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
    $(document).ready(function (e) {
        $('.remove-files').on('click', function () {
            $(this).parents(".remove").remove();
        });
        $("#before_header").spartanMultiImagePicker({
            fieldName: 'before_header',
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
        $("#before_footer").spartanMultiImagePicker({
            fieldName: 'before_footer',
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
        $("#after_header").spartanMultiImagePicker({
            fieldName: 'after_header[]',
            maxCount: 3,
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
        $("#after_header1").spartanMultiImagePicker({
            fieldName: 'after_header1',
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
        $("#after_header2").spartanMultiImagePicker({
            fieldName: 'after_header2',
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
        $("#after_header3").spartanMultiImagePicker({
            fieldName: 'after_header3',
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
        // $("#after_header").on('click',function(){
        //     $("#after_show").removeClass('d-none');
        // });
    });

</script>

@endsection
