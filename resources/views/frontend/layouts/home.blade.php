<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Metas & Morweb CMS assets -->

    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home</title>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="index.html" />
    <meta property="og:title" content="Home" />

    <link type="text/css" href="{{ asset('frontend/res/css/common.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/css/mw.cells.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/css/mw.formse39a.css?3c59dc048e8850243be8079a5c74d079') }}"
        rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/cms3t/res/vit-lib/status.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/cms3t/res/mediaelement/mediaelementplayer.css') }}"
        rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/pages/css/front.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/pages/css/spacer.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/button/css/button.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/files/css/files.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('frontend/res/gensoclinks/css/gensoclinks.css') }}" rel="stylesheet" />


    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/json2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/mw.media.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/mediaelement/mediaelement-and-player.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/tinymce/js/tinymce/tinymce.jquery.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/tinymce/js/tinymce/jquery.tinymce.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/tinymce/js/tinymce/tinymce.morweb.js') }}"></script>
    <script type="text/javascript">
        tinyMCE.baseURL = '{{ asset('frontend/cms3t/res/tinymce/js/tinymce/index.html') }}';
    </script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.widget.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.mouse.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.position.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.draggable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.droppable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/ui/jquery.ui.sortable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/jquery.AjaxUpload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/hoverIntent.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/jQuery/superfish.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/vit-lib/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/vit-lib/ajax.js') }}"></script>
    <script type="text/javascript">
        CMS_ALIAS = 'cms3t';
        CMS_RES = 'res';
        CMS_JS = 'js';
        CMS_CSS = 'css';
        CMS_IMAGES = 'images';
    </script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/mw.urls.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/mw.common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/mw.system.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/mw.forms.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/res/system/js/mwSelectInput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/cms3t/res/js/mw.front.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/res/pages/js/mw.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/res/button/js/button.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/res/files/js/files.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/res/intouch/js/block.contacts.js') }}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vesper+Libre:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../use.typekit.net/gsb3tcf.css">

    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/css/vendors/fontawesome/5.15.4/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/vendors/animate/3.7.2/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/vendors/magnific-popup/1.1.0/magnific-popup.css') }}" />
    <link href="../unpkg.com/aos%402.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/css/rootf3ee.css?v=3.2') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/globalf3ee.css?v=3.2') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/allf3ee.css?v=3.2') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/overridef3ee.css?v=3.2') }}" />


    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2YPYWBKNT8"></script>


    <script>
        window.dataLayer = window.dataLayer || [];


        function gtag() {
            dataLayer.push(arguments);
        }


        gtag('js', new Date());


        gtag('config', 'G-2YPYWBKNT8');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2YPYWBKNT8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2YPYWBKNT8');
    </script>

</head>

<body>

    <!-- Default Page -->
    <div class="defaultPage">

        @dd(\App\Helpers\Common::getMenus());

        <!-- Header -->

        @include('frontend.includes.header')

        <div id="accessibility" class="_shadow-6 _shadow-hover"> <a id="accessibilityBtn"
                class="_shadow-6 _shadow-hover"><span class="fa fa-universal-access"></span></a>
            <ul>
                <li><a class="increase"><span class="fa fa-plus"></span>Increase Font</a> </li>
                <li><a class="decrease"><span class="fa fa-minus"></span> Decrease Font</a> </li>
                <!--  <li><a id="grayscale" class="accessability-effect"><span class="fa fa-circle"></span> Greyscale</a> </li> -->
                <li><a id="allLinks"><span class="fa fa-link"></span> Highlight Links</a> </li>
                <li><a class="reset"><span class="fa fa-font"></span> Regular Font</a> </li>
                <li><a href="javascript:window.location.reload(true)"><span class="fa fa-refresh"></span> Reset</a>
                </li>
            </ul>
        </div>

        <!-- Main -->
        <main id="mainArea">
            <div class="mwPageArea">

                @include('frontend.includes.heroSection')

                @include('frontend.includes.whereWillYou')

                @include('frontend.includes.welcome')

                @include('frontend.includes.selectTab')

                @include('frontend.includes.experienceBishop')

                @include('frontend.includes.studentsPerspective')

                @include('frontend.includes.testimonials')

                @include('frontend.includes.ourMission')

                @include('frontend.includes.calendar')

                @include('frontend.includes.stayUpdated')

                @include('frontend.includes.yourFuture')

                <div class="Clear"></div>
            </div>
        </main>

        <!-- Footer -->

        @include('frontend.includes.footer')




        <style>
            /*** Acount Popup Form ***/
            .mdPopupWrapB {}

            .mdPopupWrapB {
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(0, 0, 0, .95);
                z-index: 500;
            }

            .mdPopup {
                background: #fff;
                width: 300px;
                position: absolute;
                top: 20%;
                left: calc(50% - 150px);
                padding: 30px 20px 0;
                border-radius: 20px;
                text-align: center;
            }

            .mdCloseB {
                color: #000;
                position: absolute;
                top: 3px;
                right: 14px;
                font-size: 26px;
                cursor: pointer;
            }

            .textRight {
                text-align: right;
            }

            .isEmpty {
                font-size: 10px;
            }

            .btnbtnbtn {
                text-align: center
            }

            option:checked {
                background-color: -internal-light-dark(rgb(206, 206, 206), rgb(84, 84, 84));
                color: -internal-light-dark(rgb(16, 16, 16), rgb(255, 255, 255));
                background: var(--color-orange-1) !important;
                color: #000;
            }

            .mwInput.multiple.focus {
                color: #ff0000 !important;
            }
        </style>

        <script>
            $(".mdCloseB").click(function() {
                jQuery("#request_thankyou").hide();
            });

            jQuery("#request_thankyou").hide();
        </script>
    </div>

    <!-- Javascript -->
    <div id="javascript">
        <script src="{{ asset('frontend/js/vendors/isjs/0.9.0/is.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/slick/1.8.1/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/magnific-popup/1.1.0/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/gsap/3.1.1/gsap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/scrollmagic/2.0.7/ScrollMagic.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/scrollmagic/2.0.7/plugins/jquery.ScrollMagic.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/scrollmagic/2.0.7/plugins/animation.gsap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/scrollmagic/2.0.7/plugins/debug.addIndicators.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/inputmask/5.0.0/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendors/matchHeight/0.7.2/jquery.matchHeight-min.js') }}"></script>

        <!-- Scripts -->
        <script src="{{ asset('frontend/js/globalf3ee.js?v=3.2') }}"></script>
        <script src="{{ asset('frontend/js/scriptf3ee.js?v=3.2') }}"></script>

        <script src="../unpkg.com/aos%402.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </div>
</body>

</html>
