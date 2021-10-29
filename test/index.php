<?php include_once 'header.php'; ?>
				<section id="searchMarket">
					<div class="6u -3u 12u(mobile) search-container">
						<form action="buy.php" method="get" id="searchHome">
							<button id="search2" type="submit" form="searchHome">
								<i class="fa fa-search" id="search-icon"></i>
							</button>
							<div style="overflow: hidden; padding-right: .75em; margin-bottom: 0;">
								<input id="search1" name="search" type="text" placeholder="Search the Market.." required>
							</div>					
						</form>
					</div>
				</section>

				<!-- Banner -->
				<section id="banner">
					<header>
						<h2>Welcome to DISC.MARKET</h2>
						<h5>Buy &amp; Sell Everything Disc Golf</h5>
					</header>
				</section>

				<!-- Intro -->
				<section id="intro" class="container">
					<div class="row">
						<div class="4u 12u(mobile)">
							<section class="first">
								<i class="icon featured fa-shopping-cart"></i>
								<header>
									<h2>Buy</h2>
								</header>
								<p>Buy Disc Golf Discs, Bags, Baskets, and much more. Auctions and Buy-It-Now.</p>
							</section>
						</div>
						<div class="4u 12u(mobile)">
							<section class="middle">
								<i class="icon featured alt fa-sellsy"></i>
								<header>
									<h2>Sell</h2>
								</header>
								<p>Create a Disc Auction or Buy-It-Now ad easily and start earning cash today.</p>
							</section>
						</div>
						<div class="4u 12u(mobile)">
							<section class="last">
								<i class="icon featured fa-money"></i>
								<header>
									<h2>Earn</h2>
								</header>
								<p>Payments are made through Credit Card or Paypal to get your money as fast as possible.</p>
							</section>
						</div>
					</div>
					<footer>
						<div class="row">
							<div class="6u">
								<a href="/test/buy.php" class="button big">Buy</a>
							</div>
							<div class="6u">
								<a href="/test/sell.php" class="button alt big">Sell</a>
							</div>
						</div>
					</footer>
				</section>

			</div>
		</div>
		
		<!-- Main -->
		<div id="main-wrapper">
			<div class="container">
				<header class="major">
					<h2>Auctions Ending Now!</h2>
				</header>
				<div id="resultsHome"></div>
				<footer style="margin-top: 0em; text-align: center;">
					<ul class="actions">
						<li>
							<a href="/test/buy.php" class="button big">See More Posts</a>
						</li>
					</ul>
				</footer>
				<hr>
				<div class="row" style="text-align: center;">
					<div class="4u 12u(mobile)">
						<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x icon-background" id="handshake-icon-image-background"></i>
							<i class="fa fa-handshake-o fa-stack-1x icon-image"  id="handshake-icon-image"></i>
						</span>
						<h3>People powered</h3>
						<p style="margin-bottom: 0; font-weight: 400;">On Disc.Market you buy and sell directly with other users. Cutting out the middleman means you join a community market with the best prices and highest value.</p>
					</div>
					<div class="4u 12u(mobile)">
						<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x icon-background" id="paypal-icon-image-background"></i>
							<i class="fa fa-paypal fa-stack-1x icon-image" id="paypal-icon-image"></i>
						</span>
						<h3>PayPal Protections</h3>
						<p style="margin-bottom: 0; font-weight: 400;">On Disc.Market, we use PayPal for payments because they provide extensive buyer and seller protections. Get what was advertised or get a refund. Period.</p>
					</div>
					<div class="4u 12u(mobile)">
						<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x icon-background" id="exclamation-icon-image-background"></i>
							<i class="fa fa-exclamation fa-stack-1x icon-image" id="exclamation-icon-image"></i>
						</span>
						<h3>No junk</h3>
						<p style="margin-bottom: 0; font-weight: 400;">To keep our marketplace safe, we don’t allow broken items. Every product has listing requirements and an approval process to ensure confident shopping.</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="12u">
						<div class="faqChat">
							<h4>Do you have any more questions? See our <a href="/test/faq.php">FAQ</a> page for more answers or contact our <a href="#">support staff</a> for help.</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>