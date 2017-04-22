@extends('layouts.app')

@section('titel')
    نیازمندیها
@endsection


@section('content')

    <div class="col-lg-3" >
        @include('components.userTool');
    </div>

    <div class="col-lg-8 ">
        @foreach($agahi as $post)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">

                    <img src="{{Storage::url($post->photo)}}" alt="بدون عکس" style="min-height: 100px;">
                    <div class="caption">
                        <h3>{{ $post->topic }}</h3>
                        <p> {{$post->area }}</p>
                        <p><span>قیمت کل:</span> {{$post->price }}</p>

                        <p>
                            <a href="/{{$post->id}}" class="btn btn-primary" role="button">نمایش / ویرایش</a>
                        </p>
                        <p>@if($post->verification==1) <b style="color: blue">منتشر شده</b> @endif</p>
                        <p>@if($post->verification==0) <b style="color: orange">آگهی در انتظار تایید</b> @endif</p>
                        <p>@if($post->verification==2) <b style="color: red ;">آگهی توسط یکی از مدیران در صلاحیت شده است .</b> @endif</p>
                        <p> {{$post->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
