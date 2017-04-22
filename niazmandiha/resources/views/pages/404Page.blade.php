
@extends('layouts.app')

@section('titel')
    نیازمندیها
@endsection

@section('script')
    $(document).ready(function(){
    $("#cat1").change(function(){
    $("#form").attr("action","search\"+$("#cat1).val())
    });

    $("mark")

    });
@endsection

@section('content')

<div class="col-md-6 col-md-offset-3">


    <div class="panel panel-default">
        <div class="panel panel-heading">    صفحه مورد نظر یافت نشد</div>
        <div class="panel panel-body">
            <img src="image/404.png" alt="">
        </div>
    </div>


</div>

@endsection