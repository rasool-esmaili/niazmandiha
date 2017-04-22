@extends('layouts.app')

@section('titel')
 نیازمندیها / نمایش پست
@endsection

@section('content')


    {{--show post--}}
    @foreach($result as $post)
        {{--post ditail--}}
        <div class=" panel panel-default col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1">

            {{--bookmark --}}
            @if ( Gate::allows('bookmark',$id))
                <div id="mark" data-toggle="{{$id}}" class="bookmark-post enable" role="button">  </div>
            @else
                <div id="mark" data-toggle="{{$id}}" class="bookmark-post" role="button"> </div>
            @endif

            {{--strt thumbls--}}
            <div class="font-size-22">{{ $post->topic }}</div>
            <hr>
                <div class="row font-size-18">
                    {{--left detail--}}
                    <div class="col-lg-5 col-md-4 ">
                        <span class="red">محل  : </span> <span>  {{ $post->area }}  </span><br>
                        <span class="red" >تلفن  : </span> <span>  {{ $post->tel }}  </span><br>
                        <span class="red">قیمت  : </span> <span>  {{ $post->price}}  </span><br>
                        <span class="red">تاریخ درج آگهی  : </span> <span>  {{ $post->created_at}}  </span><br>
                    </div>

                    {{--right detail--}}
                    <div class="col-lg-5 col-md-4 ">
                        @if($post->rooms !=null)<span class="red">تعداد اتاق  : </span> <span>  {{ $post->rooms }}  </span><br>@endif
                        @if($post->rent_price != null)<span class="red">اجاره ی ماهیانه  : </span> <span>  {{ $post->rooms }}  </span><br>@endif
                        @if($post->brand !=null)<span class="red">شرکت سازنده  : </span> <span>  {{ $post->brand }}  </span><br>@endif
                        @if($post->vehicle_brand!=null)<span class="red">شرکت سازنده  : </span> <span>  {{ $post->vehicle_brand }}  </span><br>@endif
                        @if($post->kilometre !=null)<span class="red">کارکرد(کیلوتر) :  </span> <span>  {{ $post->kilometre }}  </span><br>@endif
                        @if($post->model !=null)<span class="red">مدل  :</span> <span>  {{ $post->model }}  </span>@endif
                    </div>
                 </div>
            <hr>
            <div class="emphasis-text"><span class="red"> توضیحات : </span>{{$post->content}}</div>
            <hr>
            {{--button--}}
            <div>
                <a class="btn btn-info btn-margin" href="{{ url()->previous() }}"><span class="glyphicon glyphicon-repeat"></span><span >  برگشت </span> </a>
                @if( Gate::allows('edit-post',$post ))
                    <a class="btn btn-success btn-margin" href="#update" data-toggle="collapse" ><span class="glyphicon glyphicon-pencil"></span> <span>  ویرایش  </span>  </a>
                    <a class="btn btn-danger btn-margin" href="user/delete/{{$id}}"> <span ><span class="glyphicon glyphicon-remove">حذف </span></span>  </a>

                @elseif(Gate::allows('isadmin') and Gate::allows('isverification',$id) )
                    <div style="float :left; display: inline;">
                        <a class="btn btn-default btn-success" href="user/admin/verify/{{$id}}"> <span><span class="glyphicon glyphicon-check"></span>  تایید آگهی  </span>  </a>
                        <a class="btn btn-default btn-danger" href="user/admin/reject/{{$id}}"> <span><span class="glyphicon glyphicon-remove"></span>  رد آگهی  </span>  </a>
                    </div>
                @endif
            </div>
        </div>

        {{--post photo --}}
        <div class="col-md-3">
            <div class="panel panel-default"  >
                <img src="{{Storage::url($post->photo)}}" alt="فاقد عکس" style="min-height: 300px;" >
            </div>
        </div>
    @endforeach



    {{--if user can update post --}}
    @if (Gate::allows('edit-post',$post ))
        @foreach($result as $post)
            <div class="collapse" id="update"
            >

                {{--diteil post --}}
                <div id="update" class="panel panel-default col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1">

                    <form action="user/update/{{$id}}" method="">

                        {{--topic--}}
                        <input class="form-control font-size-22" name="topic" type="text" value="{{ $post->topic }}">
                        <hr>

                        <div class="panel">
                            <div class="row">
                                {{--right detail--}}
                                <div class="col-lg-5 col-md-4  font-size-18">
                                   <span class="red">محل  : </span> <input class="form-control " name="area" type="text" value="{{ $post->area }}"><br>
                                    <span class="red">تلفن  : </span> <input class="form-control"  name="tel" type="text" value="{{ $post->tel }}"><br>
                                    <span class="red">قیمت  : </span> <input class="form-control"  name="price" type="text" value="{{ $post->price }}"><br>
                                </div>
                                {{--left detail--}}
                                <div class="col-lg-5 col-md-4 font-size-18 ">
                                    @if($post->rooms !=null)<span class="red">تعداد اتاق  : </span> <input class="form-control " name="rooms" type="text" value="{{ $post->rooms }}"><br>@endif
                                    @if($post->rent_price != null)<span class="red">اجاره ی ماهیانه  : </span> <input class="form-control font-size-18" name="rent_price" type="text" value="{{ $post->rent_price }}"><br>@endif
                                    @if($post->brand !=null)<span class="red">شرکت سازنده  : </span> <input class="form-control font-size-18" name="brand" type="text" value="{{ $post->brand }}"><br>@endif
                                    @if($post->vehicle_brand  != null)<span class="red">شرکت سازنده : </span> <input class="form-control font-size-18" name="rent_price" type="text" value="{{ $post->vehicle_brand }}"><br>@endif
                                    @if($post->kilometre !=null)<span class="red">کارکرد(کیلوتر) : </span> <input class="form-control font-size-18" name="brand" type="text" value="{{ $post->kilometre }}"><br>@endif
                                    @if($post->model !=null)<span class="red">مدل  :</span> <input class="form-control font-size-18" name="rooms" type="text" value="{{ $post->model }}"><br>@endif
                                </div>
                            </div>
                        </div>

                        <div class="font-size-18"><span class="red"> توضیحات : </span> <textarea class="form-control" name="content">{{$post->content}}</textarea> </div>
                        <hr>
                        <input type="submit" class="btn btn-success btn-margin" value="  ویرایش  "/>

                   </form>
                 </div>

                {{--photo post--}}
                <div class=" col-md-3">
                    <div class="thumbnail">
                        <img id="photo" src="{{Storage::url($post->photo)}}" alt="فاقد عکس" style="min-height: 300px;" >
                        <hr>
                        <div class="btn btn-danger" id="btn-delete"><span class="glyphicon glyphicon-remove"></span>  حذف عکس  </div>


                       </div>

                    </div>

            </div>

        @endforeach
    @endif

@stop
