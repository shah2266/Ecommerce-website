<!-- Brands -->
<section id="default-3">
    <div class="container wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1200ms">
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Our Brands</h3>
                        </div>
                        <!--<div class="col-sm-8 clearfix">
<div class="controls pull-right">
<a class="left fa fa-chevron-left" href="#featured-products" data-slide="prev"></a>
<a class="right fa fa-chevron-right" href="#featured-products" data-slide="next"></a>
</div>
</div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul id="gallery-slider-3" class="gallery client-brand-logo">
                    <?php
$showBrand = $cat->showBrand();

if($showBrand){
$i = 0;
while($result = $showBrand->fetch_assoc()){
$i++;
if($result['image'] != Null){
?>
                    <li><img src="admin/<?php echo $result['image'];?>" class="img-responsive" /></li>
                    <?php } } } ?>

                </ul>
            </div>
        </div>
    </div>
</section>



<footer>

    <section id="footer-widgets">
        <div class="container">
            <div class="row inof-sizing">
                <?php
$showWidgets = $cat->showWidgetslimit();

if($showWidgets){
$i = 0;
while($result = $showWidgets->fetch_assoc()){
$i++;
?>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                    data-wow-delay="400ms">
                    <div class="widgets-service-info clearfix">
                        <div class="pull-left clearfix">
                            <i class="fa fa-<?php echo $result['iconName'];?>"></i>
                        </div>
                        <div class="pull-right clearfix">
                            <h4><?php echo $result['widgetheading'];?></h4>
                            <p><?php echo $result['content'];?></p>
                        </div>
                    </div>
                </div>
                <?php } } ?>

            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class="widgets-menu">
                        <div class="widgets-menu-title">
                            <h3>Company Information</h3>
                        </div>
                        <div class="widgets-menu-list">
                            <ul>
                                <li><a href="index.php?pid=about"><i class="fa fa-angle-right"></i> About US</a></li>
                                <li><a href="index.php?pid=contact"><i class="fa fa-angle-right"></i> Contact Us</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Terms and Conditions</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Privacy and Policy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widgets-menu">
                        <div class="widgets-menu-title">
                            <h3>Top Brands</h3>
                        </div>
                        <div class="widgets-menu-list">
                            <ul>
                                <?php
$showBrandLimit = $cat->showBrandLimit(5);

if($showBrandLimit){
$i = 0;
while($result = $showBrandLimit->fetch_assoc()){
$i++;
?>
                                <li><a href="index.php?pid=shop&filterby=<?php echo $result['brandId']; ?>"><i
                                            class="fa fa-angle-right"></i>
                                        <?php echo $fm->textShorten($result['brandName'],30); ?></a></li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widgets-menu">
                        <div class="widgets-menu-title">
                            <h3>Our Products</h3>
                        </div>
                        <div class="widgets-menu-list">
                            <ul>
                                <?php
$showLimitProduct = $pd->showLimitProduct(5);

if($showLimitProduct){
$i = 0;
while($result = $showLimitProduct->fetch_assoc()){
$i++;
?>
                                <li><a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><i
                                            class="fa fa-angle-right"></i>
                                        <?php echo $fm->textShorten($result['productName'],30); ?></a></li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widgets-menu">
                        <div class="widgets-menu-title">
                            <h3>Contact info</h3>
                        </div>
                        <div class="widgets-menu-address">
                            <ul>
                                <?php
$showAddress = $cat->showAddress();

if($showAddress){
$i = 0;
while($result = $showAddress->fetch_assoc()){
$i++;
?>
                                <li><?php echo $result['address'];?></li>
                                <?php } }?>
                            </ul>
                        </div>
                        <div class="widgets-menu-social-icon">
                            <ul>
                                <?php
$showSocialLink = $cat->showSocialLink();

if($showSocialLink){
$i = 0;
while($result = $showSocialLink->fetch_assoc()){
$i++;
?>
                                <li class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms"><a
                                        href="<?php echo $result['facebook'];?>" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms"><a
                                        href="<?php echo $result['youtube'];?>" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <li class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"><a
                                        href="<?php echo $result['twitter'];?>" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms"><a
                                        href="<?php echo $result['googlePlus'];?>" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="800ms"><a
                                        href="<?php echo $result['instagram'];?>" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <?php } }?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="footer-copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <?php
$showAddress = $cat->showCopyRight();

if($showAddress){
$i = 0;
while($result = $showAddress->fetch_assoc()){
$i++;
?>
                    <h4><?php echo '@ '.date("Y");?> <?php echo $result['text'];?></h4>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>
</footer>



<!-- =============================================
JS Links
================================================== -->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/camera.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/0.2.1/jquery.velocity.min.js'></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<!-- Scroll Up -->
<div class="scroll-top-wrapper">
    <span class="scroll-top-inner">
        <i class="fa fa-2x fa-angle-up"></i>
    </span>
</div>
<!-- Scroll Up END -->
<!-- Scroll Script Start -->
<!-- *Scroll To Top Script -->
<script>
    $(function () {

        $(document).on('scroll', function () {
            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
    });
</script>

<script>
    $(function () {

        $(document).on('scroll', function () {

            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });

        $('.scroll-top-wrapper').on('click', scrollToTop);
    });

    function scrollToTop() {
        verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({
            scrollTop: offsetTop
        }, 500, 'linear');
    }
</script>
<!-- Scroll Script Start END -->

<script>
    $(document).ready(function () {
        // camera
        $('#camera_wrap').camera({
            thumbnails: true,
            autoAdvance: true,
            mobileAutoAdvance: true,
            height: '44%',
            hover: false,
            loader: 'bar',
            navigation: true,
            navigationHover: true,
            mobileNavHover: true,
            playPause: false,
            pauseOnClick: false,
            pagination: true,
            time: 7000,
            transPeriod: 1000,
            minHeight: '283px'
        });

    }); //
    $(window).load(function () {
        //

    }); //

    //mega-menu height control
    $(".navbar-collapse").css({
        maxHeight: $(window).height() - $(".navbar-header").height() + "px"
    });
    // touchTouch
    $('.thumb-isotope .thumbnail a').touchTouch();
</script>

<script>
    $(document).ready(function () {
        var mtree = $('ul.mtree');

        // Skin selector for demo
        mtree.wrap();
        var skins = [''];
        mtree.addClass(skins[0]);
        $('body').prepend('<div class="mtree-skin-selector"><ul class="button-group radius"></ul></div>');
        var s = $('.mtree-skin-selector');
        $.each(skins, function (index, val) {
            s.find('ul').append('<li class="small skin">' + val + '</li>');
        });
        s.find('ul').append('<li class="small csl active"></li>');
        s.find('li.skin').each(function (index) {
            $(this).on('click.mtree-skin-selector', function () {
                s.find('li.skin.active').removeClass('active');
                $(this).addClass('active');
                mtree.removeClass(skins.join(' ')).addClass(skins[index]);
            });
        })
        s.find('li:first').addClass('active');
        s.find('.csl').on('click.mtree-close-same-level', function () {
            $(this).toggleClass('active');
        });
    });
</script>

<!-- Bottom-carousel -->
<script type="text/javascript">
    $(window).load(function () {
        $("#gallery-slider-1").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 10000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

        $("#gallery-slider-2").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

        $("#gallery-slider-3").flexisel({
            visibleItems: 5,
            animationSpeed: 300,
            autoPlay: true,
            autoPlaySpeed: 8000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

    });

    (function () {
        $('#itemslider').carousel({
            interval: 5000
        });
    }());

    (function () {
        $('.carousel-showmanymoveone .item').each(function () {
            var itemToClone = $(this);

            for (var i = 1; i < 4; i++) {
                itemToClone = itemToClone.next();


                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }


                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
            }
        });
    }());
</script>

<script>
    /* affix the navbar after scroll below header */
    $('#nav').affix({
        offset: {
            top: $('header').height() - $('#nav').height()
        }
    });

    /* highlight the top nav as scrolling occurs */
    $('body').scrollspy({
        target: '#nav'
    })

    /* smooth scrolling for scroll to top */
    $('.scroll-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
    })

    /* smooth scrolling for nav sections */
    $('#nav .navbar-nav li>a').click(function () {
        var link = $(this).attr('href');
        var posi = $(link).offset().top + 20;
        $('body,html').animate({
            scrollTop: posi
        }, 700);
    })

    /*Dropdown css*/
    /*$('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(700);
    $(this).toggleClass('open');
    $('b', this).toggleClass("caret caret-up");  
    }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(700);
    $(this).toggleClass('open');
    $('b', this).toggleClass("caret caret-up");  
    });*/
    $(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).fadeIn();
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).fadeOut();
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");
            });
    });
</script>
<script>
    ! function ($) {

        "use strict"; // jshint ;_;


        /* MAGNIFY PUBLIC CLASS DEFINITION
         * =============================== */

        var Magnify = function (element, options) {
            this.init('magnify', element, options)
        }

        Magnify.prototype = {

            constructor: Magnify

                ,
            init: function (type, element, options) {
                    var event = 'mousemove',
                        eventOut = 'mouseleave';

                    this.type = type
                    this.$element = $(element)
                    this.options = this.getOptions(options)
                    this.nativeWidth = 0
                    this.nativeHeight = 0

                    this.$element.wrap('<div class="magnify" \>');
                    this.$element.parent('.magnify').append('<div class="magnify-large" \>');
                    this.$element.siblings(".magnify-large").css("background", "url('" + this.$element.attr("src") +
                        "') no-repeat");

                    this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
                    this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
                }

                ,
            getOptions: function (options) {
                    options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

                    if (options.delay && typeof options.delay == 'number') {
                        options.delay = {
                            show: options.delay,
                            hide: options.delay
                        }
                    }

                    return options
                }

                ,
            check: function (e) {
                var container = $(e.currentTarget);
                var self = container.children('img');
                var mag = container.children(".magnify-large");

                // Get the native dimensions of the image
                if (!this.nativeWidth && !this.nativeHeight) {
                    var image = new Image();
                    image.src = self.attr("src");

                    this.nativeWidth = image.width;
                    this.nativeHeight = image.height;

                } else {

                    var magnifyOffset = container.offset();
                    var mx = e.pageX - magnifyOffset.left;
                    var my = e.pageY - magnifyOffset.top;

                    if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                        mag.fadeIn(100);
                    } else {
                        mag.fadeOut(100);
                    }

                    if (mag.is(":visible")) {
                        var rx = Math.round(mx / container.width() * this.nativeWidth - mag.width() / 2) * -1;
                        var ry = Math.round(my / container.height() * this.nativeHeight - mag.height() / 2) * -
                        1;
                        var bgp = rx + "px " + ry + "px";

                        var px = mx - mag.width() / 2;
                        var py = my - mag.height() / 2;

                        mag.css({
                            left: px,
                            top: py,
                            backgroundPosition: bgp
                        });
                    }
                }

            }
        }


        /* MAGNIFY PLUGIN DEFINITION
         * ========================= */

        $.fn.magnify = function (option) {
            return this.each(function () {
                var $this = $(this),
                    data = $this.data('magnify'),
                    options = typeof option == 'object' && option
                if (!data) $this.data('tooltip', (data = new Magnify(this, options)))
                if (typeof option == 'string') data[option]()
            })
        }

        $.fn.magnify.Constructor = Magnify

        $.fn.magnify.defaults = {
            delay: 0
        }


        /* MAGNIFY DATA-API
         * ================ */

        $(window).on('load', function () {
            $('[data-toggle="magnify"]').each(function () {
                var $mag = $(this);
                $mag.magnify()
            })
        })

    }(window.jQuery);
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    jQuery(document).ready(function ($) {
        //#preloader
        $(window).load(function () {
            $('#preloader').fadeOut('slow', function () {
                $(this).remove();
            });
        });
    });

    // Auto Message Hide
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
</body>
</div>

</html>