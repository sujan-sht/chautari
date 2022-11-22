@extends('admin.includes.main')
@section('title')Ad Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<!-- Main content -->
<section class="content">
    <form action="{{route('categoryAd.store',encrypt($ads->id))}}" method="POST" enctype="multipart/form-data">
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
                            @if ($ads->category_page!=null)
                            <div id="category_page" class="row">
                                <div class="col-lg-6 col-md-6 remove">
                                    <div class="img-upload-preview">
                                        <img loading="lazy"
                                            src="{{ asset('uploads/partners/category_page/'.json_decode($ads->category_page)->img) }}"
                                            alt="" class="img-responsive" style="max-height:150px;">
                                        <input type="hidden" name="previous_category_page"
                                            value="{{ json_decode($ads->category_page)->img }}">
                                        <button type="button" class="btn btn-danger close-btn remove-files"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="category_page">URL:</label>
                                <input type="text" class="form-control" id="category_page" name="category_page_url" value="{{old('category_page_url',json_decode($ads->category_page)->url)}}">
                            </div>
                            @else
                            <div class="form-group">
                                <div id="category_page" class="row">
                                    
                                </div>
                                <div class="row">
                                    <label for="category_page_url">URL:</label>
                                    <input type="text" class="form-control" id="category_page_url" name="category_page_url" value="{{old('category_page_url')}}">
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
        $(this).parents(".col-md-6").remove();
        $(this).parents(".col-lg-6").remove();
    });
    $(document).ready(function (e) {

        $("#category_page").spartanMultiImagePicker({
            fieldName: 'category_page',
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
