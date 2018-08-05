<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('我的职场范儿') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<style>
  .week {
    display: flex;
    padding: 20px;
    border-bottom: 1px solid #ccc;
  }
  .week .img {
    width: 110px;
    flex-shrink: 0;
    height: auto;
    display: block;
  }
  .week .img img {
    width: 100%;
  }
  .week .r {
    margin-left: 20px;
  }
  .week .r p {
    color: #009fe7;
  }
</style>
<body>

  <div class="index-container">
    <div class="head">
      <div class="nav">
        <div class="menu_icon"></div>
        <img class="logo_img" src="/dist/static/img/logo_white.png" alt="">
        <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
        </div>
      </div>
    </div>

    <div class="weeks">
      <div class="week">
        请稍后
      </div>
    </div>

      <div class="modal"></div>
      @include('include.sidebar')
  </div>

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script src="/dist/static/vendor/swiper-3.4.0.jquery.min.js"></script>
    <script>
        $(function () {
           var mySwiper = new Swiper ('.swiper-container', {
             loop: true
           })
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
        })
    </script>
</body>
</html>