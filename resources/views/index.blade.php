
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{{ __('首页') }} - {{ __('中国强生财务职业发展月') }}</title>
<style>
  .black{
    background-color:#000
  }
  .comingsoon{
    font-family: 微软雅黑;
    color:#fff;
    font-size:30px;
    color：#666666;
    text-align:center;
    margin-top:150px;
  }
  .language{
    margin-top:50px;
    text-align:center;
    color: #fff;
    font-size: 16px;
  }
  .language a {
      padding: 5px;
      font-size: 16px;
      text-decoration: none;
      color: #fff;
  }

  .language a.active{
    color: #fff100;
    text-decoration: underline;
  }
</style>
<script src="/js/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(function(){
    $('.language a').on('click',function(){
      var language = 'en';
      if($(this).index() == 1){
        language = 'zh_cn';
      }
      $.ajax({
        url:'/api/change/language?lang='+language,
        type:'GET',
        dataType:'json',
        success:function(data){
          window.location.reload();
        }
      })
    })
  })

</script>>
</head>

<body class="black">
<div class="comingsoon">@if($user) {{ __('你好，') }}{{ $user->name }} <br> @endif {{ __('敬请期待……') }}</div>
<div class="language">
    <a @if($lang == 'en') class="active" @endif href="javascript:;">EN</a>/
    <a @if($lang == 'zh_cn') class="active" @endif href="javascript:;">中文</a>
</div>
</body>
</html>
