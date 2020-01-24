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
$count = 0;

if ($partialPost[0] != "" && !empty($partialPost[0])) {
    $count = $count + 1;
    print_r("<button id='newUsedButton' style='font-size:1em;' onclick='unSearch()'><span>Search:&nbsp;". $partialPost[0] ."&nbsp;<i class='fa fa-close'></i></span></button>");
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
        }
        print_r("<button type='button' class='brandsButton' id='brandsButton' style='font-size:1em;' onclick='unCheck(`". $brand ."`)'><span>". $brandTitle ."&nbsp;<i class='fa fa-close'></i></span></button>");
    }

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
        print_r("<button id='categoriesButton' style='font-size:1em;' onclick='unCheck(`". $category ."`)'><span>". $categoryTitle ."&nbsp;<i class='fa fa-close'></i></span></button>");
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
        print_r("<button id='discTypeButton' style='font-size:1em;' onclick='unCheck(`". $discType ."`)'><span>". $discTypeTitle ."&nbsp;<i class='fa fa-close'></i></span></button>");
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
        print_r("<button id='newUsedButton' style='font-size:1em;' onclick='unCheck(`". $newUsed ."`)'><span>". $newUsedTitle ."&nbsp;<i class='fa fa-close'></i></span></button>");
    }
}

if (($pricePost[0] != "1" || $pricePost[1] != "100") && ($pricePost[0] != "" || $pricePost[1] != "")) {
    $count = $count + 1;
    if($pricePost[1] >= 100) {
        print_r("<button id='priceButton' style='font-size:1em;' onclick='unSliderPrice()'><span>$". $pricePost[0] ."&nbsp;-&nbsp;$" . $pricePost[1] . "+&nbsp;&nbsp;<i class='fa fa-close'></i></span></button>");
    } else {
        print_r("<button id='priceButton' style='font-size:1em;' onclick='unSliderPrice()'><span>$". $pricePost[0] ."&nbsp;-&nbsp;$" . $pricePost[1] . "&nbsp;<i class='fa fa-close'></i></span></button>");
    }
}

if (($weightPost[0] != "130" || $weightPost[1] != "200") && ($weightPost[0] != "" || $weightPost[1] != "")) {
    $count = $count + 1;
    print_r("<button id='weightButton' style='font-size:1em;' onclick='unSliderWeight()'><span>". $weightPost[0] ."g&nbsp;-&nbsp;" . $weightPost[1] . "g&nbsp;<i class='fa fa-close'></i></span></button>");
}

if (($qualityPost[0] != "1" || $qualityPost[1] != "10") && ($qualityPost[0] != "" || $qualityPost[1] != "")) {
    $count = $count + 1;
    print_r("<button id='qualityButton' style='font-size:1em;' onclick='unSliderQuality()'><span>". $qualityPost[0] ."/10&nbsp;-&nbsp;" . $qualityPost[1] . "/10&nbsp;<i class='fa fa-close'></i></span></button>");
}



?>





