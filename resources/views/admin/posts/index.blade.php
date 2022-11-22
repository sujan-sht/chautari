@extends('admin.includes.main')
@section('title')Post Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2">
                            @can('create-post')
                                <a href="{{route('posts.create')}}" class="btn btn-success btn-sm">Add Post</a>
                            @endcan
                            
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="row">
                            <form id="sort_orders" class="sorting_bar" action="" method="GET">
                                {{-- <div class="row"> --}}
                                <select  id="category_id" name="category" onchange="filter()">
                                    <option selected disabled>---Filter Category---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @isset($cat) @if ($cat == $category->id) selected @endif @endisset>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <select onchange="filter()" name="sub_category" id="sub_cat">
                                    <option selected disabled>---Filter Sub Category---</option>
                                    @foreach ($subcategories as $sub)
                                        <option value="{{$sub->id}}" @isset($subcat) @if ($subcat == $sub->id) selected @endif @endisset>{{$sub->name}}</option>
                                    @endforeach
                                </select>                               
                            {{-- </div> --}}
                            </form>
                            <form action="" method="GET" id="author_filter" class="ml-1 sorting_bar">
                                <select name="author" id="author" onchange="author_filter()">
                                    <option value="" selected disabled>---Filter Author---</option>
                                    @foreach ($authors as $user) 
                                        <option value="{{$user->name}}" @isset($author) @if ($author == $user->name) selected @endif @endisset>{{$user->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </form>
                            <form action="" method="GET" id="status_filter" class="ml-1 sorting_bar">
                                <select name="status" id="status" onchange="status_filter()">
                                    <option value="" selected disabled>---Filter by Status---</option>
                                    <option value="published" @isset($status) @if ($status == 'published') selected @endif @endisset>Published</option>
                                    <option value="drafts" @isset($status) @if ($status == 'drafts') selected @endif @endisset>Drafts</option>
                                    <option value="scheduled" @isset($status) @if ($status == 'scheduled') selected @endif @endisset>Scheduled</option>
                                </select>
                            </form>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button class="btn btn-primary delete_all btn-danger" onclick="del()"><i class="fas fa-trash">
                            </i></button> 
                        </div>
                    
                    </div>
                </div>
                {{-- {{dd(App\Models\Post::where('status','scheduled')->get())}} --}}
                <div class="card-body p-0">
                    @include('admin.includes.message')
                    <form action="{{route('delete_all')}}" method="POST" id="del">
                        @csrf
                        <table class="table table-striped projects" id="myTable">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th> # </th>
                                    <th>Image</th>
                                    <th>Title Name </th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($posts)>0)
                                @hasanyrole('Super Admin|Admin|Editor')
                                @php
                                    $all_posts=$posts;
                                @endphp 
                                @else
                                @php    
                                    $all_posts=$posts->where('author',Auth::user()->name)
                                @endphp
                                @endhasanyrole
                                    @foreach ($all_posts as $post)
                                    
                                    <tr>
                                        <td><input type="checkbox" class="sub_chk" name="ids[{{$post->id}}]" value="{{$post->id}}"></td>
                                        <td> {{$loop->iteration}} </td>
                                        <td>
                                            @if(empty($post->featured_img)) 
                                                <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                                            @else
                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" alt="{{$post->title}}" width="80px" height="80px" class="img-fluid">
                                            @endif
                                        </td>
                                        <td> 
                                            {{$post->title}} <br>
                                            
                                        {{-- <form action="{{route('posts.destroy',$post->slug)}}" method="post"> --}}
                                            {{-- @csrf --}}
                                            {{-- @method('delete') --}}
                                            @can('edit-post')
                                            <a class="btn btn-info btn-sm" href="{{route('posts.edit',$post->slug)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            @endcan
                                            @can('delete-post')
                                            {{-- <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="fas fa-trash">
                                                </i>
                                            </button> --}}
                                            <a class="btn btn-danger btn-sm" href="{{route('delete.post',$post->slug)}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                            @endcan
                                        {{-- </form> --}}
                                        </td>
                                        <td>
                                            
                                            @php
                                            $cat=App\Models\Category::where('id',$post->category)->first(); 
                                            @endphp
                                            @if (!empty($cat))
                                                {{$cat->name}} 
                                            @endif
                                            
                                        </td>
                                        <td>
                                            @if (!empty($cat))
                                                @php
                                                $subcat=App\Models\SubCategory::where('id',$post->subcategory)->first(); 
                                                @endphp
                                                @if(!empty($subcat->name))
                                            
                                                {{$subcat->name}}
                                                
                                                @endif
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <input type="checkbox" data-id="{{ $post->id }}" name="featured" class="js-feature" {{ $post->featured == 1 ? 'checked' : '' }}>
                                            
                                        </td>
                                        <td>
                                            @if ($post->status == 'published')   
                                                <span class="badge badge-pill badge-success">Published</span>
                                            @elseif($post->status == 'drafts')
                                                <span class="badge badge-pill badge-primary">Draft</span>
                                            @else
                                            @php
                                                
                                                $end = strtotime($post->scheduled_dt);
                                                $start = strtotime(\Carbon\Carbon::now());
                                                $mins = ($end - $start) / 60;
                                            @endphp
                                                @if ($mins<0)
                                                <span class="badge badge-pill badge-success">Published</span>
                                                @else
                                                <span class="badge badge-pill badge-primary">Scheduled</span>
                                                @endif
                                            @endif
                                        </td>
                                        
                                        <td>{{$post->author}}</td>
                                        <td>
                                            @if ($post->status=="scheduled" && $post->scheduled_dt != null)
                                            @php
                                                $timestamp = strtotime($post->scheduled_dt);
                                            @endphp
                                            {{date("d M Y h:i A", $timestamp)}}
                                            
                                          	@elseif($post->status=="published" || $post->status=="drafts")
                                          	@php
                                                $timestamp = strtotime($post->updated_at);
                                            @endphp
                                            {{date("d M Y h:i A", $timestamp)}}
                                            @endif
                                        </td>

                                    </tr>
                                    
                                    @endforeach
                                @else
                                    <tr><td colspan="6"><i class="fa fa-exclamation-triangle"></i> {!! trans('No Data Found') !!}</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                </div>
                {{-- {{ $posts->links() }} --}}
            </div>
        </div>

    </section>
</div>
<script>
    let featured = Array.prototype.slice.call(document.querySelectorAll('.js-feature'));
        featured.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
@endsection
@section('scripts')



<script type="text/javascript">
    function filter(el) {    
        $('#sort_orders').submit();
    }
    function author_filter(el){
        $('#author_filter').submit();
    }
    function status_filter(el){
        $('#status_filter').submit();
    }
    function del(el){
        $('#del').submit();
    }
    $(document).ready(function (e) {
        $('#myTable').DataTable();
        $('#category_id').on('change', function() {
            var category_id = $('#category_id').val();
            $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
            $('#sub_cat').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#sub_cat').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                // $('.demo-select2').select2();
                }
            });
        });

        $('#master').on('click', function(e) {  
         if($(this).is(':checked',true))    
         {  
            $(".sub_chk").prop('checked', true);    
         } else {    
            $(".sub_chk").prop('checked',false);    
         }    
        });  

        

        $('.js-feature').change(function () {
            let featured = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let category_id = $(this).data('id');
            //   console.log(category_id);
    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('post.update_feature') }}',
                data: {'featured': featured, 'cat_id': category_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });
        });

    });
</script>
@endsection