<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('推荐书籍') }} - {{ __('读书的力量') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <link rel="stylesheet" href="/dist/static/style/release.css">
    <script type="text/javascript">
        　　document.documentElement.style.fontSize = document.documentElement.clientWidth / 23.3 + 'px';
    </script>
</head>
<style>
.upfile {
    position: relative;
}
.upfile input {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    /* opacity: 0; */
}
</style>
<body>

<div class="index-container">
    <header class="head">
        <div class="nav">
            <div class="back"><a href="javascript:history.back(-1)"><img src="/dist/static/img/back.png" alt=""></a></div>
            <div class="citys">
                <div class="city active"><a href="/reading/new">{{ __('最新') }}</a></div>
                <div class="city"><a href="/reading/hot">{{ __('热门') }}</a></div>
            </div>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    <section>
        <div class="recommendTop">
            <div class="blacktitle">
                {{ __('取消') }}
            </div>
        </div>
        <div class="recommendContent">
            <form action="" id="uploadForm" method="post" enctype="multipart/form-data">
                <div class="upfile">
                    <input id="file" type="file" name="file"/>
                    <img src="/dist/static/img/xiangji.png" alt="">
                </div>
            </form>
            <div class="bookname">
                <span>{{ __('书名') }}：</span>
                <input  id="bookname" type="text" >
            </div>
            <div class="desc">
                <span>{{ __('简介') }}：</span>
                <textarea id="desc"></textarea>
            </div>
        </div>
    </section>
    <footer>
        <div class="bootmbutton">
            发布
        </div>
    </footer>
</div>

@include('include.sidebar', ['user' => $user])
<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>

    $(function () {
        $('.sex_item').on('click', function() {
                $(this).addClass('active').siblings('.sex_item').removeClass('active')
            })
            $('.lang_item').on('click', function() {
                $(this).addClass('active').siblings('.lang_item').removeClass('active')
            })

            $('.menu_icon').on('click', function() {
              $('.drawer_l, .modal').addClass('active')
              $('.index-container').addClass('hide')
            })
            $('.modal, .close_btn').on('click', function() {
              $('.drawer_l, .dense_r, .modal').removeClass('active')
              $('.index-container').removeClass('hide')
            })
            $('.drawer_item').on('click', function() {
              $(this).children('.md-inset').toggleClass('active');
              $(this).siblings('.drawer_item').children('.md-inset').removeClass('active')
            })
            $('.thumb').on('click', function() {
              $('.dense_r, .modal').addClass('active')
              $('.index-container').addClass('hide')
            })

            $('#file').on('change', function (e) {
                var file = e.currentTarget.files[0];
                var formData = new FormData();
                formData.append("image", file);
                $.ajax({
                    url: '/api/image/upload',
                    data: {
                        image: formData
                    },
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (res) {
                        console.log(res)
                    }
                })
            })

            $('.bootmbutton').on('click', function () {
                var bookname = $('#bookname').val();
                var desc = $('#desc').val();
                var formData = new FormData();
                var file = $('#file')[0].files[0];
                console.log(file)
                formData.append('file', file);
                console.log(formData)
                if (!bookname) {
                    alert('请填写书名')
                    return false
                }
                if (!desc) {
                    alert('请填写描述')
                    return false
                }
                $.ajax({
                    url: '/api/reading/add?icon=uploads/5b5ca47754f01.jpg&name=hello&description=wocaonima',
                    data: {
                        icon: 'uploads/5b5ca47754f01.jpg',
                        name: bookname,
                        description: desc
                    },
                    success: function(res) {
                        window.location.href = '/reading';
                    }
                })
            })
    })

</script>
</body>
</html>