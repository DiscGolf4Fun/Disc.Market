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
			display: flex; 
			flex-direction: column; 
			justify-content: center; 
			align-items: center;
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
		}

		.disp-none{
 		 	display:none;
		}

		.container-image{
			width:100%;
			display:flex;
			justify-content: center;
			align-items: center;
			padding:20px;
		}
		#confirm-img-one{
			width: 100%;
    		height: 100%;
   			border-radius: 0px;
			display: none;
		}

		#confirm-img-two{
			width: 100%;
    		height: 100%;
   			border-radius: 0px;
			display: none;
		}

		#confirm-img-three{
			width: 100%;
    		height: 100%;
   			border-radius: 0px;
			display: none;
		}

		#confirm-img-four{
			width: 100%;
    		height: 100%;
   			border-radius: 0px;
			display: none;
		}

		#confirm-img-five{
			width: 100%;
    		height: 100%;
   			border-radius: 0px;
			display: none;
		}

		.cr-boundary {
			max-width: 800px;
		}
		.modal-header {
			text-align: center;
		}


</style>

<script>
  $( function() {
    $( "#sortable1" ).sortable({
	  forceHelperSize: true,
	  tolerance: "pointer",
	  items: "li:not(.unsortable)",
	  cancel: ''
    });
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
	$( "#sortable1" ).disableSelection();
  } );
  
</script>


<div id="main-wrapper">
	<div class="container">
		<header class="major" style="margin-bottom: 1.5em;">
			<h2>Sell Anything Disc Golf</h2>
		</header>
			<form action="javascript:void(0);" method="post">
				<div class="row sellInfoform" style="width: 100%; margin: auto 0 auto 0;">
					<div class="sellTitle 9u 12u(mobile)">
						<label for="title" style="font-size: 1.5em; margin-bottom: .25em;">Title&nbsp;<span style="color: red;">*</span></label>
						<input type="text" id="sellTitle" name="title" placeholder="Title" style="border: 1px solid black;">
						<p class="formError" id="noTitle">Enter a title above (up to 65 characters)</p>
					</div>
					<div class="sellCategory 3u 12u(mobile)">
						<label for="dropdown" style="font-size: 1.5em; margin-bottom: .25em;">Category&nbsp;<span style="color: red;">*</span></label>
						<div class="dropdown" style="width: 100%; margin-left: 0;">
							<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
							<div class="custom-select" id="sellCategory">
									<select id="category">
										<option value="">Select Category</option>
										<option value="Disc">Discs</option>
										<option value="Bag">Bags / Carts</option>
										<option value="Apparel">Apparel</option>
										<option value="Basket">Baskets</option>
										<option value="Shoes">Shoes</option>
										<option value="Accessory">Accessories</option>
									</select>
							</div>
							<p class="formError" id="noCategoryMessage">Select a category above</p>
						</div>
					</div>

					<div class="sellDescription 12u">
						<label for="description" style="font-size: 1.5em; margin-bottom: .25em;">Description&nbsp;<span style="color: red;">*</span></label>
						<textarea name="description" id="sellDescription" onkeydown="return limitLines(this, event)" placeholder="Description" maxlength="250" rows="5" style="resize: none; height: 10em; border: 1px solid black;"></textarea>
						<p class="formError" id="noDescription">Enter a description above</p><div id="textarea_feedback"></div>
					</div>


					<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: 1em 1em 1.5em 1em;">
							<div class="sellNewused 4u 12u(mobile)">
								<label for="newUsed" style="font-size: 1.5em; margin-bottom: .25em;">New/Used?&nbsp;<span style="color: red;"> *</span></label>
								<div class="custom-select" id="sellNewused" style="width: 100%;">
									<select style="width: 100%;" id="newUsed">
										<option value="">Select New or Used</option>
										<option value="new">New</option>
										<option value="used">Used</option>
									</select>
								</div>
								<p class="formError" id="noNewused">Select new or used above</p>
							</div>
							<div class="sellQuality 4u 12u(mobile)">
								<label for="sellquality" style="font-size: 1.5em; margin-bottom: .25em;">Quality&nbsp;<span style="color: red;"> *</span></label>
								<div class="custom-select" id="sellQuality" style="width: 100%;">
									<select style="width: 100%;" id="quality">
										<option value="">Select Quality #</option>
										<option value="10">10</option>
										<option value="9">9</option>
										<option value="8">8</option>
										<option value="7">7</option>
										<option value="6">6</option>
										<option value="5">5</option>
										<option value="4">4</option>
										<option value="3">3</option>
										<option value="2">2</option>
										<option value="1">1</option>
									</select>
								</div>
								<p class="formError" id="noQuality">Select a quality # above</p>
							</div>
							<div class="sellBrand 4u 12u(mobile)">
								<label for="title" style="font-size: 1.5em; margin-bottom: .25em;">Brand<span style="color: red;"> *</span></label>
								<div class="custom-select" id="sellBrand" style="width: 100%;">
									<select style="width: 100%;" id="brand">
										<option value="">Select Brand</option>
										<option value="DGA">DGA</option>
										<option value="Discmania">Discmania</option>
										<option value="Discraft">Discraft</option>
										<option value="Dynamic">Dynamic Discs</option>
										<option value="Elevation">Elevation</option>
										<option value="Fullturn">Full Turn</option>
										<option value="Gateway">Gateway</option>
										<option value="Hyzerbomb">Hyzerbomb</option>
										<option value="Innova">Innova</option>
										<option value="Latitude">Latitude 64</option>
										<option value="Legacy">Legacy</option>
										<option value="Milenium">Milenium</option>
										<option value="MVP">MVP</option>
										<option value="Prodigy">Prodigy</option>
										<option value="Westside">Westside</option>
										<option value="Other" style="color:red;">Other</option>
									</select>
								</div>
								<p class="formError" id="noBrand">Select a brand above</p>
							</div>
						<div class="12u 12u(mobile)" id="otherBrand">
							<label for="otherbrand" style="font-size: 1.5em; margin-bottom: .25em;">Other Brand<span style="color: red;"> *</span></label>
							<input type="text" name="otherBrand" id="sellOtherBrand" placeholder="Enter other brand" style="border: 1px solid black;">
							<p class="formError" id="noOtherBrand">Enter the other brand above</p>
						</div>
						<div class="sellMinBid 6u 12u(mobile)">
							<label for="minbid" style="font-size: 1.5em; margin-bottom: .25em;">Minimum Bid<span style="color: red;"> *</span></label>
							<input type="number" name="minbid" id="sellMinbid" min="1" max="999" value="" placeholder="$1" style="border: 1px solid black;">
							<p class="formError" id="noMinbid">Enter minimum bid above</p>
						</div>
						<div class="sellBuyitnow 6u 12u(mobile)">
							<label for="buyitnow" style="font-size: 1.5em; margin-bottom: .25em;">Buy it Now</label>
							<input type="number" name="buyitnow" id="sellBuyitnow" min="1" max="999" value="" placeholder="$" style="border: 1px solid black;">
						</div>
					</div>
				

					<div class="12u" style="padding: 0; text-align: center;" id="noCategory">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;None<span style="color: red;"> *</span></h2>
						</header>
						<h2 style="font-weight: 300; padding-bottom: 2em; color: red;">You need to select a Category above</h2>
					</div>

					<div class="12u" style="padding: 0; display: none; text-align: left;" id="discs">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Discs</h2>
						</header>

						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="discWeight 4u 12u(mobile)">
								<label for="discweight" style="font-size: 1.5em; margin-bottom: .25em;">Disc weight(g)<span style="color: red;"> *</span></label>
								<input type="text" name="discweight" id="sellDiscweight" placeholder="Weight" style="border: 1px solid black;">
								<p class="formError" id="noDiscweight">Enter the disc weight above (g)</p>
							</div>
							<div class="discPlastic 4u 12u(mobile)">
								<label for="discplastic" style="font-size: 1.5em; margin-bottom: .25em;">Plastic type<span style="color: red;"> *</span></label>
								<input type="text" name="discplastic" id="sellDiscplastic" placeholder="Plastic type" style="border: 1px solid black;">
								<p class="formError" id="noDiscplastic">Enter the disc plastic type above</p>
							</div>
							<div class="discColor 4u 12u(mobile)">
								<label for="disccolor" style="font-size: 1.5em; margin-bottom: .25em;">Disc color<span style="color: red;"> *</span></label>
								<input type="text" name="disccolor" id="sellDisccolor" placeholder="Disc color" style="border: 1px solid black;">
								<p class="formError" id="noDisccolor">Enter the disc color above</p>
							</div>
							<div class="discName 6u 12u(mobile)">
								<label for="discname" style="font-size: 1.5em; margin-bottom: .25em;">Disc Name<span style="color: red;"> *</span></label>
								<input type="text" name="discname" id="sellDiscname" placeholder="Disc name" style="border: 1px solid black;">
								<p class="formError" id="noDiscname">Enter the disc name above</p>
							</div>
							<div class="discInk 6u 12u(mobile)">
								<label for="discink" style="font-size: 1.5em; margin-bottom: .25em;">Ink?<span style="color: red;">  *</span></label>
								<div class="custom-select" style="display: inline-block; width: 100%;">
									<select style="width: 100%;" id="sellDiscink">
										<option value="">Select Yes or No</option>
										<option value="new">Yes</option>
										<option value="used">No</option>
									</select>
								</div>
								<p class="formError" id="noDiscink">Enter if your disc has ink on it</p>
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="bags">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Bags / Carts</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="bagColor 4u 12u(mobile)">
								<label for="bagcolor" style="font-size: 1.5em; margin-bottom: .25em;">Bag/Cart Color<span style="color: red;">*</span></label>
								<input type="text" name="bagcolor" id="sellBagcolor" placeholder="Color" style="border: 1px solid black;">
								<p class="formError" id="noBagcolor">Enter the bag/cart color above</p>
							</div>
							<div class="bagModel 4u 12u(mobile)">
								<label for="model" style="font-size: 1.5em; margin-bottom: .25em;">Bag/Cart Model</label>
								<input type="text" name="model" id="sellBagmodel" placeholder="Model" style="border: 1px solid black;">
							</div>
							<div class="bagCapacity 4u 12u(mobile)">
								<label for="model" style="font-size: 1.5em; margin-bottom: .25em;">Disc Capacity</label>
								<input type="text" name="capacity" id="sellBagcapacity" placeholder="# Disc capacity" style="border: 1px solid black;">
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="apparel">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Apparel</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="apparelSize 4u 12u(mobile)">
								<label for="apparelsize" style="font-size: 1.5em; margin-bottom: .25em;">Apparel Size<span style="color: red;"> *</span></label>
								<input type="text" name="apparelsize" id="sellApparelsize" placeholder="Size" style="border: 1px solid black;">
								<p class="formError" id="noApparelsize">Enter the apparel size above</p>
							</div>
							<div class="apparelColor 4u 12u(mobile)">
								<label for="apparelcolor" style="font-size: 1.5em; margin-bottom: .25em;">Apparel Color<span style="color: red;"> *</span></label>
								<input type="text" name="apparelcolor" id="sellApparelcolor" placeholder="Color" style="border: 1px solid black;">
								<p class="formError" id="noApparelcolor">Enter the apparel color above</p>
							</div>
							<div class="apparelMaterial 4u 12u(mobile)">
								<label for="apparelmaterial" style="font-size: 1.5em; margin-bottom: .25em;">Apparel Material</label>
								<input type="text" name="apparelmaterial" id="sellApparelmaterial" placeholder="Material" style="border: 1px solid black;">
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="baskets">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Baskets</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="basketModel 4u 12u(mobile)">
								<label for="basketmodel" style="font-size: 1.5em; margin-bottom: .25em;">Basket model<span style="color: red;"> *</span></label>
								<input type="text" name="basketmodel" id="sellBasketmodel" placeholder="Model" style="border: 1px solid black;">
								<p class="formError" id="noBasketmodel">Enter the basket model above</p>
							</div>
							<div class="basketChains 4u 12u(mobile)">
								<label for="basketchains" style="font-size: 1.5em; margin-bottom: .25em;">Number of chains</label>
								<input type="text" name="basketchains" id="sellBasketchains" placeholder="# of chains" style="border: 1px solid black;">
							</div>
							<div class="basketColor 4u 12u(mobile)">
								<label for="basketcolor" style="font-size: 1.5em; margin-bottom: .25em;">Basket Color</label>
								<input type="text" name="basketcolor" id="sellBasketcolor" placeholder="Color" style="border: 1px solid black;">
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="shoes">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Shoes</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="shoeGender 4u 12u(mobile)">
								<label for="shoeGender" style="font-size: 1.5em; margin-bottom: .25em;">Men or Women<span style="color: red;">  *</span></label>
								<div class="custom-select" style="display: inline-block; width: 100%;">
									<select style="width: 100%;" id="sellShoegender">
										<option value="">Select Men or Women</option>
										<option value="men">Men</option>
										<option value="women">Women</option>
									</select>
								</div>
								<p class="formError" id="noShoegender">Select men or women above</p>
							</div>
							<div class="shoeSize 4u 12u(mobile)">
								<label for="shoesize" style="font-size: 1.5em; margin-bottom: .25em;">Shoe size<span style="color: red;"> *</span></label>
								<input type="text" name="shoesize" id="sellShoesize" placeholder="Size" style="border: 1px solid black;">
								<p class="formError" id="noShoesize">Enter the shoe size above</p>
							</div>
							<div class="shoeColor 4u 12u(mobile)">
								<label for="shoesize" style="font-size: 1.5em; margin-bottom: .25em;">Shoe color</label>
								<input type="text" name="shoecolor" id="sellShoecolor" placeholder="Color" style="border: 1px solid black;">
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="accessories">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Accessories</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="sellAccessorySize 6u 12u(mobile)">
								<label for="accessorysize" style="font-size: 1.5em; margin-bottom: .25em;">Accessory size</label>
								<input type="text" name="accessorysize" id="sellAccessorysize" placeholder="Size" style="border: 1px solid black;">
							</div>
							<div class="sellAccessoryColor 6u 12u(mobile)">
								<label for="accessorycolor" style="font-size: 1.5em; margin-bottom: .25em;">Accessory color</label>
								<input type="text" name="accessorycolor" id="sellAccessorycolor" placeholder="Color" style="border: 1px solid black;">
							</div>
						</div>
					</div>
					<div class="nextImages 6u 12u(mobile)">
						<input type="button" name="submit" value="Next:  Images" style="float:right;" onclick="sellImages();">
					</div>
					<div class="sellReset 6u 12u(mobile)">
						<input type="reset" name="submit" value="Reset" style="background-color: gray;" onclick="topFunction();">
					</div>
				</div>

				


				<!-- Image Upload window starts HERE -->
				<div class="row sellImagesform" style="width: 100%; margin: auto 0 auto 0; display: none;">
				<div class="12u 12u(mobile)" style="padding: 1em 0 1.5em 0">
					<center><h4 style="font-weight: 500;">Click on the&nbsp;&nbsp;<i class="fa fa-upload"></i>&nbsp;&nbsp;upload button to upload your images. Click and drag each box to change the order.</h4></center>
				</div>
				<ul class="row connectedSortable" id="sortable1" style="position: relative; padding: 3em 0 0 0;">
					<li class="4u unsortable" style="position: absolute;">
						<div class="imageTest" style="position: relative;"><p>Featured Image</p></div>
					</li>
					<li class="4u 12u(mobile)">
								<div class="noImage">
										<input id='selectedFile-one' class="disp-none" type='file' accept=".png, .jpg, .jpeg, .svg">
										<button type="button" id="upload-aphoto-one" class="btn-primary btn imageNormal-one" style="width:50%; margin-bottom: 1.5em; z-index: 999;"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload</button>
										<button type="button" id="upload-aphoto-one2" class="btn-primary btn imageUploaded-one" style="z-index: 999; display: none; position: absolute; top: 0; left: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-upload"></i></button>
										<button type="button" id="upload-aphoto-one3" class="btn-primary btn imageUploaded-one" style="z-index: 999; display: none; position: absolute; top: 0; right: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-times"></i></button>
									<h2>Image <span>1</span></h2>
									<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
									<!-- <button type="button" class="moveButton" style="width:50%; margin-top: 1.5em; z-index: 999; color: black !important; background: white; border: 2px solid black;" onclick=""><i class="fa fa-arrows"></i>&nbsp;&nbsp;&nbsp;Move</button> -->
								</div>
							<div id="image1"><img id='confirm-img-one' src=''></div>
					</li>
					<li class="4u 12u(mobile)">
								<div class="noImage">
										<input id='selectedFile-two' class="disp-none" type='file' accept=".png, .jpg, .jpeg, .svg">
										<button type="button" id="upload-aphoto-two" class="btn-primary btn imageNormal-two" style="width:50%; margin-bottom: 1.5em; z-index: 999;"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload</button>
										<button type="button" id="upload-aphoto-two2" class="btn-primary btn imageUploaded-two" style="z-index: 999; display: none; position: absolute; top: 0; left: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-upload"></i></button>
										<button type="button" id="upload-aphoto-two3" class="btn-primary btn imageUploaded-two" style="z-index: 999; display: none; position: absolute; top: 0; right: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-times"></i></button>
									<h2>Image <span>2</span></h2>
									<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
									<!-- <button type="button" class="moveButton" style="width:50%; margin-top: 1.5em; z-index: 999; color: black !important; background: white; border: 2px solid black;" onclick=""><i class="fa fa-arrows"></i>&nbsp;&nbsp;&nbsp;Move</button> -->
								</div>
							<div id="image2"><img id='confirm-img-two' src=''></div>
					</li>
					<li class="4u 12u(mobile)">
								<div class="noImage">
										<input id='selectedFile-three' class="disp-none" type='file' accept=".png, .jpg, .jpeg, .svg">
										<button type="button" id="upload-aphoto-three" class="btn-primary btn imageNormal-three" style="width:50%; margin-bottom: 1.5em; z-index: 999;"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload</button>
										<button type="button" id="upload-aphoto-three2" class="btn-primary btn imageUploaded-three" style="z-index: 999; display: none; position: absolute; top: 0; left: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-upload"></i></button>
										<button type="button" id="upload-aphoto-three3" class="btn-primary btn imageUploaded-three" style="z-index: 999; display: none; position: absolute; top: 0; right: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-times"></i></button>
									<h2>Image <span>3</span></h2>
									<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
									<!-- <button type="button" class="moveButton" style="width:50%; margin-top: 1.5em; z-index: 999; color: black !important; background: white; border: 2px solid black;" onclick=""><i class="fa fa-arrows"></i>&nbsp;&nbsp;&nbsp;Move</button> -->
								</div>
							<div id="image3"><img id='confirm-img-three' src=''></div>
					</li>
					<li class="4u 12u(mobile)">
								<div class="noImage">
										<input id='selectedFile-four' class="disp-none" type='file' accept=".png, .jpg, .jpeg, .svg">
										<button type="button" id="upload-aphoto-four" class="btn-primary btn imageNormal-four" style="width:50%; margin-bottom: 1.5em; z-index: 999;"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload</button>
										<button type="button" id="upload-aphoto-four2" class="btn-primary btn imageUploaded-four" style="z-index: 999; display: none; position: absolute; top: 0; left: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-upload"></i></button>
										<button type="button" id="upload-aphoto-four3" class="btn-primary btn imageUploaded-four" style="z-index: 999; display: none; position: absolute; top: 0; right: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-times"></i></button>
									<h2>Image <span>4</span></h2>
									<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
									<!-- <button type="button" class="moveButton" style="width:50%; margin-top: 1.5em; z-index: 999; color: black !important; background: white; border: 2px solid black;" onclick=""><i class="fa fa-arrows"></i>&nbsp;&nbsp;&nbsp;Move</button> -->
								</div>
							<div id="image4"><img id='confirm-img-four' src=''></div>
					</li>
					<li class="4u 12u(mobile)">
								<div class="noImage">
										<input id='selectedFile-five' class="disp-none" type='file' accept=".png, .jpg, .jpeg, .svg">
										<button type="button" id="upload-aphoto-five" class="btn-primary btn imageNormal-five" style="width:50%; margin-bottom: 1.5em; z-index: 999;"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload</button>
										<button type="button" id="upload-aphoto-five2" class="btn-primary btn imageUploaded-five" style="z-index: 999; display: none; position: absolute; top: 0; left: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-upload"></i></button>
										<button type="button" id="upload-aphoto-five3" class="btn-primary btn imageUploaded-five" style="z-index: 999; display: none; position: absolute; top: 0; right: 0; border-radius: 0; padding: 0.5em 1em 0.5em 1em;"><i class="fa fa-times"></i></button>
									<h2>Image <span>5</span></h2>
									<h2 style="font-size: 3em;"><i class="fa fa-image"></i></h2>
									<!-- <button type="button" class="moveButton" style="width:50%; margin-top: 1.5em; z-index: 999; color: black !important; background: white; border: 2px solid black;" onclick=""><i class="fa fa-arrows"></i>&nbsp;&nbsp;&nbsp;Move</button> -->
								</div>
							<div id="image5"><img id='confirm-img-five' src=''></div>
					</li>
					<li class="4u 12u(mobile) unsortable">
						<div id="image6">
						<center><input type="button" class="backImages" name="submit" value="Next:  Preview Post"></center>
						<br>			  
						<center><input type="button" class="backImages" name="submit" value="Back:  Post Info" style="background-color: gray;" onclick="backSellInfo();"></center>	
						<br>
						<center><input type="button" id="sellResetImages" class="backImages" name="submit" value="Reset Images" style="background-color: red;"></center>		  
						</div>
					</li>
				</ul>


  				<!-- Upload Image Modal #1 -->
				<div class="modal fade" id="imageModalContainer-one">
					<div class="modal-dialog modal-md modal-dialog-centered">
						<div class="modal-content modal-content1">
						<div class="modal-header">
							<h3 class="modal-title" id="imageModal">Crop Image: Use the tool below to re-format your image.</h3>
						</div>
						<div class="modal-body modal-body1">
							<div id='crop-image-container-one'>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary save-modal-one">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: gray;">Cancel</button>
						</div>
						</div>
					</div>
				</div>

				<!-- Upload Image Modal #2 -->
				<div class="modal fade" id="imageModalContainer-two">
					<div class="modal-dialog modal-md modal-dialog-centered">
						<div class="modal-content modal-content1">
						<div class="modal-header">
							<h3 class="modal-title" id="imageModal">Crop Image: Use the tool below to re-format your image.</h3>
						</div>
						<div class="modal-body modal-body1">
							<div id='crop-image-container-two'>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary save-modal-two">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: gray;">Cancel</button>
						</div>
						</div>
					</div>
				</div>

				<!-- Upload Image Modal #3 -->
				<div class="modal fade" id="imageModalContainer-three">
					<div class="modal-dialog modal-md modal-dialog-centered">
						<div class="modal-content modal-content1">
						<div class="modal-header">
							<h3 class="modal-title" id="imageModal">Crop Image: Use the tool below to re-format your image.</h3>
						</div>
						<div class="modal-body modal-body1">
							<div id='crop-image-container-three'>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary save-modal-three">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: gray;">Cancel</button>
						</div>
						</div>
					</div>
				</div>

				<!-- Upload Image Modal #4 -->
				<div class="modal fade" id="imageModalContainer-four">
					<div class="modal-dialog modal-md modal-dialog-centered">
						<div class="modal-content modal-content1">
						<div class="modal-header">
							<h3 class="modal-title" id="imageModal">Crop Image: Use the tool below to re-format your image.</h3>
						</div>
						<div class="modal-body modal-body1">
							<div id='crop-image-container-four'>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary save-modal-four">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: gray;">Cancel</button>
						</div>
						</div>
					</div>
				</div>

				<!-- Upload Image Modal #5 -->
				<div class="modal fade" id="imageModalContainer-five">
					<div class="modal-dialog modal-md modal-dialog-centered">
						<div class="modal-content modal-content1">
						<div class="modal-header">
							<h3 class="modal-title" id="imageModal">Crop Image: Use the tool below to re-format your image.</h3>
						</div>
						<div class="modal-body modal-body1">
							<div id='crop-image-container-five'>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary save-modal-five">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: gray;">Cancel</button>
						</div>
						</div>
					</div>
				</div>


				</div>
			</form> 
		</div>
	</div>
</div>


<?php include_once 'footer.php'; ?>

<script>

	// A $( document ).ready() block.
	$( document ).ready(function() {
		//enter here
	});


	$(document).on('click', '#upload-aphoto-one', function () {
    	document.getElementById('selectedFile-one').click();
	});

	$(document).on('click', '#upload-aphoto-one2', function () {
    	document.getElementById('selectedFile-one').click();
	});

	$(document).on('click', '#upload-aphoto-one3', function () {
		document.getElementById('confirm-img-one').src = "";
		document.getElementById('confirm-img-one').style.display = 'none';
		document.getElementById('upload-aphoto-one2').style.display = 'none';
		document.getElementById('upload-aphoto-one3').style.display = 'none';
		document.getElementById('upload-aphoto-one').style.display = 'block';
	});

	$(document).on('click', '#upload-aphoto-two', function () {
    	document.getElementById('selectedFile-two').click();
	});

	$(document).on('click', '#upload-aphoto-two2', function () {
    	document.getElementById('selectedFile-two').click();
	});

	$(document).on('click', '#upload-aphoto-two3', function () {
		document.getElementById('confirm-img-two').src = "";
		document.getElementById('confirm-img-two').style.display = 'none';
		document.getElementById('upload-aphoto-two2').style.display = 'none';
		document.getElementById('upload-aphoto-two3').style.display = 'none';
		document.getElementById('upload-aphoto-two').style.display = 'block';
	});

	$(document).on('click', '#upload-aphoto-three', function () {
    	document.getElementById('selectedFile-three').click();
	});

	$(document).on('click', '#upload-aphoto-three2', function () {
    	document.getElementById('selectedFile-three').click();
	});

	$(document).on('click', '#upload-aphoto-three3', function () {
		document.getElementById('confirm-img-three').src = "";
		document.getElementById('confirm-img-three').style.display = 'none';
		document.getElementById('upload-aphoto-three2').style.display = 'none';
		document.getElementById('upload-aphoto-three3').style.display = 'none';
		document.getElementById('upload-aphoto-three').style.display = 'block';
	});

	$(document).on('click', '#upload-aphoto-four', function () {
    	document.getElementById('selectedFile-four').click();
	});

	$(document).on('click', '#upload-aphoto-four2', function () {
    	document.getElementById('selectedFile-four').click();
	});

	$(document).on('click', '#upload-aphoto-four3', function () {
		document.getElementById('confirm-img-four').src = "";
		document.getElementById('confirm-img-four').style.display = 'none';
		document.getElementById('upload-aphoto-four2').style.display = 'none';
		document.getElementById('upload-aphoto-four3').style.display = 'none';
		document.getElementById('upload-aphoto-four').style.display = 'block';
	});

	$(document).on('click', '#upload-aphoto-five', function () {
    	document.getElementById('selectedFile-five').click();
	});

	$(document).on('click', '#upload-aphoto-five2', function () {
    	document.getElementById('selectedFile-five').click();
	});

	$(document).on('click', '#upload-aphoto-five3', function () {
		document.getElementById('confirm-img-five').src = "";
		document.getElementById('confirm-img-five').style.display = 'none';
		document.getElementById('upload-aphoto-five2').style.display = 'none';
		document.getElementById('upload-aphoto-five3').style.display = 'none';
		document.getElementById('upload-aphoto-five').style.display = 'block';
	});

	$(document).on('click', '#sellResetImages', function () {
		document.getElementById('confirm-img-one').src = "";
		document.getElementById('confirm-img-one').style.display = 'none';
		document.getElementById('upload-aphoto-one2').style.display = 'none';
		document.getElementById('upload-aphoto-one3').style.display = 'none';
		document.getElementById('upload-aphoto-one').style.display = 'block';
		document.getElementById('confirm-img-two').src = "";
		document.getElementById('confirm-img-two').style.display = 'none';
		document.getElementById('upload-aphoto-two2').style.display = 'none';
		document.getElementById('upload-aphoto-two3').style.display = 'none';
		document.getElementById('upload-aphoto-two').style.display = 'block';
		document.getElementById('confirm-img-three').src = "";
		document.getElementById('confirm-img-three').style.display = 'none';
		document.getElementById('upload-aphoto-three2').style.display = 'none';
		document.getElementById('upload-aphoto-three3').style.display = 'none';
		document.getElementById('upload-aphoto-three').style.display = 'block';
		document.getElementById('confirm-img-four').src = "";
		document.getElementById('confirm-img-four').style.display = 'none';
		document.getElementById('upload-aphoto-four2').style.display = 'none';
		document.getElementById('upload-aphoto-four3').style.display = 'none';
		document.getElementById('upload-aphoto-four').style.display = 'block';
		document.getElementById('confirm-img-five').src = "";
		document.getElementById('confirm-img-five').style.display = 'none';
		document.getElementById('upload-aphoto-five2').style.display = 'none';
		document.getElementById('upload-aphoto-five3').style.display = 'none';
		document.getElementById('upload-aphoto-five').style.display = 'block';
	});


	$('#selectedFile-one').change(function () {
    if (this.files[0] == undefined)
      return;
    $('#imageModalContainer-one').modal('show');
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      window.src = reader.result;
      $('#selectedFile-one').val('');
    }, false);
    if (this.files[0]) {
      reader.readAsDataURL(this.files[0]);
    }
	});

	$('#selectedFile-two').change(function () {
    if (this.files[0] == undefined)
      return;
    $('#imageModalContainer-two').modal('show');
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      window.src = reader.result;
      $('#selectedFile-two').val('');
    }, false);
    if (this.files[0]) {
      reader.readAsDataURL(this.files[0]);
    }
	});

	$('#selectedFile-three').change(function () {
    if (this.files[0] == undefined)
      return;
    $('#imageModalContainer-three').modal('show');
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      window.src = reader.result;
      $('#selectedFile-three').val('');
    }, false);
    if (this.files[0]) {
      reader.readAsDataURL(this.files[0]);
    }
	});

	$('#selectedFile-four').change(function () {
    if (this.files[0] == undefined)
      return;
    $('#imageModalContainer-four').modal('show');
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      window.src = reader.result;
      $('#selectedFile-four').val('');
    }, false);
    if (this.files[0]) {
      reader.readAsDataURL(this.files[0]);
    }
	});

	$('#selectedFile-five').change(function () {
    if (this.files[0] == undefined)
      return;
    $('#imageModalContainer-five').modal('show');
    let reader = new FileReader();
    reader.addEventListener("load", function () {
      window.src = reader.result;
      $('#selectedFile-five').val('');
    }, false);
    if (this.files[0]) {
      reader.readAsDataURL(this.files[0]);
    }
	});

	//only if you want to update the content after page load.
	$(document).bind('DOMSubtreeModified',function (){
		$('#crop-image-container-one').height($('.cr-boundary').height() + $('.cr-slider-wrap').height());
	})

	let croppi;
	$('#imageModalContainer-one').on('shown.bs.modal', function () {
	let width = document.getElementById('crop-image-container-one').offsetWidth - 20;
	$('#crop-image-container-one').height((width - 80) + 'px');
		croppi = $('#crop-image-container-one').croppie({
			showZoomer: true,
			enforceBoundary: false,
            enableExif: true,
            enableOrientation: true,
            enableResize: false,
		viewport: {
			width: 500,
			height: 500,
			type: "square"
		},
		boundary: {
            width: '80%',
            height: 600
        }
		});
	croppi.croppie('bind', {
		url: window.src,
	}).then(function () {
		//croppi.croppie('setZoom', '0');
		$('.cr-slider').attr({'min':0.1, 'max':2});
	});
	});
	$('#imageModalContainer-one').on('hidden.bs.modal', function () {
	croppi.croppie('destroy');
	});

	$(document).on('click', '.save-modal-one', function (ev) {
	croppi.croppie('result', {
		type: 'base64',
		format: 'jpg',
		size: 'original'
	}).then(function (resp) {
		$('#confirm-img-one').attr('src', resp);
		$('.modal').modal('hide');
	});
	});


	//only if you want to update the content after page load.
	$(document).bind('DOMSubtreeModified',function (){
		$('#crop-image-container-two').height($('.cr-boundary').height() + $('.cr-slider-wrap').height());
	})

	let croppi2;
	$('#imageModalContainer-two').on('shown.bs.modal', function () {
	let width2 = document.getElementById('crop-image-container-two').offsetWidth - 20;
	$('#crop-image-container-two').height((width2 - 80) + 'px');
		croppi2 = $('#crop-image-container-two').croppie({
			showZoomer: true,
			enforceBoundary: false,
            enableExif: true,
            enableOrientation: true,
            enableResize: false,
		viewport: {
			width: 500,
			height: 500,
			type: "square"
		},
		boundary: {
            width: '80%',
            height: 600
        }
		});
	croppi2.croppie('bind', {
		url: window.src,
	}).then(function () {
		//croppi.croppie('setZoom', '0');
		$('.cr-slider').attr({'min':0.1, 'max':2});
	});
	});
	$('#imageModalContainer-two').on('hidden.bs.modal', function () {
	croppi2.croppie('destroy');
	});

	$(document).on('click', '.save-modal-two', function (ev) {
	croppi2.croppie('result', {
		type: 'base64',
		format: 'jpg',
		size: 'original'
	}).then(function (resp) {
		$('#confirm-img-two').attr('src', resp);
		$('.modal').modal('hide');
	});
	});

	//only if you want to update the content after page load.
	$(document).bind('DOMSubtreeModified',function (){
		$('#crop-image-container-three').height($('.cr-boundary').height() + $('.cr-slider-wrap').height());
	})

	let croppi3;
	$('#imageModalContainer-three').on('shown.bs.modal', function () {
	let width3 = document.getElementById('crop-image-container-three').offsetWidth - 20;
	$('#crop-image-container-three').height((width3 - 80) + 'px');
		croppi3 = $('#crop-image-container-three').croppie({
			showZoomer: true,
			enforceBoundary: false,
            enableExif: true,
            enableOrientation: true,
            enableResize: false,
		viewport: {
			width: 500,
			height: 500,
			type: "square"
		},
		boundary: {
            width: '80%',
            height: 600
        }
		});
	croppi3.croppie('bind', {
		url: window.src,
	}).then(function () {
		//croppi.croppie('setZoom', '0');
		$('.cr-slider').attr({'min':0.1, 'max':2});
	});
	});
	$('#imageModalContainer-three').on('hidden.bs.modal', function () {
	croppi3.croppie('destroy');
	});

	$(document).on('click', '.save-modal-three', function (ev) {
	croppi3.croppie('result', {
		type: 'base64',
		format: 'jpg',
		size: 'original'
	}).then(function (resp) {
		$('#confirm-img-three').attr('src', resp);
		$('.modal').modal('hide');
	});
	});


	//only if you want to update the content after page load.
	$(document).bind('DOMSubtreeModified',function (){
		$('#crop-image-container-four').height($('.cr-boundary').height() + $('.cr-slider-wrap').height());
	})

	let croppi4;
	$('#imageModalContainer-four').on('shown.bs.modal', function () {
	let width4 = document.getElementById('crop-image-container-four').offsetWidth - 20;
	$('#crop-image-container-four').height((width4 - 80) + 'px');
		croppi4 = $('#crop-image-container-four').croppie({
			showZoomer: true,
			enforceBoundary: false,
            enableExif: true,
            enableOrientation: true,
            enableResize: false,
		viewport: {
			width: 500,
			height: 500,
			type: "square"
		},
		boundary: {
            width: '80%',
            height: 600
        }
		});
	croppi4.croppie('bind', {
		url: window.src,
	}).then(function () {
		//croppi.croppie('setZoom', '0');
		$('.cr-slider').attr({'min':0.1, 'max':2});
	});
	});
	$('#imageModalContainer-four').on('hidden.bs.modal', function () {
	croppi4.croppie('destroy');
	});

	$(document).on('click', '.save-modal-four', function (ev) {
	croppi4.croppie('result', {
		type: 'base64',
		format: 'jpg',
		size: 'original'
	}).then(function (resp) {
		$('#confirm-img-four').attr('src', resp);
		$('.modal').modal('hide');
	});
	});

	//only if you want to update the content after page load.
	$(document).bind('DOMSubtreeModified',function (){
		$('#crop-image-container-five').height($('.cr-boundary').height() + $('.cr-slider-wrap').height());
	})

	let croppi5;
	$('#imageModalContainer-five').on('shown.bs.modal', function () {
	let width5 = document.getElementById('crop-image-container-five').offsetWidth - 20;
	$('#crop-image-container-five').height((width5 - 80) + 'px');
		croppi5 = $('#crop-image-container-five').croppie({
			showZoomer: true,
			enforceBoundary: false,
            enableExif: true,
            enableOrientation: true,
            enableResize: false,
		viewport: {
			width: 500,
			height: 500,
			type: "square"
		},
		boundary: {
            width: '80%',
            height: 600
        }
		});
	croppi5.croppie('bind', {
		url: window.src,
	}).then(function () {
		//croppi.croppie('setZoom', '0');
		$('.cr-slider').attr({'min':0.1, 'max':2});
	});
	});
	$('#imageModalContainer-five').on('hidden.bs.modal', function () {
	croppi5.croppie('destroy');
	});

	$(document).on('click', '.save-modal-five', function (ev) {
	croppi5.croppie('result', {
		type: 'base64',
		format: 'jpg',
		size: 'original'
	}).then(function (resp) {
		$('#confirm-img-five').attr('src', resp);
		$('.modal').modal('hide');
	});
	});



	$('#brand').change(function() {
		if ( this.value == 'Other') {
			if (this.value == '') {
				$("#sellOtherBrand").css('border','2px solid red');
				$("#noOtherBrand").css('display','block');
      		} else {
				$("#sellOtherBrand").css('border','1px solid black');
				$("#noOtherBrand").css('display','none');
	  	}			
        $("#otherBrand").show();
      } else {
		$("#otherBrand").hide();
	  }
	});


	$('#sellTitle').change(function() {
		if ( this.value == '') {
        	$("#sellTitle").css('border','2px solid red');
			$("#noTitle").css('display','block');
      	} else {
			$("#sellTitle").css('border','1px solid black');
			$("#noTitle").css('display','none');
	  	}
	});
	$('#sellCategory').change(function() {
		if ( this.value == '') {
        	$("#sellCategory").css('border','2px solid red');
			$("#noCategoryMessage").css('display','block');
      	} else {
			$("#sellCategory").css('border','1px solid black');
			$("#noCategoryMessage").css('display','none');
	  	}
	});
	$('#sellDescription').change(function() {
		if ( this.value == '') {
        	$("#sellDescription").css('border','2px solid red');
			$("#noDescription").css('display','inline-block');
      	} else {
			$("#sellDescription").css('border','1px solid black');
			$("#noDescription").css('display','none');
	  	}
	});
	$('#sellNewused').change(function() {
		if ( this.value == '') {
        	$("#sellNewused").css('border','2px solid red');
			$("#noNewused").css('display','block');
      	} else {
			$("#sellNewused").css('border','1px solid black');
			$("#noNewused").css('display','none');
	  	}
	});
	$('#sellQuality').change(function() {
		if ( this.value == '') {
        	$("#sellQuality").css('border','2px solid red');
			$("#noQuality").css('display','block');
      	} else {
			$("#sellQuality").css('border','1px solid black');
			$("#noQuality").css('display','none');
	  	}
	});
	$('#sellBrand').change(function() {
		if ( this.value == '') {
        	$("#sellBrand").css('border','2px solid red');
			$("#noBrand").css('display','block');
      	} else {
			$("#sellBrand").css('border','1px solid black');
			$("#noBrand").css('display','none');
	  	}
	});
	$('#sellMinbid').change(function() {
		if ( this.value == '') {
        	$("#sellMinbid").css('border','2px solid red');
			$("#noMinbid").css('display','block');
      	} else {
			$("#sellMinbid").css('border','1px solid black');
			$("#noMinbid").css('display','none');
	  	}
	});


	$('#category').change(function() {
	  if ( this.value == '') {
        $("#noCategory").show();
		$("#noCategoryMessage").css('display','block');
      } else {
        $("#noCategory").hide();
		$("#noCategoryMessage").css('display','none');
	  }
      if ( this.value == 'Disc') {
        $("#discs").show();
      } else {
        $("#discs").hide();
	  }
	  if ( this.value == 'Bag') {
        $("#bags").show();
      } else {
        $("#bags").hide();
	  }
	  if ( this.value == 'Apparel') {
        $("#apparel").show();
      } else {
        $("#apparel").hide();
	  }
	  if ( this.value == 'Basket') {
        $("#baskets").show();
      } else {
        $("#baskets").hide();
	  }
	  if ( this.value == 'Shoes') {
        $("#shoes").show();
      } else {
        $("#shoes").hide();
	  }
	  if ( this.value == 'Accessory') {
        $("#accessories").show();
      } else {
        $("#accessories").hide();
      }
    });


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