<?php session_start(); ?>

<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/test/includes/dbh.inc.php"; 
	include_once($path);
?>

<?php
$sql0 = [];
if(isset($_POST['brandsPost'])) {
	$brandsPost = (array) $_POST['brandsPost'];
} else {
	$brandsPost = (array) null;
}

if(isset($_POST['partialPost'])) {
	$partialPost = (array) $_POST['partialPost'];
} else {
	$partialPost = (array) null;
}

if(isset($_POST['categoryPost'])) {
	$categoryPost = (array) $_POST['categoryPost'];
} else {
	$categoryPost = (array) null;
}

if(isset($_POST['discTypePost'])) {
	$discTypePost = (array) $_POST['discTypePost'];
} else {
	$discTypePost = (array) null;
}

if(isset($_POST['newUsedPost'])) {
	$newUsedPost = (array) $_POST['newUsedPost'];
} else {
	$newUsedPost = (array) null;
}

if(isset($_POST['pricePost'])) {
	$pricePost = (array) $_POST['pricePost'];
	if($pricePost[0] == 1 && $pricePost[1] == 100){
		$pricePost == array(); 
	}
} else {
	$pricePost = (array) null;
}

if(isset($_POST['weightPost'])) {
	$weightPost = (array) $_POST['weightPost'];
	if($weightPost[0] == 130 && $weightPost[1] == 200){
		$weightPost == array(); 
	}
} else {
	$weightPost = (array) null;
}

if(isset($_POST['qualityPost'])) {
	$qualityPost = (array) $_POST['qualityPost'];
	if($qualityPost[0] == 1 && $qualityPost[1] == 10){
		$qualityPost == array(); 
	}
} else {
	$qualityPost = (array) null;
}

if(isset($_POST['topFilterPost'])) {
	$topFilterPost = $_POST['topFilterPost'];
} else {
	$topFilterPost = 'ORDER BY timestamp ASC';
}

if(isset($_POST['scrollCount'])) {
	$scrollCount = $_POST['scrollCount'];
	$array_data[$scrollCount] = $_POST['scrollCount'];
} else {
	$scrollCount = 0;
	$array_data[$scrollCount] = $scrollCount;
}


if ($brandsPost != "" && !empty($brandsPost)) {
	$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
	if(isset($brandsPost) && !empty($brandsPost)) {
		foreach($brandsPost as $brand){
			if($brand == 'otherBrand'){
				$sql1[] = '(brand NOT LIKE "innova" AND 
						brand NOT LIKE "discraft" AND 
						brand NOT LIKE "dynamic" AND 
						brand NOT LIKE "latitude" AND  
						brand NOT LIKE "westside" AND 
						brand NOT LIKE "discmania" AND 
						brand NOT LIKE "prodigy" AND 
						brand NOT LIKE "mvp" AND 
						brand NOT LIKE "hyzerbomb" AND 
						brand NOT LIKE "legacy" AND 
						brand NOT LIKE "kastaplast" AND 
						brand NOT LIKE "gateway")';
			} else {
				$sql1[] = 'brand LIKE \''.$brand.'\'';
			}
		}
		$sql1 = implode(" OR ", $sql1);	
	}

	if(isset($categoryPost) && !empty($categoryPost)) {
		foreach($categoryPost as $category){
			$sql2[] = 'type LIKE \''.$category.'\'';
		}
		$sql2 = implode(" OR ", $sql2);	
	}
	
	if(isset($discTypePost) && !empty($discTypePost)) {
		foreach($discTypePost as $discType){
			$sql3[] = 'disc_type LIKE \''.$discType.'\'';
		}
		$sql3 = implode(" OR ", $sql3);
	}

	if(isset($newUsedPost) && !empty($newUsedPost)) {
		foreach($newUsedPost as $newUsed){
			$sql4[] = 'newused LIKE \''.$newUsed.'\'';
		}
		$sql4 = implode(" OR ", $sql4);	
	}

	if(isset($partialPost) && !empty($partialPost)) {
		foreach($partialPost as $partial){
			$sql5[] = 'title LIKE \'%'.$partial.'%\'';
		}
		$sql5 = implode(" OR ", $sql5);	
	}

	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($categoryPost != "" && !empty($categoryPost)){
	$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
	if(isset($brandsPost) && !empty($brandsPost)) {
		foreach($brandsPost as $brand){
			$sql1[] = 'brand LIKE \''.$brand.'\'';
		}
		$sql1 = implode(" OR ", $sql1);	
	}

	if(isset($categoryPost) && !empty($categoryPost)) {
		foreach($categoryPost as $category){
			$sql2[] = 'type LIKE \''.$category.'\'';
		}
		$sql2 = implode(" OR ", $sql2);	
	}
	
	if(isset($discTypePost) && !empty($discTypePost)) {
		foreach($discTypePost as $discType){
			$sql3[] = 'disc_type LIKE \''.$discType.'\'';
		}
		$sql3 = implode(" OR ", $sql3);
	}

	if(isset($newUsedPost) && !empty($newUsedPost)) {
		foreach($newUsedPost as $newUsed){
			$sql4[] = 'newused LIKE \''.$newUsed.'\'';
		}
		$sql4 = implode(" OR ", $sql4);	
	}

	if(isset($partialPost) && !empty($partialPost)) {
		foreach($partialPost as $partial){
			$sql5[] = 'title LIKE \'%'.$partial.'%\'';
		}
		$sql5 = implode(" OR ", $sql5);	
	}

	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($discTypePost != 0 && !empty($discTypePost)){
	$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
	if(isset($brandsPost) && !empty($brandsPost)) {
		foreach($brandsPost as $brand){
			$sql1[] = 'brand LIKE \''.$brand.'\'';
		}
		$sql1 = implode(" OR ", $sql1);	
	}

	if(isset($categoryPost) && !empty($categoryPost)) {
		foreach($categoryPost as $category){
			$sql2[] = 'type LIKE \''.$category.'\'';
		}
		$sql2 = implode(" OR ", $sql2);	
	}
	
	if(isset($discTypePost) && !empty($discTypePost)) {
		foreach($discTypePost as $discType){
			$sql3[] = 'disc_type LIKE \''.$discType.'\'';
		}
		$sql3 = implode(" OR ", $sql3);
	}

	if(isset($newUsedPost) && !empty($newUsedPost)) {
		foreach($newUsedPost as $newUsed){
			$sql4[] = 'newused LIKE \''.$newUsed.'\'';
		}
		$sql4 = implode(" OR ", $sql4);	
	}

	if(isset($partialPost) && !empty($partialPost)) {
		foreach($partialPost as $partial){
			$sql5[] = 'title LIKE \'%'.$partial.'%\'';
		}
		$sql5 = implode(" OR ", $sql5);	
	}

	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($newUsedPost != 0 && !empty($newUsedPost)){
	$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
	if(isset($brandsPost) && !empty($brandsPost)) {
		foreach($brandsPost as $brand){
			$sql1[] = 'brand LIKE \''.$brand.'\'';
		}
		$sql1 = implode(" OR ", $sql1);	
	}

	if(isset($categoryPost) && !empty($categoryPost)) {
		foreach($categoryPost as $category){
			$sql2[] = 'type LIKE \''.$category.'\'';
		}
		$sql2 = implode(" OR ", $sql2);	
	}
	
	if(isset($discTypePost) && !empty($discTypePost)) {
		foreach($discTypePost as $discType){
			$sql3[] = 'disc_type LIKE \''.$discType.'\'';
		}
		$sql3 = implode(" OR ", $sql3);
	}

	if(isset($newUsedPost) && !empty($newUsedPost)) {
		foreach($newUsedPost as $newUsed){
			$sql4[] = 'newused LIKE \''.$newUsed.'\'';
		}
		$sql4 = implode(" OR ", $sql4);	
	}

	if(isset($partialPost) && !empty($partialPost)) {
		foreach($partialPost as $partial){
			$sql5[] = 'title LIKE \'%'.$partial.'%\'';
		}
		$sql5 = implode(" OR ", $sql5);	
	}

	$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
	$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
} elseif ($partialPost != 0 && !empty($partialPost) && $partialPost[0] != ""){
	$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
	if(isset($brandsPost) && !empty($brandsPost)) {
		foreach($brandsPost as $brand){
			$sql1[] = 'brand LIKE \''.$brand.'\'';
		}
		$sql1 = implode(" OR ", $sql1);	
	}

	if(isset($categoryPost) && !empty($categoryPost)) {
		foreach($categoryPost as $category){
			$sql2[] = 'type LIKE \''.$category.'\'';
		}
		$sql2 = implode(" OR ", $sql2);	
	}
	
	if(isset($discTypePost) && !empty($discTypePost)) {
		foreach($discTypePost as $discType){
			$sql3[] = 'disc_type LIKE \''.$discType.'\'';
		}
		$sql3 = implode(" OR ", $sql3);
	}

	if(isset($newUsedPost) && !empty($newUsedPost)) {
		foreach($newUsedPost as $newUsed){
			$sql4[] = 'newused LIKE \''.$newUsed.'\'';
		}
		$sql4 = implode(" OR ", $sql4);	
	}

	if(isset($partialPost) && !empty($partialPost)) {
		foreach($partialPost as $partial){
			$sql5[] = 'title LIKE \'%'.$partial.'%\'';
		}
		$sql5 = implode(" OR ", $sql5);	
	}

	if(isset($pricePost) && !empty($pricePost)) {
		$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
	}
	if(isset($weightPost) && !empty($weightPost)) {
		$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
	}
	if(isset($qualityPost) && !empty($qualityPost)) {
		$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
	}
} elseif ($pricePost != "" && !empty($pricePost)){
	if($pricePost[0] == 1 && $pricePost[1] == 200) {
		$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp';
	} else {
		$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
		if(isset($brandsPost) && !empty($brandsPost)) {
			foreach($brandsPost as $brand){
				$sql1[] = 'brand LIKE \''.$brand.'\'';
			}
			$sql1 = implode(" OR ", $sql1);	
		}
	
		if(isset($categoryPost) && !empty($categoryPost)) {
			foreach($categoryPost as $category){
				$sql2[] = 'type LIKE \''.$category.'\'';
			}
			$sql2 = implode(" OR ", $sql2);	
		}
		
		if(isset($discTypePost) && !empty($discTypePost)) {
			foreach($discTypePost as $discType){
				$sql3[] = 'disc_type LIKE \''.$discType.'\'';
			}
			$sql3 = implode(" OR ", $sql3);
		}
	
		if(isset($newUsedPost) && !empty($newUsedPost)) {
			foreach($newUsedPost as $newUsed){
				$sql4[] = 'newused LIKE \''.$newUsed.'\'';
			}
			$sql4 = implode(" OR ", $sql4);	
		}
	
		if(isset($partialPost) && !empty($partialPost)) {
			foreach($partialPost as $partial){
				$sql5[] = 'title LIKE \'%'.$partial.'%\'';
			}
			$sql5 = implode(" OR ", $sql5);	
		}
	
		$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
		$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
		$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
	}
} elseif ($weightPost != "" && !empty($weightPost)){
	if($weightPost[0] == 130 && $weightPost[1] == 200) {
		$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp';
	} else {
		$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
		if(isset($brandsPost) && !empty($brandsPost)) {
			foreach($brandsPost as $brand){
				$sql1[] = 'brand LIKE \''.$brand.'\'';
			}
			$sql1 = implode(" OR ", $sql1);	
		}
	
		if(isset($categoryPost) && !empty($categoryPost)) {
			foreach($categoryPost as $category){
				$sql2[] = 'type LIKE \''.$category.'\'';
			}
			$sql2 = implode(" OR ", $sql2);	
		}
		
		if(isset($discTypePost) && !empty($discTypePost)) {
			foreach($discTypePost as $discType){
				$sql3[] = 'disc_type LIKE \''.$discType.'\'';
			}
			$sql3 = implode(" OR ", $sql3);
		}
	
		if(isset($newUsedPost) && !empty($newUsedPost)) {
			foreach($newUsedPost as $newUsed){
				$sql4[] = 'newused LIKE \''.$newUsed.'\'';
			}
			$sql4 = implode(" OR ", $sql4);	
		}
	
		if(isset($partialPost) && !empty($partialPost)) {
			foreach($partialPost as $partial){
				$sql5[] = 'title LIKE \'%'.$partial.'%\'';
			}
			$sql5 = implode(" OR ", $sql5);	
		}
	
		$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
		$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
		$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
	}
} elseif ($qualityPost != "" && !empty($qualityPost)){
	if($qualityPost[0] == 1 && $qualityPost[1] == 10) {
		$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp';
	} else {
		$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp AND ';
		if(isset($brandsPost) && !empty($brandsPost)) {
			foreach($brandsPost as $brand){
				$sql1[] = 'brand LIKE \''.$brand.'\'';
			}
			$sql1 = implode(" OR ", $sql1);	
		}
	
		if(isset($categoryPost) && !empty($categoryPost)) {
			foreach($categoryPost as $category){
				$sql2[] = 'type LIKE \''.$category.'\'';
			}
			$sql2 = implode(" OR ", $sql2);	
		}
		
		if(isset($discTypePost) && !empty($discTypePost)) {
			foreach($discTypePost as $discType){
				$sql3[] = 'disc_type LIKE \''.$discType.'\'';
			}
			$sql3 = implode(" OR ", $sql3);
		}
	
		if(isset($newUsedPost) && !empty($newUsedPost)) {
			foreach($newUsedPost as $newUsed){
				$sql4[] = 'newused LIKE \''.$newUsed.'\'';
			}
			$sql4 = implode(" OR ", $sql4);	
		}
	
		if(isset($partialPost) && !empty($partialPost)) {
			foreach($partialPost as $partial){
				$sql5[] = 'title LIKE \'%'.$partial.'%\'';
			}
			$sql5 = implode(" OR ", $sql5);	
		}
	
		$sql6 = 'price >= '.$pricePost[0].' AND price <= '. ($pricePost[1] == 100 ? 10000 : $pricePost[1]);
		$sql7 = 'weight >= '.($weightPost[0] == 130 ? 0 : $weightPost[0]).' AND weight <= '. ($weightPost[1] == 200 ? 10000 : $weightPost[1]);
		$sql8 = 'quality >= '.$qualityPost[0].' AND quality <= '.$qualityPost[1];
	}
} else {
	$sql_start = 'SELECT * FROM posts WHERE NOW() + INTERVAL 1 HOUR < timestamp';
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
		$sql_end = ' ORDER BY timestamp ASC';
	}
} else {
	$sql_end = 'ORDER BY timestamp ASC';
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


if (isset($_SESSION['u_id'])) {
	$post_array2 = array();
	$post_array3 = array();
	$sql2 = "SELECT t1.post_id, t1.user_id, t1.bid FROM bids t1 LEFT JOIN bids t2 ON (t1.post_id = t2.post_id AND t1.bid < t2.bid) WHERE t2.bid IS NULL ORDER BY t1.post_id";
	$sql3 = "SELECT post_id, user_id, MAX(bid) as maxbid FROM bids WHERE user_id = ". $_SESSION['u_id'] ." GROUP BY post_id";


	$maxBids = mysqli_query($conn, $sql2);
	$maxBids2 = mysqli_query($conn, $sql3);

	while ($maxBid = mysqli_fetch_array($maxBids)) {
		array_push($post_array2,$maxBid);
	}

	while ($maxBid2 = mysqli_fetch_array($maxBids2)) {
		array_push($post_array3,$maxBid2);
	}


	foreach($post_array3 as $key1=>$value1) {
		$value1['usermaxbid'] = "no";
		$result2[$key1]=$value1;
	
		foreach($post_array2 as $key2=>$value2) {
			if($value1['user_id']==$value2['user_id'] && $value1['maxbid']==$value2['bid']) {
				$value1['usermaxbid'] = "yes";
				$result2[$key2]=$value1;
			}
		}
	}

	$post_array2 = $result2;
} else {
	$post_array2 = [];
}


$posts = mysqli_query($conn, $sql);


/* MASTER SCROLL COUNT BEFORE RELOAD! */
$size = 18;

$count_rows = $posts->num_rows;
$post_array = array();
$array_count = ceil($count_rows/$size);
$array_data = array();
$count = 0;

while ($post = mysqli_fetch_array($posts)) {
	array_push($post_array,$post);
}




foreach($post_array as $key1=>$value1) {
	$value1['maxbid'] = 0;
	$result[$key1]=$value1;

	$value1['maxbiduserid'] = 0;
	$result[$key1]=$value1;

	foreach($post_array2 as $key2=>$value2) {
		if($value1['id']==$value2['post_id']) {
			$value1['maxbid'] = $value2['maxbid'];
			$result[$key1]=$value1;

			$value1['maxbiduserid'] = $value2['user_id'];
			$result[$key1]=$value1;

			$value1['usermaxbid'] = $value2['usermaxbid'];
			$result[$key1]=$value1;
		}
	}
}


if($array_count == 1 || $count_rows == "0") {
	echo '<script type="text/javascript">',
	'$( ".postsLoader" ).remove();',
	'$( "#footer-wrapper" ).show();',
	'</script>';
}

if($count_rows == "0" && $scrollCount == 0) {
	?>
	<div style="background-color: white; border: 1px solid black; margin-left: 1.5em; margin-top: 1em; padding: 1em 1em 1em 1em; text-align: center;">
		<p style="margin-bottom: 0; font-size: 1.5em; font-weight: 600;"><i class="fa fa-arrow-up" aria-hidden="true" style="margin-right: 1em;"></i>No Posts - Clear the filters to see more<i class="fa fa-arrow-up" aria-hidden="true" style="margin-left: 1em;"></i></p>
	</div>
	<?php
}


for($i=0; $i<$array_count; $i++){
	$array_data[$i] = array_splice($result, 0, $size);
}	

if(isset($array_data[$scrollCount]) && count($array_data[$scrollCount]) > 0) {

	for($i=0; $i<count($array_data[$scrollCount]); $i++) {

		if(count($array_data[$scrollCount]) < $size) {
			echo '<script type="text/javascript">',
			'$( ".postsLoader" ).remove();',
			'$( "#footer-wrapper" ).show();',
			'</script>';
		} elseif ((($count_rows % $size) == 0) && ($scrollCount + 1 == $array_count)) {
			echo '<script type="text/javascript">',
			'$( ".postsLoader" ).remove();',
			'$( "#footer-wrapper" ).show();',
			'</script>';
		} else {
			echo '<script type="text/javascript">',
			'$( "#footer-wrapper" ).hide();',
			'</script>';
		}
		?> 
		<div class="4u 6u(mobile) post">
			<?php 
			if (isset($array_data[$scrollCount][$i]['usermaxbid']) && $array_data[$scrollCount][$i]['usermaxbid'] == "yes") {
				echo '<a class="postModal" id="postModal' . $array_data[$scrollCount][$i]['id'] . '" href="#animatedModal"><div class="post-container" id="post-container' . $array_data[$scrollCount][$i]['id'] . '" style="outline: 5px solid #0a7e07; border: 1px solid #0a7e07;">';
			} else if (isset($array_data[$scrollCount][$i]['usermaxbid']) && $array_data[$scrollCount][$i]['usermaxbid'] == "no") {
				echo '<a class="postModal" id="postModal' . $array_data[$scrollCount][$i]['id'] . '" href="#animatedModal"><div class="post-container" id="post-container' . $array_data[$scrollCount][$i]['id'] . '" style="outline: 5px solid red; border: 1px solid red;">';
			} else {
				echo '<a class="postModal" id="postModal' . $array_data[$scrollCount][$i]['id'] . '" href="#animatedModal"><div class="post-container" id="post-container' . $array_data[$scrollCount][$i]['id'] . '">';
			}
			?>
				<span class="image featured">
					<img src="<?php echo "images/" . $array_data[$scrollCount][$i]['img1']; ?>" alt="" />
				</span>
				<section class="box post-content">
					<div class="post-info">
						<span class="title">
							<h3>
								<?php echo $array_data[$scrollCount][$i]['title']; ?>
							</h3>
						</span>
						<hr>
						<p>
							<h3 style="padding: 0 .75em 0 .75em;">
								<?php if (isset($array_data[$scrollCount][$i]['usermaxbid']) && $array_data[$scrollCount][$i]['usermaxbid'] == "no") { ?>
									<span style="color:#0a7e07; font-size: 1.1em; font-weight: 600; color: red;">$
										<?php echo $array_data[$scrollCount][$i]['price']; ?>
									</span>
								<?php } else { ?>
									<span style="color:#0a7e07; font-size: 1.1em; font-weight: 600;">$
										<?php echo $array_data[$scrollCount][$i]['price']; ?>
									</span>
								<?php } ?>
								<?php echo '<span style="float: right; font-size: 1em; font-weight: 500;"><span data-countdown="'. $array_data[$scrollCount][$i]['timestamp'] .'"></span></span>'; ?>
							</h3>
						</p>
						<hr>

						<?php if ($array_data[$scrollCount][$i]['type'] == "Disc") {?>
						<p>
							New/Used:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['newused']; ?>
							</span>
						</p>
						<p>
							Quality:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['quality']; ?>/10</span>
						</p>
						<p>
							Brand:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['brand']; ?>
							</span>
						</p>
						<p>
							Weight:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['weight']; ?>g</span>
						</p>
						<p>
							Plastic:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['plastic']; ?>
							</span>
						</p>
						<?php }?>
						<?php if (($array_data[$scrollCount][$i]['type'] == "Bag") || ($array_data[$scrollCount][$i]['type'] == "Apparel") || ($array_data[$scrollCount][$i]['type'] == "Accessory") || ($array_data[$scrollCount][$i]['type'] == "Shoes")) {?>
						<p>
							New/Used:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['newused']; ?>
							</span>
						</p>
						<p>
							Quality:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['quality']; ?>/10</span>
						</p>
						<p>
							Brand:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['brand']; ?>
							</span>
						</p>
						<p>
							Size:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['weight']; ?>g</span>
						</p>
						<p>
							Color:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['plastic']; ?>
							</span>
						</p>
						<?php }?>
						<?php if ($array_data[$scrollCount][$i]['type'] == "Basket") {?>
						<p>
							New/Used:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['newused']; ?>
							</span>
						</p>
						<p>
							Quality:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['quality']; ?>/10</span>
						</p>
						<p>
							Brand:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['brand']; ?>
							</span>
						</p>
						<p>
							Type:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['weight']; ?>g</span>
						</p>
						<p>
							Color:
							<span style="float: right;">
								<?php echo $array_data[$scrollCount][$i]['plastic']; ?>
							</span>
						</p>
						<?php }?>
					</div>
					<?php 
					if (isset($array_data[$scrollCount][$i]['usermaxbid']) && $array_data[$scrollCount][$i]['usermaxbid'] == "yes") {
						echo '<footer style="background-color: #0a7e07; margin-left: -.9em; margin-right: -.9em;">';
							echo '<p style="text-align: center; font-weight: 500; font-size: 1.2em; color: white;">Winning</p>'; ?>
					<?php echo '</footer>'; ?>
					<?php
					} else if (isset($array_data[$scrollCount][$i]['usermaxbid']) && $array_data[$scrollCount][$i]['usermaxbid'] == "no") {
						echo '<footer style="background-color: red; margin-left: -.9em; margin-right: -.9em;">';
							echo '<p style="text-align: center; font-weight: 500; font-size: 1.2em; color: white;">Losing</p>'; ?>
					<?php echo '</footer>'; ?>
					<?php
					} else {
						echo '<hr style="margin: 0;">';
						echo '<footer>';
							echo '<p>';
					?>
							<span>
								<?php 
									$sql2 = "SELECT user_uid FROM users WHERE users.user_id = " . $array_data[$scrollCount][$i]['user_id'];
									$sql3 = mysqli_query($conn, $sql2);
									while ($row = $sql3->fetch_assoc()) {
										echo '<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;' . ($row['user_uid']);
									}
								?>
							</span>
							<span style="float: right;"><?php echo $array_data[$scrollCount][$i]['maxbid']; ?> Mins Ago</span>
						<?php echo '</p>'; ?>
					<?php echo '</footer>'; ?>
					<?php
					}
					?>					
						
				</section>
			<?php echo "</div></a>"; ?>
		</div>
		<?php
	}
}

?>

<div class="12u postsLoaderContainer" id="postsLoader" style="text-align: center;">
	<div class="postsLoader"></div>	
</div>


<div id="animatedModal" style="background-color: white; display: none;">
	<div id="btn-close-modal" class="close-animatedModal" onclick="closePost()"> 
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
			var container = "#post-container" + data;
			$("#post-container" + data).css({"opacity":"0.5"});
			$("#postModal" + data).css({"pointer-events":"none"});
			$("#postModal" + data).css({"cursor":"default"});
			$("#postModal" + data).addClass("disabled");
			$("#postModal" + data).removeAttr("href");
			$("#post-container" + data).unwrap();
			$("#post-container" + data).hover(function(){
				$(this).css({"outline": "0px"});
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
			$(this).html('EXPIRED').parent().addClass('disabled');
			$this.css("color", "black");
			$this.css("font-weight", "500");
			$this.css("font-size", "1.1em");
			expired($(this).closest('a').attr('id').substring(9));
		});
	});

</script>

