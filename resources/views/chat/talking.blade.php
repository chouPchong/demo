@extends('layouts.app')
@section('title', '聊天室')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">名称</div>
                <div class="panel-body">
                    <div class="show-content"></div>
                    <div class="add-content">
                        <textarea name="text" id="text" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
    {{--<script>--}}
        {{--const app = new Vue({--}}
            {{--el: '#app',--}}
            {{--data () {--}}
                {{--return {--}}
                    {{--list: [],--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
        {{--var info = location.search;--}}
        {{--var arr = info.match(/\?room=(.+)&userid=(\d+)&username=(.+)/);--}}
        {{--var room = arr[1];--}}
        {{--var userid = arr[2];--}}
        {{--var username = arr[3];--}}

        {{--$('#text').bind('keydown', function(e){--}}
            {{--// 兼容FF和IE和Opera--}}
            {{--var theEvent = e || window.event;--}}
            {{--var code = theEvent.keyCode || theEvent.which || theEvent.charCode;--}}
            {{--if (code == 13) {--}}
                {{--var content = document.getElementById('text');--}}
                {{--$.ajax({--}}
                    {{--url: "{{ url('talking/save') }}",--}}
                    {{--type: "post",--}}
                    {{--headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
                    {{--data: "room=" + room + "&userid=" + userid + "&username=" + username + "&content=" + content.value,--}}
                    {{--success: function (e) {--}}
                        {{--if(e === 'ok'){--}}
                            {{--content.value = '';--}}
                            {{--scroll();--}}
                        {{--} else {--}}
                            {{--alert('对话失败');--}}
                        {{--}--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}
        {{--});--}}


        {{--function scroll() {--}}
            {{--var div = document.getElementById('showcontent');--}}
            {{--div.scrollTop = div.scrollHeight;--}}
        {{--}--}}

        {{--function getToken() {--}}
            {{--$.ajax({--}}
                {{--url: "{{ url('talking/getTalk') }}",--}}
                {{--type: "post",--}}
                {{--headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
                {{--data: "room=" + room,--}}
                {{--success: function (e) {--}}
                    {{--if(e.status === 'ok'){--}}
                        {{--document.getElementById('showcontent').innerHTML = e.content;--}}
                    {{--} else {--}}
                        {{--alert('获取对话失败');--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}

        {{--setInterval(getToken, 1000);--}}

    {{--</script>--}}
{{--@endsection--}}