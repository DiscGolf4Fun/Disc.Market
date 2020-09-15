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
	$sql_start = 'SELECT * FROM posts LEFT JOIN(SELECT DISTINCT bids.post_id, bids.bid FROM bids WHERE bids.user_id = '. $_SESSION["u_id"] .' ORDER BY bids.bid DESC) bidding ON posts.id = bidding.post_id WHERE bidding.post_id <> "" && UNIX_TIMESTAMP(timestamp) > ' . time() . ' && ';	
	foreach($partialPost as $partial){
		$sql5[] = 'title LIKE \'%'.$partial.'%\'';
	}
	$sql5 = implode(" OR ", $sql5);	
} else {
	$sql_start = 'SELECT * FROM posts LEFT JOIN(SELECT DISTINCT bids.post_id, bids.bid FROM bids WHERE bids.user_id = '. $_SESSION["u_id"] .' ORDER BY bids.bid DESC) bidding ON posts.id = bidding.post_id WHERE bidding.post_id <> "" && UNIX_TIMESTAMP(timestamp) > ' . time() . ' ';
}


if ($topFilterPost != ""){
	if ($topFilterPost == 'new') {
		$sql_end = ' GROUP BY posts.id ORDER BY timestamp ASC';
	} elseif ($topFilterPost == 'low') {
		$sql_end = ' GROUP BY posts.id ORDER BY price ASC';
	} elseif($topFilterPost == 'high') {
		$sql_end = ' GROUP BY posts.id ORDER BY price DESC';
	} elseif ($topFilterPost == 'endingSoonest') {
		$sql_end = ' GROUP BY posts.id ORDER BY timestamp ASC';
	} elseif ($topFilterPost == 'endingLatest') {
		$sql_end = ' GROUP BY posts.id ORDER BY timestamp DESC';
	} else {
		$sql_end = 'GROUP BY posts.id ORDER BY timestamp ASC';
	}
} else {
	$sql_end = 'GROUP BY posts.id ORDER BY timestamp ASC';
}

if (!empty($sql5)) {
	$sql5 = "(" . $sql5 . ")";
	array_push($sql0, $sql5);
}

$sql0 = implode(" AND ", $sql0);

$sql = "$sql_start" . "$sql0" . "$sql_end";

$sql2 = "SELECT DISTINCT bids.post_id, MAX(bids.bid) AS maxbid FROM posts LEFT JOIN bids ON posts.id = bids.post_id WHERE bids.bid <> '' && bids.user_id GROUP BY posts.id";

$posts = mysqli_query($conn, $sql);

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


if($count_rows == 0) {
    if(empty($post_array)) {
        echo '<div class="row" style="padding-left: -1.5em;">';
            echo '<div class="12u" style="padding-top: 0;">';
                echo '<div style="background-color: white; border: 1px solid black; padding: 1em 1em 1em 1em; text-align: center;">';
                    echo '<p style="margin-bottom: 0; font-size: 1.5em; font-weight: 600;"><i class="fa fa-arrow-up" aria-hidden="true" style="margin-right: 1em;"></i>No Current Bids - Go to the <a href="/buy.php" style="text-decoration: underline; color: #0a7e07;">Buy</a> page to make a bid.<i class="fa fa-arrow-up" aria-hidden="true" style="margin-left: 1em;"></i></p>';
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
    echo '<div class="3u 12u(mobile) postHome" id="postHome'. $result[$i]['id'] .'">';
    
        if($result[$i]['bid'] == $result[$i]['maxbid']) {
            echo '<a class="postModal" id="postModal' . $result[$i]['id'] . '" href="#animatedModal"><div class="post-container" id="post-container' . $result[$i]['id'] . '" style="outline: 5px solid #0a7e07; border: 1px solid #0a7e07;">';
        } else {
            echo '<a class="postModal" id="postModal' . $result[$i]['id'] . '" href="#animatedModal"><div class="post-container" id="post-container' . $result[$i]['id'] . '" style="outline: 5px solid red; border: 1px solid red;">';
        }
			
		?>
			<span class="image featured">
				<img src="<?php echo "/images/" . $result[$i]['img1']; ?>" alt="" />
			</span>
			<section class="box post-content">
				<div class="post-info">
					<span class="title">
						<h3>
							<?php echo $result[$i]['title']; ?>
						</h3>
					</span>
					<hr>
					<p>
                        <h3 style="padding: 0 .75em 0 .75em;">
                        <?php if($result[$i]['bid'] == $result[$i]['maxbid']) {
                            echo '<span style="color:#0a7e07; font-size: 1.1em; font-weight: 600;">$'. $result[$i]['price'];
                        } else {
                            echo '<span style="color:red; font-size: 1.1em; font-weight: 600;">$'. $result[$i]['price'];
                        }
                            echo '</span>';
                            
                            echo '<span style="float: right; font-size: 1em; font-weight: 500;"><span data-countdown="'. $result[$i]['timestamp'] .'"></span></span>'; 
                        ?>
						</h3>
					</p>
					<hr>

					<?php if ($result[$i]['type'] == "Disc") {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $result[$i]['newused']; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $result[$i]['quality']; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $result[$i]['brand']; ?>
						</span>
					</p>
					<p>
						Weight:
						<span style="float: right;">
							<?php echo $result[$i]['weight']; ?>g</span>
					</p>
					<p>
						Plastic:
						<span style="float: right;">
							<?php echo $result[$i]['plastic']; ?>
						</span>
					</p>
					<?php }?>
					<?php if (($result[$i]['type'] == "Bag") || ($result[$i]['type'] == "Apparel") || ($result[$i]['type'] == "Accessory") || ($result[$i]['type'] == "Shoes")) {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $result[$i]['newused']; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $result[$i]['quality']; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $result[$i]['brand']; ?>
						</span>
					</p>
					<p>
						Size:
						<span style="float: right;">
							<?php echo $result[$i]['weight']; ?>g</span>
					</p>
					<p>
						Color:
						<span style="float: right;">
							<?php echo $result[$i]['plastic']; ?>
						</span>
					</p>
					<?php }?>
					<?php if ($result[$i]['type'] == "Basket") {?>
					<p>
						New/Used:
						<span style="float: right;">
							<?php echo $result[$i]['newused']; ?>
						</span>
					</p>
					<p>
						Quality:
						<span style="float: right;">
							<?php echo $result[$i]['quality']; ?>/10</span>
					</p>
					<p>
						Brand:
						<span style="float: right;">
							<?php echo $result[$i]['brand']; ?>
						</span>
					</p>
					<p>
						Type:
						<span style="float: right;">
							<?php echo $result[$i]['weight']; ?>g</span>
					</p>
					<p>
						Color:
						<span style="float: right;">
							<?php echo $result[$i]['plastic']; ?>
						</span>
					</p>
					<?php }?>
				</div>
                <hr style="margin: 0;">
                <?php if($result[$i]['bid'] == $result[$i]['maxbid']) { 
                        echo '<footer style="margin-top: .5em; margin-bottom: .5em; background-color: green; height: 2em;">'; 
                      } else {
                        echo '<footer style="margin-top: .5em; margin-bottom: .5em; background-color: red; height: 2em;">'; 
                      }

                ?>
                <?php if($result[$i]['bid'] == $result[$i]['maxbid']) { 
                        echo '<p style="margin-bottom: 0; text-align: center; color: white; font-size: 1.5em; height: auto; font-weight: 500;">Winning</p>'; 
                      } else {
                        echo '<p style="margin-bottom: 0; text-align: center; color: white; font-size: 1.5em; height: auto; font-weight: 500;">Losing</p>'; 
                      }

                ?>
					
				</footer>
			</section>
		<?php echo "</div></a>";
	echo "</div>";
}

echo '</div>';

?>





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

            $.post("includes/postsCurrentBids.inc.php", {
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

