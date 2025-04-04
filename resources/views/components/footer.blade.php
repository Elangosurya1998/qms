<footer id="footerArea">
    <div id="wYF781MUV8L1PH55" class="mwPageBlock Include" style="">
        <div class="blockContents">
            <div class="footer footerThree content-style _bg-gray">
                <div class="footerWrap">
                    <div class="container">

                        <!-- Main -->
                        <div class="footerMain">
                            <div class="row">

                                <!-- Col 1 -->
                                <div class="footerCol footerCol1">
                                    <div class="footerColInner">

                                        <!-- Logo -->
{{--                                        <div class="footerLogo">--}}
{{--                                            <img src="{{ asset('frontend/images/logoFooter.svg') }}" title="{{ $siteSetting->name }}" />--}}
{{--                                        </div>--}}
                                        <h1>{{ $siteSetting->name }}</h1>

                                        <!-- Description -->
                                        <div class="footerDescription">
                                            <div id="w6CF2DQLXI7N7SY6" class="mwPageBlock Content" style="">
                                                <div class="blockContents">
                                                    <p>
                                                        {{ $siteSetting->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Col 2 -->
                                <div class="footerCol footerCol2 ">
                                    <div class="footerColInner">
                                        <div id="w502CG9QUTUGJ7YD" class="mwPageBlock Content" style="">
                                            <div class="blockContents">
                                                <p>
                                                    {{ $siteSetting->address }}
                                                </p>
                                                <p>
                                                    Phone: {{ $siteSetting->phone }}
                                                    <br />
                                                    Fax: {{ $siteSetting->fax }}
                                                </p>
                                                <hr />
                                                <h6>
                                                    An Accredited School
                                                </h6>
                                                <p>
                                                    <a href="https://www.ncea.org/" target="_blank">
{{--                                                        <img  src="{{ asset('frontend/files/_cache/372099805e9119a65e96fe8da9ef2321.png?207x134') }}"--}}
{{--                                                            alt="NCEA_logo2.png" width="207" height="134" />--}}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Col 3 -->
                                <div class="footerCol footerCol3 ">
                                    <div class="footerColInner">
                                        <div id="wKEIGN455TC66GJA" class="mwPageBlock Content" style="">
                                            <div class="blockContents">
                                                <ul>
                                                    @foreach ($footerMenus as $footerMenu)
                                                        <li>
                                                            <a title="{{ $footerMenu->name }}" href="{{ $footerMenu->slug_url }}" >{{ $footerMenu->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Col 4 -->
                                <div class="footerCol footerCol4 ">
                                    <div class="footerColInner">

                                        <!-- Newsletter -->
                                        <div class="footerNewsletter">
                                            <div id="wCSP4JPP4NSWF874" class="mwPageBlock Contact" style="">
                                                <div class="blockContents">
                                                    <script type="text/javascript">
                                                        jQuery(function() {
                                                            styleDialog('#F7NHUGN131MHEV21 .Dialog');
                                                            jQuery('#F7NHUGN131MHEV21').submit(function() {
                                                                mwListForm(this).submit();
                                                            });
                                                        }); // jQuery.onLoad
                                                    </script>
                                                    <a name="AF7NHUGN131MHEV21"></a>
                                                    <form id="F7NHUGN131MHEV21" method="post"
                                                          enctype="multipart/form-data" onsubmit="return false;">
                                                        <div class="mwFormStatus"></div>
                                                        <input type="hidden" name="relation" value="14337" />
                                                        <input type="hidden" name="list" value="25" />
                                                        <input type="hidden" name="sn" value="F7NHUGN131MHEV21" />
                                                        <table class="Dialog Tall">
                                                            <tbody>
                                                            <tr>
                                                                <td class="formGroup">
                                                                    <div class="Caption">
                                                                        <h6>
                                                                            Newsletter Sign-up
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <tbody>
                                                            <tr>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" name="name"
                                                                           value=""
                                                                           placeholder="First/Last Name" />
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <tbody>
                                                            <tr>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" name="email"
                                                                           value=""
                                                                           placeholder="Email Address" />
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <tbody>
                                                            <tr>
                                                                <td style="text-align: center;">
                                                                    <input type="submit" value="Submit"
                                                                           class="mwFormSubmit"
                                                                           style="float: right;" />
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="Clear"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Social Media Services -->
                                        <div class="footerSns">
                                            <div id="w7VZKC1M85BXBEU1" class="mwPageBlock Gensoclinks" style="">
                                                <div class="blockContents">
                                                    <div class="snsLink snsLinkDefault left">

                                                        <a href="https://www.facebook.com/BishopFoleyCatholic/"
                                                           class="small" target="_blank" aria-label="small"
                                                           title="facebook">
                                                            <i class="fab fa-facebook"></i>
                                                        </a>

                                                        <a href="https://twitter.com/BishopFoley" class="small"
                                                           target="_blank" aria-label="small" title="twitter">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>

                                                        <a href="https://www.youtube.com/channel/UCuRnn8vD1O0ugDRlv8mldIA"
                                                           class="small" target="_blank" aria-label="small"
                                                           title="youtube">
                                                            <i class="fab fa-youtube"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div> <!-- Secondary -->
                <div class="footerSecondary ">

                    <!-- Footer Copyright -->
                    <div class="footerCopyright">
                        <div class="copyrightAutoYear">© Copyright {{ date('Y')  }}</div>
                        <div id="w70YSIR18T5HQD20" class="mwPageBlock Embed" style="">
                            <div class="blockContents">
                                <div class="Container">{{ $siteSetting->name }}. All Rights Reserved.</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</footer>

<div class="mdPopupWrapB" id="request_thankyou">
    <div class="mdPopup">
        <div class="memWrap">
            <div class="mdCloseB"><span class="fa fa-times"></span></div>

            <div class="thank-you">
                <h3>Message Successfully Sent!</h3>
                <br /><br />
            </div>
        </div>
    </div>
</div>
