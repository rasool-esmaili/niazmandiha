@extends('layouts.app')
@section('titel')
    نیازمندیها / ارسال آگهی جدید
@endsection

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="margin:10px 0">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (isset($cat))
    <div class="alert alert-danger">
        <ul>
            <li style="margin:10px 0">{{ $cat }}</li>
        </ul>
    </div>
@endif

<div class="New__form col-lg-12 col-sm-12">

    <form class="form-inline" action="/new" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-lg-5 col-lg-offset-1 col-sm-12">
            <div class="Form-item">
                <select onchange="ChangeHandler(this)" name="cat1" class="form-control" id="cat1">
                    <option value="" disabled selected> لطفا دسته بندی خود را انتخاب نمایید ...</option>
                    <option value="estates" id="cat2">املاک</option>
                    <option value="electronics" id="cat3">وسایل الکترونیک</option>
                    <option value="vehicles" id="cat4">وسایل نقلیه</option>
                </select>
            </div>
            <div class="Form-item">
                <select class="form-control" name="cat2" id="selectedCatItems">

                </select>
            </div>

            <div id="formContainer" >

            </div>
        </div>

        <div class="col-lg-5 col-sm-12 ">
            <div class="Form-item"><span>عنوان آگهی : </span><input class="form-control" name="topic" type="text"></div>
            <div class="Form-item"><span>توضیحات آگهی : </span><textarea class="form-control" name="contents" type="text"></textarea><br/></div>
            <div class="Form-item"><span>قیمت : </span><input class="form-control" name="price" type="number"></div>
            <div class="Form-item"> <span> شماره تماس : </span><input class="form-control" name="tel" type="text"></div>
            <div class="Form-item"><span>آدرس ایمیل : </span><input class="form-control" name="email" type="email"></div>
            <div class="Form-item"><span> شهر : </span><input class="form-control" name="city" type="text"></div>
            <div class="Form-item"><span> محله : </span><input class="form-control" name="area" type="text"></div>
            <label class="btn btn-primary btn-file">
                انتخاب عکس <input type="file" name="photo" style="display: none;">
            </label>
            <label for=""></label>
            <input class="btn btn-success" type="submit" value="ارسال آگهی" >
        </div>


    </form>
</div>

@endsection