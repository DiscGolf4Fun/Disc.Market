<?php include_once 'header.php'; ?>
</div>
</div>

<script type="text/javascript" src="javascript.js"></script>

		<?php
			$innovaCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'innova' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$discraftCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'discraft' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$dynamicCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'dynamic' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$latitudeCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'latitude' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$westsideCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'westside' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$discmaniaCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'discmania' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$prodigyCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'prodigy' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$mvpCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'MVP' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$gatewayCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE brand = 'gateway' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$otherBrandCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE 
			brand != 'innova' && 
			brand != 'discraft' && 
			brand != 'dynamic' && 
			brand != 'latitude' && 
			brand != 'westside' && 
			brand != 'discmania' && 
			brand != 'prodigy' && 
			brand != 'MVP' && 
			brand != 'gateway' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));

			$brandsArray = array('innova' => $innovaCount[0], 'discraft' => $discraftCount[0], 'dynamic' => $dynamicCount[0], 'latitude' => $latitudeCount[0], 'westside' => $westsideCount[0], 'discmania' => $discmaniaCount[0], 'prodigy' => $prodigyCount[0], 'mvp' => $mvpCount[0], 'gateway' => $gatewayCount[0]);
			arsort($brandsArray);
			$brandsArray['otherBrand'] = $otherBrandCount[0]; 



			$discCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'disc' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$bagCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'bag' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$apparelCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'apparel' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$basketCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'basket' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$shoesCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'shoes' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$accessoryCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'accessory' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));

			$categoriesArray = array('disc' => $discCount[0], 'bag' => $bagCount[0], 'apparel' => $apparelCount[0], 'basket' => $basketCount[0], 'shoes' => $shoesCount[0], 'accessory' => $accessoryCount[0]);
			arsort($categoriesArray);



			$driverCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'driver' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$fairwayCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'fairway' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$midrangeCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'midrange' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$putterCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE disc_type = 'putter' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));

			$newCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE newused = 'new' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			$usedCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE newused = 'used' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));


			$totalCount = $innovaCount[0] + $discraftCount[0] + $dynamicCount[0] + $latitudeCount[0] + $westsideCount[0] + $discmaniaCount[0] + $prodigyCount[0] + $mvpCount[0] + $gatewayCount[0] + $otherBrandCount[0];

			if(isset($_GET['search'])) {
				$homeSearch = $_GET['search'];
			} else {
				$homeSearch = null;
			}
			

			if(isset($_SESSION['u_id'])) {
				$sql1 = "SELECT * FROM posts LEFT JOIN(SELECT DISTINCT bids.post_id, bids.bid FROM bids WHERE bids.user_id = ". $_SESSION['u_id'] ." ORDER BY bids.bid DESC) bidding ON posts.id = bidding.post_id WHERE bidding.post_id <> '' && UNIX_TIMESTAMP(timestamp) > " . time() . " ";
				$sql2 = "SELECT DISTINCT bids.post_id, MAX(bids.bid) AS maxbid FROM posts LEFT JOIN bids ON posts.id = bids.post_id WHERE bids.bid <> '' && bids.user_id GROUP BY posts.id";

				$posts = mysqli_query($conn, $sql1);

				$maxBids = mysqli_query($conn, $sql2);

				$count_rows = $posts->num_rows;
				$post_array = array();
				$post_array2 = array();
				$array_count = ceil($count_rows);
				$array_data = array();
				$count = 0;

				while ($post = mysqli_fetch_array($posts)) {
					array_push($post_array,$post);
				}

				while ($maxBid = mysqli_fetch_array($maxBids)) {
					array_push($post_array2,$maxBid);
				}


				foreach($post_array as $key1=>$value1) {
					foreach($post_array2 as $key2=>$value2) {
						if($value1['id']==$value2['post_id']) {
							$value1['maxbid'] = $value2['maxbid'];
							$result[$key1]=$value1;
						}
					}
				}
				$winningCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'disc' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
				$losingCount = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE type = 'disc' AND UNIX_TIMESTAMP(timestamp) > " . time() . ";"));
			}


		?>
		<!-- Main -->
		<div id="main-wrapper">
			<div class="container">
			<script>
				$(document).ready(function() { 
					$('.container').addClass("show");
				});
			</script>
						<!-- Portfolio -->
						<section>
							<div class="row">
										<div class="9u 12u(mobile) search-container">
											<form class="searchForm">
												<input id="searchBuypage" type="text" placeholder="Search the Market..." />
												<button type="button" onclick="getPostsSearch()" id="searchBuypageButton">
													<i class="fa fa-search" id="search-icon"></i>
												</button>
											</form>										
										</div>
										<div class="0u 4u(mobile) dropdown-container mobile">
											<button type="button" class="filterButtonMobile">
												<i class="fa fa-filter" id="filter-icon"></i>&nbsp;&nbsp;Filters
											</button>
											<div class="filterPopup">
												<br>
												<div class="12u 12u(mobile) border">
													<section class="box" id="filterBox">
													<?php
														if(isset($_SESSION['u_role']) && $_SESSION['u_role'] == 1) {
															echo "<h3 class='filterTitle'>Brands<span style='float: right; padding-right: .75em;'>Total: ". $totalCount ."</span></h3>";
														} else {
															echo "<h3 class='filterTitle'>Brands</h3>";
														}

														foreach($brandsArray as $key => $value) {
															?>
															<div class="filterItem">
																<div class="pretty p-svg p-curve p-pulse">
																<input type="checkbox" name="filterCheckbox" id="<?php echo $key; ?>" value="<?php echo $key; ?>" onchange="getPostsBrands(this.value)">
																	<div class="state p-success">
																		<!-- svg path -->
																		<svg class="svg svg-icon" viewBox="0 0 20 20">
																			<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
																		</svg>

																		<?php
																		if($key == 'innova'){
																			$key = 'Innova';
																		} elseif($key == 'discraft') {
																			$key = 'Discraft';
																		} elseif($key == 'dynamic') {
																			$key = 'Dynamic Discs';
																		} elseif($key == 'latitude') {
																			$key = 'Latitude 64';
																		} elseif($key == 'westside') {
																			$key = 'Westside';
																		} elseif($key == 'discmania') {
																			$key = 'Discmania';
																		} elseif($key == 'prodigy') {
																			$key = 'Prodigy';
																		} elseif($key == 'mvp') {
																			$key = 'MVP';
																		} elseif($key == 'gateway') {
																			$key = 'Gateway';
																		} elseif($key == 'otherBrand') {
																			$key = 'Other Brands';
																		}
																		?>


																		<label style="margin-left: .75em;"></label><?php echo $key; ?>
																	</div>
																</div>
																<span style="float: right;"><?php echo $value ?></span>
															</div>
															<?php
														}
														?>
														<br>
														<h3 class="filterTitle">Categories</h3>
														<?php
														foreach($categoriesArray as $key => $value) {
															?>
															<div class="filterItem">
																<div class="pretty p-svg p-curve p-pulse">
																<input type="checkbox" name="filterCheckbox" id="<?php echo $key; ?>" value="<?php echo $key; ?>" onchange="getPostsCategories(this.value)">
																	<div class="state p-success">
																		<!-- svg path -->
																		<svg class="svg svg-icon" viewBox="0 0 20 20">
																			<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
																		</svg>

																		<?php
																		if($key == 'disc'){
																			$key = 'Discs';
																		} elseif($key == 'bag') {
																			$key = 'Bags / Carts';
																		} elseif($key == 'apparel') {
																			$key = 'Apparel';
																		} elseif($key == 'basket') {
																			$key = 'Baskets';
																		} elseif($key == 'shoes') {
																			$key = 'Shoes';
																		} elseif($key == 'accessory') {
																			$key = 'Accessories';
																		}
																		?>


																		<label style="margin-left: .75em;"></label><?php echo $key; ?>
																	</div>
																</div>
																<span style="float: right;"><?php echo $value ?></span>
															</div>
															<?php
															}
														?>						
														
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

														<?php if(isset($_SESSION['u_id'])) { ?>
														<br>
														<h3 class="filterTitle">Bids</h3>
														<div class="filterItem">
														<div class="pretty p-svg p-curve p-pulse">
															<input type="checkbox" name="filterCheckbox" id="winning" value="winning" onchange="getPostsWinningLosing(this.value)">
																<div class="state p-success">
																	<!-- svg path -->
																	<svg class="svg svg-icon" viewBox="0 0 20 20">
																		<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
																	</svg>
																	<label style="margin-left: .75em;"></label>Winning
																</div>
															</div>
															<span style="float: right;"><?php echo $winningCount[0]; ?></span>
														</div>
														<div class="filterItem">
														<div class="pretty p-svg p-curve p-pulse">
															<input type="checkbox" name="filterCheckbox" id="losing" value="losing" onchange="getPostsWinningLosing(this.value)">
																<div class="state p-success">
																	<!-- svg path -->
																	<svg class="svg svg-icon" viewBox="0 0 20 20">
																		<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
																	</svg>
																	<label style="margin-left: .75em;"></label>Losing
																</div>
															</div>
															<span style="float: right;"><?php echo $losingCount[0]; ?></span>
														</div>
														<?php } ?>


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
													</section>
												</div>
													<div style="background: #CEE5CD; border-top: black solid 5px; z-index: 9999; position: fixed; bottom: 0; width: 100%;">		
														<div id="" class="row" onclick="" style="z-index: 99999999; margin-left: 5%; margin-right: 10%; padding-top: 1em; padding-bottom: 1em;"> 
															<div class="12u(mobile)">
																<button class="filterMobileClose2" type="button">Show Results</button>
															</div>
														</div>
													</div>
											</div>
										</div>
										<div class="3u 8u(mobile) dropdown-container">
											<form>												
													<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
													<div class="custom-select">
														<select id="topFilterDropdown" onchange="getPostsTopFilter(this.value)">
															<option value="endingSoonest">Ending: Soonest</option>
															<option value="endingLatest">Ending: Latest</option>
															<!-- <option value="new">Newest</option> -->
															<option value="low">Price: Lowest</option>
															<option value="high">Price: Highest</option>
														</select>
													</div>
											</form>
										</div>
								<div class="filter2" style="width: 25%;">
									<div class="12u 12u(mobile) border">
										<section class="box" id="filterBox">
										<?php
											if(isset($_SESSION['u_role']) && $_SESSION['u_role'] == 1) {
												echo "<h3 class='filterTitle'>Brands<span style='float: right; padding-right: .75em;'>Total: ". $totalCount ."</span></h3>";
											} else {
												echo "<h3 class='filterTitle'>Brands</h3>";
											}

											foreach($brandsArray as $key => $value) {
												?>
												<div class="filterItem">
													<div class="pretty p-svg p-curve p-pulse">
													<input type="checkbox" name="filterCheckbox" id="<?php echo $key; ?>" value="<?php echo $key; ?>" onchange="getPostsBrands(this.value)">
														<div class="state p-success">
															<!-- svg path -->
															<svg class="svg svg-icon" viewBox="0 0 20 20">
																<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
															</svg>

															<?php
															if($key == 'innova'){
																$key = 'Innova';
															} elseif($key == 'discraft') {
																$key = 'Discraft';
															} elseif($key == 'dynamic') {
																$key = 'Dynamic Discs';
															} elseif($key == 'latitude') {
																$key = 'Latitude 64';
															} elseif($key == 'westside') {
																$key = 'Westside';
															} elseif($key == 'discmania') {
																$key = 'Discmania';
															} elseif($key == 'prodigy') {
																$key = 'Prodigy';
															} elseif($key == 'mvp') {
																$key = 'MVP';
															} elseif($key == 'gateway') {
																$key = 'Gateway';
															} elseif($key == 'otherBrand') {
																$key = 'Other Brands';
															}
															?>


															<label style="margin-left: .75em;"></label><?php echo $key; ?>
														</div>
													</div>
													<span style="float: right;"><?php echo $value ?></span>
												</div>
												<?php
											}
											?>
											<br>
											<h3 class="filterTitle">Categories</h3>
											<?php
											foreach($categoriesArray as $key => $value) {
												?>
												<div class="filterItem">
													<div class="pretty p-svg p-curve p-pulse">
													<input type="checkbox" name="filterCheckbox" id="<?php echo $key; ?>" value="<?php echo $key; ?>" onchange="getPostsCategories(this.value)">
														<div class="state p-success">
															<!-- svg path -->
															<svg class="svg svg-icon" viewBox="0 0 20 20">
																<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
															</svg>

															<?php
															if($key == 'disc'){
																$key = 'Discs';
															} elseif($key == 'bag') {
																$key = 'Bags / Carts';
															} elseif($key == 'apparel') {
																$key = 'Apparel';
															} elseif($key == 'basket') {
																$key = 'Baskets';
															} elseif($key == 'shoes') {
																$key = 'Shoes';
															} elseif($key == 'accessory') {
																$key = 'Accessories';
															}
															?>


															<label style="margin-left: .75em;"></label><?php echo $key; ?>
														</div>
													</div>
													<span style="float: right;"><?php echo $value ?></span>
												</div>
												<?php
												}
											?>						
											
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

											<?php if(isset($_SESSION['u_id'])) { ?>
											<br>
											<h3 class="filterTitle">Bids</h3>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="winning" value="winning" onchange="getPostsWinningLosing(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Winning
													</div>
												</div>
												<span style="float: right;"><?php echo $winningCount[0]; ?></span>
											</div>
											<div class="filterItem">
											<div class="pretty p-svg p-curve p-pulse">
												<input type="checkbox" name="filterCheckbox" id="losing" value="losing" onchange="getPostsWinningLosing(this.value)">
													<div class="state p-success">
														<!-- svg path -->
														<svg class="svg svg-icon" viewBox="0 0 20 20">
															<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
														</svg>
														<label style="margin-left: .75em;"></label>Losing
													</div>
												</div>
												<span style="float: right;"><?php echo $losingCount[0]; ?></span>
											</div>
											<?php } ?>


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
											<center><button style="justify-content: center;" data-toggle="confirm2">Clear All Filters</button></center>
											<br>
										</section>
									</div>
									<button type="button" id="toTopButton" onclick="topFunction();" style="display: none;">&nbsp;&nbsp;<i class="fa fa-caret-up" style="font-size: 1.5em;"></i>&nbsp;&nbsp;</button>
								</div>
	
								<div class="pageLoader">
									<img src="/test/images/LoadingPuttGif.gif" alt="Loading Putt Gif"  width="500" />
									<h2>Loading discs...</h2>
								</div>
								<div class="post2">
									<div class="filterButton" style="display: none;">
										<div class="row" id="filterResults"></div>
									</div>
									<!-- Portfolio -->
									<section>										
										<div id="results"></div>
									</section>
								</div>
						</section>

			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(checkContainer);

		function checkContainer () {
			$('.post2').hide();
			if($('.post2').load()){ //if the container is visible on the page				
				setTimeout(() => { 
					$('.pageLoader').hide();
					scrollTo(0,0);
					$('.post2').show();
    			}, 3000);

			} else {
				setTimeout(checkContainer, 50); //wait 50 ms, then try again
			}
		}
	</script>
	

<?php include_once 'footer.php'; ?>

<script>

	// Get the input field
	var searchBuypage = document.getElementById("searchBuypage");

	// Execute a function when the user releases a key on the keyboard
	searchBuypage.addEventListener("keydown", function(event) {
	// Number 13 is the "Enter" key on the keyboard
	if (event.keyCode === 13) {
		// Cancel the default action, if needed
		event.preventDefault();
		// Trigger the button element with a click
		document.getElementById("searchBuypageButton").click();
	}
	});

	$('[data-toggle="confirm"]').jConfirm({

		question:'Refresh Posts?',
  		confirm_text: 'Yes',
  		deny_text: 'No',
  		theme: 'black',
		// hides on click
		hide_on_click: true,
		// 'auto','top','bottom','left','right'
		position: 'top',
		// extra class(es)
		class: '',
		// shows deny button
		show_deny_btn: false,
		// 'tiny', 'small', 'medium', 'large'
		size: 'medium',
		// 'black', 'white', 'blurred'
		backdrop: false

	}).on('confirm', function(e){
  		clearAllPosts();
	}).on('jc-show', function(e, value){
  		$(".jc-tooltip").css("margin-left","-.5em");
	});

	$('[data-toggle="confirm2"]').jConfirm({

		question:'Clear ALL Filters?',
		confirm_text: 'Yes',
		deny_text: 'No',
		theme: 'black',
		// hides on click
		hide_on_click: true,
		// 'auto','top','bottom','left','right'
		position: 'bottom',
		// extra class(es)
		class: '',
		// shows deny button
		show_deny_btn: false,
		// 'tiny', 'small', 'medium', 'large'
		size: 'medium',
		// 'black', 'white', 'blurred'
		backdrop: false

	}).on('confirm', function(e){
		clearAllPosts();
	});


	$( "#footer-wrapper" ).hide();


</script>
