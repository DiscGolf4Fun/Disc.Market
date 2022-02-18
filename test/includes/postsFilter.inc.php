<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/test/includes/dbh.inc.php"; 
	include_once($path);
?>

<?php

$sql0 = [];

if(isset($_POST['categoryPost'])) {
	$categoryPost = (array) $_POST['categoryPost'];
} else {
	$categoryPost = (array) null;
}

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
    $pricePost[0] = '1';
    $pricePost[1] = '100';
	$pricePost == array();
}

if(isset($_POST['weightPost'])) {
	$weightPost = (array) $_POST['weightPost'];
	if($weightPost[0] == 130 && $weightPost[1] == 200){
		$weightPost == array(); 
	}
}  else {
    $weightPost[0] = '130';
    $weightPost[1] = '200';
	$weightPost == array();
}

if(isset($_POST['qualityPost'])) {
	$qualityPost = (array) $_POST['qualityPost'];
	if($qualityPost[0] == 1 && $qualityPost[1] == 10){
		$qualityPost == array(); 
	}
}   else {
    $qualityPost[0] = '1';
    $qualityPost[1] = '10';
	$qualityPost == array();
}

if(isset($_POST['topFilterPost'])) {
	$topFilterPost = $_POST['topFilterPost'];
} else {
	$topFilterPost = "";
}

$count = 0;

if (isset($_POST['partialPost']) && $partialPost[0] != "" && !empty($partialPost[0])) {
    $count = $count + 1;
    print_r("<div class='filterButtonStyle 12u(mobile)'><button id='newUsedButton' style='font-size:1em;' onclick='unSearch()'><span>Search:&nbsp;". $partialPost[0] ."&nbsp;<i class='fa fa-close'></i></span></button></div>");
}

if ($categoryPost != "" && !empty($categoryPost)) {
    $count = $count + 1;
    foreach ($categoryPost as $category) {
        if ($category == 'disc') {
            $categoryTitle = 'Discs';
        } elseif ($category == 'bag') {
            $categoryTitle = 'Bags / Carts';
        } elseif ($category == 'apparel') {
            $categoryTitle = 'Apparel';
        } elseif ($category == 'basket') {
            $categoryTitle = 'Baskets';
        } elseif ($category == 'shoes') {
            $categoryTitle = 'Shoes';
        } elseif ($category == 'accessory') {
            $categoryTitle = 'Accessories';
        }
        print_r("<div class='filterButtonStyle 6u(mobile)'><button id='categoriesButton' style='font-size:1em;' onclick='unCheck(`". $category ."`,$(this).parent())'><span>". $categoryTitle ."&nbsp;<i class='fa fa-close'></i></span></button></div>");
    }
}

if ($brandsPost != "" && !empty($brandsPost)) {
    $count = $count + 1;
    foreach ($brandsPost as $brand) {
        if ($brand == 'innova') {
            $brandTitle = 'Innova';
        } elseif ($brand == 'discraft') {
            $brandTitle = 'Discraft';
        } elseif ($brand == 'dynamic') {
            $brandTitle = 'Dynamic Discs';
        } elseif ($brand == 'latitude') {
            $brandTitle = 'Latitude 64';
        } elseif ($brand == 'westside') {
            $brandTitle = 'Westside';
        } elseif ($brand == 'discmania') {
            $brandTitle = 'Discmania';
        } elseif ($brand == 'prodigy') {
            $brandTitle = 'Prodigy';
        } elseif ($brand == 'mvp') {
            $brandTitle = 'MVP';
        } elseif ($brand == 'gateway') {
            $brandTitle = 'Gateway';
        } elseif ($brand == 'otherBrand') {
            $brandTitle = 'Other Brands';
        } elseif ($brand == 'hyzerbomb') {
            $brandTitle = 'Hyzerbomb';
        } elseif ($brand == 'legacy') {
            $brandTitle = 'Legacy';
        } elseif ($brand == 'kastaplast') {
            $brandTitle = 'Kastaplast';
        }
        print_r("<div class='filterButtonStyle 6u(mobile)'><button id='brandsButton' style='font-size:1em;' onclick='unCheck(`". $brand ."`,$(this).parent())'><span>". $brandTitle ."&nbsp;<i class='fa fa-close'></i></span></button></div>");
    }

}

if ($discTypePost != "" && !empty($discTypePost)) {
    $count = $count + 1;
    foreach ($discTypePost as $discType) {
        if ($discType == 'driver') {
            $discTypeTitle = 'Driver';
        } elseif ($discType == 'fairway') {
            $discTypeTitle = 'Fairway';
        } elseif ($discType == 'midrange') {
            $discTypeTitle = 'Midrange';
        } elseif ($discType == 'putter') {
            $discTypeTitle = 'Putter';
        }
        print_r("<div class='filterButtonStyle 6u(mobile)'><button id='discTypeButton' style='font-size:1em;' onclick='unCheck(`". $discType ."`,$(this).parent())'><span>". $discTypeTitle ."&nbsp;<i class='fa fa-close'></i></span></button></div>");
    }
}

if ($newUsedPost != "" && !empty($newUsedPost)) {
    $count = $count + 1;
    foreach ($newUsedPost as $newUsed) {
        if ($newUsed == 'new') {
            $newUsedTitle = 'New';
        } elseif ($newUsed == 'used') {
            $newUsedTitle = 'Used';
        }
        print_r("<div class='filterButtonStyle 6u(mobile)'><button id='newUsedButton' style='font-size:1em;' onclick='unCheck(`". $newUsed ."`,$(this).parent())'><span>". $newUsedTitle ."&nbsp;<i class='fa fa-close'></i></span></button></div>");
    }
}

if (($pricePost[0] != "1" || $pricePost[1] != "100") && ($pricePost[0] != "" || $pricePost[1] != "")) {
    $count = $count + 1;
    if($pricePost[1] >= 100) {
        print_r("<div class='filterButtonStyle 6u(mobile)'><button id='priceButton' style='font-size:1em;' onclick='unSliderPrice()'><span>$". $pricePost[0] ."&nbsp;-&nbsp;$" . $pricePost[1] . "+&nbsp;&nbsp;<i class='fa fa-close'></i></span></button></div>");
    } else {
        print_r("<div class='filterButtonStyle 6u(mobile)'><button id='priceButton' style='font-size:1em;' onclick='unSliderPrice()'><span>$". $pricePost[0] ."&nbsp;-&nbsp;$" . $pricePost[1] . "&nbsp;<i class='fa fa-close'></i></span></button></div>");
    }
}

if (($weightPost[0] != "130" || $weightPost[1] != "200") && ($weightPost[0] != "" || $weightPost[1] != "")) {
    $count = $count + 1;
    print_r("<div class='filterButtonStyle 6u(mobile)'><button id='weightButton' style='font-size:1em;' onclick='unSliderWeight()'><span>". $weightPost[0] ."g&nbsp;-&nbsp;" . $weightPost[1] . "g&nbsp;<i class='fa fa-close'></i></span></button></div>");
}

if (($qualityPost[0] != "1" || $qualityPost[1] != "10") && ($qualityPost[0] != "" || $qualityPost[1] != "")) {
    $count = $count + 1;
    print_r("<div class='filterButtonStyle 6u(mobile)'><button id='qualityButton' style='font-size:1em;' onclick='unSliderQuality()'><span>". $qualityPost[0] ."/10&nbsp;-&nbsp;" . $qualityPost[1] . "/10&nbsp;<i class='fa fa-close'></i></span></button></div>");
}



?>





