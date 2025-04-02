 @props([
     'blockContent1' => null,
     'blockContent2' => null,
     'button1' => null,
     'button1Link' => null,
     'button2' => null,
     'button2Link' => null,
     'button3' => null,
     'button3Link' => null,
     'backgroundImage' => null,
 ])

 <div id="wV9N30UFCRROS4XL" class="mwPageBlock Include" style="">
     <div class="blockContents">
         <div class="subfooter contentArea content-style">
             <div class="container">
                 <div class="mwPageArea">
                     <div id="w9FLM8OB97SZK56E" class="mwPageBlock Include" style="">
                         <div class="blockContents">


                             <div class="contentWidth content-style">
                                 <div class="contentWidthWrap _mx-lg-auto _mx-auto" style="max-width: 870px;">
                                     <div class="mwPageArea">
                                         <div id="wY94W8GW4XSL87JV" class="mwPageBlock Include" style="">
                                             <div class="blockContents">
                                                 <div class="decoration">
                                                     <div class="decoLine _mx-auto _mb-30 _bg-secondary"
                                                         style="width: 2px; height: 128.5px;"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div id="wTZ0TFV3DS74BMI2" class="mwPageBlock Spacer" style="">
                                             <div class="blockContents">
                                                 <div class="mwSpacer medium hor"></div>
                                             </div>
                                         </div>
                                         <div id="wENM2OMYAFB84V9A" class="mwPageBlock Content" style="">
                                             <div class="blockContents">
                                                 <h2 style="text-align: center;">
                                                     {{ $blockContent1 }}
                                                     <br />
                                                     {{ $blockContent2 }}
                                                 </h2>
                                             </div>
                                         </div>
                                         <div id="wL5GY5LYEETHV364" class="mwPageBlock Include" style="">
                                             <div class="blockContents">
                                                 <div class="threeCol row">
                                                     <div class="threeColItem col-lg-4 col-md-6">
                                                         <div class="mwPageArea">
                                                             <div id="w8QW1J6HZYSXNXPE" class="mwPageBlock Button"
                                                                 style="">
                                                                 <div class="blockContents">
                                                                     <div class="mwBtnCenter">
                                                                         <div class="btn btnYellow btnRounded">
                                                                             <a href="{{ $button1Link }}"
                                                                                 template="default" class="medium"
                                                                                 target="_blank">{{ $button1 }}</a>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="Clear"></div>
                                                         </div>
                                                     </div>
                                                     <div class="threeColItem col-lg-4 col-md-6">
                                                         <div class="mwPageArea">
                                                             <div id="wVFSN7E7SZ0SMIYN" class="mwPageBlock Button"
                                                                 style="">
                                                                 <div class="blockContents">
                                                                     <div class="mwBtnCenter">
                                                                         <div
                                                                             class="btn btnYellow btnOutline btnRounded">
                                                                             <a href="{{ $button2Link }}"
                                                                                 template="default" class="medium"
                                                                                 target="_self">{{ $button2 }}</a>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="Clear"></div>
                                                         </div>
                                                     </div>
                                                     <div class="threeColItem col-lg-4">
                                                         <div class="mwPageArea">
                                                             <div id="wG8QMDVZ2EZ6Z6OD" class="mwPageBlock Button"
                                                                 style="">
                                                                 <div class="blockContents">
                                                                     <div class="mwBtnCenter">
                                                                         <div
                                                                             class="btn btnYellow btnOutline btnRounded">
                                                                             <a href="{{ $button3Link }}"
                                                                                 template="default" class="medium"
                                                                                 target="_blank">{{ $button3 }}</a>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="Clear"></div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="Clear"></div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="Clear"></div>
                 </div>
             </div>

             <img src="{{ $backgroundImage }}" />
         </div>
     </div>
 </div>
