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
          <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
        </div>
      </div>
    </div>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide banner">@if($lang == 'en')<img src="/dist/static/img/banner1_en.png" alt="">@else<img src="/dist/static/img/banner1.png" alt="">@endif</div>
        <div class="swiper-slide banner"><img src="/dist/static/img/banner.png" alt=""></div>
        <!-- <div class="swiper-slide banner"><img src="/dist/static/img/banner.png" alt=""></div> -->
      </div>
    </div>
      <a href="/group/{{ $user->city }}">
      <div class="active_card">
          <img src="/dist/static/img/Photo.png" alt="">
          <div class="card_r">
            <h3>{{ __('活动分组') }}</h3>
            <p>{{ __('请大家组队参与小组积分赛，每组需要8名成员，累计积分排名前三的小组将获得奖品。') }}</p>
          </div>
      </div>
      </a>

      <a href="/preview">
      <div class="active_card">
        <img src="/dist/static/img/m2.png" alt="">
        <div class="card_r">
          <h3>{{ __('精彩预告') }}</h3>
          <p>{{ __('这里有全部的活动资讯，欢迎关注查看。活动问题收集：请提交与活动分享主题相关的提问，现场由讲师进行回答。') }}</p>
        </div>
      </div>
      </a>
      <a href="/hero/test">
      <div class="active_card">
        <img src="/dist/static/img/m4.png" alt="">
        <div class="card_r">
          <h3>{{ __('DISC测试') }}</h3>
          <p>{{ __('完成DISC性格测试，揭秘你是超级英雄里的哪一位。') }}</p>
        </div>
      </div>
      </a>
      <a href="/reading">
      <div class="active_card">
        <img src="/dist/static/img/book.png" alt="">
        <div class="card_r">
          <h3>{{ __('读书的力量') }}</h3>
          <p>{{ __('推荐共享好书，交流阅读心得，助力职业成长。') }}</p>
        </div>
      </div>
      </a>
      <a href="/fan">
      <div class="active_card">
        <img src="/dist/static/img/fan.png" alt="">
        <div class="card_r">
          <h3>{{ __('我的职场范儿') }}</h3>
          <p>{{ __('发布职业、生活的对比照。拍完职业照， 才知道我有多职业。') }}</p>
        </div>
      </div>
      </a>
      <a href="/freetalk">
      <div class="active_card">
        <img src="/dist/static/img/freetalk.png" alt="">
        <div class="card_r">
          <h3>{{ __('自由讨论') }}</h3>
          <p>{{ __('发起与职业发展主题相关话题，自由交流、相互探讨。') }}</p>
        </div>
      </div>
      </a>
      <a href="/weeklook">
      <div class="active_card">
        <img src="/dist/static/img/week.png" alt="">
        <div class="card_r">
          <h3>{{ __('每周回顾') }}</h3>
          <p>{{ __('每周一篇新闻速递，带你回顾当周亮点。') }}</p>
        </div>
      </div>
      </a>
      <a href="/post/letter">
      <div class="active_card">
        <img src="/dist/static/img/post.png" alt="">
        <div class="card_r">
          <h3>{{ __('未来邮局') }}</h3>
          <p>{{ __('写下自己的感悟和计划，在未来通过行动让改变发生。') }}</p>
        </div>
      </div>
      </a>

      <div class="modal"></div>
      <div class="drawer drawer_l md-dense">
        <div class="drawer-title">
          <img class="close_btn" src="/dist/static/img/close_icon.png" alt="">
        </div>
        <div class="drawer-inside">
          <div class="drawer_item">
            <span class="md-list-item-text">{{ __('网站分组规则') }}</span>
              <div class="md-inset">
                <h4>{{ __('分组须知') }}</h4>
                <p>
                  1.{{ __('请大家组队参与小组积分赛，每组需要8名成员，累计积分排名前三的小组将获得奖品。') }}<br>
                  2.{{ __('在8月3日前完成小组组建的用户可获得每人+3分的奖励，过此时限其它用户将被随机分组，随机分组没有加分。') }}</p>
                <h4>{{ __('分组操作') }}</h4>
                <p>
                  1.{{ __('用户可登陆分组页面，在所属区域新建小组，创建者为组长。') }}
                </p>
                <p>
                  2.{{ __('用户也可在分组页面选择已有小组并点击加入，小组满8人后加入功能将关闭。') }}
                </p>
              </div>
          </div>

          <div class="drawer_item">
            <span class="md-list-item-text">{{ __('网站积分规则') }}</span>

              <div class="md-inset">
                <h4>{{ __('积分分类') }}:</h4>
                <p>
                  1.{{ __('个人积分：通过参与线上和线下互动获得积分。截止8月31日下午6点，积分停止累积。') }} <br>
                  2.{{ __('小组积分：通过参与线上和线下互动获得积分，截止8月31日下午6点，积分停止累积。') }}</p>
                <h4>{{ __('分值参考') }}:</h4>
                <p>［{{ __('线上互动') }}］</p>
                <p>
                  1.  {{ __('每日签到每天将获得1分。') }}<br>
                  2.  {{ __('8月3日下午6点前完成建组， 每人+3 分。') }}<br>
                  3.  {{ __('参加性格测试，每人+5分。') }}<br>
                  4.  {{ __('参与线下活动扫码打卡将获得每活动每次2分。') }}<br>
                  5.  {{ __('精彩预告板块，对每个线下活动的第一条提问可获得2分（至多：活动数x2分），之后发布不获得积分。') }}<br>
                  6.  {{ __('读书的力量板块，发布图书推荐前三本将每个获得5分（至多15分），之后发布不获得积分。') }}<br>
                  7.  {{ __('我的职场范儿板块，第一次发布照片将获得5分（至多5分），之后发布不获得积分。') }}<br>
                  8.  {{ __('将未来邮局板块内容第一次转发至自由讨论区将获得5分（至多5分），之后发布不获得积分。') }}<br>
                  9.  {{ __('自由讨论区板块发布的前三条话题每条将获得3分（至多9分），之后发布不获得积分。')}}<br>
                  10.  {{ __('职职业发展月结束后，读书的力量板块图书获得点赞前三名分别获得，30/20/10分。')}}<br>
                  11.  {{ __('活动结束后如出现平分，将按照建立小组时间早晚/发布内容获得点赞数量多少/初次签到早晚来额外评判。')}}
                </p>
                <p>［{{ __('线下互动') }}］</p>
                <p>{{ __('参与线下活动，扫描二维码进行签到打卡，每人+2分（可关注活动预览区内容，及时了解活动信息）') }}</p>
              </div>

          </div>

          <div class="drawer_item">
            <span class="md-list-item-text">{{ __('奖品兑换规则') }}</span>

              <div class="md-inset">
                <p>1.{{ __('小组累积积分前3名的组别每人获得一个胶囊咖啡机。') }}</p>
                <img class="pre1" src="/dist/static/img/pre1.png" alt="">
                <p>2.{{ __('个人累积积分') }}</p>
                <div class="flex_img">
                  <div class="item">
                    <p>{{ __('前3名') }}</p>
                    <img src="/dist/static/img/pre2.png" alt="">
                    <p>Kindle<br> Paperwhite<br>{{ __('电子书阅读器一部') }} </p>
                  </div>
                  <div class="item">
                    <p>{{ __('4-10名') }}</p>
                    <img src="/dist/static/img/pre3.png" alt="">
                    <p>{{ __('乐扣') }}<br>{{ __('空气炸锅一台') }} </p>
                  </div>
                  <div class="item">
                    <p>{{ __('11-100名') }}</p>
                    <img src="/dist/static/img/pre4.png" alt="">
                    <p>{{ __('罗技') }}<br>{{ __('蓝牙鼠标M336一枚') }}</p>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>

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