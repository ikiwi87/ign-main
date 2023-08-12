<!doctype html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="Admin" />
    <meta name="robots" content="" />
    <meta name="description" content="Marie Curie Schools @yield('description')" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- FAVICONS ICON -->
    <link href="fe/img/repeat.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
    {{-- <link rel="icon" href="fe/img/favicon.ico" type="image/x-icon" /> --}}
    {{-- <link rel="shortcut icon" type="image/x-icon" href="fe/img/favicon.png" /> --}}

    <!-- PAGE TITLE HERE -->
    <title>MC - Nhập học 2023 - 2024 @yield('title')</title>

    <base href="{{asset("")}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="fe/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fe/bootstrap/css/bootstrap-grid.css">

    <!--Stylesheet-->
    <link rel="stylesheet" type="text/css" href="fe/css/normailze.css">
    <link rel="stylesheet" type="text/css" href="fe/css/style.css">
    <link rel="stylesheet" type="text/css" href="fe/css/responsive.css">

    <!--Font-->
    <link rel="stylesheet" type="text/css" href="fe/font/web-font.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3575CDK3HW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3575CDK3HW');
    </script>
    <style>
        .frametuna {
            width: 90%;
            margin: 40px auto;
            text-align: center;
        }
        .custom-btntuna {
            width: auto;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 10px;
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn-2tuna {
            background: rgb(96, 9, 240);
            background: linear-gradient(0deg, rgba(96, 9, 240, 1) 0%, rgba(129, 5, 240, 1) 100%);
            border: none;

        }

        .btn-2tuna:before {
            height: 0%;
            width: 2px;
        }

        .btn-2tuna:hover {
            box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .5),
                -4px -4px 6px 0 rgba(116, 125, 136, .5),
                inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
                inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
        }
    </style>
</head>

<body>
    <div class="main-container yoga-template">
        <!--Banner section-->
        <div class="banner">
            <div class="banner-overlay"></div>
            <div class="inside-container top-bar">
                <div class="row">
                    <div class="col-md-4 top-bar-left order-2 order-md-12">
                        <i class="fas fa-envelope-open-text"></i>
                        <a href="mailto:admin@mariecurieschools.edu.vn">admin@mariecurieschools.edu.vn</a>
                    </div>
                    <div class="col-md-4 logo order-1 order-md-12">
                        <img class="logo-img" src="fe/img/logo.svg" alt="">
                    </div>
                    <div class="col-md-4 top-bar-right order-3 order-md-12">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:XXXXXXXXX">XXXXXXXXX</a>
                    </div>
                </div>
            </div>
            <div class="inside-container banner-content">
                <div class="row">
                    <div class="col-12 content-col">
                        <h2 class="site-title"></h2>
                        <p class="site-title-desc">

                        </p>
                        {{-- <a class="banner-btn" href="/#register">Register now</a> --}}
                    </div>
                    
                </div>
            </div>
        </div>
          {{-- 
        <div class="inside-container banner-content">
        <div class="row">
            <div class="frametuna">
                <a type="button" target="blank" class="custom-btntuna btn-2tuna"
                    href="https://mariecuriehanoischool.com/">Thông tin chi tiết MC SCHOOLS</a>
            </div>
        </div> --}}
        <!--Contact us-->
        <div class="inside-container contact-section">
            @yield('content')
        </div>
        <div class="inside-container join-us-section" style="padding-top: 0px;">
            <div class="row sections-detail">
                <div class="col-12">
                    <h2 class="section-title">Liên hệ</h2>
                    <p class="section-title-desc">Mọi thắc mắc vui lòng liên hệ:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="tel:xxxxxxxx" class="join-us-btn">Call: 098 xxx xxxx</a>
                    <p class="join-us-call">or Call : <a href="tel:093 xxx xxxx" class="join-us-phone-nr">xxx xxx
                            xxxx</a></p>
                </div>
            </div>
        </div>

        <!--Copyright-->
        <footer class="footer">
            <div class="copyright">
                <div class="inside-container">
                    <div class="row">
                        <div class="col-md-6 order-2 order-md-12">
                            <p>&copy; 2023 All Rights Reserved. Created by <a href="https://mariecuriehanoischool.com/"
                                    class="created-by">Marie Curie Schools</a></p>
                        </div>
                        <div class="col-md-6 social order-1 order-md-12">
                            <a href="https://www.facebook.com/mariecurie"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script src="fe/js/inputmask.js"></script>
    <script src="fe/js/inputmask.extensions.js"></script>
    <script src="fe/js/inputmask.date.extensions.js"></script>
    <script src="fe/js/jquery.inputmask.js"></script>
    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    </script>
    <script>
    $(document).ready(function(){
    $("#date").inputmask("99/99/9999",{ "placeholder": "dd/mm/yyyy" });
  	jQuery(window).on('scroll', function(){'use strict';
      if ( jQuery(window).scrollTop() > 300 ) {
       jQuery('#masthead').addClass('animated fadeInDown sticky');
     } else {
       jQuery('#masthead').removeClass('animated fadeInDown sticky');
     }
   });
  $(".navbar-nav li a, footer a[href='#homepage'], navbar-header a[href='#homepage']").click(function(event) {
    /* Act on the event */
    var target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 2000);
  });
  </script>
  <script>
  $("#province").change(function(){
    console.log(window.location.host);
    var base = window.location.host;
    var url = '';
    if (base = 'localhost:8091') {
        url = 'http://'+window.location.host+'/public/getdistrict';
    } 
        else {

        url = 'https://'+window.location.host+'/getdistrict';   
        }
    if($(this).val() !== 0){
      $.ajax({
        url: url,
        type:'get',
        data:{
          'province_id':$(this).val()
        },
        success: function(data){
          var select = $("#district");
          select.empty();
          console.log(data.districts);
          if(data.state){
            var districts = data.districts;
            $("<option>").val(0).text('Chọn quận/huyện').appendTo(select).attr("disabled", true).attr("hidden", true);
            $.each(districts, function(i, district){
              $("<option>").val(district.districtid).text(district.name).appendTo(select);
            });
          }
        }
      });
    }
  });
  $("#district").change(function(){
    if($(this).val() !== 0){

    var base = window.location.host;
    var url = '';
    if (base = 'localhost:8091') {
        url = 'http://'+window.location.host+'/public/getschool';
    } 
        else {

        url = 'https://'+window.location.host+'/getschool';   
        }

        
      $.ajax({
        url: url,
        type:'get',
        data:{
          'district_id':$(this).val()
        },
        success: function(data){
          var select = $("#school");
          select.empty();
          console.log(data.schools);
          if(data.state){
            var schools = data.schools;
            $.each(schools, function(i, school){
              $("<option>").val(school.id).text(school.name).appendTo(select);
            });
          }
        }
      });
    }
  });
  </script>


    <script type="text/javascript">
        $(document).ready(function(){
        for(var i=0; i<document.forms.length; ++i){
            document.forms[i].reset();
        }

        $('input[name=combo]').change(function(){
        if(this.value == 0)
        {
        $('input[name=isset_account][value=0]').attr('disabled',true);
        $('input[name=isset_account][value=1]').attr('disabled',true);
            $("#club_account").slideUp();
            $("#have_account").slideUp();
            $("#isset_account").prop('required', false);
        }
        if(this.value == 1)
        {
        $('input[name=isset_account][value=0]').prop('checked',true);
        $('input[name=isset_account][value=0]').attr('disabled',false);
        $('input[name=isset_account][value=1]').attr('disabled',false);
            $("#have_account").slideDown();
            $("#isset_account").prop('required', true);
        }
        });

        $('input[name=isset_account]').change(function(){
            if(this.value == 1)
            {
            $("#club_account").slideDown();
            $("#address").prop('required', true);
            $(".club_account").prop('required', true);
            }
            if(this.value == 0)
            {
            $("#club_account").slideUp();
            $("#address").prop('required', false);
            }
        });
    
        });
    </script>

    <script src="fe/bootstrap/js/bootstrap.min.js"></script>
    
</body>

</html>