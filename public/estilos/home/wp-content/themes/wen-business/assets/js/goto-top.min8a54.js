!function(n){n(document).ready(function(n){n("#btn-scrollup").length>0&&(n(window).scroll(function(){n(this).scrollTop()>100?n("#btn-scrollup").fadeIn():n("#btn-scrollup").fadeOut()}),n("#btn-scrollup").click(function(){return n("html, body").animate({scrollTop:0},600),!1}))})}(jQuery);