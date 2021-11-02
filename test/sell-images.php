<?php include_once 'header.php'; ?>
</div>
</div>


<style>
  #yourId {
			width: 500px;
			height: 500px;
			position:relative; /* or fixed or absolute */
		}
</style>

<div id="main-wrapper">
    <div class="container">
        <header class="major" style="margin-bottom: 1.5em;">
            <h2>Upload Images</h2>
        </header>
        <form action="" class="dropzone" id="DropZoneFiddle">
            <span class="glyphicon glyphicon-download"></span>
            <br/>
        </form>
    </div>

    <div id="yourId"></div>



</div>

<?php include_once 'footer.php'; ?>

<script>

var cropperOptions = {
			uploadUrl:'path_to_your_image_proccessing_file.php'
		}		
		
		var cropperHeader = new Croppic('yourId', cropperOptions);

//enctype="multipart/form-data"
//UploadImages

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
</script>

