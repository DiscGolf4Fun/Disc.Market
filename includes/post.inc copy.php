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

$postId = $_POST['postId'];

if ($postId != "" && !empty($postId)) {
    $sql = 'SELECT * FROM posts WHERE posts.id = ' . $postId;
}

$posts = mysqli_query($conn, $sql);

while ($post = mysqli_fetch_array($posts)) {
    ?> 
    <div class="modal-content2">
        <div class="row" style="max-width: 1400px; margin: 0 auto 0 auto;">
            <div class="6u shortPad" style="padding-right: 1em;">
                <div class="gallery clearfix">
                    <div class="pics clearfix">
                        <div class="thumbs">
                            <?php 
                                if($post['img1']) {
                                    echo '<div class="preview"> <a href="#" class="selected" data-full="images/' . $post['img1'] . '"> <img src="images/' . $post['img1'] . '"/> </a> </div>';                             
                                }
                                if($post['img2']) {
                                    echo '<div class="preview"> <a href="#" data-full="images/' . $post['img2'] . '"> <img src="images/' . $post['img2'] . '"/> </a> </div>'; 
                                }
                                if($post['img3']) {
                                    echo '<div class="preview"> <a href="#" data-full="images/' . $post['img3'] . '"> <img src="images/' . $post['img3'] . '"/> </a> </div>'; 
                                }
                                if($post['img4']) {
                                    echo '<div class="preview"> <a href="#" data-full="images/' . $post['img4'] . '"> <img src="images/' . $post['img4'] . '"/> </a> </div>'; 
                                }
                                if($post['img5']) {
                                    echo '<div class="preview"> <a href="#" data-full="images/' . $post['img5'] . '"> <img src="images/' . $post['img5'] . '"/> </a> </div>'; 
                                }
                            ?>
                        </div>
                            <span class="full">
                                    <?php echo '<img src="images/' . $post["img1"] . '" class="selectedImage">'; ?>
                            </span>

                        <div style="text-align: center; margin-left: 18%;">
                            <p>Roll over image to zoom in</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="6u shortPad" style="padding-left: 1em;">
                <div class="row postInfo">
                    <div class="12u">
                        
                        <h3 class="postTitle"><?php echo $post['title']; ?></h3>
                        <div style="display:block; margin: .5em 0 0 0;">
                            <p style="margin-top: .5em; display:inline;">
                                <strong><span>Seller:</span>&nbsp;&nbsp;<a href="" style="color: #0a7e07;">johnjones3rd</a>&nbsp;&nbsp;<span style="color: #E5C100;">★★★★</span>☆(40)</strong>
                            </p>
                            <span style="float: right; height: 20px; display:inline;">

                                            <a class="icon fa-facebook" style="color: #3B5998;" href="#">
                                                <span class="label">Facebook</span>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a class="icon fa-twitter" style="color: #1DA1F2;" href="#">
                                                <span class="label">Twitter</span>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a class="icon fa-envelope"  href="#">
										        <span class="label">Email</span>
									        </a>
                                            &nbsp;&nbsp;&nbsp;
									        <a class="icon fa-share" href="#" style="color: black;">
										        <span class="label">Share</span>
									        </a>
                            </span>
                        </div>
                        <hr style="margin: 0 0 0 0;">
                    </div>
                    <div class="12u" style="padding-top: 1em; padding-bottom: .5em;">
                        <?php 
                            if($post['description']) {
                                echo '<p style="font-size: 1.25em;">' . $post['description'] . '</p>';
                            } else {
                                echo '<p style="font-size: 1.25em; padding: .5em 0 .5em 0;">No description</p>';
                            }
                        ?>
                    </div>
                    <div class="12u" style="padding-top: 0;">
                        <div class="bidInfo">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="5u" style="padding: 0;">
                                    <p>Price:&nbsp;&nbsp;<span style="color:#0a7e07; font-weight: 700;">$<?php echo $post['price']; ?></span><span style="font-size: .75em;">&nbsp;+Free Shipping</span></p>
                                </div>
                                <div class="5u" style="padding: 0;">
                                    <p style="font-weight: 400;"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;<span id="countdown"></span>&nbsp;&nbsp;</p>
                                </div>
                                <div class="2u" style="padding: 0;">
                                    <p style="text-align: left;"><span style="color:#0a7e07; font-weight: 700;"><a href="#" style="color:#0a7e07"><?php echo $post['bids']; ?></a></span>&nbsp;&nbsp;Bids</p>
                                </div>
                            </div>
                            <hr style="margin: 0 0 0 0;">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="5u" style="padding: 0;">
                                    <?php echo '<p style="text-align: left"><span class="currencyinput">&nbsp;&nbsp;$&nbsp;&nbsp;<input type="text" name="fname" placeholder="' . $post['price'] . '+" style="font-weight: 500; line-height: .75em; width: 40%;"></span>&nbsp;'; ?>
                                    <button type="button" style="width: 25%; height: auto; padding: 5px 0 5px 0; display: inline; line-height: .8em; font-size: 1em; border-radius: 0;">
                                            Bid
                                    </button>
                                    </p>
                                </div>
                                
                                <div class="5u" style="padding: 0 0 0 0;">
                                
                                    <?php if($post['BIN'] == 0) { ?>
                                        <p style="font-weight: 400; font-size: .8em;">Updated: 6/5/18 8:45pm</p>
                                    <?php } else { ?>
                                        <p>
                                        <span style="font-weight: 600; font-size: 1.1em;">$<?php echo $post['BIN']; ?></span>&nbsp;
                                            <button type="button" style="width: 50%; height: auto; padding: 8px 0 8px 0; display: inline; line-height: .8em; font-size: .8em; border-radius: 0;">
                                                    Buy It Now
                                            </button>
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="2u" style="padding: 0;">
                                    <p class="saveText" style="font-weight: 200; font-size: 1em; text-align: left;" ><i class="fa fa-heart save" aria-hidden="true"></i>&nbsp;&nbsp;Save</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="4u" style="padding-top: 2em; text-align: center;">
                        <?php if($post['newused']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">New/Used:&nbsp;&nbsp;</span><?php echo $post['newused']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">New/Used:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: 2em; text-align: center;">
                    <?php if($post['quality']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Quality:&nbsp;&nbsp;</span><?php echo $post['quality'] . "/10"; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Quality:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: 2em; text-align: center;">
                        <?php if($post['brand']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Brand:&nbsp;&nbsp;</span><?php echo $post['brand']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Brand:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: .5em; text-align: center;">
                        <?php if($post['weight']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Weight:&nbsp;&nbsp;</span><?php echo $post['weight'] . "g"; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Weight:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: .5em; text-align: center;">
                        <?php if($post['plastic']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Plastic:&nbsp;&nbsp;</span><?php echo $post['plastic']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Plastic:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: .5em; text-align: center;">
                        <?php if($post['type']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Category:&nbsp;&nbsp;</span><?php echo $post['type']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Category:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: .5em; text-align: center;">
                        <?php if($post['color']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Color:&nbsp;&nbsp;</span><?php echo $post['color']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Color:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: .5em; text-align: center;">
                        <?php if($post['disc_name']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Disc Name:&nbsp;&nbsp;</span><?php echo $post['disc_name']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Disc Name:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                    <div class="4u" style="padding-top: .5em; text-align: center;">
                        <?php if($post['ink']) { ?>
                            <p style="font-size: 1.1em;"><span style="font-weight: 600;">Ink:&nbsp;&nbsp;</span><?php echo $post['ink']; ?></p>
                        <?php } else { ?>
                            <p style="font-size: 1.1em; color:silver;"><span style="font-weight: 600;">Ink:&nbsp;&nbsp;</span>N/A</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="12u" style="padding-top: 1em; width: 100%; text-align: center;">
                        <div class="bidInfo" style="max-width: 1400px; margin: 0 auto 0 auto;">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="12u" style="padding: 0; text-align: center;">
                                    <p>Questions</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="12u" style="padding-top: 1em; width: 100%; text-align: center;">
                        <div class="bidInfo" style="max-width: 1400px; margin: 0 auto 0 auto;">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="12u" style="padding: 0; text-align: center;">
                                    <p>Shipping / Payments</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="12u" style="padding-top: 1em; width: 100%; text-align: center;">
                        <div class="bidInfo" style="max-width: 1400px; margin: 0 auto 0 auto;">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="12u" style="padding: 0; text-align: center;">
                                    <p>Related Posts</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

    </div>
    <?php
}

?>

<script>
$(document).ready(function(){
    $(".preview a").on("click mouseenter", function(){
        $(".selected").removeClass("selected");
        $(this).addClass("selected");
        var picture = $(this).data();

        event.preventDefault(); //prevents page from reloading every time you click a thumbnail

        $(".full img").hide( 0, function() { 
            $(".full img").attr("src", picture.full);
            $(".full").attr("href", picture.full);

        }).show();

    });// end on click

    $(".full img").on("mouseenter", function(){
        var imgHover = this.src.substring(this.src.indexOf("images"));

        console.log(imgHover);

    });// end on click

});//end doc ready


// Set the date we're counting down to
var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("countdown").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "EXPIRED";
    }
}, 1000);


$(".saveText").click(function () {
   $(".save").toggleClass("red");
});

</script>