@extends('admin.includes.main')
@section('title')Category Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                            <a href="{{route('categories.index')}}" class="btn btn-success btn-sm float-right">View Category</a>
                        </div>
                        <div class="col-md-12 p-0">
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            <form action="{{route('categories.update',$category->slug)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="category" value="{{old('category',$category->name)}}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            @php
                                                $cat_detail=App\Models\Category::where('id',$category->parent_id)->first(); 
                                                // dd($cat);
                                               @endphp
                                            <label for="parent">Under Category</label><span class="text-danger"> * </span>
                                            <select class="form-control" name="parent_id">
                                                
                                                <option value="0" @if($category->parent_id==0) selected @endif >Main Category</option>

                                                @foreach ($categories as $cat)
                                                    <option value="{{$cat->id}}" @if($category->parent_id==$cat->id) selected @endif>{{$cat->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>   --}}
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" name="slug" value="{{old('slug',$category->slug)}}">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <label class="form-label">Status</label> <span class="text-danger"> * </span>
                                        <input type="radio" name="status" value="1" @if(old('status',$category->status) == '1') checked @endif> Show
                                        <input type="radio" name="status" value="0" @if(old('status',$category->status) == '0') checked @endif> Hide
                                    </div>
                                </div> 
                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button> 
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
            
    $(document).ready(function (e) {
    
    
    $('#image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>

