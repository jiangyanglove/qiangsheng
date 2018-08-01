<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('DISC测评') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <script type="text/javascript">
        　　document.documentElement.style.fontSize = document.documentElement.clientWidth / 23.3 + 'px';
    </script>
</head>
<style>
.bootmbutton {
  text-align: center;
  display: block;
}
</style>
<body>

   <div class="index-container">
     <div class="head">
     <div class="nav">
       <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

    <div class="qu_swiper">
    <div class="swiper-container">
      <div class="swiper-wrapper">

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('一、在同事（同学）眼中您是一位？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:积极、热情、有行动力的人。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:活泼、开朗、风趣幽默的人。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:忠诚、随和、容易相处的人。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:谨慎、冷静、注意细节的人。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('二、您喜欢看哪一类型的杂志？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:管理、财经、趋势类。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:旅游、美食、时尚类。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:心灵、散文、家庭类。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:科技、专业、艺术类。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('三、您做决策的方式？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:希望能立即有效。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:感觉重于一切。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:有时间考虑或寻求他人意见。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:要有详细的资料评估。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('四、职务上哪种工作是我最擅长的？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:以目标为导向，有不服输的精神。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:良好的口才，能主动的与人建立友善关系') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:能配合团队，扮演忠诚的拥护者。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:流程的掌握，注意到细节。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('五、当面对压力时，您会？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:用行动力去面对它，并且克服它。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:希望找人倾吐，获得认同。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:逆来顺受，尽量避免冲突。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:重新思考缘由，必要时做精细的解说。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('六、与同事（同学）之间的相处？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:以公事为主，很少谈到个人生活') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:重视气氛，能够带动团队情趣。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:良好的倾听者，对人态度温和友善。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:被动，不会主动与人建立关系。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('七、您希望别人如何与您沟通？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:直接讲重点，不要拐弯抹角。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:轻松，不要太严肃。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:不要一次说太多，要给予明确的支持。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:凡事说清楚，讲明白。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('八、要完成一件事情时，您最在意的部份是？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:效果是否有达到。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:过程是否快乐。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:前后是否有改变。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:流程是否正确。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('九、什么事情会让您恐惧？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:呈现弱点，被人利用。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:失去认同，被人排挤。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:过度变动，让人无所适从。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:制度不清，标准不一。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data_ans="">
          <div class="qu_wrap">
          <h4  class="title">{{ __('十、哪些是您自觉的缺点？') }}</h4>
          <div class="qu">
            <div class="qu_item" data="A">
              <span>{{ __('A:没有耐心。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="B">
              <span>{{ __('B:欠缺细心。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="C">
              <span>{{ __('C:没有主见。') }}</span>
              <div class="check_box"></div>
            </div>
            <div class="qu_item" data="D">
              <span>{{ __('D:欠缺风趣。') }}</span>
              <div class="check_box"></div>
            </div>
            </div>
          </div>
        </div>

      </div>
      <div class="arrows">
        <div class="swiper-button-prev swiper-button-red"></div>
        <div class="swiper-button-next swiper-button-red"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    <button class="bootmbutton" id="submit">
        {{ __('提交') }}
    </button>


    <div class="modal"></div>
    @include('include.sidebar', ['user' => $user])
 </div>

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script src="/dist/static/vendor/swiper-3.4.0.jquery.min.js"></script>
    <script>
        $(function () {
            var mySwiper = new Swiper ('.swiper-container', {
               loop: false,
               pagination : '.swiper-pagination',
               prevButton:'.swiper-button-prev',
               nextButton:'.swiper-button-next'
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
            var ans_obj = [];
            $('.qu_item').on('click', function(e) {
              e.stopPropagation();
              $(this).addClass('active').siblings('.qu_item').removeClass('active');
              var ans = $(this).attr('data');
              $(this).parent('.qu').attr('data_ans', ans)
              ans_obj[mySwiper.activeIndex] = ans
              console.log(ans_obj)
            })

            $('#submit').on('click', function (e) {
              if (ans_obj.length < 10) {
                alert('请完善题目')
                return false
              }
              var ans_str = ans_obj.join(',')
              $.ajax({
                url: '/api/disc/answer',
                data: {
                  result: ans_str
                },
                success: function(res) {
                  if (res.code === 0) {
                    window.location.href = '/hero/result';
                  }
                  if (res.code === 2 ){
                    alert(res.error_msg)
                    window.history.back()
                  }
                }
              })
            })
        })
    </script>
</body>
</html>