/*! npm.im/object-fit-images 3.2.4 */
var objectFitImages=function(){"use strict";function t(t,e){return"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='"+t+"' height='"+e+"'%3E%3C/svg%3E"}function e(t){if(t.srcset&&!p&&window.picturefill){var e=window.picturefill._;t[e.ns]&&t[e.ns].evaled||e.fillImg(t,{reselect:!0}),t[e.ns].curSrc||(t[e.ns].supported=!1,e.fillImg(t,{reselect:!0})),t.currentSrc=t[e.ns].curSrc||t.src}}function i(t){for(var e,i=getComputedStyle(t).fontFamily,r={};null!==(e=u.exec(i));)r[e[1]]=e[2];return r}function r(e,i,r){var n=t(i||1,r||0);b.call(e,"src")!==n&&h.call(e,"src",n)}function n(t,e){t.naturalWidth?e(t):setTimeout(n,100,t,e)}function c(t){var c=i(t),o=t[l];if(c["object-fit"]=c["object-fit"]||"fill",!o.img){if("fill"===c["object-fit"])return;if(!o.skipTest&&f&&!c["object-position"])return}if(!o.img){o.img=new Image(t.width,t.height),o.img.srcset=b.call(t,"data-ofi-srcset")||t.srcset,o.img.src=b.call(t,"data-ofi-src")||t.src,h.call(t,"data-ofi-src",t.src),t.srcset&&h.call(t,"data-ofi-srcset",t.srcset),r(t,t.naturalWidth||t.width,t.naturalHeight||t.height),t.srcset&&(t.srcset="");try{s(t)}catch(t){window.console&&console.warn("https://bit.ly/ofi-old-browser")}}e(o.img),t.style.backgroundImage='url("'+(o.img.currentSrc||o.img.src).replace(/"/g,'\\"')+'")',t.style.backgroundPosition=c["object-position"]||"center",t.style.backgroundRepeat="no-repeat",t.style.backgroundOrigin="content-box",/scale-down/.test(c["object-fit"])?n(o.img,function(){o.img.naturalWidth>t.width||o.img.naturalHeight>t.height?t.style.backgroundSize="contain":t.style.backgroundSize="auto"}):t.style.backgroundSize=c["object-fit"].replace("none","auto").replace("fill","100% 100%"),n(o.img,function(e){r(t,e.naturalWidth,e.naturalHeight)})}function s(t){var e={get:function(e){return t[l].img[e?e:"src"]},set:function(e,i){return t[l].img[i?i:"src"]=e,h.call(t,"data-ofi-"+i,e),c(t),e}};Object.defineProperty(t,"src",e),Object.defineProperty(t,"currentSrc",{get:function(){return e.get("currentSrc")}}),Object.defineProperty(t,"srcset",{get:function(){return e.get("srcset")},set:function(t){return e.set(t,"srcset")}})}function o(){function t(t,e){return t[l]&&t[l].img&&("src"===e||"srcset"===e)?t[l].img:t}d||(HTMLImageElement.prototype.getAttribute=function(e){return b.call(t(this,e),e)},HTMLImageElement.prototype.setAttribute=function(e,i){return h.call(t(this,e),e,String(i))})}function a(t,e){var i=!y&&!t;if(e=e||{},t=t||"img",d&&!e.skipTest||!m)return!1;"img"===t?t=document.getElementsByTagName("img"):"string"==typeof t?t=document.querySelectorAll(t):"length"in t||(t=[t]);for(var r=0;r<t.length;r++)t[r][l]=t[r][l]||{skipTest:e.skipTest},c(t[r]);i&&(document.body.addEventListener("load",function(t){"IMG"===t.target.tagName&&a(t.target,{skipTest:e.skipTest})},!0),y=!0,t="img"),e.watchMQ&&window.addEventListener("resize",a.bind(null,t,{skipTest:e.skipTest}))}var l="bfred-it:object-fit-images",u=/(object-fit|object-position)\s*:\s*([-.\w\s%]+)/g,g="undefined"==typeof Image?{style:{"object-position":1}}:new Image,f="object-fit"in g.style,d="object-position"in g.style,m="background-size"in g.style,p="string"==typeof g.currentSrc,b=g.getAttribute,h=g.setAttribute,y=!1;return a.supportsObjectFit=f,a.supportsObjectPosition=d,o(),a}();


//objedt-fit（IE対策）
objectFitImages();

(function($){
  $(function(){

    //ドロワーメニュー
    $('.toggle_nav,.toggle_nav_bg').on('click', function () {
      $('body').toggleClass('open');
    });
    //ドロワーメニューのアコーディオン
    $('.drawer_menu a[href^=#]').click(function(){
      $(this).next('.sub-menu').slideToggle();
      $(this).toggleClass('open_menu');
      return false;//上部にスクロールされる問題を解決
    });

    //ドロワーメニュー内のアンカーリンクをクリックした時にドロワーメニューを閉じる
    $('.drawer_menu .js_close_menu').on('click', function(){
      $('body').removeClass('open');
    });

    //スムーススクロールでドロワーメニューのアコーディオンだけ除外
    $('a[href^="#"]').not('.drawer_menu a').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    //page top
    // var topBtn = $('.pageTop');
    // topBtn.hide();
    // //スクロールが100に達したらボタン表示
    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 100) {
    //          topBtn.fadeIn();
    //     } else {
    //          topBtn.fadeOut();
    //     }
    // });
    // //スクロールしてトップ
    // topBtn.click(function () {
    //   $('body,html').animate({
    //        scrollTop: 0
    //   }, 500);
    //   return false;
    // });
	
		

		$(".pageTop").hide();
		$(window).on("scroll", function() {
				if ($(this).scrollTop() > 100) {
						$(".pageTop").fadeIn("fast");
				} else {
						$(".pageTop").fadeOut("fast");
				}
				scrollHeight = $(document).height();
				scrollPosition = $(window).height() + $(window).scrollTop();
				footHeight = $("footer").innerHeight();
				if ( scrollHeight - scrollPosition  <= footHeight ) {
						$(".pageTop").css({
								"position":"absolute",
								"bottom": footHeight + 1
						});
				} else {
						$(".pageTop").css({
								"position":"fixed",
								"bottom": "10px",
								"right": "10px"
						});
				}
		});
		$('.pageTop').click(function () {
				$('body,html').animate({
				scrollTop: 0
				}, 400);
				return false;
		});



		
    //グローバルナビゲーションにカレント表示する（階層構造にも対応）
    $(".header_nav_list a").each(function(){
      if(this.href == location.href) {
        $(this).parents("li").addClass("current");
      }
    });


    //スマートフォン表示時のみ電話番号にリンクを貼る設定JS
    if(!navigator.userAgent.match(/(iPhone|iPad|Android)/)){
      $("a.tel-link").each(function(){
        $(this).replaceWith("<span>" + $(this).html() + "</span>");
      });
    }

    //PCナビのドロップダウン
    $('.header_nav_list li').hover(function(){
      $("ul:not(:animated)", this).slideDown(200);
    }, function(){
      $("ul.sub-menu",this).slideUp(200);
    });



		var $window = $(window);
		var $targets = $('.js-ani'); 
		var onClass = 'js-ani-on';
		// 初期表示で各要素の座標を判定して処理する
		toggleClassOnScreenEdges(50);
		
		// スクロールするたびに各要素の座標を判定して処理する
		$window.on('scroll', function () {
			toggleClassOnScreenEdges(50);
		});
		
		function toggleClassOnScreenEdges (offset) {/* クラスを付与するときの画面の上辺下辺からの距離 */ 
			if (!offset) {
				offset = 0;
			}
			var scrollTop = $window.scrollTop();
			var scrollBottom = scrollTop + $window.outerHeight();
			$targets.each(function () {
				var $target = $(this);
				var targetTop = $target.offset().top;
				var targetBottom = targetTop + $target.outerHeight();
				
				// 要素の上辺(+offset)が画面の下辺よりも上にあり、
				// 要素の下辺(-offset)が画面の上辺よりも下にあるとき、
				// 要素のすべてが画面の中にあると判定する
				if ((targetTop + offset) < scrollBottom && (targetBottom - offset) > scrollTop) {
					$target.addClass(onClass);
				} else {
					$target.removeClass(onClass);
				}
			});
		}

    $(".custom_gallery").colorbox({
      rel:'slideshow',
      //slideshow:true,
      //slideshowSpeed:3000,
      maxWidth:"90%",
      maxHeight:"90%",
      opacity: 0.7
    });
    $(".lightbox li a").colorbox({
      rel:'slideshow',
      maxWidth:"90%",
      maxHeight:"90%",
      opacity: 0.7
    });

  });
})(jQuery)

new WOW().init();