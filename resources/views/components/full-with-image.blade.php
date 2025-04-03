@props([
    'id' => null,
    'image' => null
])
<div id="wH2N60DC0DGY0I2L" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <div id="animate-NGG7LSPFG3" class="animate aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="1000">
            <div class="mwPageArea">
                <div id="w13ZOM41OAGZGDZN" class="mwPageBlock File" style="">
                    <div class="blockContents">
                        <div class="mwFileEmbed Image" style="overflow:hidden">
                            <img id="image_{{$id}}" src="{{asset('storage/'.$image)}}" class="mwFile Image full imgEd" style="display: block; border:none;width:100%; margin: 0 0%;" alt="VentureForward_WhyBFC.png">
                        </div>
                        <script type="text/javascript">
                            (function () {
                                // Small timeout for browser to catch up
                                //	setTimeout(function() {

                                // Getting image to setup
                                var $img = document.getElementById('image_{{$id}}');
                                mwLoadImage($img, 1883, 537);

                                //	}, 1);
                            })();
                        </script>
                    </div>
                </div>
                <div class="Clear"></div>
            </div>
        </div>
        <style>
            .animate .liveEdArea {padding:10px; }
            .animate .liveEdArea:before {content:"Animate"; border:1px solid #ccc; float: right; background:#00a99d; color:#fff; font-size:10px; padding:6px;}
        </style>
    </div>
</div>
