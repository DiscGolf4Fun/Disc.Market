<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "discmarket";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql0 = [];
$partialPost = (array) $_POST['partialPost'];
$brandsPost = (array) $_POST['brandsPost'];
$categoryPost = (array) $_POST['categoryPost'];
$discTypePost = (array) $_POST['discTypePost'];
$newUsedPost = (array) $_POST['newUsedPost'];
$pricePost = (array) $_POST['pricePost'];
$weightPost = (array) $_POST['weightPost'];
$qualityPost = (array) $_POST['qualityPost'];
$topFilterPost = $_POST['topFilterPost'];

if ($brandsPost != "" && !empty($brandsPost)) {
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		if($brand == 'otherBrand'){
			$sql1[] = '(brand NOT LIKE "innova" AND 
					   brand NOT LIKE "discraft" AND 
					   brand NOT LIKE "dynamic" AND 
					   brand NOT LIKE "latitude" AND  
					   brand NOT LIKE "westside" AND 
					   brand NOT LIKE "discmania" AND 
					   brand NOT LIKE "prodigy" AND 
					   brand NOT LIKE "MVP" AND 
					   brand NOT LIKE "gateway")';
		} else {
			$sql1[] = 'brand LIKE \''.$brand.'\'';
		}
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($categoryPost != "" && !empty($categoryPost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);	
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);	
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($discTypePost != 0 && !empty($discTypePost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);	
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($newUsedPost != 0 && !empty($newUsedPost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);	
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($partialPost != 0 && !empty($partialPost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);	
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($pricePost != "" && !empty($pricePost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);	
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($weightPost != "" && !empty($weightPost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);	
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($qualityPost != "" && !empty($qualityPost)){
	$sql_start = 'SELECT * FROM posts WHERE ';
	foreach($brandsPost as $brand){
		$sql1[] = 'brand LIKE \''.$brand.'\'';
	}
	$sql1 = implode(" OR ", $sql1);	
	foreach($categoryPost as $category){
		$sql2[] = 'type LIKE \''.$category.'\'';
	}
	$sql2 = implode(" OR ", $sql2);	
	foreach($discTypePost as $discType){
		$sql3[] = 'disc_type LIKE \''.$discType.'\'';
	}
	$sql3 = implode(" OR ", $sql3);	
	foreach($newUsedPost as $newUsed){
		$sql4[] = 'newused LIKE \''.$newUsed.'\'';
	}
	$sql4 = implode(" OR ", $sql4);	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 200 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} else {
	$sql_start = 'SELECT * FROM posts';
}

if ($topFilterPost != ""){
	if ($topFilterPost == 'new') {
		$sql_end = ' ORDER BY id ASC';
	} elseif ($topFilterPost == 'low') {
		$sql_end = ' ORDER BY price ASC';
	} elseif($topFilterPost == 'high') {
		$sql_end = ' ORDER BY price DESC';
	} elseif ($topFilterPost == 'endingSoonest') {
		$sql_end = ' ORDER BY timestamp ASC';
	} elseif ($topFilterPost == 'endingLatest') {
		$sql_end = ' ORDER BY timestamp DESC';
	} else {
		$sql_end = '';
	}
} 


if (!empty($sql1)) {
	$sql1 = "(" . $sql1 . ")";
	array_push($sql0, $sql1);
}
if (!empty($sql2)) {
	$sql2 = "(" . $sql2 . ")";
	array_push($sql0, $sql2);
}
if (!empty($sql3)) {
	$sql3 = "(" . $sql3 . ")";
	array_push($sql0, $sql3);
}
if (!empty($sql4)) {
	$sql4 = "(" . $sql4 . ")";
	array_push($sql0, $sql4);
}
if (!empty($sql5)) {
	$sql5 = "(" . $sql5 . ")";
	array_push($sql0, $sql5);
}
if (!empty($sql6)) {
	$sql6 = "(" . $sql6 . ")";
	array_push($sql0, $sql6);
}
if (!empty($sql7)) {
	$sql7 = "(" . $sql7 . ")";
	array_push($sql0, $sql7);
}
if (!empty($sql8)) {
	$sql8 = "(" . $sql8 . ")";
	array_push($sql0, $sql8);
}

$sql0 = implode(" AND ", $sql0);

$sql = "$sql_start" . "$sql0" . "$sql_end";

$posts = mysqli_query($conn, $sql);

if($posts->num_rows == "0") {
	?>
	<div style="background-color: white; border: 1px solid black; margin-left: 1.5em; margin-top: 1em; padding: 1em 1em 1em 1em; text-align: center;">
		<p style="margin-bottom: 0; font-size: 1.5em; font-weight: 600;"><i class="fa fa-arrow-up" aria-hidden="true" style="margin-right: 1em;"></i>No Posts - Clear the filters to see more<i class="fa fa-arrow-up" aria-hidden="true" style="margin-left: 1em;"></i></p>
	</div>
	<?php
}

while ($post = mysqli_fetch_array($posts)) {
	?> 
	<div class="4u 12u(mobile) post">
		<?php echo '<a class="postModal" id="postModal' . $post["id"] . '" href="#animatedModal"><div class="post-container" id="post-container' . $post["id"] . '">'; ?>
			<span class="image featured">
				<img src="<?php echo "images/" . $post["img1"]; ?>" alt="" />
			</span>
			<section class="box post-content">
				<div class="post-info">
					<span class="title">
						<h3>
							<?php echo $post["title"]; ?>
						</h3>
					</span>
					<hr>
					<p>
						<h3 style="padding: 0 .75em 0 .75em;">
							<span style="color:#0a7e07; font-size: 1.1em; font-weight: 600;">$
								<?php echo $post["price"]; ?>
							</span>
							<?php echo '<span style="float: right; font-size: 1em; font-weight: 500;"><span data-countdown="'. $post['timestamp'] .'"></span></span>'; ?>
						</h3>
					</p>
					<hr>

					<?php if ($post["type"] == "Disc") {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $post["newused"]; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $post["quality"]; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $post["brand"]; ?>
						</span>
					</p>
					<p>
						Weight:
						<span style="float: right;">
							<?php echo $post["weight"]; ?>g</span>
					</p>
					<p>
						Plastic:
						<span style="float: right;">
							<?php echo $post["plastic"]; ?>
						</span>
					</p>
					<?php }?>
					<?php if (($post["type"] == "Bag") || ($post["type"] == "Apparel") || ($post["type"] == "Accessory") || ($post["type"] == "Shoes")) {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $post["newused"]; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $post["quality"]; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $post["brand"]; ?>
						</span>
					</p>
					<p>
						Size:
						<span style="float: right;">
							<?php echo $post["weight"]; ?>g</span>
					</p>
					<p>
						Color:
						<span style="float: right;">
							<?php echo $post["plastic"]; ?>
						</span>
					</p>
					<?php }?>
					<?php if ($post["type"] == "Basket") {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $post["newused"]; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $post["quality"]; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $post["brand"]; ?>
						</span>
					</p>
					<p>
						Type:
						<span style="float: right;">
							<?php echo $post["weight"]; ?>g</span>
					</p>
					<p>
						Color:
						<span style="float: right;">
							<?php echo $post["plastic"]; ?>
						</span>
					</p>
					<?php }?>

				</div>
				<hr style="margin: 0;">
				<footer>
					<p>
							<span>
								<?php 
									$sql2 = "SELECT user_uid FROM users WHERE users.user_id = " . $post['user_id'];
									$sql3 = mysqli_query($conn, $sql2);
									while ($row = $sql3->fetch_assoc()) {
										echo '<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;' . ($row[user_uid]);
									}
								?>
							</span>
							<span style="float: right;"><?php echo $post["bids"]; ?> Mins Ago</span>
					</p>
				</footer>
			</section>
		<?php echo "</div></a>"; ?>
	</div>
	<?php
}

?>
<!--Post Info Modal-->
<div id="animatedModal" style="background-color: white;">
	<div id="btn-close-modal" class="close-animatedModal"> 
        <h3>Close <span class="fa fa-close"></span></h3>
	</div>
	<div class="results2"></div>
</div>


<script>


	$(".postModal").animatedModal({
		animatedIn:'bounceInUp',
        animatedOut:'bounceOutDown',
        color:'#3498db',
        // Callbacks
		beforeOpen: function() {
			$("#animatedModal").css({"background-color":"white"});

			var postId = $("#postModal");
			postId = parseInt(postId.context.activeElement.id.substring(9));
			//var postId = parseInt(this.id.substring(9));
			$.post("includes/post.inc.php", {
            "postId": postId,
			}, function (data) {
				$(".results2").html(data);
			});	
		},
		afterOpen: function() {
            console.log("The animation is completed");
        }, 
        beforeClose: function() {
            console.log("The animation was called");
        }, 
        afterClose: function() {
            console.log("The animation is completed");
        }
	});

	$('[data-countdown]').each(function() {
		var $countdown = 0;
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			if(event.offset.days > 0){
				$this.html('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + event.strftime("%-Dd %-Hh"));
			} else {
				if(event.offset.hours > 0) {
					$this.html(event.strftime('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + '%-Hh %-Mm'));
				} else {
					if(event.offset.minutes > 0) {
						$this.html(event.strftime('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + '%-Mm %-Ss'));
						$this.css("color", "red");
					} else {
						if(event.offset.seconds > 0) {
							$this.html(event.strftime('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + '%-Ss'));	
							$this.css("color", "red");						
							if($countdown == 0){
								$this.css("font-weight", "600");
								$countdown = 1;
							} else {
								$this.css("font-weight", "600");
								$countdown = 0;
							}
						}
					}
				}
			}
		})
		.on('finish.countdown', function(event) {
			  $(this).html('EXPIRED').parent().addClass('disabled');
			  $this.css("color", "black");
			  $this.css("font-weight", "500");
			  $this.css("font-size", "1.1em");
		});
	});
</script>
