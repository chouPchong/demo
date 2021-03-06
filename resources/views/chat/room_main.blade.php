@extends('layouts.app')
@section('title', '聊天室')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="title text-success">
                        <span class="glyphicon glyphicon-home"></span>
                        {{ $chatRoom->name }}
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="show-content">
                        <p class="item item-title">
                            <img src="https://www.gravatar.com/avatar/9616700e46461dc90bbdd73922e83d31.jpg?s=300&d=monsterid&r=pg"
                                 alt="" height="100%">
                            <span class="content">12312321312</span>
                        </p>
                        <p class="item item-content">123123123123 123123</p>
                        <p class="item item-title">
                            <img src="https://www.gravatar.com/avatar/9616700e46461dc90bbdd73922e83d31.jpg?s=300&d=monsterid&r=pg"
                                 alt="" height="100%">
                            <span>12312321312</span>
                        </p>
                        <p class="item item-content">123123123123 123123</p>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="input-content">
                         <textarea id="content" class="input-control"></textarea>
                        <button class="submit btn bg-primary">发送</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="title text-success">用户列表 （{{ count($users) }}）</h4>
                </div>
                <div class="panel-body">
                    <div class="show-user">
                        @foreach($users as $user)
                            <p class="user_list">
                                <img src="{{ $user->avatar }}" alt="" width="20px">
                                {{ $user->name }}
                                @if($user->id === $chatRoom->create_user)
                                    <span class="glyphicon glyphicon-user"></span>
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function trim(str){ //删除左右两端的空格
            return str.replace(/(^\s*)|(\s*$)/g, "");
        }

        $('.submit').click(function () {
            var content = trim($('#content').val());
            if (content === '') {
                return false;
            }
            axios.post('{{ route('chat.content_store', ['chatRoom' => $chatRoom->id]) }}', {content: content})
                .then(function () {
                    $('#content').val('');
                })
        });
    </script>
@endsection