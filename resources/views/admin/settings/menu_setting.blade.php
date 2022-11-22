
@extends('admin.includes.main')
@section('title')Menu Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Menu Settings</h3>
                            <a href="{{route('menu_settings.create')}}" class="btn btn-success btn-sm float-right">Add Menu</a>
                        </div>
                        <div class="card-body p-0">
                            @include('admin.includes.message')
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Menu </th>
                                        <th> Slug </th>
                                        <th>Order</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                    @php
                                    if ($menu->menu_type == "category") {
                                        $menu_detail=App\Models\Category::where('id',$menu->menu)->first();
                                    } else {
                                        $menu_detail=App\Models\Page::where('id',$menu->menu)->first();
                                    }
                                    @endphp
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td>
                                            {{-- @if ($menu->menu_type == "category") --}}
                                                {{$menu_detail->name}} 
                                            {{-- @else
                                                {{$menu_detail->title}}
                                            @endif  --}}
                                        </td>
                                        <td>
                                            {{$menu_detail->slug}} 
                                        </td>
                                        <td>
                                            {{$menu->menu_order}}
                                        </td>
                                       
                                            <td class="project-actions">
                                            
                                            <a class="btn btn-info btn-sm" href="{{route('menu_settings.edit',$menu->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                                <a class="btn btn-danger btn-sm" href="{{route('menu_settings.destroy',$menu->id)}}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection