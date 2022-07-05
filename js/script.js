$( document).ready(function(){
   // slick
	$('.slide .container').slick({
		dots: false,
		infinite: true,
		slidesToShow: 1,
		autoplay: true,
    speed: 600,
		nextArrow: '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
		prevArrow: '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
		autoplayspeed: 2000,
	});
   // slick
  $('.relate .product').slick({
    dots: false,
    infinite: true,
    slidesToShow: 4,
    autoplay: true,
    speed: 600,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    nextArrow: '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
    prevArrow: '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
    responsive: [
    {  breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      },
    }
    ],
  });
   // slick
  $('.widget-product ul').slick({
    dots: false,
    speed: 1500,
    slidesToShow: 5,
    vertical: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    centerMode: false,
    variableWidth: false,

  });
  // slick
  $('.new .product').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    autoplay: true,
    speed: 600,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
   arrows: false,
    responsive: [
    {  breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      },
    }
    ],
  });
   // slick
  $('.sale .product').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    autoplay: true,
    speed: 600,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
   arrows: false,
    responsive: [
    {  breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      },
    }
    ],
  });
    // slick
  $('.view .product').slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    autoplay: true,
    speed: 600,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
   arrows: false,
    responsive: [
    {  breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      },
    }
    ],
  });

  // show mobile-category
  $('.btn-bar i.show').click(function() {
    $('.list-category').css('left','0');
     $(this).hide();
      $('.btn-bar i.close,.over-category').show();
      $('.over-category').css('left','0');
  })
  $('.btn-bar i.close').click(function() {
    $('.list-category').css('left','-50%');
    $(this).hide();
      $('.btn-bar i.show').show();
      $('.over-category').css('left','-100%');
  })
  // scroll top
  function scrollToTop() {
    var $window = $(window),
    $button = $('.scroll-to-top');
    $window.scroll(function() {
     $button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']('hidden');
   });
    $button.on('click', function(e) {
     e.preventDefault();
     $('body, html').animate({
      scrollTop: 0
    }, 500);
   });
  }
  function login_register() {
    var window_width = $(window).width();
    if (window_width >991) {
    $( '.button-login' ).on( 'click', function() {
     $( '.login').css( { 'left' : '40%', 'margin-top': '50px'} );
     $( '.register').css( { 'left' : '-999em', 'margin-top': '0px'} );
     return false;
   } )
    $('.button-register' ).on( 'click', function() {
     $('.register').css( { 'left' : '40%', 'margin-top': '50px'} );
     $( '.login').css( { 'left' : '-999em', 'margin-top': '0px'} );
     return false;

   } )
    $( '.close-login,.close-register' ).on( 'click', function() {
     $( '.login,.register').css( { 'left' : '-999em', 'margin-top': '0px'} );
     return false;
   } )
  }else {
     $( '.button-login' ).on( 'click', function() {
     $( '.login').css( { 'left' : '10%', 'margin-top': '50px'} );
     $( '.register').css( { 'left' : '-999em', 'margin-top': '0px'} );
     return false;
   } )
    $('.button-register' ).on( 'click', function() {
     $('.register').css( { 'left' : '10%', 'margin-top': '50px'} );
     $( '.login').css( { 'left' : '-999em', 'margin-top': '0px'} );
     return false;

   } )
    $( '.close-login,.close-register' ).on( 'click', function() {
     $( '.login,.register').css( { 'left' : '-999em', 'margin-top': '0px'} );
     return false;
   } )
  }
  }
  function stickyHeader() {
    var stick=$( '.top-header').height() + $( '.content-header ').height();
    $(window).scroll(function(){
     if ( $(window).scrollTop() > stick ) {
      $( '.menu ').css({ 'top' : '0', 'position': 'fixed' });
    }else {
      $( '.menu ').css( 'position','unset' );
    }
  })
  }

  function error_register_login() {
    $('#register').click(function() {
      var username=$('.register #username').val();
      var password=$('.register #password').val();
      var confirm_pw=$('.register #confirm_pw').val();
      var fullname=$('.register #fullname').val();
      var phone=$('.register #phone').val();
      if (fullname == '') {
        $('.register #er_fullname').html("bạn chưa nhập tên");

      }else{
        $(' .register  #er_fullname').html("");
      }
      if (username == '') {
        $('.register #er_username').html("bạn chưa nhập tài khoản");

      }else{
        $(' .register  #er_username').html("");
      }

      if (password == '') {
        $('.register #er_password').html("bạn chưa nhập mật khẩu");

      }else{
        $('.register  #er_password').html("");
      }
      if (password != confirm_pw) {
        $('.register  #er_confirm_pw').html("xác nhận mật khẩu không chính xác");

      }else{
        $('.register  #er_confirm_pw').html("");
      }
      if (phone == '') {
        $('#er_phone').html("bạn chưa nhập mật khẩu");

      }else{
        $('#er_phone').html("");
      }
      if (username != '' && fullname != '' && password != '' && confirm_pw != '' && phone != '') {

       $.ajax({
        url : 'register.php',
        type : 'post',
        dataType : 'json',
        data : {
          username : username,
          password : password,
          phone : phone,
          fullname : fullname
        },

        success : function(result){
          var er_username = '';
          if (result.username!='') {
            er_username=result.username;
          }
          if (er_username!='') {
            $('.register #er_username').append(er_username);
          }else {
           window.location.replace('notice/dang-ky.html'); 
         }
       }
     });
     }
     return false;
   })
    $('#login').click(function() {

      var username=$('.login #login-username').val();
      var password=$('.login #login-password').val();

      if (username == '') {
        $('.login #er_username').html("bạn chưa nhập tài khoản");
        return false;
      }else{
        $(' .login  #er_username').html("");
      }

      if (password == '') {
        $('.login #er_password').html("bạn chưa nhập mật khẩu");
        return false;
      }else{
        $('.login  #er_password').html("");
      }
      if (username != '' && password != '' ) {
       $.ajax({
        url : 'login.php',
        type : 'post',
        dataType : 'json',
        data : {
          username : username,
          password : password
        },

        success : function(result){
          var er_username = '';
          var er_password = '';
          if (result.username!='') {
            er_username=result.username;
          }
          if (result.password!='') {
            er_password=result.password;
          }
          if (er_username!='') {
            $('.login #er_username').append(er_username);
          }
          if (er_password!='') {
            $('.login #er_password').append(er_password);
          }
          if (result.username =='' &&  result.password =='' )  {
           window.location.replace('http://localhost/doantotnghiep/index.html'); 
         }
       }
     });}
       return false;

     })
  }
  function ajax_search() {
    $('.page-search .pagination a').click(function(){
      $('.page-search .pagination a').removeClass('active-pag');
      $(this).addClass('active-pag');
      var url = $(this).attr('href');
      var pag = $(this).attr('stt');
      var txt_search = $('#txtsearch').val();
      var price_filter = $('#price_filter').val();
      var category = $('#category').val();
      $.get("tpl/ajax-search.php",{pag:pag,txt_search:txt_search,category:category,price_filter:price_filter},function(data){
        $(".product").html(data);
      })
      window.history.pushState({path:url},'',url);
      return false;
    })
  }
  function ajax_product_type() {
    $('.page-product-type .pagination a').click(function(){

      $('.page-product-type .pagination a').removeClass('active-pag');
      $(this).addClass('active-pag');
      var url = $(this).attr('href');
      var pag = $(this).attr('stt');
      var name_product_type= $('#name_product_type').val();
        var id= $('#id').val();
      $.get("tpl/ajax-product-type.php",{pag:pag,name_product_type:name_product_type,id:id},function(data){
        $(".product").html(data);
      })
      window.history.pushState({path:url},'',url);
      return false;
    })
  }
 function menuMobile() {
  $('.menu .container >i').click(function() {
    $('.mobile-menu ').slideToggle();
  })
 }
 function dropdown() {
    $( '.mobile-menu .sub-menu >i' ).on( 'click', function( e ) {
      $('.mobile-menu .sub-menu ul').slideToggle();
      e.preventDefault();
    } );
  }
  dropdown();
  menuMobile();
  ajax_product_type();
  ajax_search();
  error_register_login();
  login_register();
  stickyHeader()
  scrollToTop();
})