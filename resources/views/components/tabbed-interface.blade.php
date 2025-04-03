 @props([
    'title' => null,
    'tabs' => []
])


<div id="w4PLTTMKB0EBNC61" class="mwPageBlock Include" style="">
     <div class="blockContents">
         <div class="homeTabsWrap">
             <div class="tabsLeft">
                 <div class="tabsLeftTop">Select a tab <span class="fa fa-arrow-right"></span>

                 </div>
                 <div class="tabsLeftBottom">
                     <h4>{{ $title }}</h4>
                 </div>
             </div>
             <div class="tabsRight">
                 <div class="tabsRightMenu">
                     @foreach($tabs as $index => $tab)
                         <div class="tabBtn bg-{{ $index + 1  }}">{{ $tab['title'] }}</div>
                     @endforeach
                 </div>
                 <div class="tabcontentWrap">
                     @foreach($tabs as $index => $tab)
                         <div class="tab bg-{{ $index + 1  }}">
                            <div class="mwPageArea">
                                 <div id="wTGHEJ2REFTINPEN" class="mwPageBlock Include" style="">
                                     <div class="blockContents">
                                         <div class="threeCol row">
                                             @foreach($tab['statistics'] as $statistic)
                                                 <div class="threeColItem col-lg-4 col-md-6">
                                                     <div class="mwPageArea">
                                                         <div id="wJI1696MYJCKLHAG" class="mwPageBlock Include" style="">
                                                             <div class="blockContents">

                                                                 <div class="countUp countUpOne">
                                                                     <div class="countUpWrap">
                                                                         <p>
                                                                     <span class="countUpTop">
                                                                         <span class="countUpNum">{{ $statistic['value'] }}</span><span
                                                                             class="countUpSymbol">{{ $statistic['symbol'] }}</span></span>
                                                                             <span class="countUpBottom">
                                                                         <span class="countUpText">{{ $statistic['description'] }}</span>
                                                                     </span>
                                                                         </p>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="Clear"></div>
                                                     </div>
                                                 </div>
                                             @endforeach
                                         </div>
                                     </div>
                                 </div>
                                 <div class="Clear"></div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>


         <script>
             jQuery('.tab.bg-1').show();
             jQuery('.tab.bg-2').hide();
             jQuery('.tab.bg-3').hide();
             jQuery('.tabBtn.bg-1').addClass('active');


             jQuery('.tabBtn.bg-1').click(function() {

                 jQuery('.tab.bg-1').show();
                 jQuery('.tab.bg-2').hide();
                 jQuery('.tab.bg-3').hide();

                 jQuery('.tabBtn.bg-1').addClass('active');
                 jQuery('.tabBtn.bg-2').removeClass('active');
                 jQuery('.tabBtn.bg-3').removeClass('active');

                 jQuery('.tabsLeft').removeClass('tab-2');
                 jQuery('.tabsLeft').removeClass('tab-3');
                 jQuery('.tabsLeft').addClass('tab-1');

             });

             jQuery('.tabBtn.bg-2').click(function() {
                 jQuery('.tab.bg-1').hide();
                 jQuery('.tab.bg-2').show();
                 jQuery('.tab.bg-3').hide();

                 jQuery('.tabBtn.bg-1').removeClass('active');
                 jQuery('.tabBtn.bg-2').addClass('active');
                 jQuery('.tabBtn.bg-3').removeClass('active');

                 jQuery('.tabsLeft').addClass('tab-2');
                 jQuery('.tabsLeft').removeClass('tab-1');
                 jQuery('.tabsLeft').removeClass('tab-3');
             });

             jQuery('.tabBtn.bg-3').click(function() {

                 jQuery('.tab.bg-1').hide();
                 jQuery('.tab.bg-2').hide();
                 jQuery('.tab.bg-3').show();

                 jQuery('.tabBtn.bg-1').removeClass('active');
                 jQuery('.tabBtn.bg-2').removeClass('active');
                 jQuery('.tabBtn.bg-3').addClass('active');

                 jQuery('.tabsLeft').addClass('tab-3');
                 jQuery('.tabsLeft').removeClass('tab-1');
                 jQuery('.tabsLeft').removeClass('tab-2');

             });
         </script>

     </div>
 </div>

