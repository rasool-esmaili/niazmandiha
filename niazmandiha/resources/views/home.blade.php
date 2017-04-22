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
    <div class="col-lg-3 ">
        @include('components.categories')
    </div>

    <!--start search-bax-->

    <div class="col-lg-8 col-md-8" >
        <div class="panel panel-default">
            <div class="panel-heading panel-danger">جستجو</div>
            <div class="panel-body">
                <form action="/search/fulltext" method="get" id="form">

                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="جستجو برای ...">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-default"  value="جستجو">
                        </span>
                    </div>
                </form>

                {{--<hr>--}}
               {{--<div>--}}
                    {{--<form action="/search/" method="get" id="form">--}}
                        {{--<input type="text" class="form-control" placeholder="جستجو برای  در عنوان آگهی ها ">--}}
                        {{--<input type="text" class="form-control" placeholder="جستجو برای  در توضیحات آگهی ها ">--}}
                        {{--<input type="text" class="form-control" placeholder="جستجو برای  در منطقه آگهی ها ">--}}
                        {{--<span class="input-group-btn"><input type="submit" class="btn btn-default"  value="جستجو"></span>--}}
                    {{--</form>--}}
               {{--</div>--}}
            </div>
        </div>
    </div>


    <div class="col-lg-8 ">
        @foreach($agahi as $post)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{Storage::url($post->photo)}}" alt="بدون عکس " style="min-height: 100px;">

                    <div class="caption">
                        <h3>{{ $post->topic }}</h3>
                        <p> {{$post->area }}</p>
                        <p><span>قیمت کل:</span> {{$post->price }}</p>
                        <p ><a href="/{{$post->id}}" class="btn btn-primary" role="button">نمایش</a></p>
                        <hr>
                        <p> {{$post->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
 <!--
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">You are logged in!</div>
    </div>
-->

<!--
                                   <div class="row"  style="margin:20px 0 20px 0;">

                                       <div class="col-lg-6">
                                           <span>شهر : </span>
                                           <select name="city" class="form-control">
                                               <option value="tehran">تهران</option>
                                               <option value="alborz">البرز</option>
                                               <option value="qom">قم</option>
                                               <option value="esfahan">اصفهان</option>
                                           </select>
                                       </div>

                                       <div class="col-lg-6">
                                           <span >محله : </span>
                                           <select name="area" class="form-control">
                                               <option value="">همه ی محله ها</option>
                                               <option value="سبلان">سبلان</option>
                                               <option value="نارمک">نارمک</option>

                                           </select>
                                       </div>

                                   </div>

                                   <div class="row"  style="margin:20px 0 20px 0;">

                                       <div class="col-lg-6">
                                           <select name="cat1" id="cat1" class="form-control">
                                               <option value="estate">املاک</option>
                                               <option value="electronics">وسایل الکترونیک</option>
                                               <option value="vehicles">وسایل نقلیه</option>
                                           </select>
                                       </div>

                                       <div class="col-lg-6" >
                                           <select name="cat2" id="cat_estate" class="form-control">
                                               <option value="1"> -- </option>
                                               <option value="home">مسکونی </option>
                                               <option value="shop">تجاری</option>
                                               <option value="vila">ویلا</option>
                                               <option value="home">خدمات املاک</option>
                                           </select>

                                           <select name="cat3" id="cat_electronic" class="form-control">
                                               <option value="*"> -- </option>
                                               <option value="mobile">موبایل و تبلت </option>
                                               <option value="simcart">سیم کارت</option>
                                               <option value="computer">کامپیوتر</option>
                                               <option value="consol">کنسول و بازی</option>
                                               <option value="phone">تلفن رومیزی</option>
                                           </select>
                                           <select name="cat4" id="cat-vehicle" class="form-control">
                                               <option value="*"> -- </option>
                                               <option value="car">خودرو سواری</option>
                                               <option value="heavy-car">خودرو سنگین</option>
                                               <option value="car-part">قطعات خودرو</option>
                                               <option value="motor">موتور سیکلت</option>
                                               <option value="boat">قایق</option>
                                           </select>
                                       </div>

                                   </div>
                                   <div class="row">
                                       <div class="col-lg6">
                                           <select name="type" id="type" class="form-control">
                                               <option value="1">هردو</option>
                                               <option value="sale">فروشی</option>
                                               <option value="rental">اجاری</option>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="row" style="margin:20px 0 20px 0;">
                                       <span>قیمت : </span>
                                       <input  name="pricemin" type="range" value="0 , 100" class="form-control">
                                       <input  name="pricemax" type="range" value="0 , 100" class="form-control">

                                   </div>

                                   <div class="row">
                                       <span>         تعداد اتاق :</span> <input name="rooms" type="text"><br/>
                                       <span>         قیمت اجاره :</span> <input name="rentprice" type="number"><br/>
                                       <span> برند وسیله ی نقلیه :</span> <input name="brand_car" type="text"><br/>
                                       <span>             کارکرد :</span> <input name="kilometre" type="text"><br/>
                                       <span>                مدل :</span> <input name="model" type="text"><br/>

                                       <span>              برند :</span> <input name="brand" type="text"><br/>
                                   </div>
                       -->