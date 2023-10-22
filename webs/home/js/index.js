$(function() {
    var mySwiper1 = new Swiper('.swiper1', {
        loop: true, // 循环模式选项
        // 如果需要分页器
        pagination: {
            el: '.pagination1',
            clickable: true
        }
    })

    // 手风琴

     // 初始化 第一个 状态
// 	  jQuery('.dh ul li.curr').animate({width:'50%'},'slow');
// 	  jQuery('.dh ul li.curr .layer').animate({height:'60px'},'slow');
// 	  jQuery('.dh ul li.curr .layer .p1').animate({left:'-200%'},'slow');
// 	  jQuery('.dh ul li.curr .layer .p2').animate({right:'70%'},'slow');

// 	  jQuery('.sfq ul li').hover(function(){
// 		// 获取索引
// 		 var _index = $(this).index();

// 		 $(this).addClass('curr')
// 		 .stop()
// 		 .animate({
// 			width:'50%'
// 		 },'slow')
// 		 .siblings()
// 		 .stop()
// 		 .animate({
// 			width:'15%'
// 		 },'slow')
// 		 .removeClass('curr');

// 		 $(this).find('.layer').stop().animate({height:'60px'},'slow').parent().siblings().find('.layer').stop().animate({
// 			 height: '100%'
// 		 },'slow');

// 		 $(this).find('.layer .p1').stop().animate({left:'-200%'},'slow').siblings('.p2').stop().animate({
// 			 right: '70%'
// 		 },'slow').parent().parent().siblings().find('.layer .p1').stop().animate({left:'10px'},'slow').siblings('.p2').stop().animate({
// 			 right: '-200%'
// 		 },'slow')

// 	  },function(){
// 		//移出

// 	  })
})