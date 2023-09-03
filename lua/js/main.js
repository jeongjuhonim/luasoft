

$(function(){

  // Scroll Animation (sa, 스크롤 애니메이션) start
    const saDefaultMargin = 50;
    let saTriggerMargin = 0;
    let saTriggerHeight = 0;
    const saElementList = document.querySelectorAll('.sa');

    const saFunc = function() {
    for (const element of saElementList) {
    if (!element.classList.contains('show')) {
          if (element.dataset.saMargin) {
            saTriggerMargin = parseInt(element.dataset.saMargin);
          } else {
            saTriggerMargin = saDefaultMargin;
          }

          if (element.dataset.saTrigger) {
            saTriggerHeight = document.querySelector(element.dataset.saTrigger).getBoundingClientRect().top + saTriggerMargin;
          } else {
            saTriggerHeight = element.getBoundingClientRect().top + saTriggerMargin;
          }

          if (window.innerHeight > saTriggerHeight) {
            let delay = (element.dataset.saDelay) ? element.dataset.saDelay : 0;
            setTimeout(function() {
              element.classList.add('show');
            }, delay);
          }
        }
      }
    }

    window.addEventListener('load', saFunc);
    window.addEventListener('scroll', saFunc);
  // Scroll Animation (sa, 스크롤 애니메이션) end


  // cont_us_pop start
  //팝업 열기
       $('.pro_btn, .contact').on('click', function() {
          $('.cont_pop').show();
          $('body').css('overflow','hidden');
       });

       //팝업 닫기
       $('.bg, .close_btn').on('click', function() {
          $(this).parents('.cont_pop').hide();
          $('body').css('overflow','auto');
       });
  // cont_us_pop end

  // port_pop start
  $('.port_btn, .head_port').on('click', function() {
     $('.port_pop').show();
     $('body').css('overflow','hidden');
  });

  //팝업 닫기
  $('.bg, .close_btn').on('click', function() {
     $(this).parents('.port_pop').hide();
     $('body').css('overflow','auto');
  });
  // port_btn_pop end


});


$(window).resize(function(){
if (window.innerWidth > 480) {  // 다바이스 크기가 480이상일때
  var swiper = new Swiper(".up_swiper", {
        slidesPerView: 2.2,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
/* 스크립트내용*/

} else {
  var swiper = new Swiper(".up_swiper", {
          slidesPerView: 1.2,
          spaceBetween: 30,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });

/* 스크립트내용*/

}

}).resize();




//
