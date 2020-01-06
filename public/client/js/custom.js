jQuery(document).ready(function() {
	jQuery('header').scrollToFixed();
 	window.onscroll = function() {
	    if (window.pageYOffset > 10) {
	        jQuery('header').addClass('on-scroll');
	    } else {
	        jQuery('header').removeClass('on-scroll');
	    }
  	};


  	$('.slide-home').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    dots:false,
	    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	    autoplay:true,
	    items:1
	})

	$('.slide-pro-ctg').owlCarousel({
      // center:true,
	    loop:false,
	    margin:10,
	    nav:true,
	    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	    dots:false,
	    responsive:{
	        0:{
	            items:3
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:6
	        }
	    }
	})

  $('.slide-pro-seen').owlCarousel({
      loop:false,
      margin:10,
      nav:false,
      dots:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  })


  
  $('.sub-cate-title').owlCarousel({
    loop:false,
    margin:0,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        },
        1000:{
            items:5
        }
    }
})

  jQuery( ".form-search>form>input" ).keyup(function() {
    jQuery(this).parent().children('ul.resuiltSearch').slideDown();
      
  });

  jQuery('.product-call-requests>form').click(function() {
    jQuery(this).addClass('show-form-call');
    jQuery(this).children('.call-form-hide').show();
    jQuery(this).find('.btn-tigger').hide();
    jQuery(this).find('.btn-phone-sbmit').show();

    /* Act on the event */
  });

  jQuery('.col_product_view .col-md-8 .show-more>a').click(function(e) {
    e.preventDefault();
    jQuery(this).parents('.col_product_view').find('.description-content').toggleClass('expand');

    var text_btn= jQuery(this).text();
    text_btn = text_btn.replace('Xem thêm','');

    if (jQuery(this).parents('.col_product_view').find('.description-content').hasClass('expand')) {
      jQuery(this).text('Thu gọn');
    }else{
      jQuery(this).text('XEM THÊM');
    }

  });

  jQuery('.col_product_view .col-md-4 .show-more>a').click(function(e) {
    e.preventDefault();
    jQuery(this).parents('.col_product_view').find('.attribute-content').toggleClass('expand');

    var text_btn= jQuery(this).text();
    text_btn = text_btn.replace('Xem thêm thông số','');
    if (jQuery(this).parents('.col_product_view').find('.attribute-content').hasClass('expand')) {
      jQuery(this).text('Thu gọn');
    }else{
      jQuery(this).text('XEM THÊM THÔNG SỐ');
    }

  });

  jQuery('.review-btn .add_review').click(function() {
    jQuery('.form-review').slideToggle();
    
  });


// giỏ hàng
  jQuery('#cart_form .payment-method .sin-payment>input').change(function() {
      if (jQuery(this).is(':checked')) {
        jQuery(this).parent().children('.payment_box.payment_method_bacs').slideDown();
      }else{
        jQuery(this).parent().children('.payment_box.payment_method_bacs').slideUp();
      }
  });

  jQuery('.box-thongtin-sp table tr td .clickDele').click(function(e) {
    e.preventDefault();
    jQuery(this).parent().parent().remove();
    
  });



	
});


$(document).ready(function() {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

  sync1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: false,
    autoplay: true,
    dots: false,
    loop: true,
    responsiveRefreshRate : 200,
    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
  }).on('changed.owl.carousel', syncPosition);

  sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
    items : 7,
    dots: false,
    nav: true,
    smartSpeed: 200,
    slideSpeed : 500,
    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    responsiveRefreshRate : 100
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;
    
    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    
    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }
    
    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();
    
    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
  
  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
  
  sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
});


jQuery(document).ready(function () {
    jQuery('.menu-box .main-menu>li.menu-item-has-children>a').append('<i class="fa fa-angle-right"></i>');
    
    jQuery('.mega-menu .menu>li.menu-item-has-children>a').append('<i class="fa fa-angle-down"></i>');

    jQuery('.menu-site .btn-show-menu').click(function () {
        jQuery(this).parents('.menu-site').find('.menu-box').css('width','100%');
    });
    jQuery('.menu-box .btn-hide-menu, .menu-box .bg-menu').click(function () {
        jQuery(this).parents('.menu-box ').css('width','0');
    });

    if($(window).width()<992){
        jQuery('.main-menu li.menu-item-has-children>a>i').click(function (e) {
            e.preventDefault();
            jQuery(this).parent().parent().children('.sub-menu').slideToggle('fast');
        });
    }

    //  custom lowcase

    function Capliztecus(text){

      let lowCase = text.toLowerCase();

      let first = lowCase.charAt(0);

      let uperFirst = text.charAt(0).toUpperCase();

      lowCase = lowCase.replace(first,"");
      return uperFirst + lowCase;
      
    }

    jQuery('.nav_cate_title .list-text-category a').each( function () { 
        
        let text = jQuery(this).text();
        
        text = text.trim();

        text = Capliztecus(text);

        jQuery(this).text(text);
        
    });

    jQuery('.nav_cate_title').each( ( key , value ) =>{

        let a_w = jQuery(value).find('.viewall').width();

        let main_w = 0;

        let max_w = jQuery(value).width();

        jQuery(value).find('.list-text-category').each((index , item)=>{

            let item_w = jQuery(item).width();

            main_w = main_w + item_w;

        });

        let title_w = jQuery(value).find('.title').width();

        let final_w = main_w + title_w;

        if( ( max_w - a_w  - final_w ) < a_w  ){

            jQuery(value).find('.list-text-category').last().hide();

            // console.log(jQuery(value).find('.list-text-category').last());

        }

        // console.log(max_w - a_w);

        // console.log(final_w + "===");

    });

    //  beautiful filter
    if(jQuery('#form_filter').length > 0 && jQuery(window).width() < 992 ){

      let count_elm = jQuery('#form_filter .boxFilterLeft.btn-group ').size();
      if( count_elm <= 6 ){
        let f_width = 100 / count_elm;
        if(count_elm%2==0){
            f_width = 200 / count_elm;
        }
        jQuery('#form_filter .boxFilterLeft.btn-group ').each(function(){
            jQuery(this).css('width' , (f_width - 0.8) + "%");
        });

      }


    }


    //  cam ket
});



