@extends('admin.includes.main')
@section('title')Homepage Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
     <!-- Main content -->
     <section class="content">
        @include('admin.includes.message')
        <form action="{{route('homepageSetting.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category Section</h3>
                            
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category_id">
                                    <option selected disabled>--Select--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_category">Sub Category</label>
                                <select class="form-control demo-select2" name="sub_category[]" id="sub_cat" multiple>
                                    
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label for="status">Status</label><br>
                                    <input type="radio" id="show" name="status" value="1" checked> 
                                    <label for="show">Show</label>
                                    <input type="radio" id="hide" name="status" value="0"> 
                                    <label for="hide">Hide</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="order">Order</label><br>
                                        <input type="number" name="order" id="order" value="{{old('order')}}"" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_partner">Category Ad <small>(Ad displays at the end of this section)</small></label>
                                <div id="category_partner" class="row">
                
                                </div>
                                <div class="row">
                                    <label for="category_partner_url">URL:</label>
                                    <input type="text" class="form-control" id="category_partner_url" name="category_partner_url" value="{{old('category_partner_url')}}">
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Choose Section Layouts</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                @for ($i = 1; $i < 5; $i++)
                                <label>
                                    <input type="checkbox" id="layout{{ $i }}" name="layout" value="layout{{$i}}">
                                    <span><img src="{{asset('layout/layout'. $i .'.jpg')}}" alt="" ></span>
                                </label>
                                @endfor  
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Sidebar Ads</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div id="section1" class="row">
                    
                                </div> 
                                <div class="row">
                                    <label for="section1_url">URL:</label>
                                    <input type="text" class="form-control" id="section1_url" name="section1_url" value="{{old('section1_url')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="section2" class="row">
                    
                                </div> 
                                <div class="row">
                                    <label for="section2_url">URL:</label>
                                    <input type="text" class="form-control" id="section2_url" name="section2_url" value="{{old('section2_url')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="section3" class="row">
                    
                                </div> 
                                <div class="row">
                                    <label for="section3_url">URL:</label>
                                    <input type="text" class="form-control" id="section3_url" name="section3_url" value="{{old('section3_url')}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            
            <div class="row">
            <div class="col-12">
                {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
                <input type="submit" value="Submit" class="btn btn-success float-right">
            </div>
            </div>
        </form>
      </section>
      <!-- /.content -->

@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}


<script type="text/javascript">
    $(document).ready(function (e) {
        $('#category_id').on('change', function() {
            var category_id = $('#category_id').val();
            $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#sub_cat').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#sub_cat').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    $('.demo-select2').select2();
                }
            });
        });
        $("#category_partner").spartanMultiImagePicker({
            fieldName:        'category_partner',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#section1").spartanMultiImagePicker({
            fieldName:        'section1',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#section2").spartanMultiImagePicker({
            fieldName:        'section2',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#section3").spartanMultiImagePicker({
            fieldName:        'section3',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        // $("#section").spartanMultiImagePicker({
        //         fieldName:        "section[]",
        //         maxCount:         4,
        //         rowHeight:        '200px',
        //         groupClassName:   'col-md-4 col-sm-4 col-xs-6',
        //         maxFileSize:      '',
        //         dropFileLabel : "Drop Here",
        //         onExtensionErr : function(index, file){
        //             console.log(index, file,  'extension err');
        //             alert('Please only input png or jpg type file')
        //         },
        //         onSizeErr : function(index, file){
        //             console.log(index, file,  'file size too big');
        //             alert('File size too big');
        //         }
        // });
    });
    // the selector will match all input controls of type :checkbox
    // and attach a click event handler
    $("input:checkbox").on("click", function () {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });

</script>
@endsection
