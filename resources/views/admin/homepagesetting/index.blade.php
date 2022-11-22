@extends('admin.includes.main')
@section('title')Homepage Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            @can('section_layout-create')
                            <a href="{{route('homepageSetting.create')}}" class="btn btn-success btn-sm">Add Category Section</a>
                            @else
                            <h5>Category Section</h5>
                            @endcan
                        </div>
                    </div>
                     
                </div>
                <div class="card-body p-0">
                    @include('admin.includes.message')
                    
                      <table class="table table-striped projects" id="myTable">
                          <thead>
                              <tr>
                                  <th> # </th>
                                  @can('section_layout-image_show')
                                  <th>Layout</th>
                                  @endcan
                                  <th>Category</th>
                                  <th>Sub Category</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            {{-- {{dd($cat_section)}} --}}
                              @if(count($cat_section)>0)
                                  
                                  @foreach ($cat_section as $cat)
                                  <tr>  
                                    <td> {{$loop->iteration}} </td>
                                    @can('section_layout-image_show')
                                    <td>
                                        @if(empty($cat->layout)) 
                                            <img src="{{asset('category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid"> 
                                        @else
                                            <img src="{{asset('layout/'.$cat->layout.'.jpg')}}" alt="" width="80px" height="80px" class="img-fluid">
                                        @endif
                                    </td>
                                    @endcan
                                    <td>
                                      @php
                                        $category=App\Models\Category::where('id',$cat->category_id)->first();
                                        if(!empty($category)){
                                            echo $category->name;
                                        }
                                      @endphp
                                    </td>
                                    <td>
                                        @php
                                        
                                        // dd($cat->subcat_id);
                                        // if(!isset($cat->subcat_id)){
                                            // echo 'hi';
                                          if($cat->subcat_id != "null"){
                                            foreach (json_decode($cat->subcat_id) as $key => $value) {
                                                $sub=App\Models\SubCategory::where('id',$value)->first();
                                                echo $sub->name;
                                                echo '<br>';
                                            }
                                          }
                                        // }
                                      @endphp
                                    </td>
                                    <td>
                                      <input type="checkbox" data-id="{{ $cat->id }}" name="status" class="js-switch" {{ $cat->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <form action="{{route('homepageSetting.destroy',encrypt($cat->id))}}" method="post" id="submit_form">
                                        @csrf
                                        @method('delete')
                                        <td class="project-actions">
                                            
                                            <a class="btn btn-info btn-sm" href="{{route('homepageSetting.edit',$cat->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm " type="submit" data-toggle="tooltip" title='Delete'>
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </td>
                                    </form>

                                  </tr>
                                  
                                  @endforeach
                              @else
                                  <tr><td colspan="6"><i class="fa fa-exclamation-triangle"></i> {!! trans('No Data Found') !!}</td></tr>
                              @endif
                          </tbody>
                      </table>
                   
                </div>
                {{-- {{ $posts->links() }} --}}
            </div>
        </div>

    </section>
</div>
@endsection
@section('scripts')



<script type="text/javascript">
    
    $(document).ready(function (e) {
        $('#myTable').DataTable();

        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let category_id = $(this).data('id');
            //   console.log(category_id);
    
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('cat_section.update_status') }}',
                data: {'status': status, 'cat_id': category_id},
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