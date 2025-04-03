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
                        @foreach($headerMenus as $key => $headerMenu)
                            <div class="section-{{$key}}">
                                <div class="mmInner">
                                    <div class="mmMenuWrap">
                                        <div id="wRD5T62GCENNQUFU" class="mwPageBlock Menu" style="">
                                            <div class="blockContents">
                                                <ul id="mb697HaEX">
                                                    @foreach($headerMenu->children as $childMenu)
                                                        <li class="no-children">
                                                            <a href="{{ $childMenu->slug_url }}">
                                                                <span class="Title">{{ $childMenu->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mmContentWrap">
                                        <div id="wTZ70YY2WMVFBFLT" class="mwPageBlock Content" style="">
                                            <div class="blockContents">
                                                <h3>
                                                    {{ $headerMenu->name }}
                                                </h3>
                                                <p>
                                                    {{ $headerMenu->excerpt }}
                                                </p>
                                                <p>
                                                    <a href="{{ $headerMenu->slug_url }}">Learn More</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mmContentImage">
                                        <div id="wHKYMKO5Z21U1S82" class="mwPageBlock Content" style="">
                                            <div class="blockContents">
                                                <p>
                                                    <img src="{{ $headerMenu->image ? asset('storage/' . $headerMenu->image) : asset('frontend/files/_cache/default-fallback.jpg') }}"
                                                         alt="{{ $headerMenu->title ?? 'Menu Image' }}"
                                                         width="247"
                                                         height="225" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Header Search Bar -->
                    <div class="headerSearchBar">
                        <div class="searchBar">
                            <div class="searchBarWrap">
                                <span class="fa fa-times searchBtn"></span>
                                <div class="searchBarForm">
                                    <form action="#" method="GET">
                                        <input type="text" name="q" value="" placeholder="Search">
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
                                            <li>
                                                <a href="#" target="_blank"><span class="fas fa-user"></span>
                                                    Current Families <span class="fas fa-caret-down"></span></a>
                                                <div class="utilDD">
                                                    <div id="w5FTFY71OGWXJWTO" class="mwPageBlock Menu"
                                                         style="">
                                                        <div class="blockContents">
                                                            <ul id="mJuXFDaXM">
                                                                @foreach ($topBarMenus as $topBarMenu)
                                                                    <li class="no-children">
                                                                        <a href="{{ $topBarMenu->slug_url }}">
                                                                            <span class="Title">{{$topBarMenu->name}}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
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
                                                    <li class="no-children"><a href="/"><span
                                                                class="Title"><span class="fa fa-home"></span>
                                          Home</span></a>
                                                    </li>

                                                    <li class="no-children">
                                                        <a href="#" target="_blank">
                                                            <span class="Title">
                                                                <span class="fas fa-globe"></span>
                                                                FACTS Login
                                                            </span>
                                                        </a>
                                                 </li>


                                                    <li class="no-children">
                                                        <a href="#">
                                                            <span class="Title">
                                                                <span class="fas fa-calendar"></span>
                                                                Calendar
                                                            </span>
                                                        </a>
                                                 </li>


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
                                                    <li class="no-children">
                                                        <a
                                                            href="#"
                                                            target="_blank">
                                                            <span class="Title">
                                                                Online Store
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="no-children">
                                                        <a href="#">
                                                            <span class="Title">Contact Us</span>
                                                        </a>
                                                    </li>
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
                            <div class="headerLogo trans">
                                <h1>
                                    <a href="/">{{ $siteSetting->name }}</a>
                                </h1>
                                {{--                                <a href="/">--}}
                                {{--                                    <img src="{{ asset('frontend/images/logo.svg') }}" class="trans"--}}
                                {{--                                        title="{{ $siteSetting->name }}" alt="{{ $siteSetting->name }}" />--}}
                                {{--                                </a>--}}
                            </div>
                        </div>
                        <!-- Header Main Right -->
                        <div class="headerMainRight">
                            <!-- Header Menu -->
                            <div class="headerMenu">
                                <div class="Menu">
                                    <div class="blockContents">
                                        <ul id="m8K74y54S">
                                            @foreach ($headerMenus as $key => $headerMenu)
                                                <li>
                                                    <a href="{{ $headerMenu->slug_url }}" class="menuTrigger" data-target="section-{{$key}}">
                                                        {{ $headerMenu->name }}
                                                    </a>
                                                </li>
                                            @endforeach
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
                                                <a href="#" template="default"
                                                   class="medium" target="_blank">Apply
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
                                                    <a href="#" template="default" class="medium"
                                                       target="_self">Support Us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="supportDropMenu">
                                        <div id="wMHW7VDA66NBS70T" class="mwPageBlock Menu" style="">
                                            <div class="blockContents">
                                                <ul id="mBX1EmLLn">
                                                    <li class="no-children"><a href="#"><span
                                                                class="Title">Community Events</span></a></li>
                                                    <li class="no-children"><a href="#"><span
                                                                class="Title">Donate</span></a></li>
                                                    <li class="no-children"><a href="#"><span
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
                                    background: var(--color-default);
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
                                @foreach($headerMenus as $headerMenu)
                                    <div class="accordion">
                                        <div class="accordionWrap">
                                            <div class="accordionBtn">
                                                <p>{{ $headerMenu->name }}</p>
                                                <div class="accordionIcon"><i class="fa fa-chevron-right"></i>
                                                </div>
                                            </div>
                                            <div class="accordionContent">
                                                <div id="wUDXDT26OV7LW5QL" class="mwPageBlock Menu" style="">
                                                    <div class="blockContents">
                                                        <ul id="mqq57lyxg">
                                                            @foreach($headerMenu->children as $childMenu)
                                                                <li class="no-children">
                                                                    <a href="{{ $childMenu->slug_url }}"><span
                                                                            class="Title">{{ $childMenu->name }}</span></a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <hr />
                                <div id="wYOQZBX967CE1MTO" class="mwPageBlock Menu" style="">
                                    <div class="blockContents">
                                        <ul id="mL6eQ2k2Z">
                                            <li class="no-children"><a href="/"><span class="Title"><span
                                                            class="fa fa-home"></span>
                                    Home</span></a>
                                            </li>
                                            <li class="no-children"><a href="#"
                                                                       target="_blank"><span class="Title"><span
                                                            class="fas fa-globe"></span> FACTS Login</span></a>
                                            </li>
                                            <li class="no-children"><a href="#"><span
                                                        class="Title"><span class="fas fa-calendar"></span>
                                    Calendar</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="wE4ZD8PJX9CI6DQU" class="mwPageBlock Menu" style="">
                                    <div class="blockContents">
                                        <ul id="mQF2k3y3u">
                                            <li class="no-children"><a
                                                    href="https://1stplacespiritwear.com/schools/MI/Madison+Heights/Bishop+Foley+Catholic+High+School"
                                                    target="_blank"><span class="Title">Online
                                    Store</span></a>
                                            </li>
                                            <li class="no-children"><a href="#"><span
                                                        class="Title">Contact Us</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="w6RDJ883KSIWKPTI" class="mwPageBlock Button" style="">
                                    <div class="blockContents">
                                        <div class="mwBtnCenter">
                                            <div class="btn btnHalfRoundYellow">
                                                <a href="https://bfchs-mi.client.renweb.com/oa/" template="default"
                                                   class="medium" target="_blank">Apply
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="wSDYR0YT1T0L8OGD" class="mwPageBlock Button" style="">
                                    <div class="blockContents">
                                        <div class="mwBtnCenter">
                                            <div class="btn btnHalfRoundBlack">
                                                <a href="#" template="default" class="medium"
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
