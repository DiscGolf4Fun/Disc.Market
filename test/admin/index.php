<?php 
ob_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/test/header.php'); 
?>
</div>
</div>

<style>
* { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
/*Font styels*/

#generic-tabs{ font: 67.5%; width:100%; padding:20px;-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

/*Tab styles*/
#generic-tabs ul { overflow: hidden; margin:0; padding:0;}
#generic-tabs ul li{ float:left; display:inline-block; width:14.2857142857%; background:#EDEDED; border-top:4px solid #CCCCCC; border-right:1px solid #CCCCCC;}
#generic-tabs ul li:last-child {border-right:none;}
#generic-tabs ul li:first-child { padding-left:0; }

/*Tab link styles*/
#generic-tabs ul li a {text-align:center; display:block; font-size: 1em; text-decoration: none; padding: 1.2em 1em; line-height: 16px; color:#555;}

/*Active tab styles*/
#generic-tabs ul li.active {background:#FFFFFF; border-top:4px solid #27ae60;}
#generic-tabs ul li.active a { color:#333333;}
#generic-tabs ul li.active a i {color:#27ae60;}

/*Tab content styles*/

#generic-tabs .tab-content{ background:#FFFFFF; padding:3em 2em;}

#generic-tabs2{ font: 67.5%; width:100%; padding:20px;-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

/*Tab styles*/
#generic-tabs2 ul { overflow: hidden; margin:0; padding:0;}
#generic-tabs2 ul li{ float:left; display:inline-block; width:33.33%; background:#EDEDED; border-top:4px solid #CCCCCC; border-right:1px solid #CCCCCC;}
#generic-tabs2 ul li:last-child {border-right:none;}
#generic-tabs2 ul li:first-child { padding-left:0; }

/*Tab link styles*/
#generic-tabs2 ul li a {text-align:center; display:block; font-size: 1em; text-decoration: none; padding: 1.2em 1em; line-height: 16px; color:#555;}

/*Active tab styles*/
#generic-tabs2 ul li.active {background:#FFFFFF; border-top:4px solid #27ae60;}
#generic-tabs2 ul li.active a { color:#333333;}
#generic-tabs2 ul li.active a i {color:#27ae60;}

/*Tab content styles*/

#generic-tabs2 .tab-content{ background:#FFFFFF; padding:3em 2em;}

#barChart{
  background-color: grey;
  border-radius: 6px;
}


</style>

<?php if($_SESSION['u_role'] == 1) { ?>
    <div id="main-wrapper">
        <div class="container">
            <header class="major" style="margin-bottom: 1.5em;">
                <?php echo "<h2>Welcome back,  ". $_SESSION['u_first'] ."</h2>"; ?>
            </header>
            <section id="generic-tabs">
                <ul id="tabs">
                    <li>
                        <a title="Dashboard" href="#first-tab"><i class="fa fa-home"></i>&nbsp;&nbsp;Dashboard</a>	        
                    </li>
                    <li>
                        <a title="Email" href="#second-tab"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Email</a>	
                    </li>
                    <li>
                        <a title="Chat" href="#third-tab"><i class="fa fa-comments"></i>&nbsp;&nbsp;Chat</a>	
                    </li>			    
                    <li>
                        <a title="Calendar" href="#forth-tab"><i class="fa fa-check"></i>&nbsp;&nbsp;Accept Posts</a>	    
                    </li>
                    <li>
                        <a title="Charts" href="#fifth-tab"><i class="fa fa-area-chart"></i>&nbsp;&nbsp;Charts</a>	    
                    </li>
                    <li>
                        <a title="Users" href="#sixth-tab"><i class="fa fa-users"></i>&nbsp;&nbsp;Users</a>	    
                    </li>
                    <li>
                        <a title="Users" href="#seventh-tab"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Sales</a>	    
                    </li>
                </ul>
                <div id="first-tab" class="tab-content" style="display: none;">  
                    <div class="row" style="text-align: center;">   
                        <div class="3u">
                            <h3><u>Sales Today:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">20</h1>
                        </div>
                        <div class="3u">
                            <h3><u>Visits Today:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">1,292</h1>
                        </div>
                        <div class="3u">
                            <h3><u>New Users Today:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">6</h1>
                        </div>
                        <div class="3u">
                            <h3><u>Users Online:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">15</h1>
                        </div>
                    </div>
                    <div class="12u" style="text-align: center; margin-top: 3.5em;">
                        <canvas id="canvas"></canvas> 
                    </div>
                </div>

                <div id="second-tab" class="tab-content" style="display: none;">        
                    <div>   
                        <h2>Email</h2>
                        <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                    </div>
                </div>

                <div id="third-tab" class="tab-content" style="display: none;">        
                    <h2>Chat</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

                <div id="forth-tab" class="tab-content" style="display: none;">        
                    <h2>Accept Posts</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

                <div id="fifth-tab" class="tab-content" style="display: none;">        
                    <h2>Charts</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

                <div id="sixth-tab" class="tab-content" style="display: none;">        
                    <h2>Users</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

                <div id="seventh-tab" class="tab-content" style="display: none;">        
                    <h2>Sales</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>
		    </section>	
        </div>
    </div>
<?php } elseif($_SESSION['u_role'] == 2) { ?>
    <canvas id="canvas" style="display: none;"></canvas> 
    <div id="main-wrapper">
        <div class="container">
            <header class="major" style="margin-bottom: 1.5em;">
                <?php echo "<h2>Welcome back,  ". $_SESSION['u_first'] ."</h2>"; ?>
            </header>
            <section id="generic-tabs2">
                <ul id="tabs">
                    <li>
                        <a title="Dashboard" href="#first-tab2"><i class="fa fa-home"></i>&nbsp;&nbsp;Dashboard</a>	        
                    </li>
                    <li>
                        <a title="Email" href="#second-tab2"><i class="fa fa-check"></i>&nbsp;&nbsp;Accept Posts</a>	
                    </li>
                    <li>
                        <a title="Chat" href="#third-tab2"><i class="fa fa-comments"></i>&nbsp;&nbsp;Chat</a>	
                    </li>			    
                </ul>
                <div id="first-tab2" class="tab-content" style="display: none;">  
                    <div class="row" style="text-align: center;">   
                        <div class="3u">
                            <h3><u>Active Posts:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">72</h1>
                        </div>
                        <div class="3u">
                            <h3><u>Posts to Accept:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">2</h1>
                        </div>
                        <div class="3u">
                            <h3><u>Users Online:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">30</h1>
                        </div>
                        <div class="3u">
                            <h3><u>Mods Online:</u></h3>
                            <h1 style="font-size: 3em; margin-top: .3em;">1</h1>
                        </div>
                    </div>
                </div>

                <div id="second-tab2" class="tab-content" style="display: none;">        
                    <div>   
                        <h2>Accept Posts</h2>
                        <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                    </div>
                </div>

                <div id="third-tab2" class="tab-content" style="display: none;">        
                    <h2>Chat</h2>
                    <p>Lorem ipsum dolor sit amet, utroque splendide an quo. Omnesque pertinacia efficiantur vix at, soleat quaeque assueverit et vis. Te sit tale eripuit corrumpit, cum ea case graeci legimus. Sea ex assentior honestatis adversarium. Mei ea dico meis instructior, no eum ipsum voluptatum, quodsi pertinax postulant in sed. Te eum pertinacia suscipiantur, sea eirmod sanctus ea. Vel habeo feugait ea, an apeirian adversarium nam.</p>
                </div>

		    </section>	
        </div>
    </div>
<?php } else { 
    header( 'Location: /test/' );
    exit();
} ?>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/test/footer.php'); ?>

<script>

window.chartColors = {
  green: 'rgb(4, 143, 60)',
  blue: 'rgb(4, 103, 143)'
};

var randomScalingFactor = function() {
  return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
};

var line1 = [120, 90, 63, 75, 80, 95, 107];

var line2 = [21, 15, 8, 6, 16, 9, 18];

var MONTHS = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var config = {
  type: 'line',
  data: {
    labels: MONTHS,
    datasets: [{
      label: "Posts",
      backgroundColor: window.chartColors.green,
      borderColor: window.chartColors.green,
      data: line1,
      fill: false,
    }, {
      label: "Sales",
      fill: false,
      backgroundColor: window.chartColors.blue,
      borderColor: window.chartColors.blue,
      data: line2,
    }]
  },
  options: {
    responsive: true,
    title:{
      display:true,
      text:'Posts & Sales'
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
   hover: {
      mode: 'nearest',
      intersect: true
    },
    scales: {
      xAxes: [{
        display: true,
        scaleLabel: {
          display: true
        }
      }],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: true
        },
      }]
    }
  }
};

var ctx = document.getElementById("canvas").getContext("2d");
var myLine = new Chart(ctx, config);


(function($){
	/* trigger when page is ready */
	$(document).ready(function (){		
        //Tabs functionality
        //Firstly hide all content divs
        //Then show the first content div
        console.log($('#generic-tabs ul#tabs li:first'));
        $('#generic-tabs div:first').show();
        $('#generic-tabs div:first div').show();
        $('#generic-tabs2 div:first').show();
        $('#generic-tabs2 div:first div').show();
        //Add active class to the first tab link
        $('#generic-tabs ul#tabs li:first').addClass('active');
        $('#generic-tabs2 ul#tabs li:first').addClass('active');
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

            $(currentTab).show().children().show();
            $(currentTab).show().children().children().show();
            //Stop default link action from happening
            return false;
        });	
        $('#generic-tabs2 ul#tabs li a').click(function(){
        	//Firstly remove the current active class
            $('#generic-tabs2 ul#tabs li').removeClass('active');
            //Apply active class to the parent(li) of the link tag
            $(this).parent().addClass('active');
            //Set currentTab to this link
            var currentTab2 = $(this).attr('href');
            //Hide away all tabs
            $('#generic-tabs2 div').hide();            
            //show the current tab

            $(currentTab2).show().children().show();
            $(currentTab2).show().children().children().show();
            //Stop default link action from happening
            return false;
        });	
	});
})(window.jQuery);
</script>

