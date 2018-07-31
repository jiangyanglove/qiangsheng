<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('活动分组') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
     <div class="head">
     <div class="nav">
       <div class="back"><img src="/static/img/back.png" alt=""></div>
       <div class="citys">
         <div class="city @if($city == '北京') active @endif">{{ __('北京') }}</div>
         <div class="city @if($city == '上海') active @endif">{{ __('上海') }}</div>
         <div class="city @if($city == '广州') active @endif">{{ __('广州') }}</div>
         <div class="city @if($city == '西安') active @endif">{{ __('西安') }}</div>
         <div class="city @if($city == '苏州') active @endif">{{ __('苏州') }}</div>
       </div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/static/img/thumb.png" alt=""></div>
       </div>
     </div>
     </div>

     <div class="search_bar">
       <div class="num">已分组人数：{{ $do_number }}  |  未分组人数：{{ $undo_number }}</div>
       <div class="serarch_wrap">
         <div class="search">
           <input type="text" placeholder="搜索">
         </div>
         <router-link to="/group/new">
           <button class="search_btn">创建一个小组</button>
         </router-link>
       </div>
     </div>

     <div class="group_cards">
      @foreach ($groups as $key=>$group)
       <div class="group_card">
         <div class="df item">
           <div class="red">小组名称：{{ $group->name }}</div>
           <div class="black">积分：{{ $group->points }}</div>
         </div>
         <div class="item member">
           <span class="fw">{{ $group->leader->name }}(组长)</span>
           @foreach ($group->members as $key=>$member)
           <span>{{ $member->user->name }}</span>
           @endforeach
         </div>
         <div class="join_btn">申请加入</div>
       </div>
       @endforeach
     </div>

    <div class="modal"></div>
     <div class="drawer md-dense dense_r">
        <div class="panel">
          <div class="drawer-title">
            <img class="close_btn" src="/static/img/close_icon.png" alt="">
          </div>
          <div class="thumb_l">
            <img src="/static/img/thumb_l.png" alt="">
            <p class="username">userName</p>
            <input class="username_input" type="text" placeholder="userName">
            <p class="city">城市: 北京</p>
          </div>
          <div class="panel_item">
            <p>消息</p>
          </div>
          <div class="panel_item">
            <p>排行榜</p>
          </div>
          <button class="md-dense md-raised md-primary">设置</button>
        </div>
      </div>
 </div>

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script>
        $(function () {
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