<!DOCTYPE html>
<html ng-app="calApp">
<head>
    <title>ncagroup</title>
    <link type="text/css" rel="stylesheet" href="<?=$theme;?>css/main.css"/>
    <link type="text/css" rel="stylesheet" href="<?=$theme;?>css/plugins.css"/>
    <link href="<?=$theme;?>css/quake.slider.css" rel="stylesheet" type="text/css" />
    <link href="<?=$theme;?>css/skins/plain/quake.skin.css" rel="stylesheet" type="text/css" />
    <script src="<?=$theme;?>js/jquery.min.js" type="text/javascript"></script>
    <script src="<?=$theme;?>js/angular.min.js"></script>
    <script src="<?=$theme;?>js/angular-datepicker.js"></script>
    <script src="<?=$theme;?>js/app.js"></script>
    <script src="<?=$theme;?>js/quake.slider.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.quake-slider').quake({
                thumbnails: true,
                animationSpeed: 500,
                applyEffectsRandomly: true,
                navPlacement: 'inside',
                navAlwaysVisible: true,
                effects:['slideLeft']
            });

        });
    </script>
</head>
<body>
 <div id="wrapper">
     <!-- TOP NAVIGATION -->
     <div id="navigation">
        <div class="navigation-content">
            <ul>
                <li class="n-location">Tbilisi, GE</li>
                <li class="n-email">info@NCAgroup.ge</li>
                <li class="n-phone">+995 (322) 123 123</li>
                <li class="n-ru"><a href="#">RU</a></li>
                <li class="n-en"><a href="#">EN</a></li>
                <li class="n-ge"><a href="#">GE</a></li>
            </ul>
            <div class="fix"></div>
        </div>
     </div>
     <div class="navigation-shadow"></div>
     <!-- END TOP NAVIGATION -->

     <div id="container">
         <!-- HEADER -->
         <div class="header">
             <a class="header-logo" href="/"></a>
         </div>
         <!-- END HEADER -->

         <!-- MAIN MENU -->
         <div class="main-menu">
             <ul>
                 <li><a href="#">Home</a></li>
                 <li><a href="#">Deposit</a></li>
                 <li><a href="#">Loan</a></li>
                 <li><a href="#">Who we are</a></li>
                 <li><a href="#">Contact</a></li>
             </ul>
         </div>
         <div class="fix"></div>
         <div class="navigation-shadow"></div>
         <!-- END MAIN MENU -->

         <!-- Quake Image Slider -->
         <div class="quake-slider">
             <div class="quake-slider-images">
                 <a target="_blank" href="javascript:">
                     <img src="<?=$theme;?>images/slider/1.jpg" alt="" />
                 </a>
                 <a target="_blank" href="javascript:">
                     <img src="<?=$theme;?>images/slider/2.jpg" alt="" />
                 </a>
                 <a target="_blank" href="javascript:">
                     <img src="<?=$theme;?>images/slider/3.jpg" alt="" />
                 </a>
                 <a target="_blank" href="javascript:">
                     <img src="<?=$theme;?>images/slider/4.jpg" alt="" />
                 </a>
             </div>
         </div>
         <div class="slider-shadow"></div>
         <!-- /Quake Image Slider -->

         <?get_module('currency');?>
     </div>

     <!-- FOOTER -->
     <div id="footer">
         <div class="footer-content">
             <div class="powered"><a href="http://it-solutions.ge" target="_blank"></a></div>
             <div class="copy">NCAgroup &copy; 2015 <? if(date('Y') > 2015) echo "- ".date('Y');?> All Rights Reserved</div>
         </div>
     </div>
     <div class="fix"></div>
     <!-- END FOOTER -->
 </div>
</body>
</html>