@extends('layouts.app')

@section('title', '提示')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">提示</div>
                <div class="panel-body text-center">
                    <h2>{{ $msg }}</h2>
                    <a href="{{ route('home') }}">返回首页</a>
                </div>
            </div>
        </div>
    </div>
@endsection