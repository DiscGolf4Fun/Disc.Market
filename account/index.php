<?php 
    ob_start();
    include_once($_SERVER['DOCUMENT_ROOT'].'/header.php'); 
?>
</div>
</div>

<style>
* { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
/*Font styels*/

#generic-tabs{ font: 67.5%; width:100%; padding:20px;-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

/*Tab styles*/
#generic-tabs ul { overflow: hidden; margin:0; padding:0;}
#generic-tabs ul li{ float:left; display:inline-block; width:16.66%; background:#EDEDED; border-top:4px solid #CCCCCC; border-right:1px solid #CCCCCC;}
#generic-tabs ul li:last-child {border-right:none;}
#generic-tabs ul li:first-child { padding-left:0; }

/*Tab link styles*/
#generic-tabs ul li a {text-align:center; display:block; font-size: 1em; text-decoration: none; padding: 1.2em 1em; line-height: 16px; color:#555;}

/*Active tab styles*/
#generic-tabs ul li.active {background:#FCFCFC; border-top:4px solid #27ae60;}
#generic-tabs ul li.active a { color:#333333;}
#generic-tabs ul li.active a i {color:#27ae60;}

/*Tab content styles*/

#generic-tabs .tab-content{ background:#FCFCFC; padding:2em 2em;}

.filterButton {
    margin-left: 0;
    margin-top: 1.5em;
}

#newUsedButton {
    margin-bottom: 0;
}

</style>

<?php if(isset($_SESSION['u_uid'])) { ?>
    <div id="main-wrapper">
        <div class="container">

            <section id="generic-tabs">
                <ul id="tabs">
                    <li>
                        <a title="Account" href="#first-tab" class="myaccount"><i class="fa fa-user"></i>&nbsp;&nbsp;My Account</a>	        
                    </li>
                    <li>
                        <a title="Posts" href="#second-tab" class="myposts"><i class="fa fa-list"></i>&nbsp;&nbsp;My Posts</a>	
                    </li>
                    <li>
                        <a title="Bids" href="#third-tab" class="currentbids"><i class="fa fa-gavel"></i>&nbsp;&nbsp;Current Bids</a>	
                    </li>	
                    <li>
                        <a title="Messages" href="#forth-tab" class="messages"><i class="fa fa-comments"></i>&nbsp;&nbsp;Messages</a>	
                    </li>	
                    <li>
                        <a title="Sales" href="#fifth-tab" class="pastsales"><i class="fa fa-money"></i>&nbsp;&nbsp;Past Sales</a>	
                    </li>
                    <li>
                        <a title="Purchases" href="#sixth-tab" class="pastpurchases"><i class="fa fa-usd"></i>&nbsp;&nbsp;Past Purchases</a>	
                    </li>				    
                </ul>
                <div id="first-tab" class="tab-content" style="display: none;">  
                    <div class="row">   
                        <h2>My Account</h2>
                        <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                    </div>
                </div>

                <div id="second-tab" class="tab-content" style="display: none;">    
                    <div class="buyContent">
                        <section id="search" style="margin-bottom:1em;">
                            <div class="search-container">
                                <form>
                                    <input id="search1MyPosts" name="search" type="text" placeholder="Search your posts..." onkeyup="getPostsSearchMyPosts(this.value)" style="border: solid 1px #000;" >
                                    <button id="search2" type="button" data-toggle="confirm" role="button">
                                        <i class="fa fa-refresh" style="font-size: 1.5em;"></i>
                                    </button>
                                    <div class="dropdown">
                                        <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                        <div class="custom-select">
                                            <select onchange="getPostsTopFilterMyPosts(this.value)">
                                                <option value="endingSoonest">Ending: Soonest</option>
                                                <option value="endingLatest">Ending: Latest</option>
                                                <!-- <option value="new">Newest</option> -->
                                                <option value="low">Price: Lowest</option>
                                                <option value="high">Price: Highest</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div> 
                    <div class="filterButton">
						<div id="filterResultsMyPosts"></div>
					</div>
                    <div id="resultsMyPosts" style="margin-top: 4.5em;"></div>  
                </div>

                <div id="third-tab" class="tab-content" style="display: none;">    
                    <div class="buyContent">
                        <section id="search" style="margin-bottom:1em;">
                            <div class="search-container">
                                <form>
                                    <input id="search1CurrentBids" name="search" type="text" placeholder="Search current bids..." onkeyup="getPostsSearchCurrentBids(this.value)" style="border: solid 1px #000;" >
                                    <button id="search2" type="button" data-toggle="confirm" role="button">
                                        <i class="fa fa-refresh" style="font-size: 1.5em;"></i>
                                    </button>
                                    <div class="dropdown">
                                        <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                        <div class="custom-select">
                                            <select onchange="getPostsTopFilterCurrentBids(this.value)">
                                                <option value="endingSoonest">Ending: Soonest</option>
                                                <option value="endingLatest">Ending: Latest</option>
                                                <!-- <option value="new">Newest</option> -->
                                                <option value="low">Price: Lowest</option>
                                                <option value="high">Price: Highest</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div> 
                    <div class="filterButton">
						<div id="filterResultsCurrentBids"></div>
					</div>
                    <div id="resultsCurrentBids" style="margin-top: 4.5em;"></div>  
                </div>

                <div id="forth-tab" class="tab-content" style="display: none;">        
                    <h2>Messages</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

                <div id="fifth-tab" class="tab-content" style="display: none;">        
                    <h2>Past Sales</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

                <div id="sixth-tab" class="tab-content" style="display: none;">        
                    <h2>Past Purchases</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

		    </section>	
        </div>
    </div>
    <?php } else { 
        header( 'Location: /' );
        exit();
} ?>


<?php include_once($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>

<script>
    (function(){

        if (window.location.hash.substr(1) == 'myaccount') {
            $('#generic-tabs ul#tabs li:nth-child(1)').addClass('active');
            $('#generic-tabs div:nth-child(2)').show();
            $('#generic-tabs div:nth-child(2) div').show();
        } else if (window.location.hash.substr(1) == 'myposts') {
            $('#generic-tabs ul#tabs li:nth-child(2)').addClass('active');
            $('#generic-tabs div:nth-child(3)').show();
            $('#generic-tabs div:nth-child(3) div').show();
        } else if (window.location.hash.substr(1) == 'currentbids') {
            $('#generic-tabs ul#tabs li:nth-child(3)').addClass('active');
            $('#generic-tabs div:nth-child(4)').show();
            $('#generic-tabs div:nth-child(4) div').show();
        }  else if (window.location.hash.substr(1) == 'messages') {
            $('#generic-tabs ul#tabs li:nth-child(4)').addClass('active');
            $('#generic-tabs div:nth-child(5)').show();
            $('#generic-tabs div:nth-child(5) div').show();           
        }  else if (window.location.hash.substr(1) == 'pastsales') {
            $('#generic-tabs ul#tabs li:nth-child(5)').addClass('active');
            $('#generic-tabs div:nth-child(6)').show();
            $('#generic-tabs div:nth-child(6) div').show();          
        }  else if (window.location.hash.substr(1) == 'pastpurchases') {
            $('#generic-tabs ul#tabs li:nth-child(6)').addClass('active');
            $('#generic-tabs div:nth-child(7)').show();
            $('#generic-tabs div:nth-child(7) div').show();           
        }
        //Functionality when a tab is clicked
        $('#generic-tabs ul#tabs li a').click(function(){
        	//Firstly remove the current active class
            $('#generic-tabs ul#tabs li').removeClass('active');
            //Apply active class to the parent(li) of the link tag
            $(this).parent().addClass('active');
            //Set currentTab to this link
            var currentTab = $(this).attr('href');
            //Hide away all tabs
            $('#generic-tabs div').hide();            
            //show the current tab
            $(currentTab).show();
            $(currentTab).find("div").show();
            //Stop default link action from happening
            return false;
        });	

        $('.myaccount').click(function(e) {
            window.location.hash = 'myaccount';
            return false;
        });

        $('.myposts').click(function(e) {
            window.location.hash = 'myposts';
            return false;
        });

        $('.currentbids').click(function(e) {
            window.location.hash = 'currentbids';
            return false;
        });

        $('.messages').click(function(e) {
            window.location.hash = 'messages';
            return false;
        });
        $('.pastsales').click(function(e) {
            window.location.hash = 'pastsales';
            return false;
        });
        $('.pastpurchases').click(function(e) {
            window.location.hash = 'pastpurchasess';
            return false;
        });

})(window.jQuery);
</script>



