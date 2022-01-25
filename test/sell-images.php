<?php include_once 'header.php'; ?>
</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<style>



  #image1 {
			width: 350px;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: none;
			z-index: 3;
		}

		.imageTest {
			width: 350px;
			height: 350px;
			outline: 5px solid #0a7e07;
		}

		.imageTest2 {
			height: 350px;
			border: 2px solid #000000;
		}

		.imageTest p {
			margin-top: -40px; 
			z-index: 100; 
			left: 0px; 
			width: 100%; 
			position: absolute; 
			text-align: center;
			color: #0a7e07;
			font-weight: 800;
		}

    #image2 {
			width: 350px;
			height: 350px;
     		border: 1px solid;
			position:relative;
			background: none;
			z-index: 3;
		}

    #image3 {
			width: 350px;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: none;
			z-index: 3;
		}

    #image4 {
			width: 350px;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: none;
			z-index: 3;
		}

    #image5 {
			width: 350px;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: none;
			z-index: 3;
		}

    #image6 {
			width: 350px;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}

		.previewPost {
			margin-top: 4em;
		}

		.backImages {
			background: gray;
		}

		.backImages:hover {
			-moz-transition: all .2s ease-in;
			-o-transition: all .2s ease-in;
			-webkit-transition: all .2s ease-in;
			transition: all .2s ease-in;
			background: gray;
			opacity: 70%;
		}

		.resetImages {
			-moz-transition: all .2s ease-in;
			-o-transition: all .2s ease-in;
			-webkit-transition: all .2s ease-in;
			transition: all .2s ease-in;
			background: red;
		}

		.resetImages:hover {
			-moz-transition: all .2s ease-in;
			-o-transition: all .2s ease-in;
			-webkit-transition: all .2s ease-in;
			transition: all .2s ease-in;
			background: red;
			opacity: 50%;
		}

		#image1:hover {
			cursor: grab;
		}

		#image1:active {
			cursor: grabbing;
		}

		#image2:hover {
			cursor: grab;
		}

		#image2:active {
			cursor: grabbing;
		}

		#image3:hover {
			cursor: grab;
		}

		#image3:active {
			cursor: grabbing;
		}

		#image4:hover {
			cursor: grab;
		}

		#image4:active {
			cursor: grabbing;
		}

		#image5:hover {
			cursor: grab;
		}

		#image5:active {
			cursor: grabbing;
		}

		#croppicModal {
			background: rgba(0,0,0,0.9);
		}

		.cropImgWrapper {
			outline: 5px solid white;
			background-color: white;
		}

		.noImage {
			background-color: white;
			position: absolute; 
			height: 350px; 
			width: 350px; 
			display: flex; 
			flex-direction: column; 
			justify-content: center; 
			align-items: center;
			opacity: .8;
		}


</style>

<script>
  $( function() {
    $( "#sortable1" ).sortable({
	  forceHelperSize: true,
	  tolerance: "pointer",
	  items: "li:not(.unsortable)"
    });
    $( "#sortable1" ).disableSelection();
	$("#sortable1").sortable({
        stop: function ($item, container, _super, event) {
            $('#sortable1 li').removeClass('dragged');
            $("body").removeClass('dragging');
            $('#sortable1 span').each(function (i) {
                var humanNum = i + 1;
                $(this).html(humanNum + '');
            });
        }
    });
  } );
</script>

<div id="main-wrapper">
    <div class="container">
        <header class="major" style="margin-bottom: 1.5em;">
            <h2>Upload Images</h2>
        </header>
		<center><h4 style="font-weight: 500;">Click on the&nbsp;&nbsp;<i class="fa fa-upload"></i>&nbsp;&nbsp;button to upload your images. Click and drag each box to change the order.</h4></center>
		<br>
    </div>


    <div class="container">
        <ul class="row connectedSortable" id="sortable1" style="position: relative;">
		  <li class="4u unsortable" style="position: absolute;">
			<div class="imageTest" style="position: relative;"><p>Featured Image</p></div>
		  </li>
          <li class="4u 12u(mobile) ui-state-default">
		 			<div class="noImage">
  						<h2>Image <span>1</span></h2>
						<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
					</div>
            	<div id="image1"></div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
		  		<div class="noImage">
  					<h2>Image <span>2</span></h2>
					<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
				</div>
            	<div id="image2"></div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
		  <div class="noImage">
  					<h2>Image <span>3</span></h2>
					<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
				</div>
            	<div id="image3"></div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
		  		<div class="noImage">
  					<h2>Image <span>4</span></h2>
					<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
				</div>
            	<div id="image4"></div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
		  		<div class="noImage">
  					<h2>Image <span>5</span></h2>
					<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
				</div>
            	<div id="image5"></div>
          </li>
		  <li class="4u 12u(mobile) unsortable">
		  	<div id="image6">
			  <center><button class="previewPost" data-toggle="">Next: Preview Post</button></center>
			  <br>			  
			  <center><button class="backImages" onclick="location.href='/test/sell.php'">Back: Post Info</button></center>	
			  <br>
		  	  <center><button class="resetImages" data-toggle="resetImages">Reset Images</button></center> 		  
			</div>
		  </li>
        </ul>
    </div>

</div>

<?php include_once 'footer.php'; ?>


<script>


	function resetImages() {
		cropContainerModal1.reset();
		cropContainerModal2.reset();
		cropContainerModal3.reset();
		cropContainerModal4.reset();
		cropContainerModal5.reset();
		$('.croppedImg').hide();
		$('.cropControlRemoveCroppedImage').hide();
	}

    var croppicContainerModalOptions1 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandy:true,
		imgEyecandyOpacity:0.5,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ 
			console.log('onAfterImgUpload'); 
			document.querySelector("html").style.overflow = "hidden"; 
		},
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ 
			console.log('onAfterImgCrop');
			document.querySelector("html").style.overflow = "visible";
		},
		onReset:function(){ 
			console.log('onReset');
			document.querySelector("html").style.overflow = "visible"; 
		},
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal1 = new Croppic('image1', croppicContainerModalOptions1);

    var croppicContainerModalOptions2 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandy:true,
		imgEyecandyOpacity:0.5,
		enableMousescroll: false,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ 
			console.log('onAfterImgUpload'); 
			document.querySelector("html").style.overflow = "hidden"; 
		},
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ 
			console.log('onAfterImgCrop');
			document.querySelector("html").style.overflow = "visible";
		},
		onReset:function(){ 
			console.log('onReset');
			document.querySelector("html").style.overflow = "visible"; 
		},
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal2 = new Croppic('image2', croppicContainerModalOptions2);

    var croppicContainerModalOptions3 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandy:true,
		imgEyecandyOpacity:0.5,
		enableMousescroll: false,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ 
			console.log('onAfterImgUpload'); 
			document.querySelector("html").style.overflow = "hidden"; 
		},
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ 
			console.log('onAfterImgCrop');
			document.querySelector("html").style.overflow = "visible";
		},
		onReset:function(){ 
			console.log('onReset');
			document.querySelector("html").style.overflow = "visible"; 
		},
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal3 = new Croppic('image3', croppicContainerModalOptions3);

    var croppicContainerModalOptions4 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandy:true,
		imgEyecandyOpacity:0.5,
		enableMousescroll: false,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ 
			console.log('onAfterImgUpload'); 
			document.querySelector("html").style.overflow = "hidden"; 
		},
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ 
			console.log('onAfterImgCrop');
			document.querySelector("html").style.overflow = "visible";
		},
		onReset:function(){ 
			console.log('onReset');
			document.querySelector("html").style.overflow = "visible"; 
		},
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal4 = new Croppic('image4', croppicContainerModalOptions4);

    var croppicContainerModalOptions5 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandy:true,
		imgEyecandyOpacity:0.5,
		enableMousescroll: false,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ 
			console.log('onAfterImgUpload'); 
			document.querySelector("html").style.overflow = "hidden"; 
		},
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ 
			console.log('onAfterImgCrop');
			document.querySelector("html").style.overflow = "visible";
		},
		onReset:function(){ 
			console.log('onReset');
			document.querySelector("html").style.overflow = "visible"; 
		},
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal5 = new Croppic('image5', croppicContainerModalOptions5);

	function resetImages() {
		cropContainerModal1.reset();
		cropContainerModal2.reset();
		cropContainerModal3.reset();
		cropContainerModal4.reset();
		cropContainerModal5.reset();
		$('.croppedImg').hide();
		$('.cropControlRemoveCroppedImage').hide();
	}



$('[data-toggle="resetImages"]').jConfirm({

question:'Reset Images?',
confirm_text: 'Yes',
deny_text: 'No',
theme: 'black',
// hides on click
hide_on_click: true,
// 'auto','top','bottom','left','right'
position: 'left',
// extra class(es)
class: '',
// shows deny button
show_deny_btn: false,
// 'tiny', 'small', 'medium', 'large'
size: 'medium',
// 'black', 'white', 'blurred'
backdrop: false

}).on('confirm', function(e){
	resetImages()
}).on('jc-show', function(e, value){
$(".jc-tooltip").css("margin-left","-.5em");
});

</script>

