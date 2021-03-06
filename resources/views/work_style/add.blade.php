<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('我的职场范儿') }} - {{ __('发布') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <link rel="stylesheet" href="/dist/static/style/recommend.css">
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
    opacity: 0;
    width: 100%;
}
.recommendContent .upfile {
    position: relative;
}
.recommendContent .upfile .icon {
    width: 2.1rem;
    height: 1.9rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.recommendContent .upfile img {
    margin: 0;
    width: auto;
    height: auto;
}
#file_img {
    z-index: 99;
    width: 100%;
    max-height: 100%;
}
.file_img {
    width: 100%;
}
.martop1rem .images .item img {
    height: 5.9rem;
}
.martop1rem .textContent {
    border: 1px solid #ccc;
    padding: 10px;
    margin-top: 20px;
}
.martop1rem .textContent textarea {
    border: 0;
    resize: none;
    outline: none;
}
.martop1rem .images.col-2 {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
}
.martop1rem .images.col-2  .item img {
    height: auto;
}
.loading {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    z-index: 9999;
    display: none;
}
.loading.active {
    display: block;
}
.loading img {
    width: 50px;
    height: 50px;
}
</style>
<body>

<div class="index-container">
    <header class="head">
        <div class="nav">
            <a href="/workstyle"><div class="back"><img src="/dist/static/img/back.png" alt=""></div></a>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    <section>
        <div class="recommendTop">
            <a href="/workstyle">
            <div class="blacktitle">
                {{ __('取消') }}
            </div>
            </a>
        </div>
        <div class="modal"></div>
        <div class="loading"><img src="/dist/static/img/loading.gif" alt=""></div>
        <div class="recommendContent">
            <div class="martop1rem">
                <form action="" id="uploadForm" method="post" enctype="multipart/form-data">
                    <div class="images col-2" id="up_imgs">
                        <div class="item upfile upfile_input_first">
                            <div class="file_img_up">
                                <img class="file_img" src="/dist/static/img/add-b.png">
                            </div>
                            <input class="file" type="file" name="file"/>
                        </div>
                    </div>
                </form>
                <div class="textContent">
                    <textarea id="up_cont" placeholder="|{{ __('这一刻的想法') }}..."></textarea>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="bootmbuttonSmall">
            {{ __('发布') }}
        </div>
    </footer>
    @include('include.sidebar')
</div>


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

            var img_arr = []
            var formData = new FormData();
            $('#back').on('click', function() {window.history.back()})
            $('.file').on('change', function (e) {
                var _this = $(this);
                var is_last = false;
                if ($('.remove_input').length === 1) {
                    is_last = true
                }
                var file = e.currentTarget.files[0];
                formData.append("image", file);
                $.ajax({
                    url: '/api/image/upload',
                    dataType: 'JSON',
                    data: formData,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (res) {
                        $('.loading, .modal').addClass('active')
                        img_arr.push(res.data.path);
                        if (is_last) {
                            _this.siblings('.file_img_up').children('.file_img').attr('src', res.data.path)
                        } else {
                            var img_div = "<div class='item upfile'>" +
                            "<img class='file_img remove_input'" + "src=" +  res.data.path +
                            ">"
                            $('#up_imgs').append(img_div)
                        }
                        $('.file_img').on('load', function () {
                            $('.loading, .modal').removeClass('active')
                        })
                    }
                })
            })

            $('.bootmbuttonSmall').on('click', function () {
                if (img_arr.length === 0) {
                    alert('请上传图片')
                    return false
                }
                if (!$("#up_cont").val()) {
                    alert('请发表您的想法')
                    return false
                }
                let img_str = img_arr.join(',')
                console.log(img_str)
                $.ajax({
                    url: '/api/workstyle/add',
                    data: {
                        content: $("#up_cont").val(),
                        photos: img_str
                    },
                    success: function(res) {
                        if (res.code === 0) {
                            window.location.href = '/workstyle';
                        } else {
                            alert(res.error_msg)
                        }
                    }
                })
            })
    })

</script>
</body>
</html>