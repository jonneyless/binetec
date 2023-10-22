$(function() {
    $('.recruit-box ul li .position').find('.shouqi-icon').css('display', 'none')
    $('.recruit-box ul li').on('click', '.position', function() {
        $(this).next().toggle(200)
        $(this).find('.zhankai-icon').toggle()
        $(this).find('.shouqi-icon').toggle()
    })
})