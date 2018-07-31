<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('添加') }} - {{ __('活动分组') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
      <div class="head">
        <div class="nav">
          <div class="back"><img src="/dist/static/img/back.png" alt=""></div>
          <div class="citys">
             <div class="city @if($city == '北京') active @endif">{{ __('北京') }}</div>
             <div class="city @if($city == '上海') active @endif">{{ __('上海') }}</div>
             <div class="city @if($city == '广州') active @endif">{{ __('广州') }}</div>
             <div class="city @if($city == '西安') active @endif">{{ __('西安') }}</div>
             <div class="city @if($city == '苏州') active @endif">{{ __('苏州') }}</div>
          </div>
          <div class="md-toolbar-section-end">
            <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
          </div>
        </div>
      </div>

      <div class="search_bar">
        <div class="num">已分组人数：{{ $do_number }}  |  未分组人数：{{ $undo_number }}</div>
        <div class="serarch_wrap">
          <div class="search">
            <input type="text" placeholder="搜索">
          </div>
          <router-link to="">
            <button class="search_btn">创建一个小组</button>
          </router-link>
        </div>
      </div>

      <div class="group_cards">
        <div class="group_new">
          <div class="df">
            <div class="group_name">
              <label for="">小组名称</label>
              <input type="text">
            </div>
            <div class="black">积分：{{ $user->points }}</div>
          </div>
          <div>
            <div class="leader">组长</div>
            <div class="df wrap">
              <div class="member">
                <img src="/{{ $user->icon }}" alt="">
                <p>{{ $user->name }}</p>
              </div>
            </div>
          </div>
          <div>
            <div class="leader">成员</div>
            <div class="df wrap">
<!--               <div class="member">
                <img src="/dist/static/img/thumb_l.png" alt="">
                <p>Mila Yvovich</p>
              </div>
              <div class="member">
                <img src="/dist/static/img/thumb_l.png" alt="">
                <p>Mila Yvovich</p>
              </div> -->
            </div>
          </div>
          <div class="join_btn">申请加入</div>
        </div>
      </div>
  </div>

  <div class="modal"></div>
  <div class="drawer md-dense dense_r">
    <div class="panel">
      <div class="drawer-title">
        <img class="close_btn" src="/dist/static/img/close_icon.png" alt="">
      </div>
      <div class="thumb_l">
        <img src="/{{ $user->icon }}" alt="">
        <p class="username">{{ $user->name }}</p>
        <input class="username_input" type="text" placeholder="{{ $user->name }}">
        <p class="city">{{ __('城市') }}: {{ $user->city }}</p>
      </div>
      <div class="panel_item">
        <p>{{ __('消息') }}</p>
      </div>
      <div class="panel_item">
        <p>{{ __('排行榜') }}</p>
      </div>
      <button class="md-dense md-raised md-primary">{{ __('设置') }}</button>
    </div>
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
        })
    </script>
</body>
</html>