@extends('admin.includes.main')
@section('title')Newsletter -  {{ config('app.name', 'Laravel') }} @endsection
<style>
    ul{
        padding: 10px !important;
    }
</style>
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="panel-title">{{__('Send Newsletter')}}</h3>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <div class="card-body">
                    <form action="{{ route('newsletters.send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Emails')}} ({{__('Users')}})</label>
                                    <select class="form-control selectpicker" name="user_emails[]" multiple data-selected-text-format="count" data-actions-box="true">
                                        @foreach($users as $user)
                                            <option value="{{$user->email}}">{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Emails')}} ({{__('Subscribers')}})</label>
                                    <select class="form-control selectpicker" name="subscriber_emails[]" multiple data-selected-text-format="count" data-actions-box="true">
                                        @foreach($subscribers as $subscriber)
                                            <option value="{{$subscriber->email}}">{{$subscriber->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Newsletter subject')}}</label>
                                    <input type="text" class="form-control" name="subject" id="subject" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Newsletter content')}}</label><br>
                                    <textarea class="editor form-control" name="content" required></textarea>
                                </div>
                                </div>
                            </div>
                        
                        <div class="panel-footer text-right">
                            <button class="btn btn-success" type="submit">{{__('Send')}}</button>
                        </div>
                    </form>
                </div>
                    <!--===================================================-->
                    <!--End Horizontal Form-->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    $(document).ajaxComplete(function () {
    $(".selectpicker").each(function (index, element) {
        $(".selectpicker").select2({});
    });
});
</script>
@endsection