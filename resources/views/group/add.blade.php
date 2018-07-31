<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('添加') }} - { __('活动分组') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="../static/style/index.css">
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
      <div class="head">

      </div>

      <div class="search_bar">
        <div class="num">已分组人数：270  |  未分组人数：300</div>
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
            <div class="black">积分：800</div>
          </div>
          <div>
            <div class="leader">组长</div>
            <div class="df wrap">
              <div class="member">
                <img src="/static/img/thumb_l.png" alt="">
                <p>Mila Yvovich</p>
              </div>
              <div class="member">
                <img src="/static/img/thumb_l.png" alt="">
                <p>Mila Yvovich</p>
              </div>
            </div>
          </div>
          <div>
            <div class="leader">成员</div>
            <div class="df wrap">
              <div class="member">
                <img src="/static/img/thumb_l.png" alt="">
                <p>Mila Yvovich</p>
              </div>
              <div class="member">
                <img src="/static/img/thumb_l.png" alt="">
                <p>Mila Yvovich</p>
              </div>
            </div>
          </div>
          <div class="join_btn">申请加入</div>
        </div>
      </div>
  </div>

    <script src="../static/vendor/jquery-3.1.1.min.js"></script>
    <script>
        $(function () {

        })
    </script>
</body>
</html>