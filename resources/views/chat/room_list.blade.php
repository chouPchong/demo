@extends('layouts.app')
@section('title', '聊天室')
@section('content')
    <!-- 输出后端报错开始 -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <h4>有错误发生：</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 输出后端报错结束 -->
    <div class="row">
        <div>
            <a href="javascript:show()" class="btn btn-primary">新建 <span class="glyphicon glyphicon-plus"></span></a>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="title text-success">公共室</h4>
            </div>
            <div class="panel-body">
                <div class="show-list">
                    @foreach($pub_room as $pub)
                        <div class="room text-primary bg-primary">
                            <h4 class="room_name" onclick="location.href='{{ route('chat.room_main', ['chat_room' => $pub->id]) }}'">
                                {{ $pub->name }}
                                @if(Auth::user()->id == $pub->create_user)
                                    <p>（我的）</p>
                                @endif
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="text-info">私聊室</h4>
            </div>
            <div class="panel-body">
                <div class="show-list">
                    <div class="room text-primary bg-primary">primary基础色</div>
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="text-danger">匿名室</h4>
            </div>
            <div class="panel-body">
                <div class="show-list">
                    <div class="room text-primary bg-primary">primary基础色</div>
                </div>
            </div>
        </div>
    </div>
    <div class="mask"></div>
    <div class="add_room">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">新建聊天室</h4>
            </div>
            <div class="panel-body">
                <form action="{{ route('chat.room_create') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">名称</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" placeholder="请输入名称" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="help-block">名称在20字以内</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">类型</label>
                        </div>
                        <div class="col-md-6">
                            <div class="check form-control">
                                <input type="radio" name="type" value="1" checked> 公共&nbsp;&nbsp;
                                <input type="radio" name="type" value="2"> 私有&nbsp;&nbsp;
                                <input type="radio" name="type" value="3"> 匿名
                            </div>
                        </div>
                        <div class="col-md-4">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label"></label>
                        </div>
                        <div class="col-md-10">
                            <input type="submit" value="创建" class="btn btn-primary">&nbsp;
                            <input type="reset" value="取消" class="btn btn-default" onclick="hide()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function show() {
            $('.mask').css('display', 'block');
            $('.add_room').css('display', 'block');
        }
        function hide() {
            $('.mask').css('display', 'none');
            $('.add_room').css('display', 'none');
        }
    </script>
@endsection