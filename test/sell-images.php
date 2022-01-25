<?php include_once 'header.php'; ?>
</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<style>
  #image1 {
			width: auto;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}

		.imageTest {
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

	#image1:hover {
		cursor: grab;
	}

	#image1:active {
		cursor: grabbing;
	}

    #image2 {
			width: auto;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}

	#image2:hover {
		cursor: grab;
	}

	#image2:active {
		cursor: grabbing;
	}

    #image3 {
			width: auto;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}
	
	#image3:hover {
		cursor: grab;
	}

	#image3:active {
		cursor: grabbing;
	}

    #image4 {
			width: auto;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}

	#image4:hover {
		cursor: grab;
	}

	#image4:active {
		cursor: grabbing;
	}

    #image5 {
			width: auto;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}

	#image5:hover {
		cursor: grab;
	}

	#image5:active {
		cursor: grabbing;
	}

    #image6 {
			width: auto;
			height: 350px;
      		border: 1px solid;
			position:relative;
			background: white;
		}

    .highlight {
      border: 1px solid red;
      background-color: #333333;
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
    </div>


    <div class="container">
        <ul class="row connectedSortable" id="sortable1" style="position: relative;">
		  <li class="4u unsortable" style="position: absolute;">
			<div class="imageTest" style="position: relative;"><p>Featured Image</p></div>
		  </li>
          <li class="4u 12u(mobile) ui-state-default">
		  		<div id="image1"></div>
				<div style="font-weight: bold;">
					<span>1</span> was 1 at beginning
				</div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
            	<div id="image2"></div>
				<div style="font-weight: bold;">
					<span>2</span> was 2 at beginning
				</div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
            	<div id="image3"></div>
				<div style="font-weight: bold;">
					<span>3</span> was 3 at beginning
				</div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
            	<div id="image4"></div>
				<div style="font-weight: bold;">
					<span>4</span> was 4 at beginning
				</div>
          </li>
          <li class="4u 12u(mobile) ui-state-default">
				<div id="image5"></div>
				<div style="font-weight: bold;">
					<span>5</span> was 5 at beginning
				</div>
          </li>
		  <li class="4u 12u(mobile) unsortable">
		  	<div id="image6">
				<div style="margin-top: 3.5em">
					<center><input type="reset" value="Next: Preview" style="background-color: green;"></center>
					<br>
					<center><input type="reset" value="Reset Images" style="background-color: red;" data-toggle="resetImages"></center>
					<br>
					<center><input type="reset" value="Back: Post Info" style="background-color: grey;"></center>
				</div>
			</div>
		  </li>
        </ul>

    </div>

</div>

<?php include_once 'footer.php'; ?>


<script>
    var croppicContainerModalOptions1 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandy:true,
		imgEyecandyOpacity:0.2,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
		onReset:function(){ console.log('onReset') },
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal1 = new Croppic('image1', croppicContainerModalOptions1);

    var croppicContainerModalOptions2 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandyOpacity:0.4,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
		onReset:function(){ console.log('onReset') },
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal2 = new Croppic('image2', croppicContainerModalOptions2);

    var croppicContainerModalOptions3 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandyOpacity:0.4,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
		onReset:function(){ console.log('onReset') },
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal3 = new Croppic('image3', croppicContainerModalOptions3);

    var croppicContainerModalOptions4 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandyOpacity:0.4,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
		onReset:function(){ console.log('onReset') },
		onError:function(errormessage){ console.log('onError:'+errormessage) }
	}
	var cropContainerModal4 = new Croppic('image4', croppicContainerModalOptions4);

    var croppicContainerModalOptions5 = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true,
		imgEyecandyOpacity:0.4,
		loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
		onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
		onImgDrag: function(){ console.log('onImgDrag') },
		onImgZoom: function(){ console.log('onImgZoom') },
		onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
		onReset:function(){ console.log('onReset') },
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


Dropzone.options.DropZoneFiddle = {
  url: this.location,
  paramName: "file", //the parameter name containing the uploaded file
  clickable: true,
  maxFilesize: 10, //in mb
  uploadMultiple: true, 
  maxFiles: 5, // allowing any more than this will stress a basic php/mysql stack
  addRemoveLinks: true,
  acceptedFiles: '.png,.jpg', //allowed filetypes
  thumbnailWidth: null,
  thumbnailHeight: null,
  dictDefaultMessage: "Upload your files here", //override the default text
  init: function() {
    this.on("sending", function(file, xhr, formData) {
      //formData.append("step", "upload"); // Append all the additional input data of your form here!
      //formData.append("id", "1"); // Append all the additional input data of your form here!
      //alert('hd');
    });
    this.on("success", function(file, responseText) {
      //auto remove buttons after upload
      
      //$("#div-files").html(responseText);
      //var _this = this;
      //_this.removeFile(file);
    });
    this.on("addedfile", function(file){
  		//alert('hi');
      alert('done');
  	});
  }
};


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

