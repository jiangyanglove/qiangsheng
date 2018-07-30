<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('首页') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

  <div class="index-container">
    <div class="head">
      <div class="nav">
        <div class="menu_icon"></div>
        <img class="logo_img" src="/dist/static/img/logo_white.png" alt="">
        <div class="md-toolbar-section-end">
          <div class="thumb"><img src="/{{ $user->icon}}" alt=""></div>
        </div>
      </div>
    </div>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide banner"><img src="/dist/static/img/banner.png" alt=""></div>
        <div class="swiper-slide banner"><img src="/dist/static/img/banner.png" alt=""></div>
        <div class="swiper-slide banner"><img src="/dist/static/img/banner.png" alt=""></div>
      </div>
    </div>
      <a href="/group">
      <div class="active_card">
          <img src="/dist/static/img/Photo.png" alt="">
          <div class="card_r">
            <h3>{{ __('活动分组') }}</h3>
            <p>{{ __('请大家组队参与小组积分赛，每组需要8名成员，累计积分排名前三的小组将获得奖品。') }}</p>
          </div>
      </div>
      </a>

      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('精彩预告') }}</h3>
          <p>{{ __('这里有全部的活动资讯，欢迎关注查看。活动问题收集：请提交与活动分享主题相关的提问，现场由讲师进行回答。') }}</p>
        </div>
      </div>
      </a>
      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('DISC测试') }}</h3>
          <p>{{ __('完成DISC性格测试，揭秘你是超级英雄里的哪一位。') }}</p>
        </div>
      </div>
      </a>
      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('读书的力量') }}</h3>
          <p>{{ __('推荐共享好书，交流阅读心得，助力职业成长。') }}</p>
        </div>
      </div>
      </a>
      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('我的职场范儿') }}</h3>
          <p>{{ __('发布职业、生活的对比照。拍完职业照， 才知道我有多职业。') }}</p>
        </div>
      </div>
      </a>
      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('自由讨论') }}</h3>
          <p>{{ __('发起与职业发展主题相关话题，自由交流、相互探讨。') }}</p>
        </div>
      </div>
      </a>
      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('每周回顾') }}</h3>
          <p>{{ __('每周一篇新闻速递，带你回顾当周亮点。') }}</p>
        </div>
      </div>
      </a>
      <a href="">
      <div class="active_card">
        <img src="/dist/static/img/thumb_l.png" alt="">
        <div class="card_r">
          <h3>{{ __('未来邮局') }}</h3>
          <p>{{ __('写下自己的感悟和计划，在未来通过行动让改变发生。') }}</p>
        </div>
      </div>
      </a>
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
        })
    </script>
</body>
</html>
