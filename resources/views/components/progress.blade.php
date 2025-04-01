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
