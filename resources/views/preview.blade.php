<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('精彩预告') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <style>
      .city a {
        color: #fff;
      }
      .send_btn {
          position: absolute;
          right: 0;
          bottom: 0;
          width: 46px;
          background: #ef3d42;
          top: 0;
      }
      .send_btn img {
          position: absolute;
          width: 100%;
          top: 50%;
          left: 0;
          right: 0;
          margin-top: -17px;
      }
      .preview_textarea_wrap {
          margin: 20px;
          padding: 10px 60px 10px 10px;
          border: 1px solid #eee;
          box-shadow: inset 0 0 20px -8px rgba(0,0,0,0.5);
          position: relative;
          box-sizing: border-box;
      }
      .preview_cont {
        position: relative;
        display: block;
        padding-left: 50px;
      }
      .preview_cont .l {
        display: block;
        position: absolute;
        left: 0;
        top: 10px;
      }
      .preview_cont .r .i {
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        align-items: center;
        padding-top: 5px;
      }
      .preview_cont .r .i h4 {
        margin: 0;
      }
      .preview_cont .time {
        font-size: 12px;
      }
      .preview_cont .c {
        line-height: 1.5;
        margin-top: 4px;
      }
      .preview_cont .c p {
        margin: 0;
      }
      .preview_card .btn {
        padding: 10px 20px;
      }
      .preview_conts {
        display: none;
      }
      .preview_card .preview_txt {
        padding: 5px 20px 54px;
      }
      .preview_card .btn.expand {
        left: 20px;
        right: auto;
      }
    </style>
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
     <div class="head">
     <div class="nav">
       <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
       <div class="citys">
         <div class="city @if($week == 1) active @endif"><a href="/preview/1">{{ __('第一周') }}</a></div>
         <div class="city @if($week == 2) active @endif"><a href="/preview/2">{{ __('第二周') }}</a></div>
         <div class="city @if($week == 3) active @endif"><a href="/preview/3">{{ __('第三周') }}</a></div>
         <div class="city @if($week == 4) active @endif"><a href="/preview/4">{{ __('第四周') }}</a></div>
         <div class="city @if($week == 5) active @endif"><a href="/preview/5">{{ __('第五周') }}</a></div>
       </div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

    <div class="preview_cards">
      @if(count($weeknotices)>0)
      @foreach ($weeknotices as $o)
      <div class="pre_card_triger_comment">
      <div class="pre_card" data_id="{{ $o->id }}">
      <div class="preview_card">
        <img src="{{ $o->icon }}" alt="">
        <div class="preview_txt">
          <h4>{{ $o->name }}</h4>
          <p>{{$o->start_date}}</p>
          <div class="btn expand" data_id="{{ $o->id }}">{{ __('展开留言') }}</div>
          <div class="btn comment_btn" data_id="{{ $o->id }}">{{ __('我要提问') }}</div>
        </div>
      </div>
        <div class="preview_textarea_wrap" style="display: none">
            <textarea class="preview_textarea" name="" cols="5"></textarea>
            <div class="send_btn">
                <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
            </div>
        </div>
      </div>



    <div class="preview_conts">
      @if(count($o->faqs)>0)
      @foreach ($o->faqs as $q)
      <div class="preview_cont">
        <div class="l">
          <img src="/{{ $q->user->icon }}" alt="">
        </div>
        <div class="r">
          <div class="i">
            <h4>{{ $q->user->name }}</h4>
            <span class="time">{{ $q->created_at }}</span>
          </div>
          <div class="c">
              <p>{{ $q->content }}</p>
          </div>
        </div>
      </div>
      @endforeach
      </div>
      @endif
    </div>


      @endforeach
      @endif
    </div>
    <div class="modal"></div>
    @include('include.sidebar')
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

            $('.pre_card_triger_comment').on('click', function () {
              $(this).children('.preview_conts').fadeToggle()
            })

            var weeknotice_id;
            // $('.pre_card').on('click', function () {
            //   weeknotice_id = $(this).attr('data_id');
            //   $(this).children('.preview_textarea_wrap').fadeToggle().children('.preview_textarea').focus();
            // })
            $('.comment_btn').on('click', function (event) {
              event.stopPropagation();
              weeknotice_id = $(this).attr('data_id');
              let parent = $(this).parents('.pre_card')
              parent.children('.preview_textarea_wrap').fadeToggle().children('.preview_textarea').focus();
            })
            $('.preview_textarea').on('click', function (event) {
                event.stopPropagation();
            })
            $('.send_btn').on('click', function (event) {
              var content = $(this).siblings('.preview_textarea').val();
              event.stopPropagation();
              // if (event.keyCode == 13) {
                $.ajax({
                  url: '/api/ask',
                  data: {
                    weeknotice_id: weeknotice_id,
                    content: content
                  },
                  success: function (res) {
                    if (res.code == 0) {
                      window.location.reload();
                    } else {
                      alert(res.error_msg)
                    }
                  }
                })
              // }
            })
        })
    </script>
</body>
</html>