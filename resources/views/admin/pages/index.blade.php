@extends('admin.includes.main')
@section('title')pages -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                        <a href="{{route('pages.create')}}" class="btn btn-success btn-sm float-right">Add page</a>
                    
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="myTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Title</th>
                                <th> Slug </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pages)>0)
                                @foreach ($pages as $page)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    
                                    <td> {{$page->name}} </td>
                                    
                                    <td>{{$page->slug}}</td>

                                    <form action="{{route('pages.destroy',$page->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <td class="project-actions">
                                            {{-- <a class="btn btn-primary btn-sm" href="{{route('pages.show',$page->id)}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a> --}}
                                            <a class="btn btn-info btn-sm" href="{{route('pages.edit',$page->slug)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            @if ($page->slug != 'about-us')
                                            <button class="btn btn-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title='Delete'>
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                            @endif
                                            
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

            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')


<script>
    $(document).ready(function(){
        //datatable
        $('#myTable').DataTable();
    });

</script>




@endsection