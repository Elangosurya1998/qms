{{-- Here we can add carousel images, titles and Descriptions in upward carousel --}}
<div id="wD4DWFLLIND92X33" class="mwPageBlock Gallery" style="">
    <div class="blockContents">
        <div id="imgCardGallery-6XIRSL" class="imgCardGallery imgCardGalleryOne">
            <div class="imgCardGalleryWrap" style="margin: 0 auto; max-width: 680px;">

                <div class="imgCardGalleryItem">
                    <div class="imgCardGalleryItemWrap _bg-light">
                        <div class="imgCardGalleryContent">
                            <h2 class="imgCardGalleryTitle">
                                Academic
                                Excellence
                            </h2>
                            <div class="imgCardGalleryDes">
                                <p>Bishop
                                    Foley
                                    Catholic
                                    is
                                    academically
                                    excellent
                                    by
                                    offering
                                    more
                                    than&nbsp;<strong><a href="apps/departments/index362d.html?show=TDE" target="_blank"
                                            rel="noopener noreferrer">100
                                            courses
                                            and
                                            20
                                            AP
                                            and
                                            honors
                                            classes</a></strong>&nbsp;each
                                    year and
                                    the
                                    class of
                                    2018 was
                                    awarded
                                    $8.1
                                    million
                                    in
                                    scholarships.
                                </p>
                            </div>
                        </div>
                        <div class="imgCardGalleryImg _bg-top" role="img" aria-label="Academic Excellence"
                            style="background-image: url('files/_cache/9a058eb04fa970c89c370ef6350b0ce2.jpg')">
                        </div>
                    </div>
                </div>

                <div class="imgCardGalleryItem">
                    <div class="imgCardGalleryItemWrap _bg-light">
                        <div class="imgCardGalleryContent">
                            <h2 class="imgCardGalleryTitle">
                                Extracurricular
                                Activities
                            </h2>
                            <div class="imgCardGalleryDes">
                                <p>BFC
                                    students
                                    can
                                    participate
                                    in a
                                    wide
                                    variety
                                    of&nbsp;<a href="Extracurricular-Activities.html">extracurricular
                                        activities&nbsp;</a>that
                                    explore
                                    faith,
                                    science,
                                    technology,
                                    music,
                                    performing
                                    arts,
                                    visual
                                    arts,
                                    community
                                    service,
                                    and
                                    more.
                                </p>
                            </div>
                        </div>
                        <div class="imgCardGalleryImg _bg-top" role="img" aria-label="Extracurricular Activities"
                            style="background-image: url('files/_cache/a69c2693d397068d746653f899c59ff2.jpg')">
                        </div>
                    </div>
                </div>

                <div class="imgCardGalleryItem">
                    <div class="imgCardGalleryItemWrap _bg-light">
                        <div class="imgCardGalleryContent">
                            <h2 class="imgCardGalleryTitle">
                                Catholic
                                Faith</h2>
                            <div class="imgCardGalleryDes">
                                <p>Our&nbsp;<a href="Foley-Faith.html">Catholic
                                        faith</a>&nbsp;is
                                    practiced
                                    with
                                    daily
                                    prayer,
                                    weekly
                                    mass,
                                    spiritual
                                    retreats,
                                    and a
                                    wide
                                    variety
                                    of
                                    community
                                    service
                                    projects.
                                </p>
                            </div>
                        </div>
                        <div class="imgCardGalleryImg _bg-top" role="img" aria-label="Catholic Faith"
                            style="background-image: url('files/_cache/583fc9d5f70d8b388025deb0abfae3ae.jpg')">
                        </div>
                    </div>
                </div>

                <div class="imgCardGalleryItem">
                    <div class="imgCardGalleryItemWrap _bg-light">
                        <div class="imgCardGalleryContent">
                            <h2 class="imgCardGalleryTitle">
                                Award
                                Winning</h2>
                            <div class="imgCardGalleryDes">
                                <p>Foley is
                                    home to
                                    award-winning
                                    academic
                                    departments
                                    and
                                    extracurricular
                                    teams.
                                </p>
                            </div>
                        </div>
                        <div class="imgCardGalleryImg _bg-top" role="img" aria-label="Award Winning"
                            style="background-image: url('files/_cache/849f805ef4a48820ff7e7ecbc556c808.jpg')">
                        </div>
                    </div>
                </div>

                <div class="imgCardGalleryItem">
                    <div class="imgCardGalleryItemWrap _bg-light">
                        <div class="imgCardGalleryContent">
                            <h2 class="imgCardGalleryTitle">
                                Athletic
                                Programs
                            </h2>
                            <div class="imgCardGalleryDes">
                                <p>We are
                                    proud of
                                    our 116
                                    athletic
                                    championships!
                                    Students
                                    can
                                    select
                                    from&nbsp;<a href="Athletics.html">22
                                        athletic
                                        programs</a>.
                                </p>
                            </div>
                        </div>
                        <div class="imgCardGalleryImg _bg-top" role="img" aria-label="Athletic Programs"
                            style="background-image: url('files/_cache/64f018785db9363d3b0a1387fee366db.jpg')">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                (function() {

                    //-----------------------------------------------------------
                    // Global Items
                    //-----------------------------------------------------------
                    //
                    var $el = $('#imgCardGallery-6XIRSL');
                    var $items = $('.imgCardGalleryItem', $el);

                    //-----------------------------------------------------------
                    // Global Parameters
                    //-----------------------------------------------------------
                    //
                    var push_back_distance = 40;
                    var last_index = $items.length - 1;

                    //-----------------------------------------------------------
                    // Global Selectors
                    //-----------------------------------------------------------
                    //
                    var $fistItem = $($items[0]);
                    var $lastItem = $($items[last_index]);

                    //-----------------------------------------------------------
                    // Set fist and last item
                    //-----------------------------------------------------------
                    //
                    $fistItem.addClass('first-item');
                    $lastItem.addClass('last-item');

                    //-----------------------------------------------------------
                    // Start Looping
                    //
                    // MUST READ NOTE:
                    //
                    // In case you wonder why it does not use setPin() method.
                    // It was developed initially using setPin(), however,
                    // because when setPin() is used, the target selector
                    // toggles CSS position between "relative" and "fixed",
                    // this behavior causes the selector extremely jumpy
                    // on both Chrome and Safari mobile.
                    //
                    // While setPin() would save time, but using a combination of
                    // display: sticky and a few extra manual calculations, it
                    // eliminates the flickering/jumpy bug and makes
                    // the animation more fluid as well.
                    //-----------------------------------------------------------
                    //
                    $items.each(function(index) {

                        //--------------------------------
                        // Selectors
                        //--------------------------------
                        //
                        var $current = $(this);
                        var $currentWrap = $('.imgCardGalleryItemWrap', $current);

                        var $prev = $($items[index - 1]);
                        var $prevWrap = $('.imgCardGalleryItemWrap', $prev);

                        var $prevPrev = $($items[index - 2]);
                        var $prevPrevWrap = $('.imgCardGalleryItemWrap', $prevPrev);

                        //--------------------------------
                        // Push back scene
                        //--------------------------------
                        //
                        if (index !== last_index && $prev.length) {

                            var push_back_scene = new ScrollMagic.Scene({
                                    triggerHook: 0,
                                    offset: getOffset(),
                                    duration: getDuration(),
                                    reverse: true
                                })
                                .setTween($prevWrap, {
                                    opacity: 0.5,
                                    scale: 0.95,
                                    y: -push_back_distance
                                })
                                .addTo(SMController);
                        }


                        //--------------------------------
                        // Push hidden scene
                        //--------------------------------
                        //
                        if ($prevPrev.length) {
                            var push_hidden_scene = new ScrollMagic.Scene({
                                    triggerHook: 0,
                                    offset: getOffset(),
                                    duration: getDuration() / 3,
                                    reverse: true
                                })
                                .setTween($prevPrevWrap, {
                                    opacity: 0
                                })
                                .addTo(SMController);
                        }

                        //--------------------------------
                        // Last Scene
                        //--------------------------------
                        //
                        if (index === last_index) {
                            var last_scene = new ScrollMagic.Scene({
                                    triggerHook: 0,
                                    offset: getOffset() + (getDuration() / 3),
                                    duration: getDuration() / 2,
                                    reverse: true
                                })
                                .setTween($prevWrap, {
                                    opacity: 0,
                                    scale: 0.95,
                                    y: -push_back_distance
                                })
                                .addTo(SMController);
                        }

                        //--------------------------------
                        // Window Resize
                        //--------------------------------
                        //
                        $(window).on('resize', _debounce(function() {

                            // Clear sticky
                            //
                            $current.css({
                                'position': '',
                                'top': ''
                            });

                            // Recalculate parameters
                            //
                            if (push_back_scene) {
                                push_back_scene
                                    .offset(getOffset())
                                    .duration(getDuration());
                            }
                            if (push_hidden_scene) {
                                push_hidden_scene
                                    .offset(getOffset())
                                    .duration(getDuration() / 3);
                            }
                            if (last_scene) {
                                last_scene
                                    .offset(getOffset() + (getDuration() / 2.5))
                                    .duration(getDuration() / 2.5);
                            }
                        }, 250));

                        //--------------------------------
                        // Functions
                        //--------------------------------
                        //
                        // Get Offset
                        //
                        function getOffset() {
                            var a = $prev.offset().top;
                            var b = $prev.height();
                            var c = $current.offset().top;

                            return (c - b) - getHeaderOffset();
                        }

                        // Get Push Back Duration
                        //
                        function getDuration() {
                            return $current.height();
                        }

                        // Get Header Offset
                        //
                        function getHeaderOffset() {
                            return $('.headerWrap').height() + push_back_distance;
                        }
                    });

                    //-----------------------------------------------------------
                    // Set Sticky
                    //-----------------------------------------------------------
                    //
                    setSticky();

                    //-----------------------------------------------------------
                    // Window Resize
                    //-----------------------------------------------------------
                    //
                    $(window).on('resize', _debounce(function() {
                        setSticky();
                    }, 250));

                    //-----------------------------------------------------------
                    // Set sticky top value if browser
                    // supports position: sticky
                    // and not last item
                    //-----------------------------------------------------------
                    //
                    function setSticky() {
                        $items.not($lastItem).css({
                            'position': 'sticky',
                            'top': $('.headerWrap').height() + push_back_distance
                        });
                    }

                })();
            });
        </script>
        <script type="text/javascript">
            jQuery(function() {
                mwInitMedia('#wD4DWFLLIND92X33')
            });
        </script>
    </div>
</div>
