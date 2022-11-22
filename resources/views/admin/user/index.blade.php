@extends('admin.includes.main')
@section('title')Role Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                   
                    <a href="{{route('users.create')}}" class="btn btn-success btn-sm float-right">Add User</a>
                    
                </div>
                <div class="card-body p-0">
                    @include('admin.includes.message')
                    <table class="table table-striped projects" id="myTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Role </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                            @if (!$user->hasRole('Super Admin'))
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td>
                                    {{$user->name}} 
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                    
                                    <span class="badge badge-success">{{$role->name}}</span>
                                    @endforeach  
                                </td>
                                <form action="{{route('users.destroy',$user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <td class="project-actions">
                                        <a class="btn btn-info btn-sm" href="{{route('users.edit',$user->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endif  
                            @endforeach
                           
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
    $(document).ready(function (e) {
        $('#myTable').DataTable();
    });
</script>
@endsection