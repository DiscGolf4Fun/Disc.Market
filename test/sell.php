<?php include_once 'header.php'; ?>
</div>
</div>


<div id="main-wrapper">
			<div class="container">
			<header class="major" style="margin-bottom: 1.5em;">
				<h2>Sell Anything Disc Golf</h2>
			</header>
				<form action="sell-images.php" method="post">
				<div class="row" style="width: 100%; margin: auto 0 auto 0;">
					<div class="sellTitle 9u 12u(mobile)">
						<label for="title" style="font-size: 1.5em; margin-bottom: .25em;">Title&nbsp;<span style="color: red;">*</span></label>
						<input type="text" name="title" placeholder="Title" style="border: 1px solid black;" required>
					</div>
					<div class="sellCategory 3u 12u(mobile)">
						<label for="dropdown" style="font-size: 1.5em; margin-bottom: .25em;">Category&nbsp;<span style="color: red;">*</span></label>
						<div class="dropdown" style="width: 100%; margin-left: 0;">
							<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
							<div class="custom-select">
									<select id="category" required>
										<option value="">Select Category</option>
										<option value="Disc">Discs</option>
										<option value="Bag">Bags / Carts</option>
										<option value="Apparel">Apparel</option>
										<option value="Basket">Baskets</option>
										<option value="Shoes">Shoes</option>
										<option value="Accessory">Accessories</option>
									</select>
							</div>
						</div>
					</div>


					<div class="sellDescription 12u">
						<label for="description" style="font-size: 1.5em; margin-bottom: .25em;">Description&nbsp;<span style="color: red;">*</span></label>
						<textarea name="description" id="textarea" onkeydown="return limitLines(this, event)" placeholder="Description" maxlength="250" rows="5" style="resize: none; height: 10em; border: 1px solid black;"></textarea>
						<div id="textarea_feedback"></div>
					</div>


					<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: 1em 1em 1.5em 1em;">
					<div class="sellNewused 4u 12u(mobile)">
							<label for="newused" style="font-size: 1.5em; margin-bottom: .25em;">New/Used?&nbsp;<span style="color: red;"> *</span></label>
							<div class="custom-select" style="display: inline-block; width: 100%;">
								<select style="width: 100%;" required>
									<option value="">Select New or Used</option>
									<option value="new">New</option>
									<option value="used">Used</option>
								</select>
							</div>
						</div>
						<div class="sellQuality 4u 12u(mobile)">
							<label for="title" style="font-size: 1.5em; margin-bottom: .25em;">Quality&nbsp;<span style="color: red;"> *</span></label>
							<div class="custom-select" style="display: inline-block; width: 100%;">
								<select style="width: 100%;" required>
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
						</div>
						<div class="sellBrand 4u 12u(mobile)">
							<label for="title" style="font-size: 1.5em; margin-bottom: .25em;">Brand<span style="color: red;"> *</span></label>
							<div class="custom-select" style="display: inline-block; width: 100%;">
												<select style="width: 100%;" id="brands" required>
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
						</div>
						<div class="12u 12u(mobile)" id="otherBrand">
							<label for="otherbrand" style="font-size: 1.5em; margin-bottom: .25em;">Other Brand<span style="color: red;"> *</span></label>
							<input type="text" name="otherBrand" placeholder="Enter other brand" style="border: 1px solid black;" required>
						</div>
						<div class="sellMinBid 6u 12u(mobile)">
							<label for="minbid" style="font-size: 1.5em; margin-bottom: .25em;">Minimum Bid<span style="color: red;"> *</span></label>
							<input type="text" name="minbid" min="1" max="999" placeholder="$1" style="border: 1px solid black;" required>
						</div>
						<div class="sellBuyitnow 6u 12u(mobile)">
							<label for="buyitnow" style="font-size: 1.5em; margin-bottom: .25em;">Buy it Now</label>
							<input type="text" name="buyitnow" min="1" max="999" placeholder="$" style="border: 1px solid black;">
						</div>
					</div>
				

					<div class="12u" style="padding: 0; text-align: center;" id="noCategory">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;None</h2>
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
								<input type="text" name="discweight" placeholder="Weight" style="border: 1px solid black;" required>
							</div>
							<div class="discPlastic 4u 12u(mobile)">
								<label for="discplastic" style="font-size: 1.5em; margin-bottom: .25em;">Plastic type<span style="color: red;"> *</span></label>
								<input type="text" name="discplastic" placeholder="Plastic type" style="border: 1px solid black;" required>
							</div>
							<div class="discColor 4u 12u(mobile)">
								<label for="disccolor" style="font-size: 1.5em; margin-bottom: .25em;">Disc color<span style="color: red;"> *</span></label>
								<input type="text" name="disccolor" placeholder="Disc color" style="border: 1px solid black;" required>
							</div>
							<div class="discName 6u 12u(mobile)">
								<label for="discname" style="font-size: 1.5em; margin-bottom: .25em;">Disc Name<span style="color: red;"> *</span></label>
								<input type="text" name="discname" placeholder="Disc name" style="border: 1px solid black;" required>
							</div>
							<div class="discInk 6u 12u(mobile)">
								<label for="discink" style="font-size: 1.5em; margin-bottom: .25em;">Ink?<span style="color: red;">  *</span></label>
								<div class="custom-select" style="display: inline-block; width: 100%;">
									<select style="width: 100%;" required>
										<option value="">Select Yes or No</option>
										<option value="new">Yes</option>
										<option value="used">No</option>
									</select>
								</div>
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
								<input type="text" name="bagcolor" placeholder="Color" style="border: 1px solid black;" required>
							</div>
							<div class="bagModal 4u 12u(mobile)">
								<label for="modal" style="font-size: 1.5em; margin-bottom: .25em;">Bag/Cart Modal</label>
								<input type="text" name="modal" placeholder="Modal" style="border: 1px solid black;">
							</div>
							<div class="bagCapacity 4u 12u(mobile)">
								<label for="modal" style="font-size: 1.5em; margin-bottom: .25em;">Disc Capacity</label>
								<input type="text" name="capacity" placeholder="# Disc capacity" style="border: 1px solid black;">
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
								<input type="text" name="apparelsize" placeholder="Size" style="border: 1px solid black;" required>
							</div>
							<div class="apparelColor 4u 12u(mobile)">
								<label for="apparelcolor" style="font-size: 1.5em; margin-bottom: .25em;">Apparel Color<span style="color: red;"> *</span></label>
								<input type="text" name="apparelcolor" placeholder="Color" style="border: 1px solid black;" required>
							</div>
							<div class="apparelMaterial 4u 12u(mobile)">
								<label for="apparelmaterial" style="font-size: 1.5em; margin-bottom: .25em;">Apparel Material</label>
								<input type="text" name="apparelmaterial" placeholder="Material" style="border: 1px solid black;">
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="baskets">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Baskets</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="basketModal 4u 12u(mobile)">
								<label for="basketmodal" style="font-size: 1.5em; margin-bottom: .25em;">Basket modal<span style="color: red;"> *</span></label>
								<input type="text" name="basketmodal" placeholder="Modal" style="border: 1px solid black;" required>
							</div>
							<div class="basketChains 4u 12u(mobile)">
								<label for="basketchains" style="font-size: 1.5em; margin-bottom: .25em;">Number of chains</label>
								<input type="text" name="basketchains" placeholder="# of chains" style="border: 1px solid black;">
							</div>
							<div class="basketColor 4u 12u(mobile)">
								<label for="basketcolor" style="font-size: 1.5em; margin-bottom: .25em;">Basket Color</label>
								<input type="text" name="basketcolor" placeholder="Color" style="border: 1px solid black;">
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="shoes">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Shoes</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="shoeSize 4u 12u(mobile)">
								<label for="shoesize" style="font-size: 1.5em; margin-bottom: .25em;">Shoe size<span style="color: red;"> *</span></label>
								<input type="text" name="shoesize" placeholder="Size" style="border: 1px solid black;" required>
							</div>
							<div class="shoeColor 4u 12u(mobile)">
								<label for="shoesize" style="font-size: 1.5em; margin-bottom: .25em;">Shoe color</label>
								<input type="text" name="shoecolor" placeholder="Color" style="border: 1px solid black;">
							</div>
							<div class="shoeGender 4u 12u(mobile)">
								<label for="shoeGender" style="font-size: 1.5em; margin-bottom: .25em;">Men or Women<span style="color: red;">  *</span></label>
								<div class="custom-select" style="display: inline-block; width: 100%;">
									<select style="width: 100%;" required>
										<option value="">Select Men or Women</option>
										<option value="men">Men</option>
										<option value="women">Women</option>
									</select>
								</div>
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
								<input type="text" name="accessorysize" placeholder="Size" style="border: 1px solid black;">
							</div>
							<div class="sellAccessoryColor 6u 12u(mobile)">
								<label for="accessorycolor" style="font-size: 1.5em; margin-bottom: .25em;">Accessory color</label>
								<input type="text" name="accessorycolor" placeholder="Color" style="border: 1px solid black;">
							</div>
						</div>
					</div>
					<div class="nextImages 6u 12u(mobile)">
						<input type="submit" name="submit" value="Next:  Images" style="float:right;">
					</div>
					<div class="sellReset 6u 12u(mobile)">
						<input type="reset" name="submit" value="Reset" style="background-color: gray;" onclick="topFunction();">
					</div>
				</div>
				</form> 
				</div>
			</div>
</div>


<?php include_once 'footer.php'; ?>

<script>
	$('#brands').on('change', function() {
		if ( this.value == 'Other') {
        $("#otherBrand").show();
      } else {
		$("#otherBrand").hide();
	  }
	});
	$('#category').on('change', function() {
	  if ( this.value == '') {
        $("#noCategory").show();
      } else {
        $("#noCategory").hide();
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
</script>