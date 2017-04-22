
@extends('layouts.app')



@section('titel')
    نیازمندیها
@endsection


@section('content')

    <div class="col-lg-3">
        @include('components.userTool')
    </div>

    <div class="col-lg-8 ">
        <p> <h3>جدول مدیران</h3></p>
        <table class="table table-hover table-striped">
            <tr>
                <th>نام کاربر</th>
                <th>ایمیل</th>
                <th>تلفن</th>
            </tr>
            @foreach($users as $user)
                @if($user->admin)
                    <tr>
                        <td> {{$user->name}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->tel}}</td>
                    </tr>
                @endif
            @endforeach
        </table>


        <hr>


        <p> <h3>جدول کاربران</h3></p>
        <table class="table table-hover table-striped">
            <tr>
                <th>نام کاربر</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>ارتقا به مدیر</th>
            </tr>
            @foreach($users as $user)
                @if($user->admin == 0)
                    <tr>
                        <td> {{$user->name}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->tel}}</td>
                        <td><a href="/user/superadmin/addadmin/{{$user->id}}" class="btn btn-primary">ارتقا به مدیر</a> </td>
                    </tr>
                @endif
            @endforeach

        </table>







    </div>

@endsection