<?php session_start(); ?>

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
if(isset($_POST['partialPost'])) {
	$partialPost = (array) $_POST['partialPost'];
} else {
	$partialPost = (array) null;
}

if(isset($_POST['topFilterPost'])) {
	$topFilterPost = $_POST['topFilterPost'];
} else {
	$topFilterPost = "";
}


if ($partialPost != 0 && !empty($partialPost) && $partialPost[0] != ""){
	$sql_start = 'SELECT * FROM posts WHERE UNIX_TIMESTAMP(timestamp) > ' . time() . ' && ' . $_SESSION["u_id"] . ' = user_id && ';	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
} else {
	$sql_start = 'SELECT * FROM posts WHERE UNIX_TIMESTAMP(timestamp) > ' . time() . ' && ' . $_SESSION["u_id"] . ' = user_id ';
}

if ($topFilterPost != ""){
	if ($topFilterPost == 'new') {
		$sql_end = ' ORDER BY timestamp ASC';
	} elseif ($topFilterPost == 'low') {
		$sql_end = ' ORDER BY price ASC';
	} elseif($topFilterPost == 'high') {
		$sql_end = ' ORDER BY price DESC';
	} elseif ($topFilterPost == 'endingSoonest') {
		$sql_end = ' ORDER BY timestamp ASC';
	} elseif ($topFilterPost == 'endingLatest') {
		$sql_end = ' ORDER BY timestamp DESC';
	} else {
		$sql_end = 'ORDER BY timestamp ASC';
	}
} else {
	$sql_end = 'ORDER BY timestamp ASC';
}

if (!empty($sql5)) {
	$sql5 = "(" . $sql5 . ")";
	array_push($sql0, $sql5);
}

$sql0 = implode(" AND ", $sql0);

$sql = "$sql_start" . "$sql0" . "$sql_end";

$posts = mysqli_query($conn, $sql);

$count_rows = $posts->num_rows;
$post_array = array();
$array_count = ceil($count_rows);
$array_data = array();
$count = 0;
while ($post = mysqli_fetch_array($posts)) {
	array_push($post_array,$post);
}


if($count_rows == 0) {
	if(empty($post_array)) {
        echo '<div class="row" style="padding-left: -1.5em;">';
            echo '<div class="12u" style="padding-top: 0;">';
                echo '<div style="background-color: white; border: 1px solid black; padding: 1em 1em 1em 1em; text-align: center;">';
                    echo '<p style="margin-bottom: 0; font-size: 1.5em; font-weight: 600;"><i class="fa fa-arrow-up" aria-hidden="true" style="margin-right: 1em;"></i>No Current Posts - Go to the <a href="/sell.php" style="text-decoration: underline; color: #0a7e07;">Sell</a> page to create a post.<i class="fa fa-arrow-up" aria-hidden="true" style="margin-left: 1em;"></i></p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="row" style="padding-left: -1.5em;">';
            echo '<div class="12u" style="padding-top: 0;">';
                echo '<div style="background-color: white; border: 1px solid black; padding: 1em 1em 1em 1em; text-align: center;">';
                    echo '<p style="margin-bottom: 0; font-size: 1.5em; font-weight: 600;"><i class="fa fa-arrow-up" aria-hidden="true" style="margin-right: 1em;"></i>No Posts - Clear the search bar to see more<i class="fa fa-arrow-up" aria-hidden="true" style="margin-left: 1em;"></i></p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}



echo '<div class="row" style="margin-left: -1.5em;">';
for($i=0; $i<$count_rows; $i++) {
	echo '<div class="3u 12u(mobile) postHome" id="postHome'. $post_array[$i]['id'] .'">';
			echo '<a class="postModal" id="postModal' . $post_array[$i]['id'] . '" href="#animatedModal"><div class="post-container" id="post-container' . $post_array[$i]['id'] . '">';
		?>
			<span class="image featured">
				<img src="<?php echo "/images/" . $post_array[$i]['img1']; ?>" alt="" />
			</span>
			<section class="box post-content">
				<div class="post-info">
					<span class="title">
						<h3>
							<?php echo $post_array[$i]['title']; ?>
						</h3>
					</span>
					<hr>
					<p>
						<h3 style="padding: 0 .75em 0 .75em;">
							<span style="color:#0a7e07; font-size: 1.1em; font-weight: 600;">$
								<?php echo $post_array[$i]['price']; ?>
							</span>
							<?php echo '<span style="float: right; font-size: 1em; font-weight: 500;"><span data-countdown="'. $post_array[$i]['timestamp'] .'"></span></span>'; ?>
						</h3>
					</p>
					<hr>

					<?php if ($post_array[$i]['type'] == "Disc") {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $post_array[$i]['newused']; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $post_array[$i]['quality']; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $post_array[$i]['brand']; ?>
						</span>
					</p>
					<p>
						Weight:
						<span style="float: right;">
							<?php echo $post_array[$i]['weight']; ?>g</span>
					</p>
					<p>
						Plastic:
						<span style="float: right;">
							<?php echo $post_array[$i]['plastic']; ?>
						</span>
					</p>
					<?php }?>
					<?php if (($post_array[$i]['type'] == "Bag") || ($post_array[$i]['type'] == "Apparel") || ($post_array[$i]['type'] == "Accessory") || ($post_array[$i]['type'] == "Shoes")) {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $post_array[$i]['newused']; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $post_array[$i]['quality']; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $post_array[$i]['brand']; ?>
						</span>
					</p>
					<p>
						Size:
						<span style="float: right;">
							<?php echo $post_array[$i]['weight']; ?>g</span>
					</p>
					<p>
						Color:
						<span style="float: right;">
							<?php echo $post_array[$i]['plastic']; ?>
						</span>
					</p>
					<?php }?>
					<?php if ($post_array[$i]['type'] == "Basket") {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $post_array[$i]['newused']; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $post_array[$i]['quality']; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $post_array[$i]['brand']; ?>
						</span>
					</p>
					<p>
						Type:
						<span style="float: right;">
							<?php echo $post_array[$i]['weight']; ?>g</span>
					</p>
					<p>
						Color:
						<span style="float: right;">
							<?php echo $post_array[$i]['plastic']; ?>
						</span>
					</p>
					<?php }?>
				</div>
				<hr style="margin: 0;">
				<footer style="margin-top: .5em;">
					<p style="margin-bottom: .5em;">
							<span>
								<?php 
									$sql2 = "SELECT user_uid FROM users WHERE users.user_id = " . $post_array[$i]['user_id'];
									$sql3 = mysqli_query($conn, $sql2);
									while ($row = $sql3->fetch_assoc()) {
										echo '<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;' . ($row['user_uid']);
									}
								?>
							</span>
							<span style="float: right;">10 Mins Ago</span>
					</p>
				</footer>
			</section>
		<?php echo "</div></a>";
	echo "</div>";
}

echo '</div>';

?>


<div id="animatedModal" style="background-color: white; display: none;">
	<div id="btn-close-modal" class="close-animatedModal" onclick="scrollFunction()"> 
        <h3>Close <span class="fa fa-close"></span></h3>
	</div>
	<div class="results2"></div>
</div>


<script>
$(document).ready(function() {
	$(".postModal").animatedModal({
		animatedIn:'bounceInUp',
		animatedOut:'bounceOutDown',
		color:'#3498db',
		// Callbacks
		beforeOpen: function() {
			$("#animatedModal").animate({ scrollTop: 0 }, "fast");
			$("#animatedModal").css({"background-color":"white"});

			var postId = $("#postModal");
			postId = parseInt(postId.context.activeElement.id.substring(9));
			//var postId = parseInt(this.id.substring(9));
			$.post("includes/post.inc.php", {
			"postId": postId,
			}, function (data) {
				$(".results2").html(data);
			});	
			$("#animatedModal").css({"display":"block"});
		},
		afterOpen: function() {
			console.log("The animation is completed");
		}, 
		beforeClose: function() {
			console.log("The animation was called");
		}, 
		afterClose: function() {
			$(".results2").empty();
			$("#animatedModal").css({"display":"none"});
		}
	})

})

	function expired(data) {
		if(data != undefined) {

            $.post("includes/postsHome.inc.php", {
            }, function (data) {
                $("#resultsHome").html(data);
            });          
		}
	}	

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
			  expired($(this).closest('a').attr('id').substring(9));
		});
	});

	$(".postsHome").show();
</script>

