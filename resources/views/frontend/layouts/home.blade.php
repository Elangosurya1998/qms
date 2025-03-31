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

        <!-- Header -->
        <header id="headerArea">
            <div id="wPPTXX0009ZQ1GVA" class="mwPageBlock Include" style="">
                <div class="blockContents">

                    <script>
                        /* Sticky Menu Add Class and Animation */
                        jQuery(window).scroll(function() {
                            var scroll = $(window).scrollTop();
                            if (scroll >= 45) {
                                jQuery(".header").addClass("stuck");
                            }
                            if (scroll <= 45) {
                                jQuery(".header").removeClass("stuck")
                            }
                        });
                    </script>
                    <!-- Header Two -->
                    <div class="header headerTwo is-sticky">
                        <div class="headerWrap">
                            <div class="megaMenu content-style">
                                <div class="mma">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="wRD5T62GCENNQUFU" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="mb697HaEX">
                                                        <li class="no-children"><a href="about-bfc.html"><span
                                                                    class="Title">About BFC</span></a></li>
                                                        <li class="no-children"><a href="The-Foley-Family.html"><span
                                                                    class="Title">The Foley Family</span></a></li>
                                                        <li class="no-children"><a href="Calendar.html"><span
                                                                    class="Title">BFC Calendar</span></a></li>
                                                        <li class="no-children"><a href="Mission-Belief.html"><span
                                                                    class="Title">Mission & Belief</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Fundraising-and-Events.html"><span
                                                                    class="Title">Community Events</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Board-of-Directors.html"><span
                                                                    class="Title">Board of Directors</span></a></li>
                                                        <li class="no-children"><a href="Social-Media.html"><span
                                                                    class="Title">Social Media</span></a></li>
                                                        <li class="no-children"><a href="Staff-directory.html"><span
                                                                    class="Title">Staff Directory</span></a></li>
                                                        <li class="no-children"><a href="Visual-Guidelines.html"><span
                                                                    class="Title">Visual Guidelines</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="wTZ70YY2WMVFBFLT" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        About BFC
                                                    </h3>
                                                    <p>
                                                        Bishop Foley Catholic's mission and ministry is to form young
                                                        minds, get to know and love Christ, while at the same time
                                                        receiving an excellent academic education. BFC is a warm and
                                                        welcoming
                                                        community that offers many opportunities for growth in academic
                                                        excellence, friendships, teamwork, and faith. In turn, BFC
                                                        benefits from the many talents and gifts our students bring to
                                                        the
                                                        community.
                                                    </p>
                                                    <p>
                                                        <a href="about-bfc.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wHKYMKO5Z21U1S82" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/9be1103f1b839067b38347e30d29d252.jpg?247x225') }}"
                                                            alt="AboutBFC_MenuNav247.jpg" width="247"
                                                            height="225" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mmb">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="w7SXZKUSG6QNTPBL" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="mJtPC6HLq">
                                                        <li class="no-children"><a href="Why-BFC.html"><span
                                                                    class="Title">Why BFC</span></a></li>
                                                        <li class="no-children"><a href="Visit-BFC.html"><span
                                                                    class="Title">Visit BFC</span></a></li>
                                                        <li class="no-children"><a href="Future-Ventures.html"><span
                                                                    class="Title">Future Ventures</span></a></li>
                                                        <li class="no-children"><a href="Affording-BFC.html"><span
                                                                    class="Title">Affording BFC</span></a></li>
                                                        <li class="no-children"><a
                                                                href="International-students.html"><span
                                                                    class="Title">International Students</span></a>
                                                        </li>
                                                        <li class="no-children"><a href="Transfer-Students.html"><span
                                                                    class="Title">Transfer Students</span></a></li>
                                                        <li class="no-children"><a href="HSPT.html"><span
                                                                    class="Title">HSPT</span></a></li>
                                                        <li class="no-children"><a href="Events-Documents.html"><span
                                                                    class="Title">Events & Documents</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="w3OVSLG789FXAS9R" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        Admissions
                                                    </h3>
                                                    <p>
                                                        Join the Foley Family!&nbsp;When you take part in&nbsp;on-campus
                                                        tours, Venture for a Day experiences, and open houses, you
                                                        will&nbsp;be able to discover what it means to be part
                                                        of&nbsp;our
                                                        extraordinary community and how we can&nbsp;assist you&nbsp;as
                                                        you venture to become the very best version of yourself.
                                                    </p>
                                                    <p>
                                                        <a href="Why-BFC.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wXGEF2IGH9DVGCUH" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/998166517c7f696431336d40503d2d8f.jpg?247x247') }}"
                                                            alt="Admissions_MenuDisp247x247_v2.jpg" width="247"
                                                            height="247" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mmc">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="wS2UW10ZTSNL2U8J" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="msGphgFb0">
                                                        <li class="no-children"><a
                                                                href="Academics-departments.html"><span
                                                                    class="Title">Academic Departments</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Graduation-and-Grading.html"><span
                                                                    class="Title">Graduation and Grading</span></a>
                                                        </li>
                                                        <li class="no-children"><a href="Technology.html"><span
                                                                    class="Title">Technology</span></a></li>
                                                        <li class="no-children"><a href="Counseling.html"><span
                                                                    class="Title">Counseling</span></a></li>
                                                        <li class="no-children"><a
                                                                href="The-BFC-Media-Center.html"><span
                                                                    class="Title">Media Center</span></a></li>
                                                        <li class="no-children"><a href="PASS.html"><span
                                                                    class="Title">PASS</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="w3ONEJGYR15XPMNJ" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        Academics&nbsp;
                                                    </h3>
                                                    <p>
                                                        Bishop Foley Catholic offers a college preparatory academic
                                                        program with more than 100 courses and 20 AP and honors classes.
                                                        In addition to the traditional required high school classes,
                                                        Foley
                                                        includes additional course offerings in STEM, performing/visual
                                                        arts, foreign language, theology, and more.
                                                    </p>
                                                    <p>
                                                        <a href="Academics-departments.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wVJIII13B5RLXT6F" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/4dc6e90324d6f0fcf1f9d58f7409b1be.jpg?247x247') }}"
                                                            alt="Academics_SocialStudies_crop247x247.jpg"
                                                            width="247" height="247" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mmd">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="wA78VTBU0TQDXV5K" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="m8O5F1nyb">
                                                        <li class="no-children"><a
                                                                href="Extracurricular-Activities.html"><span
                                                                    class="Title">Extracurricular
                                                                    Activities</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Student-Parent-Handbook.html"><span
                                                                    class="Title">Student & Parent Handbook</span></a>
                                                        </li>
                                                        <li class="no-children"><a href="Honor-Code.html"><span
                                                                    class="Title">Honor Code</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Performing-Visual-Arts.html"><span
                                                                    class="Title">Performing & Visual Arts</span></a>
                                                        </li>
                                                        <li class="no-children"><a href="VentureNation.html"><span
                                                                    class="Title">VentureNation</span></a></li>
                                                        <li class="no-children"><a href="Spirit-Shop.html"><span
                                                                    class="Title">Spirit Shop</span></a></li>
                                                        <li class="no-children"><a href="Photo-Albums.html"><span
                                                                    class="Title">Photo Albums</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="wRKH8ZA1HAYDTT59" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        Student Life
                                                    </h3>
                                                    <p>
                                                        Ventures at Bishop Foley Catholic&nbsp;can explore&nbsp;a
                                                        diverse mix of clubs and extracurricular activities that appeal
                                                        to a variety of interests. Students can participate in clubs
                                                        that
                                                        explore music, performing arts, visual arts, community service,
                                                        faith, science, technology, and much more.
                                                    </p>
                                                    <p>
                                                        <a href="Extracurricular-Activities.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wHC6EYORLP441IPU" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/caed7af96d7b4c22bab69d0ecf3d53a3.jpg?247x247') }}"
                                                            alt="Foley2019BeTheDifference0092_crop2.jpg"
                                                            width="247" height="247" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mme">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="wKK3OX4T77VMRAAJ" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="mDMxsZMyM">
                                                        <li class="no-children"><a href="Athletics.html"><span
                                                                    class="Title">Venture Athletics</span></a></li>
                                                        <li class="no-children"><a
                                                                href="https://www.bfcathletics.com/"
                                                                target="_blank"><span class="Title">BFC Athletics -
                                                                    Big Teams</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Athletics-Calendar.html"><span
                                                                    class="Title">Athletics Calendar</span></a></li>
                                                        <li class="no-children"><a href="Alumni-Athletes.html"><span
                                                                    class="Title">Alumni Athletes</span></a></li>
                                                        <li class="no-children"><a href="Facility-Rentals.html"><span
                                                                    class="Title">Facility Rentals</span></a></li>
                                                        <li class="no-children"><a href="Spirit-Wear.html"><span
                                                                    class="Title">Spirit Wear</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Championships-and-Honors.html"><span
                                                                    class="Title">Championships and Honors</span></a>
                                                        </li>
                                                        <li class="no-children"><a
                                                                href="Athletic-Summer-Camps.html"><span
                                                                    class="Title">Athletic Summer Camps</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="w7VIS65K7HKSU2II" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        Athletics
                                                    </h3>
                                                    <p>
                                                        Bishop Foley Catholic&rsquo;s mission and ministry is to form
                                                        young minds, get to know and love Christ, while at the same time
                                                        receiving an excellent academic education. BFC is a warm and
                                                        welcoming community that offers many opportunities for growth in
                                                        academic excellence, friendships, teamwork, and faith.
                                                    </p>
                                                    <p>
                                                        <a href="Athletics.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wX1UX1FGECJ1OIJQ" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/8038d3668302af8d6540e10a28d8330d.jpg?247x247') }}"
                                                            alt="Athletics_AthleticNews_crop2.jpg" width="247"
                                                            height="247" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mmf">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="wGN15ZMQ6DC5O0SK" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="mguU1E0BY">
                                                        <li class="no-children"><a href="Foley-Faith.html"><span
                                                                    class="Title">Foley Faith</span></a></li>
                                                        <li class="no-children"><a href="Grandparents-Day.html"><span
                                                                    class="Title">Grandparents Day 2023</span></a>
                                                        </li>
                                                        <li class="no-children"><a href="Christian-Service.html"><span
                                                                    class="Title">Christian Service</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Prayer-and-Event-Opportunities.html"><span
                                                                    class="Title">Prayer and Event
                                                                    Opportunities</span></a></li>
                                                        <li class="no-children"><a href="Catholic-Corner.html"><span
                                                                    class="Title">Catholic Corner Monthly</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="wG2LKQSBT4TGO6GV" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        Faith
                                                    </h3>
                                                    <p>
                                                        Bishop Foley Catholic High school strives to be a
                                                        Christ-centered school that encourages students and staff to
                                                        live as missionary disciples. We accomplish this mission by
                                                        rooting our day in
                                                        countless opportunities to pray, serve and learn.
                                                    </p>
                                                    <p>
                                                        <a href="Foley-Faith.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wRWKA1VYXGN8ZX1N" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/ba1abb12ef54e7826f155911c49fc5b9.png?271x271') }}"
                                                            alt="megamenuabout.png" width="271" height="271" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mmh">
                                    <div class="mmInner">
                                        <div class="mmMenuWrap">
                                            <div id="wIFR47NEZZ968I91" class="mwPageBlock Menu" style="">
                                                <div class="blockContents">
                                                    <ul id="mnMrTGyFI">
                                                        <li class="no-children"><a href="Alumni.html"><span
                                                                    class="Title">Alumni Actions</span></a></li>
                                                        <li class="no-children"><a href="Alumni-Board.html"><span
                                                                    class="Title">Alumni Board</span></a></li>
                                                        <li class="no-children"><a href="Alumni-Spotlights.html"><span
                                                                    class="Title">Alumni Spotlights</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Reunion-and-Events.html"><span
                                                                    class="Title">Reunion and Events</span></a></li>
                                                        <li class="no-children"><a
                                                                href="Voice-of-the-Ventures.html"><span
                                                                    class="Title">Voice of the Ventures</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentWrap">
                                            <div id="wTI2ST583EFQL6G7" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <h3>
                                                        Alumni
                                                    </h3>
                                                    <p>
                                                        Foley alumni, parents, faculty, staff and friends of our beloved
                                                        school understand the value of a Bishop Foley Catholic
                                                        education. We are ever grateful to those who support our
                                                        Mission, which
                                                        is to provide a Christ-centered environment that emphasizes
                                                        academic excellence to develop the whole person in mind, body
                                                        and spirit.
                                                    </p>
                                                    <p>
                                                        <a href="Alumni.html">Learn More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mmContentImage">
                                            <div id="wSXIMFDX0UDC9RMQ" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        <img src="{{ asset('frontend/files/_cache/e532eb847882bfff9d151653b931971c.jpg?247x247') }}"
                                                            alt="Alumni_crop2.jpg" width="247" height="247" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Search Bar -->
                            <div class="headerSearchBar">
                                <div class="searchBar">
                                    <div class="searchBarWrap"><span class="fa fa-times searchBtn"></span>
                                        <div class="searchBarForm">
                                            <form action="https://www.bishopfoley.org/search" method="GET">
                                                <input type="text" name="q" value=""
                                                    placeholder="Search">
                                                <button type="submit"> <i class="fa fa-search"></i> <span
                                                        class="_sr-only">Search</span> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Utility Bar -->
                            <div class="headerUtilityBar">
                                <div class="utilityBar">
                                    <div class="utilityBarWrap">

                                        <!-- Utility Left -->
                                        <div class="utilityBarLeft">
                                            <div class="utilityBarDropDown">
                                                <ul>
                                                    <li><a href="#" target="_blank"><span
                                                                class="fas fa-user"></span> Current Families <span
                                                                class="fas fa-caret-down"></span></a>
                                                        <div class="utilDD">
                                                            <div id="w5FTFY71OGWXJWTO" class="mwPageBlock Menu"
                                                                style="">
                                                                <div class="blockContents">
                                                                    <ul id="mJuXFDaXM">
                                                                        <li class="no-children"><a
                                                                                href="Daily-Announcements.html"><span
                                                                                    class="Title">Daily
                                                                                    Announcements</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Menu.html"><span
                                                                                    class="Title">Lunch
                                                                                    Menu</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Parent-Portal.html"><span
                                                                                    class="Title">Parent
                                                                                    Portal</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="https://www.signupgenius.com/"
                                                                                target="_blank"><span
                                                                                    class="Title">SignUp
                                                                                    Genius</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Attendance.html"><span
                                                                                    class="Title">Attendance</span></a>
                                                                        </li>
                                                                        <li class="no-children"><a
                                                                                href="Student-Parent-Handbook.html"><span
                                                                                    class="Title">Student & Parent
                                                                                    Handbook</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="School-Year-Calendar.html"><span
                                                                                    class="Title">School Year
                                                                                    Calendar</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Emergency-Preparedness.html"><span
                                                                                    class="Title">Emergency
                                                                                    Preparedness</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Counseling.html"><span
                                                                                    class="Title">Counseling</span></a>
                                                                        </li>
                                                                        <li class="no-children"><a
                                                                                href="Parent-Teacher-Conferences.html"><span
                                                                                    class="Title">Parent Teacher
                                                                                    Conferences</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Media-Center.html"><span
                                                                                    class="Title">Media
                                                                                    Center</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Parent-Groups-and-Involvement.html"><span
                                                                                    class="Title">Parent Groups and
                                                                                    Involvement</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Grandparents-Club.html"><span
                                                                                    class="Title">Grandparents
                                                                                    Club</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Graduation-Requirements.html"><span
                                                                                    class="Title">Graduation
                                                                                    Requirements</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="files/galleries/2023-24_SummerReading.pdf"
                                                                                target="_blank"><span
                                                                                    class="Title">Summer
                                                                                    Reading</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="Athletic-Forms.html"><span
                                                                                    class="Title">Athletic
                                                                                    Forms</span></a></li>
                                                                        <li class="no-children"><a
                                                                                href="All-School-Raffle.html"><span
                                                                                    class="Title">All School
                                                                                    Raffle</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="utilityBarItems">
                                                <div id="wSRPOXJTZ1TTXIB0" class="mwPageBlock Menu" style="">
                                                    <div class="blockContents">
                                                        <ul id="mfhDY0lm2">
                                                            <li class="no-children"><a href="index.html"><span
                                                                        class="Title"><span
                                                                            class="fa fa-home"></span> Home</span></a>
                                                            </li>
                                                            <li class="no-children"><a
                                                                    href="https://bfchs-mi.client.renweb.com/pwr/"
                                                                    target="_blank"><span class="Title"><span
                                                                            class="fas fa-globe"></span> FACTS
                                                                        Login</span></a></li>
                                                            <li class="no-children"><a href="Calendar.html"><span
                                                                        class="Title"><span
                                                                            class="fas fa-calendar"></span>
                                                                        Calendar</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Utility Right -->
                                        <div class="utilityBarRight">

                                            <!-- Utility Bar Menu -->
                                            <div class="utilityBarMenu">
                                                <div id="w16N1F0LL532PWJ5" class="mwPageBlock Menu" style="">
                                                    <div class="blockContents">
                                                        <ul id="m8K74y54S">
                                                            <li class="no-children"><a
                                                                    href="https://1stplacespiritwear.com/schools/MI/Madison+Heights/Bishop+Foley+Catholic+High+School"
                                                                    target="_blank"><span class="Title">Online
                                                                        Store</span></a></li>
                                                            <li class="no-children"><a href="contact-us.html"><span
                                                                        class="Title">Contact Us</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Main -->
                            <div class="headerMain">

                                <!-- Header Main Left -->
                                <div class="headerMainLeft">

                                    <!-- Header Logo -->
                                    <div class="headerLogo trans"> <a href="index.html"><img
                                                src="{{ asset('frontend/images/logo.svg') }}" class="trans"
                                                title="Bishop Foley Catholic High School" /></a> </div>
                                </div>

                                <!-- Header Main Right -->
                                <div class="headerMainRight">

                                    <!-- Header Menu -->
                                    <div class="headerMenu">
                                        <!--
          <div id="wKCR8VNJB54ZYWQ3" class="mwPageBlock Menu" style=""><div class="blockContents"><ul id="mk33GLJ5U">
<li class="has-children"><a href="/about-bfc"><span class="Title">About BFC</span></a><ul>
<li class="no-children"><a><span class="Title">The Foley Family</span></a></li>
<li class="no-children"><a><span class="Title">Mission & Belief</span></a></li>
<li class="no-children"><a><span class="Title">Visual Guidelines</span></a></li>
<li class="no-children"><a><span class="Title">Calendar & Events</span></a></li>
<li class="no-children"><a><span class="Title">Directory</span></a></li></ul></li>
<li class="has-children"><a><span class="Title">Admissions</span></a><ul>
<li class="no-children"><a><span class="Title">Why BFC</span></a></li>
<li class="no-children"><a><span class="Title">Future Ventures</span></a></li>
<li class="no-children"><a><span class="Title">Apply to bfc</span></a></li>
<li class="no-children"><a><span class="Title">Visit BFC</span></a></li>
<li class="no-children"><a><span class="Title">Affording BFC</span></a></li>
<li class="no-children"><a><span class="Title">International & Transfer</span></a></li>
<li class="no-children"><a><span class="Title">HSPT</span></a></li>
<li class="no-children"><a><span class="Title">Class of 20## Events & Document</span></a></li></ul></li>
<li class="no-children"><a><span class="Title">Academics</span></a></li>
<li class="no-children"><a><span class="Title">Student Life </span></a></li>
<li class="no-children"><a><span class="Title">Athletics</span></a></li>
<li class="no-children"><a><span class="Title">Faith</span></a></li></ul></div></div>
   --->

                                        <div class="Menu">
                                            <div class="blockContents ">
                                                <ul>
                                                    <li><a href="#" class="mmaa">About BFC</a></li>
                                                    <li><a href="#" class="mmbb">Admissions</a></li>
                                                    <li><a href="#" class="mmcc">Academics</a></li>
                                                    <li><a href="#" class="mmdd">Student Life</a></li>
                                                    <li><a href="#" class="mmee">Athletics</a></li>
                                                    <li><a href="#" class="mmff">Faith</a></li>
                                                    <li><a href="#" class="mmhh">Alumni</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Utility Bar Search -->
                                    <div class="utilityBarSearch">
                                        <button class="searchBtn"><i class="fas fa-search"></i></button>
                                    </div>

                                    <!-- Header Buttons -->
                                    <div class="headerBtns">
                                        <div id="wLDU4YFJAJKTQ9JV" class="mwPageBlock Button" style="">
                                            <div class="blockContents">
                                                <div class="mwBtnCenter">
                                                    <div class="btn btnHalfRoundYellow">
                                                        <a href="https://bfchs-mi.client.renweb.com/oa/"
                                                            template="default" class="medium" target="_blank">Apply
                                                            Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="supportDropDown">
                                            <div id="wWS6GGG8UYX5MYG0" class="mwPageBlock Button" style="">
                                                <div class="blockContents">
                                                    <div class="mwBtnCenter">
                                                        <div class="btn btnHalfRoundBlack">
                                                            <a href="Support-Us.html" template="default"
                                                                class="medium" target="_self">Support Us</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="supportDropMenu">

                                                <div id="wMHW7VDA66NBS70T" class="mwPageBlock Menu" style="">
                                                    <div class="blockContents">
                                                        <ul id="mBX1EmLLn">
                                                            <li class="no-children"><a
                                                                    href="Fundraising-and-Events.html"><span
                                                                        class="Title">Community Events</span></a></li>
                                                            <li class="no-children"><a href="Donate.html"><span
                                                                        class="Title">Donate</span></a></li>
                                                            <li class="no-children"><a href="Club-1965.html"><span
                                                                        class="Title">Club 1965</span></a></li>
                                                            <li class="no-children"><a href="Annual-Fund.html"><span
                                                                        class="Title">Foley Fund</span></a></li>
                                                            <li class="no-children"><a
                                                                    href="Thank-You-2024.html"><span
                                                                        class="Title">2024 Donors</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <style>
                                        .supportDropMenu {
                                            display: none;
                                            position: relative
                                        }

                                        .supportDropDown:hover .supportDropMenu {
                                            display: block;
                                        }

                                        .supportDropMenu {
                                            position: absolute;
                                            top: 60px;
                                            width: 157px;
                                            background: #efefef;
                                            padding: 10px 0px 10px;
                                            border-radius: 0 0 10px 10px;
                                        }

                                        .supportDropMenu li {
                                            padding: 10px 20px;
                                            border-bottom: 1px solid #000;
                                        }

                                        .supportDropMenu li:last-child {
                                            border: none;
                                        }

                                        .supportDropMenu li a {
                                            color: #000;
                                        }

                                        .supportDropMenu li:hover {
                                            background: var(--color-yellow);
                                        }

                                        .supportDropMenu li:hover a {
                                            color: #fff;
                                        }
                                    </style>

                                    <!-- Header Mobile Menu -->
                                    <div class="headerMobileMenu">
                                        <button class="burger burgerOne" aria-label="Open mobile menu"> <span
                                                class="burgerLines"> <span class="burgerLine"></span> <span
                                                    class="burgerLine"></span> <span class="burgerLine"></span> <span
                                                    class="burgerLine"></span> <span class="burgerLine"></span> <span
                                                    class="burgerLine"></span> </span> <span class="burgerSlashes">
                                                <span class="burgerSlash"></span> <span class="burgerSlash"></span>
                                                <span class="burgerSlash"></span> <span class="burgerSlash"></span>
                                            </span> <span class="burgerText"> <span class="textOpen"
                                                    aria-hidden="true">Menu</span> <span class="textClose"
                                                    aria-hidden="true">Close</span> </span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="mobileMenu mobileMenuOne content-style" aria-hidden="true">

                        <!-- Backdrop -->
                        <div class="mobileMenuBackdrop"></div>

                        <!-- Wrap -->
                        <div class="mobileMenuWrap">

                            <!-- Inner -->
                            <div class="mobileMenuInner _bg-white">

                                <!-- Close Button -->
                                <div class="mobileMenuClose">
                                    <button class="burger burgerOne open" aria-label="Close mobile menu"> <span
                                            class="burgerSlashes"> <span class="burgerSlash"></span> <span
                                                class="burgerSlash"></span> <span class="burgerSlash"></span> <span
                                                class="burgerSlash"></span> </span> <span class="burgerText"> <span
                                                class="textOpen">Menu</span> <span class="textClose">Close</span>
                                        </span> </button>
                                </div>

                                <!-- Header -->
                                <div class="mobileMenuHeader"></div>

                                <!-- Body -->
                                <div class="mobileMenuBody">

                                    <!-- Navigation -->
                                    <div class="mobileMenuNav">
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>About BFC</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="wUDXDT26OV7LW5QL" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="mqq57lyxg">
                                                                <li class="no-children"><a href="about-bfc.html"><span
                                                                            class="Title">About BFC</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="The-Foley-Family.html"><span
                                                                            class="Title">The Foley Family</span></a>
                                                                </li>
                                                                <li class="no-children"><a href="Calendar.html"><span
                                                                            class="Title">BFC Calendar</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Mission-Belief.html"><span
                                                                            class="Title">Mission & Belief</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Fundraising-and-Events.html"><span
                                                                            class="Title">Community Events</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Board-of-Directors.html"><span
                                                                            class="Title">Board of
                                                                            Directors</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Social-Media.html"><span
                                                                            class="Title">Social Media</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Staff-directory.html"><span
                                                                            class="Title">Staff Directory</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Visual-Guidelines.html"><span
                                                                            class="Title">Visual Guidelines</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Admissions</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="wKM8JYECBPXC4BOF" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="mjtJnVpPh">
                                                                <li class="no-children"><a href="Why-BFC.html"><span
                                                                            class="Title">Why BFC</span></a></li>
                                                                <li class="no-children"><a href="Visit-BFC.html"><span
                                                                            class="Title">Visit BFC</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Future-Ventures.html"><span
                                                                            class="Title">Future Ventures</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Affording-BFC.html"><span
                                                                            class="Title">Affording BFC</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="International-students.html"><span
                                                                            class="Title">International
                                                                            Students</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Transfer-Students.html"><span
                                                                            class="Title">Transfer Students</span></a>
                                                                </li>
                                                                <li class="no-children"><a href="HSPT.html"><span
                                                                            class="Title">HSPT</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Events-Documents.html"><span
                                                                            class="Title">Events &
                                                                            Documents</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Academics & Arts</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="wB1X3D90QFRXIGQG" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="m9Sw0CDYL">
                                                                <li class="no-children"><a
                                                                        href="Academics-departments.html"><span
                                                                            class="Title">Academic
                                                                            Departments</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Graduation-and-Grading.html"><span
                                                                            class="Title">Graduation and
                                                                            Grading</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Technology.html"><span
                                                                            class="Title">Technology</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Counseling.html"><span
                                                                            class="Title">Counseling</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="The-BFC-Media-Center.html"><span
                                                                            class="Title">Media Center</span></a></li>
                                                                <li class="no-children"><a href="PASS.html"><span
                                                                            class="Title">PASS</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Student Life</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="w6QR26A8MP3V5CJ6" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="m45RJiOXi">
                                                                <li class="no-children"><a
                                                                        href="Extracurricular-Activities.html"><span
                                                                            class="Title">Extracurricular
                                                                            Activities</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Student-Parent-Handbook.html"><span
                                                                            class="Title">Student & Parent
                                                                            Handbook</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Honor-Code.html"><span
                                                                            class="Title">Honor Code</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Performing-Visual-Arts.html"><span
                                                                            class="Title">Performing & Visual
                                                                            Arts</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="VentureNation.html"><span
                                                                            class="Title">VentureNation</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Spirit-Shop.html"><span
                                                                            class="Title">Spirit Shop</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Photo-Albums.html"><span
                                                                            class="Title">Photo Albums</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Athletics</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="wU02EPO2W5K6IT8F" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="mij7aLsYS">
                                                                <li class="no-children"><a href="Athletics.html"><span
                                                                            class="Title">Venture Athletics</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="https://www.bfcathletics.com/"
                                                                        target="_blank"><span class="Title">BFC
                                                                            Athletics - Big Teams</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Athletics-Calendar.html"><span
                                                                            class="Title">Athletics
                                                                            Calendar</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Alumni-Athletes.html"><span
                                                                            class="Title">Alumni Athletes</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Facility-Rentals.html"><span
                                                                            class="Title">Facility Rentals</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Spirit-Wear.html"><span
                                                                            class="Title">Spirit Wear</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Championships-and-Honors.html"><span
                                                                            class="Title">Championships and
                                                                            Honors</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Athletic-Summer-Camps.html"><span
                                                                            class="Title">Athletic Summer
                                                                            Camps</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Faith</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="w8PT9U1Q1G7M0K4J" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="mRTUIwgsy">
                                                                <li class="no-children"><a
                                                                        href="Foley-Faith.html"><span
                                                                            class="Title">Foley Faith</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Grandparents-Day.html"><span
                                                                            class="Title">Grandparents Day
                                                                            2023</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Christian-Service.html"><span
                                                                            class="Title">Christian Service</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Prayer-and-Event-Opportunities.html"><span
                                                                            class="Title">Prayer and Event
                                                                            Opportunities</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Catholic-Corner.html"><span
                                                                            class="Title">Catholic Corner
                                                                            Monthly</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Alumni</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="wZENTAA7COFASR09" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="mZ0HjWTC4">
                                                                <li class="no-children"><a href="Alumni.html"><span
                                                                            class="Title">Alumni Actions</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Alumni-Board.html"><span
                                                                            class="Title">Alumni Board</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Alumni-Spotlights.html"><span
                                                                            class="Title">Alumni Spotlights</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Reunion-and-Events.html"><span
                                                                            class="Title">Reunion and
                                                                            Events</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Voice-of-the-Ventures.html"><span
                                                                            class="Title">Voice of the
                                                                            Ventures</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="accordionWrap">
                                                <div class="accordionBtn">
                                                    <p>Current Families</p>
                                                    <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                                <div class="accordionContent">
                                                    <div id="wVET4FUBRSPS3JLN" class="mwPageBlock Menu"
                                                        style="">
                                                        <div class="blockContents">
                                                            <ul id="mRrasXGRt">
                                                                <li class="no-children"><a
                                                                        href="Daily-Announcements.html"><span
                                                                            class="Title">Daily
                                                                            Announcements</span></a></li>
                                                                <li class="no-children"><a href="Menu.html"><span
                                                                            class="Title">Lunch Menu</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Parent-Portal.html"><span
                                                                            class="Title">Parent Portal</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="https://www.signupgenius.com/"
                                                                        target="_blank"><span class="Title">SignUp
                                                                            Genius</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Attendance.html"><span
                                                                            class="Title">Attendance</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Student-Parent-Handbook.html"><span
                                                                            class="Title">Student & Parent
                                                                            Handbook</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="School-Year-Calendar.html"><span
                                                                            class="Title">School Year
                                                                            Calendar</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Emergency-Preparedness.html"><span
                                                                            class="Title">Emergency
                                                                            Preparedness</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Counseling.html"><span
                                                                            class="Title">Counseling</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Parent-Teacher-Conferences.html"><span
                                                                            class="Title">Parent Teacher
                                                                            Conferences</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Media-Center.html"><span
                                                                            class="Title">Media Center</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Parent-Groups-and-Involvement.html"><span
                                                                            class="Title">Parent Groups and
                                                                            Involvement</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Grandparents-Club.html"><span
                                                                            class="Title">Grandparents Club</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="Graduation-Requirements.html"><span
                                                                            class="Title">Graduation
                                                                            Requirements</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="files/galleries/2023-24_SummerReading.pdf"
                                                                        target="_blank"><span class="Title">Summer
                                                                            Reading</span></a></li>
                                                                <li class="no-children"><a
                                                                        href="Athletic-Forms.html"><span
                                                                            class="Title">Athletic Forms</span></a>
                                                                </li>
                                                                <li class="no-children"><a
                                                                        href="All-School-Raffle.html"><span
                                                                            class="Title">All School Raffle</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        <div id="wYOQZBX967CE1MTO" class="mwPageBlock Menu" style="">
                                            <div class="blockContents">
                                                <ul id="mL6eQ2k2Z">
                                                    <li class="no-children"><a href="index.html"><span
                                                                class="Title"><span class="fa fa-home"></span>
                                                                Home</span></a></li>
                                                    <li class="no-children"><a
                                                            href="https://bfchs-mi.client.renweb.com/pwr/"
                                                            target="_blank"><span class="Title"><span
                                                                    class="fas fa-globe"></span> FACTS Login</span></a>
                                                    </li>
                                                    <li class="no-children"><a href="Calendar.html"><span
                                                                class="Title"><span class="fas fa-calendar"></span>
                                                                Calendar</span></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="wE4ZD8PJX9CI6DQU" class="mwPageBlock Menu" style="">
                                            <div class="blockContents">
                                                <ul id="mQF2k3y3u">
                                                    <li class="no-children"><a
                                                            href="https://1stplacespiritwear.com/schools/MI/Madison+Heights/Bishop+Foley+Catholic+High+School"
                                                            target="_blank"><span class="Title">Online
                                                                Store</span></a></li>
                                                    <li class="no-children"><a href="contact-us.html"><span
                                                                class="Title">Contact Us</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="w6RDJ883KSIWKPTI" class="mwPageBlock Button" style="">
                                            <div class="blockContents">
                                                <div class="mwBtnCenter">
                                                    <div class="btn btnHalfRoundYellow">
                                                        <a href="https://bfchs-mi.client.renweb.com/oa/"
                                                            template="default" class="medium" target="_blank">Apply
                                                            Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="wSDYR0YT1T0L8OGD" class="mwPageBlock Button" style="">
                                            <div class="blockContents">
                                                <div class="mwBtnCenter">
                                                    <div class="btn btnHalfRoundBlack">
                                                        <a href="Support-Us.html" template="default" class="medium"
                                                            target="_self">Support Us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {

                            //-----------------------------------------------------------
                            //
                            // Mobile Menu
                            //
                            //-----------------------------------------------------------
                            //
                            (function() {

                                //--------------------------------
                                // Selectors
                                //--------------------------------
                                //
                                var $body = $('body');
                                var $header = $('.headerTwo');
                                var $burger = $('.burger', $header);
                                var $menu = $('.mobileMenuOne');
                                var $nav = $('.mobileMenuNav', $menu);
                                var $menuClose = $('.mobileMenuClose, .mobileMenuBackdrop', $menu);
                                var $menuBackdrop = $('.mobileMenuBackdrop', $menu);
                                var $navChildrenUl = $('ul ul', $nav);
                                var $navHasChildrenLi = $('li.has-children', $nav);
                                var $navHasChildrenAnchor = $('li.has-children > a', $nav);

                                //--------------------------------
                                // Initialization
                                //--------------------------------
                                //
                                // Append a plus symbol to <a class="has-children">
                                //
                                $navHasChildrenAnchor.append('<i class="fa fa-chevron-right"></i>');

                                //--------------------------------
                                // Toggle Mobile Menu
                                //--------------------------------
                                //
                                // Open
                                //
                                $burger.on('click', function() {
                                    $body.addClass('_overflow-hidden');
                                    $menu.addClass('active').attr('aria-hidden', 'false');
                                    $menuBackdrop.fadeIn(400);
                                });

                                // Close
                                //
                                $menuClose.on('click', function() {
                                    $body.removeClass('_overflow-hidden');
                                    $menu.removeClass('active').attr('aria-hidden', 'true');
                                    $menuBackdrop.fadeOut(400, function() {
                                        $navHasChildrenLi.removeClass('active');
                                        $navChildrenUl.hide().removeClass('expanded');
                                    });
                                });

                                //--------------------------------
                                // Toggle Children
                                //--------------------------------
                                //
                                $navHasChildrenAnchor.on('click', function(e) {
                                    e.preventDefault();

                                    // This Selectors
                                    //
                                    var $this = $(this);
                                    var $thisLi = $this.closest('li.has-children');

                                    // Child Selectors
                                    //
                                    var $childUl = $this.next('ul');

                                    // Children Selectors
                                    //
                                    var $childrenUl = $('ul', $childUl);
                                    var $childrenLi = $('li.has-children', $childUl);

                                    // Sibling Selectors
                                    //
                                    var $siblingLi = $thisLi.siblings('li.has-children');
                                    var $siblingChildrenUl = $('ul', $siblingLi);
                                    var $siblingChildrenLi = $('li.has-children', $siblingLi);

                                    // Toggle This
                                    //
                                    $thisLi.toggleClass('active');

                                    // Toggle Child
                                    //
                                    $childUl.slideToggle().toggleClass('expanded');

                                    // Collapse Grandchildren
                                    //
                                    $childrenLi.removeClass('active');
                                    $childrenUl.slideUp().removeClass('expanded');

                                    // Collapse Siblings
                                    //
                                    $siblingLi.removeClass('active');
                                    $siblingChildrenLi.removeClass('active');
                                    $siblingChildrenUl.slideUp().removeClass('expanded');
                                });
                            })();

                            //-----------------------------------------------------------
                            //
                            // Toggle Search
                            //
                            //-----------------------------------------------------------
                            //
                            (function() {
                                var $searchBtn = $('.headerTwo .searchBtn');
                                var $searchBar = $('.headerTwo .searchBar');
                                var $searchBarInput = $('.headerTwo .searchBar input[name="q"]');

                                $searchBtn.on('click', function(e) {
                                    e.preventDefault();

                                    $('.headerTwo').toggleClass('searchBar-active');
                                    6
                                    if ($searchBar.hasClass('active')) {
                                        $searchBtn.removeClass("active");
                                        $searchBar.removeClass("active");
                                        $searchBarInput.blur();
                                    } else {
                                        $searchBtn.addClass("active");
                                        $searchBar.addClass("active");
                                        $searchBarInput.focus();
                                    }
                                });
                            })();
                        });
                    </script>
                </div>
            </div>
        </header>
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
                <div id="wRSD92DWWGR1YRP6" class="mwPageBlock Include" style="">
                    <div class="blockContents">

                        <div class="videoBanner videoBannerOne videoBannerLarge content-style">
                            <div class="videoBannerWrap"
                                style="background-image: url('{{ asset('frontend/files/galleries/BFC_Video_Placeholder.jpg') }}')"
                                data-fit-img>
                                <video autoplay="autoplay" loop="loop" muted="muted"
                                    poster="{{ asset('frontend/files/galleries/BFC_Video_Placeholder.jpg') }}"
                                    data-fit-img-child>
                                    <source src="{{ asset('frontend/files/galleries/Sequence_01.webm') }}"
                                        type="video/mp4" />
                                    <img class="_img-fluid" alt=""
                                        src="{{ asset('frontend/files/galleries/BFC_Video_Placeholder.jpg') }}" />
                                </video>
                                <div class="videoBannerInner">
                                    <div class="container">
                                        <h1 class="videoBannerTitle">

                                            Ready to start your next
                                        </h1>
                                        <p class="videoBannerParagraph">Adventure?</p>

                                        <div class="decoration">
                                            <div class="decoLine _mx-auto _mb-30 _bg-secondary"
                                                style="width: 2px; height: 128.5px;"></div>
                                        </div>

                                        <div class="videoBannerBtns">



                                        </div>
                                    </div>
                                </div>
                                <div class="playbutton"><a href="%7bvideoBanner_fulllength%7d.html"
                                        class="video-popup"><img
                                            src="{{ asset('frontend/images/play-button.png') }}"> Play Full Video</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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
