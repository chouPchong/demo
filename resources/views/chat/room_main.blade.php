@extends('layouts.app')
@section('title', '聊天室')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="title text-success">talking</h4>
                </div>
                <div class="panel-body">
                    <div class="show-content">
                        <p class="item item-title">
                            <img src="https://www.gravatar.com/avatar/9616700e46461dc90bbdd73922e83d31.jpg?s=300&d=monsterid&r=pg" alt="" height="100%">
                            <span class="content">12312321312</span>
                        </p>
                        <p class="item item-content">123123123123 123123</p>
                        <p class="item item-title">
                            <img src="https://www.gravatar.com/avatar/9616700e46461dc90bbdd73922e83d31.jpg?s=300&d=monsterid&r=pg" alt="" height="100%">
                            <span>12312321312</span>
                        </p>
                        <p class="item item-content">123123123123 123123</p>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="input-content">
                        <textarea name="content" class="input-control"></textarea>
                        <input type="submit" value="提交" class="submit bg-primary">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="title text-success">users</h4>
            </div>
            <div class="panel-body">
                <div class="show-user">
                    @foreach($users as $user)
                        <p class="user_list"><img src="{{ $user->avatar }}" alt=""width="20px">{{ $user->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection