     <style>
       .panel_item {
         padding: 0;
       }
       .panel_item p {
         padding: 20px 0;
       }
     </style>
     <div class="modal"></div>
     <div class="drawer md-dense dense_r">
        <div class="panel">
          <div class="drawer-title">
            <img class="close_btn" src="/dist/static/img/close_icon.png" alt="">
          </div>
          <div class="thumb_l">
            <img src="/{{ $user->icon }}" alt="">
            <p class="username">{{ $user->name }}</p>
            <input style="display: none" class="username_input" type="text" placeholder="{{ $user->name }}">
            <p class="city">{{ __('城市') }}: {{ __($user->city) }}</p>
          </div>
          <div class="panel_item">
            <p>{{ __('消息') }}</p>
          </div>
          <div class="panel_item">
            <a href="/group/points/list"><p>{{ __('排行榜') }}</p></a>
          </div>
          <div class="panel_item">
            <a href="JavaScript:;" id="qiandao"><p>{{ __('每日签到') }}</p></a>
          </div>
          <div class="panel_item" style="margin:5px 0;">
            <span>{{ __('语言切换') }}</span><br>
            <span class= "changeLang1" style="font-size:15px;@if($lang == 'zh_cn') color:#ef3d42; @else color:#000; @endif font-weight:700;">{{ __('中文') }}</span>|
            <span class= "changeLang2" style="font-size:15px;@if($lang == 'en') color:#ef3d42; @else color:#000; @endif font-weight:700;">EN</span>
          </div>
          <div class="panel_item">
            <a href="/logout"><p style="color:#ef3d42;">{{ __('退出') }}</p></a>
          </div>
          <button class="setting md-dense md-raised md-primary">{{ __('设置') }}</button>
          <button style="display: none" class="save md-dense md-raised md-primary">{{ __('保存') }}</button>
        </div>
      </div>

      <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
      <script>
        $('#qiandao').on('click', function () {
            $.ajax({
                url: '/api/qiandao',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.code === 0) {
                        alert("{{ __('签到成功') }}")
                    }
                    else if (data.code === 2) {
                        alert(data.error_msg)
                    }
                    else{
                      alert(data.data)
                    }
                    //window.location.reload();
                }
            })
        });
        $('.changeLang1').on('click', function () {
            var language = 'zh_cn';
            $.ajax({
                url: '/api/change/language?lang=' + language,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    window.location.reload();
                }
            })
        });
        $('.changeLang2').on('click', function () {
            var language = 'en';
            $.ajax({
                url: '/api/change/language?lang=' + language,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    window.location.reload();
                }
            })
        });
        $('.setting').on('click', function () {
          var _this = $(this);
          $('.save').show();
          $(this).hide();
          $('.username_input').show().siblings('.username').hide()
        });
        $('.save').on('click', function() {
          var _this = $(this);
          $('.setting').show();
          $(this).hide();
          var name = $('.username_input').val();
          $('.username').show().siblings('.username_input').hide();
          $.ajax({
            url: '/api/user/update',
            data: {
              name: name
            },
            success: function (res) {
              $('.username').text(res.data.name)
            }
          })
        })
      </script>