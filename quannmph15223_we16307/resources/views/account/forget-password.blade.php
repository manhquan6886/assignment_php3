@extends('home')

@section('title', "list product")

@section('slider')
    @include('layouts.client.name-page')
@endsection

@section('product')
    <!--Login Register section start-->
    <div class="login-register-section section pt-90 pt-lg-70 pt-md-60 pt-sm-55 pt-xs-45  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <!--Login Form Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register">
                        <div class="form-login-title">
                            <h2>Lấy Lại Mật Khẩu</h2>
                        </div>
                        <div class="login-form">
                            @if (session('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <form action="" method="POST">
                                @csrf
                                <div class="form-fild">
                                    <p><label>Nhập lại email<span class="required">*</span></label></p>
                                    <input name="email_login" value="" type="text">
                                    @error('email_login')
                                    <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>
                                @method('POST')
                                <div class="login-submit">
                                    <button type="submit" class="btn">Go</button>
                                </div>
                                <div class="lost-password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Login Form End-->
                <!--Register Form Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register register-pt-0">
                        
                    </div>
                </div>
                <!--Register Form End-->
            </div>
        </div>
    </div>
    <!--Login Register section end-->
@endsection


