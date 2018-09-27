<?php include_once 'header.php'; ?>
</div>
</div>
<script>

	window.onscroll = function (e)
	{
		scrollFunction();
	}	
</script>



<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;&nbsp;<i class="fa fa-caret-up" style="font-size: 1.5em;"></i>&nbsp;&nbsp;</button>
		<?php
			$innovaCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'innova';"));
			$discraftCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'discraft';"));
			$dynamicCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'dynamic';"));
			$latitudeCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'latitude';"));
			$westsideCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'westside';"));
			$discmaniaCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'discmania';"));
			$prodigyCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'prodigy';"));
			$mvpCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'MVP';"));
			$gatewayCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'gateway';"));
			$otherBrandCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE 
			brand != 'innova' && 
			brand != 'discraft' && 
			brand != 'dynamic' && 
			brand != 'latitude' && 
			brand != 'westside' && 
			brand != 'discmania' && 
			brand != 'prodigy' && 
			brand != 'MVP' && 
			brand != 'gateway';"));

			$discCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'disc';"));
			$bagCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'bag';"));
			$apparelCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'apparel';"));
			$basketCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'basket';"));
			$shoesCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'shoes';"));
			$accessoryCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'accessory';"));

			$driverCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'driver';"));
			$fairwayCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'fairway';"));
			$midrangeCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'midrange';"));
			$putterCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'putter';"));

			$newCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE newused = 'new';"));
			$usedCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE newused = 'used';"));
		?>
		<!-- Main -->
		
		<div id="main-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						<!-- Portfolio -->
						<section>
							<div class="row">
								<div class="buyContent">
									<section id="search">
										<div class="search-container">
											<form>
												<input id="search1" type="text" placeholder="Search the Market.." onkeyup="getPostsSearch(this.value)">
												<button id="search2" type="button">
													<i class="fa fa-search" style="font-size: 1.5em;"></i>
												</button>
												<div class="dropdown">
													<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
													<div class="custom-select">
														<select onchange="getPostsTopFilter(this.value)">
															<option value="new">Featured</option>
															<option value="low">Price: Lowest</option>
															<option value="high">Price: Highest</option>
															<option value="endingSoonest">Ending: Soonest</option>
															<option value="endingLatest">Ending: Latest</option>
														</select>
													</div>
												</div>
											</form>
										</div>
									</section>
								</div>
								<div class="filter2">
									<div class="12u 12u(mobile) border">
										<section class="box" id="filterBox">
											<h3 class="filterTitle">Brands</h3>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="innova" value="innova" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Innova
													</div>
												</div>
												<span style="float: right;"><?php echo $innovaCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="discraft" value="discraft" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Discraft
													</div>
												</div>
												<span style="float: right;"><?php echo $discraftCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="dynamic" value="dynamic" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Dynamic Discs
													</div>
												</div>
												<span style="float: right;"><?php echo $dynamicCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="latitude" value="latitude" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Latitude 64
													</div>
												</div>
												<span style="float: right;"><?php echo $latitudeCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="westside" value="westside" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Westside
													</div>
												</div>
												<span style="float: right;"><?php echo $westsideCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="discmania" value="discmania" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Discmania
													</div>
												</div>
												<span style="float: right;"><?php echo $discmaniaCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="prodigy" value="prodigy" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Prodigy
													</div>
												</div>
												<span style="float: right;"><?php echo $prodigyCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="mvp" value="mvp" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>MVP
													</div>
												</div>
												<span style="float: right;"><?php echo $mvpCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="gateway" value="gateway" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Gateway
													</div>
												</div>
												<span style="float: right;"><?php echo $gatewayCount[0]; ?></span>
											</div>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="otherBrand" value="otherBrand" onchange="getPostsBrands(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Other
													</div>
												</div>
												<span style="float: right;"><?php echo $otherBrandCount[0]; ?></span>
											</div>
											<br>
											<h3 class="filterTitle">Categories</h3>
											<div class="filterItem">
												<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="disc" value="disc" onchange="getPostsCategories(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Discs
													</div>
												</div>
												<span style="float: right;"><?php echo $discCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="bag" value="bag" onchange="getPostsCategories(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Bags / Carts
													</div>
												</div>
												<span style="float: right;"><?php echo $bagCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="apparel" value="apparel" onchange="getPostsCategories(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Apparel
													</div>
												</div>
												<span style="float: right;"><?php echo $apparelCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="basket" value="basket" onchange="getPostsCategories(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Baskets
													</div>
												</div>
												<span style="float: right;"><?php echo $basketCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="shoes" value="shoes" onchange="getPostsCategories(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Shoes
													</div>
												</div>
												<span style="float: right;"><?php echo $shoesCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="accessory" value="accessory" onchange="getPostsCategories(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Accessories
													</div>
												</div>
												<span style="float: right;"><?php echo $accessoryCount[0]; ?></span>
											</div>
											<br>
											<h3 class="filterTitle">Disc Type</h3>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="driver" value="driver" onchange="getPostsDiscType(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Driver
													</div>
												</div>
												<span style="float: right;"><?php echo $driverCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="fairway" value="fairway" onchange="getPostsDiscType(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Fairway Driver
													</div>
												</div>
												<span style="float: right;"><?php echo $fairwayCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve">
												<input type="checkbox" name="filterCheckbox" id="midrange" value="midrange" onchange="getPostsDiscType(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Midrange
													</div>
												</div>
												<span style="float: right;"><?php echo $midrangeCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="putter" value="putter" onchange="getPostsDiscType(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Putter
													</div>
												</div>
												<span style="float: right;"><?php echo $putterCount[0]; ?></span>
											</div>
											<br>
											<h3 class="filterTitle">New / Used</h3>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="new" value="new" onchange="getPostsNewUsed(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>New
													</div>
												</div>
												<span style="float: right;"><?php echo $newCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="used" value="used" onchange="getPostsNewUsed(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Used
													</div>
												</div>
												<span style="float: right;"><?php echo $usedCount[0]; ?></span>
											</div>
											<hr style="margin: 1.5em 1em .5em 1em;">
											<h3 class="filterTitle">Price:  <label id="resultsPrice" style="font-weight: normal;"></label></h3>
											<br>
											<div class="filterItemSlider">
												<div class="slider1">
													<input type="text" id="sliderPrice" class="sliderPrice">
												</div>
											</div>
											<hr style="margin: 1.5em 1em .5em 1em;">
											<h3 class="filterTitle">Weight: <label id="resultsWeight" style="font-weight: normal;"></label></h3>
											<br>
											<div class="filterItemSlider">
												<div class="slider1">
													<input type="text" id="sliderWeight" class="sliderWeight">
												</div>
											</div>
											<hr style="margin: 1.5em 1em .5em 1em;">
											<h3 class="filterTitle">Quality: <label id="resultsQuality" style="font-weight: normal;"></label></h3>
											<br>
											<div class="filterItemSlider">
												<div class="slider1">
													<input type="text" id="sliderQuality" class="sliderQuality">
												</div>
											</div>
											<hr style="margin: 1.5em 1em 1.5em 1em;">
											<center><button style="align: justify-content: center;" onClick="refreshPage()">Clear All Filters</button></center>
											<br>
										</section>
									</div>
								</div>
								<div class="post2">
										<div class="12u">
											<div class="filterButton">
												<div id="filterResults"></div>
											</div>
											<!-- Portfolio -->
										<section>
												<div id="results"></div>
										</section>
										</div>
								</div>
						</section>

					</div>
				</div>
			</div>
		</div>

<?php include_once 'footer.php'; ?>