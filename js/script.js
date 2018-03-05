(function ($) {
    //fix for admin bar

    /**
     * 滑动页面后固定导航栏
     */
    $(window).scroll(function () {
        var scrollValue = $('.site-branding').outerHeight();
        if($(document).scrollTop() > scrollValue){
            $('.main-navigation').addClass('fixed-top');
        }else{
            $('.main-navigation').removeClass('fixed-top');
        }

        if ($('#wpadminbar')[0] && $('.main-navigation').hasClass('fixed-top')){
            $('#site-navigation').css('top', '32px');
        }else {
            $('#site-navigation').css('top', '0');
        }
    })

    /**
     * 有二级菜单项的鼠标移入自动展开
     */
    $(".menu-item-has-children").mouseenter(function() {
        //鼠标移入时给一级菜单添加sfHover这个class，然后清除二级菜单动画队列，并显示二级菜单
        $(this).children("ul").stop(true,true).slideDown(200);
    }).mouseleave(function() {
        //鼠标移出时清除class，并隐藏二级菜单
        $(this).children("ul").stop(true,true).slideUp(200);
    });

    /**
     * 导航菜单 添加 active类
     */
    $(".menu-top").find("li").each(function () {
        var a = $(this).find("a:first")[0];
        if ($(a).attr("href") === location.pathname) {
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
    });

    /**
     * 为markdown添加 prism 的代码类
     */
    $("code").each(function() {
        var className = $(this).attr('class');
        if(className && !(className.lastIndexOf('language-', 0) === 0)) {
             // No language, prepend
             $(this).attr('class', 'language-' + className);
         }
     });


})(jQuery);