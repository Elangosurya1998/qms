<div id="wYUZENJ1BLR5EODN" class="mwPageBlock Include" style="">
    <div class="blockContents">

        <div class="homeFourColumnWrap">
            <div class="homeFourColumn">
                <div class="homeFourCol"> Where will you venture to? </div>
                <div class="homeFourCol trans">
                    <a href="Academics-departments.html"><img src="{{ asset('frontend/images/Academics.png') }}" />
                        <h4>Academics</h4>
                        <div class="plus trans">+</div>
                    </a>
                </div>
                <div class="homeFourCol trans">
                    <a href="Athletics.html"><img src="{{ asset('frontend/images/Athletics.png') }}" />
                        <h4>Athletics</h4>
                        <div class="plus trans">+</div>
                    </a>
                </div>
                <div class="homeFourCol trans">
                    <a href="Extracurricular-Activities.html"><img
                            src="{{ asset('frontend/images/Extracurricular.png') }}" />
                        <h4>Extracurricular</h4>
                        <div class="plus trans">+</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Progress Bar --}}

<div id="wBMACIZ39FDJHUY3" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <script type="text/javascript">
            jQuery(document).ready(function($) { // When jQuery is ready

                function check_from_top_de() { // Create our function
                    var scroll = $(window).scrollTop(); // Check scroll distance
                    if (scroll >= 300) { // If it is equal or more than 300 - you can change this to what you want
                        $(".animated-bars").addClass("start_animation"); // Add custom class to body
                    } else {
                        $(".animated-bars").removeClass(
                            "start_animation"); // When scrolled to the top, remove the class
                    }
                }

                check_from_top_de(); // On load, run the function

                $(window).scroll(function() { // When scroll - run function
                    check_from_top_de();
                });

            });
        </script>

        <div class="animated-bars">
            <div class="aba"> <span class="bar-1"></span></div>
            <div class="abb"><span class="bar-2"></span></div>
            <span class="bar-3"></span>
        </div>
    </div>
</div>
