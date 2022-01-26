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
					<div class="9u 12u(mobile)" style="padding: 0 1em 1.5em 1em;">
						<label for="title" style="font-size: 1.5em; margin-bottom: .25em;">Title</label>
						<input type="text" name="title" placeholder="Title" style="border: 1px solid black;">
					</div>
					<div class="3u 12u(mobile)" style="padding: 0 1em 1.5em 1em;">
						<label for="dropdown" style="font-size: 1.5em; margin-bottom: .25em;">Category</label>
						<div class="dropdown" style="width: 100%; margin-left: 0;">
							<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
							<div class="custom-select sell">
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
						</div>
					</div>


					<div class="12u" style="padding: 0 1em 1.5em 1em;">
						<label for="description" style="font-size: 1.5em; margin-bottom: .25em;">Description</label>
						<textarea name="description" id="textarea" onkeydown="return limitLines(this, event)" placeholder="Description" maxlength="250" rows="5" style="resize: none; height: 10em; border: 1px solid black;"></textarea>
						<div id="textarea_feedback"></div>
					</div>


					<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: 1em 1em 1.5em 1em;">
						<div class="4u 12u(mobile)" style="padding: 0 1em 0 1em; text-align: right;">
							<div class="switch-field">
								<input type="radio" id="switch_left" name="switch_2" value="yes"/>
								<label for="switch_left" style="width: 30%; border: 1px solid black; padding: 0.75em 1em;">New</label>
								<input type="radio" id="switch_right" name="switch_2" value="no" />
								<label for="switch_right" style="width: 30%; border: 1px solid black; padding: 0.75em 1em;">Used</label>
							</div>
						</div>
						<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center;">
							<div class="quality row" style="margin: 0 auto 0 auto;">

								<div class="5u" style="padding-left: 0; padding-top: 0; text-align: right;">
									<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
										<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Quality:</span>
									</div>
								</div>
								<div class="3u" style="padding-left: 0; padding-top: 0;">
									<div style="padding-left: 0; display: inline-block;">
										<div class="custom-select" style="display: inline-block;">
												<select style="padding-bottom: .25em; padding-top: .25em; padding-left: .5em; font-size: 1.5em; width: 100%;">
													<option value="">#</option>
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
								</div>
								<div class="4u" style="padding-left: 0; padding-top: 0; text-align: left;">
									<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
										<span style="display: inline-block; margin-bottom: 0;">/ 10</span>
									</div>
								</div>

							</div>
						</div>
						<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center;">
							<div class="quality row" style="margin: 0 auto 0 auto;">

								<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
									<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
										<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Brand:&nbsp;&nbsp;</span>
									</div>
								</div>
								<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
									<div style="padding-left: 0; display: inline-block; width: 80%;">
										<div class="custom-select" style="display: inline-block; width: 100%;">
												<select style="width: 100%;">
													<option value="">Select Brand</option>
													<option value="Innova">Innova</option>
													<option value="Discraft">Discraft</option>
													<option value="Dynamic">Dynamic Discs</option>
													<option value="Latitude">Latitude 64</option>
													<option value="Westside">Westside</option>
													<option value="Discmania">Discmania</option>
													<option value="Prodigy">Prodigy</option>
													<option value="MVP">MVP</option>
													<option value="Gateway">Gateway</option>
													<option value="Other">Other</option>
												</select>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>


					<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
						<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
							<div class="quality row" style="margin: 0 auto 0 auto;">
								<div class="6u" style="padding-left: 0; padding-top: 0; text-align: right;">
									<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
									<span style="margin-bottom: 0; color: #252122; font-weight: 400; display: inline-block;">Min. Bid:&nbsp;&nbsp;</span>
									</div>
								</div>
								<div class="3u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
									<input type="text" name="" placeholder="0" style="border: 1px solid black; display: inline-block;">
								</div>
								<div class="3u" style="padding-left: 0; padding-top: 0; text-align: left;">
								</div>
							</div>							
						</div>
						<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
							<div class="quality row" style="margin: 0 auto 0 auto;">
								<div class="7u" style="padding-left: 0; padding-top: 0; text-align: right;">
									<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
									<span style="margin-bottom: 0; color: #252122; font-weight: 400; display: inline-block;">Buy It Now:&nbsp;&nbsp;</span>
									</div>
								</div>
								<div class="3u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
									<input type="text" name="" placeholder="0" style="border: 1px solid black; display: inline-block;">
								</div>
								<div class="2u" style="padding-left: 0; padding-top: 0; text-align: left;">
								</div>
							</div>							
						</div>
						<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
							<div class="quality row" style="margin: 0 auto 0 auto;">
								<div class="7u" style="padding-left: 0; padding-top: 0; text-align: right;">
									<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
									<span style="margin-bottom: 0; color: #252122; font-weight: 400; display: inline-block;">Auction Length:&nbsp;&nbsp;</span>
									</div>
								</div>
								<div class="4u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
									<div style="padding-left: 0; display: inline-block; width: 100%;">
										<div class="custom-select" style="display: inline-block; width: 100%;">
												<select style="width: 100%;">
													<option value=""># Days</option>
													<option value="3days">3 Days</option>
													<option value="5days">5 Days</option>
													<option value="7days">7 Days</option>
												</select>
										</div>
									</div>
								</div>
								<div class="1u" style="padding-left: 0; padding-top: 0; text-align: left;">
								</div>
							</div>							
						</div>
					</div>
					

					<div class="12u" style="padding: 0;">
						
					</div>

					<div class="12u" style="padding: 0; text-align: center;" id="noCategory">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;None</h2>
						</header>
						<h2 style="font-weight: 300; padding-bottom: 2em;">You need to select a Category above</h2>
					</div>

					<div class="12u" style="padding: 0; display: none; text-align: left;" id="discs">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Discs</h2>
						</header>

						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Weight:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="weight" placeholder="Weight" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Plastic:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="plastic" placeholder="Plastic" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Color:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="color" placeholder="Color" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
						</div>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="6u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="row" style="margin: 0 auto 0 auto;">
									<div class="6u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Disc Name:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="6u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="discName" placeholder="Disc Name" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="6u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="row" style="margin: 0 auto 0 auto;">
									<div class="2u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block; text-align: right;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Ink:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="6u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<div class="switch-field2">
											<input type="radio" id="switch_left2" name="switch_2" value="yes"/>
											<label for="switch_left2" style="width: 40%; border: 1px solid black; padding: 0.75em 1em;">Yes</label>
											<input type="radio" id="switch_right2" name="switch_2" value="no" />
											<label for="switch_right2" style="width: 40%; border: 1px solid black; padding: 0.75em 1em;">No</label>
										</div>
									</div>
									<div class="2u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
									</div>
								</div>							
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="bags">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Bags / Carts</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Modal:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="weight" placeholder="Weight" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Capacity:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="capacity" placeholder="Capacity" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Color:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="color" placeholder="Color" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="apparel">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Apparel</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Size:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="size" placeholder="Size" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Material:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="material" placeholder="Material" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Color:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="color" placeholder="Color" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="baskets">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Baskets</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Modal:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="size" placeholder="Size" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;"># Chains:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="chains" placeholder="# Chains" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Color:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="color" placeholder="Color" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="shoes">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Shoes</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Size:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="size" placeholder="Size" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="12u" style="padding-left: 0; padding-top: 0; text-align: center;">
										<div class="switch-field3" style="text-align: center;">
											<input type="radio" id="switch_left3" name="switch_3" value="men" />
											<label for="switch_left3" style="width: 30%; border: 1px solid black; padding: 0.75em 1em;">Men</label>
											<input type="radio" id="switch_right3" name="switch_3" value="women" />
											<label for="switch_right3" style="width: 30%; border: 1px solid black; padding: 0.75em 1em;">Women</label>
										</div>
									</div>
								</div>							
							</div>
							<div class="4u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: center; display: inline-block;">
								<div class="quality row" style="margin: 0 auto 0 auto;">
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Color:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="8u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="color" placeholder="Color" style="border: 1px solid black;">
									</div>
								</div>							
							</div>
						</div>
					</div>

					<div class="12u" style="padding: 0; display: none;" id="accessories">
						<header class="major" style="margin-bottom: 1.5em;">
							<h2 style="font-weight: 500;">Category:&nbsp;Accessories</h2>
						</header>
						<div class="row" style="width: 100%; margin: auto 0 auto 0; padding: .5em 1em 1.5em 1em;">
							<div class="6u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="row" style="margin: 0 auto 0 auto;">
									<div class="6u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Size:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="6u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="size" placeholder="Size" style="border: 1px solid black;">
									</div>
								</div>					
							</div>
							<div class="6u 12u(mobile)" style="padding: 0 0 1.5em 0; text-align: left; display: inline-block;">
								<div class="row" style="margin: 0 auto 0 auto;">
									<div class="2u" style="padding-left: 0; padding-top: 0; text-align: right;">
										<div style="padding-left: 0; margin-top: .5em; font-size: 1.5em; display: inline-block;">
											<span style="display: inline-block; margin-bottom: 0; color: #252122; font-weight: 400;">Color:&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="6u" style="padding-left: 0; padding-top: 0; text-align: left; padding-right: 1em;">
										<input type="text" name="color" placeholder="Color" style="border: 1px solid black;">
									</div>
									<div class="4u" style="padding-left: 0; padding-top: 0; text-align: right;">
									</div>
								</div>					
							</div>
						</div>
					</div>


					<div class="6u" style="text-align: right; padding-left: 0; padding-top: 0;">
						<input type="submit" name="submit" value="Next: Images" style="margin-right: 1em;">
					</div>
					<div class="6u" style="text-align: left; padding-left: 0; padding-top: 0;">
						<input type="reset" value="Reset" style="margin-left: 1em; background-color: gray;" onclick="topFunction();">
					</div>
				</div>
				</form> 
				</div>
			</div>
</div>


<?php include_once 'footer.php'; ?>

<script>
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