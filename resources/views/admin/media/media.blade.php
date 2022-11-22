@extends('admin.includes.main')
@section('title')Media -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

<section class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <h3 class="card-title">Media</h3>
                    </div>
                    <div class="col-md-10">
                        <div class="row justify-content-end">
                            <div class="row">
                                <div class="check-all-button">
                                <input type="checkbox" id="master">
                                <label for="master" class="mb-0">Select All</label>
                                </div>
                                <button class="btn btn-primary delete_all btn-danger mr-2" onclick="del()" style="height: fit-content"><i class="fas fa-trash">
                                </i></button>
                                <form action="{{route('medias')}}" method="get"  class="form-inline">
                                <input type="date" class="form-control mr-2" name="from" id="date_from" value="{{$from}}">
                                <input type="date" class="form-control mr-2" name="to" id="date_to" value="{{$to}}">
                                <button type="submit" class="btn btn-success">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <form action="{{route('medias.delete')}}" method="POST" id="del">
                    @csrf
                <div class="row">
                
                    @foreach ($medias as $media)
                        @if ($media->featured_img != null)
                            @if (file_exists(public_path('uploads/featured_img/' . $media->featured_img)))
                            <div class="col-md-2">
                                <div class="img-upload-preview">
                                    <img loading="lazy"  src="{{ asset('uploads/featured_img/'.$media->featured_img) }}" alt="" class="img-responsive" style="max-height:150px;">
                                    <input type="checkbox" class="close-btn sub_chk" name="ids[{{$media->id}}]" value="{{$media->id}}" style="right: 0px; top:-3px; width:15px;">
                                </div>
                            </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </form>
                <div class="row">
                    {{-- {{$medias->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    function del(el){
        $('#del').submit();
    }
    
$('#master').on('click', function(e) {  
         if($(this).is(':checked',true))    
         {  
            $(".sub_chk").prop('checked', true);    
         } else {    
            $(".sub_chk").prop('checked',false);    
         }    
        });
    
</script>
@endsection
