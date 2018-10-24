@extends('layouts.app')

@section('title', '提示')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">提示</div>
                <div class="panel-body text-center">
                    <h2>请先验证邮箱</h2>
                    <p><a class="btn btn-primary" href="{{ route('email_verification.send') }}">重新发送验证邮件</a></p>
                    <p><a href="{{ route('home') }}">返回首页</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection