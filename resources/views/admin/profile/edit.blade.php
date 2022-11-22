@extends('admin.includes.main')
@section('title')Product Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Profile</h3>
                                    
                                </div>
                                <div class="col-md-12 p-0">
                                    @include('admin.includes.message')
                                </div>


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">User Name</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{old('name',Auth::user()->name)}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label><span class="text-danger"> *
                                                </span>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{old('email',Auth::user()->email)}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{old('phone',Auth::user()->phone)}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    
                                    <ul class="post-buttons d-flex">  
                                        <li>
                                            <button type="submit" class="btn btn-success btn-sm float-right">Update Profile</button>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="select-option">
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <div id="profile_image" class="row">
                        <div class="col-md-6">
                            <div class="img-upload-preview">
                                <img loading="lazy"  src="{{ asset('admin/image/'.Auth::user()->profile_image) }}" alt="" class="img-responsive" style="max-height:150px;">
                                <input type="hidden" name="previous_profile_img" value="{{ Auth::user()->profile_image }}">
                                <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>


@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function (e) {
        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-6").remove();
        });
        $("#profile_image").spartanMultiImagePicker({
            fieldName: 'profile_image',
            maxCount: 1,
            rowHeight: '200px',
            groupClassName: 'col-lg-12 col-md-12',
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
