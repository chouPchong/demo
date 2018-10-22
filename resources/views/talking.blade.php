<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>talking...</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #000;
            color: #fff;
            font-family: "Al Bayan";

        }
        #showcontent {
            width: 100%;
            height: 500px;
            overflow: auto;
        }

        #content {
            width: 100%;
            height: 200px;
            border-top: 2px solid #fff;
        }
        #text {
            width: 100%;
            height: 100%;
            background-color: #000;
            color: #fff;
            border: 0px;
        }
    </style>
</head>
<body>
    <div id="showcontent"></div>
    <div id="content">
        <textarea name="content" id="text"></textarea>
    </div>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        var info = location.search;
        var arr = info.match(/\?room=(.+)&userid=(\d+)&username=(.+)/);
        var room = arr[1];
        var userid = arr[2];
        var username = arr[3];

        $('#text').bind('keydown', function(e){
            // 兼容FF和IE和Opera
            var theEvent = e || window.event;
            var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
            if (code == 13) {
                var content = document.getElementById('text');
                $.ajax({
                    url: "{{ url('talking/save') }}",
                    type: "post",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: "room=" + room + "&userid=" + userid + "&username=" + username + "&content=" + content.value,
                    success: function (e) {
                        if(e === 'ok'){
                            content.value = '';
                            scroll();
                        } else {
                            alert('对话失败');
                        }
                    }
                })
            }
        });


        function scroll() {
            var div = document.getElementById('showcontent');
            div.scrollTop = div.scrollHeight;
        }

        function getToken() {
            console.log(3)
            $.ajax({
                url: "{{ url('talking/getTalk') }}",
                type: "post",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: "room=" + room,
                success: function (e) {
                    if(e.status === 'ok'){
                        document.getElementById('showcontent').innerHTML = e.content;
                    } else {
                        alert('获取对话失败');
                    }
                }
            });
        }

        setInterval(getToken, 1000);

    </script>
</body>
</html>
