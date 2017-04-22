@extends('layouts.app')

@section('titel')
    نیازمندیها / نمایش پست
@endsection

@section('content')
    <div class="col-lg-3">
        @include('components.userTool');
    </div>
    <div class="col-lg-8 col-md-8">
        <div class="row">
            <div class="panel panel-primary"><h3> تنظیمات حساب شما </h3></div>
        </div>
        <div class="row">
            <div class="panel panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/setting') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">نام</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">آدرس ایمیل </label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{$user->email }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">رمزعبور جدید </label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">تکرار رمزعبور</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                اعمال تغیرات
                            </button>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>

@endsection