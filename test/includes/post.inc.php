<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/test/includes/dbh.inc.php"; 
	include_once($path);
?>

<?php

$postId = $_POST['postId'];

if ($postId != "" && !empty($postId)) {
    $sql = 'SELECT * FROM posts WHERE posts.id = ' . $postId;
}

$posts = mysqli_query($conn, $sql);


while ($post = mysqli_fetch_array($posts)) {

    ?> 
    <div class="modal-content2">
        <div class="row" style="max-width: 1400px; margin: 0 auto 0 auto;">
            <div class="5u shortPad" style="padding-right: 1em;">
                    <div class="simpleLens-gallery-container" id="demo-1">
                        <div class="row" style="margin: 0 0 0 0;">
                            <div class="2u" style="padding-left: 0; padding-top: 0;">
                                <div class="simpleLens-thumbnails-container">
                                    <?php
                                    if($post['img1']) {
                                        echo 
                                        '<a href="#" class="simpleLens-thumbnail-wrapper selected" data-lens-image="images/' . pathinfo($post['img1'], PATHINFO_FILENAME) . '_big.jpg" data-big-image="images/' . $post['img1'] . '">
                                            <img src="images/' . $post['img1'] . '">
                                        </a>';
                                    }
                                    ?>
                                    <?php
                                    if($post['img2']) {
                                        echo 
                                        '<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="images/' . pathinfo($post['img2'], PATHINFO_FILENAME) . '_big.jpg" data-big-image="images/' . $post['img2'] . '">
                                            <img src="images/' . $post['img2'] . '">
                                        </a>';
                                    }
                                    ?>
                                    <?php
                                    if($post['img3']) {
                                        echo 
                                        '<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="images/' . pathinfo($post['img3'], PATHINFO_FILENAME) . '_big.jpg" data-big-image="images/' . $post['img3'] . '">
                                            <img src="images/' . $post['img3'] . '">
                                        </a>';
                                    }
                                    ?>
                                    <?php
                                    if($post['img4']) {
                                        echo 
                                        '<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="images/' . pathinfo($post['img4'], PATHINFO_FILENAME) . '_big.jpg" data-big-image="images/' . $post['img4'] . '">
                                            <img src="images/' . $post['img4'] . '">
                                        </a>';
                                    }
                                    ?>
                                    <?php
                                    if($post['img5']) {
                                        echo 
                                        '<a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="images/' . pathinfo($post['img5'], PATHINFO_FILENAME) . '_big.jpg" data-big-image="images/' . $post['img5'] . '">
                                            <img src="images/' . $post['img5'] . '">
                                        </a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="10u" style="padding-left: 1em; padding-top: 0;">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <?php
                                            echo 
                                            '<a class="simpleLens-lens-image" data-lens-image="images/' . pathinfo($post['img1'], PATHINFO_FILENAME) . '_big.jpg">
                                                <img src="images/' . $post['img1'] . '" class="simpleLens-big-image">
                                            </a>';
                                        ?>
                                    </div>
                                </div>
                                <div style="text-align: center; margin: .5em 0 .5em 0;">
                                    <p>Roll over image to zoom in</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="7u shortPad" style="padding-left: 1em;">
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
                                    <?php echo '<p style="font-weight: 400;"><span data-countdown="'. $post['timestamp'] .'"></span>&nbsp;&nbsp;</p>'; ?>
                                </div>
                                <?php
                                    $sql9 = "SELECT bids.id, bids.bid, bids.post_id, bids.user_id, bids.timestamp, users.user_uid FROM bids INNER JOIN users ON users.user_id = bids.user_id WHERE " . $post['id'] ." = post_id";
                                    $bids = mysqli_query($conn, $sql9);
                                    $bidsCount = mysqli_num_rows($bids);
                                ?>
                                <div class="2u" style="padding: 0;">
                                    <p style="text-align: left;"><span style="color:#0a7e07; font-weight: 700;"><a href="#" id="trigger" style="color:#0a7e07"><?php echo $bidsCount; ?></a></span>&nbsp;&nbsp;Bids</p>
                                </div>
                                    <div id="drop">

                                    
                                            <h3>Bids:&nbsp;&nbsp;<?php echo $bidsCount; ?></h3>  
                                            <?php  
                                                if($bidsCount == 0){
                                                    echo '<p>There are 0 current bids. Be the first!</p>';
                                                }
                                                
                                                while ($bid = mysqli_fetch_array($bids)) {
                                                    echo '<p><span style="font-weight: 600;">$'. $bid['bid'] .'</span> - '. $bid['user_uid'] .' | '. $bid['timestamp'] .'</p>';
                                                }
                                            ?>                               
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
            <div class="12u" style="padding-top: 1.5em; padding-bottom: 1em; width: 100%;">
                        <div class="bidInfo" style="max-width: 1400px; margin: 0 auto 0 auto;">
                            <div class="row" style="padding: 0; margin: 0 0 0 0;">
                                <div class="12u" style="padding: 0; text-align: left;">
                                    <div id="questionsTitle" style="margin: .75em 0 2em 1em;">
                                        <h4 style="font-size: 1.6em; font-weight: 500; display:inline;">Questions&nbsp;&nbsp;&amp;&nbsp;&nbsp;Answers</h4>
                                    </div>
                                </div>
                                <div class="1u" style="padding: 0; text-align: right;">
                                    <p class="questionLike"><span style="font-weight: 600;">4</span>&nbsp;&nbsp;<i class="fa fa-thumbs-up question" aria-hidden="true"></i></p>
                                </div>
                                <div class="1u" style="padding: 0; text-align: center;">
                                    <div style="border-left: 2px solid dimgrey; margin-left: 45%;"><p style="padding: 0 0 1.5em 0;"></p><p style="padding: 0 0 1.5em 0;"></p></div>
                                </div>
                                <div class="1u" style="padding: 0; text-align: right; padding-right: .5em;">
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em"><span style="font-weight: 600">Question:&nbsp;&nbsp;</span></p>
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em"><span style="font-weight: 600">Answer:&nbsp;&nbsp;</span></p>
                                </div>
                                <div class="9u" style="padding: 0 0 0 1em; text-align: left;">
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em; color: #075804;">It says in the description that its 150 class...is this 175g or 150g???</p>
                                    <p style="padding: 0 0 1.5em 0; font-size: 1.2em;">Sorry the Description is wrong and I will change it right away. The disc is 175g.</p>
                                </div>
                                <div class="1u" style="padding: 0; text-align: right;">
                                    <p class="questionLike"><span style="font-weight: 600;">2</span>&nbsp;&nbsp;<i class="fa fa-thumbs-up question" aria-hidden="true"></i></p>
                                </div>
                                <div class="1u" style="padding: 0; text-align: center;">
                                    <div style="border-left: 2px solid dimgrey; margin-left: 45%;"><p style="padding: 0 0 1.5em 0;"></p><p style="padding: 0 0 1.5em 0;"></p></div>
                                </div>
                                <div class="1u" style="padding: 0; text-align: right; padding-right: .5em;">
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em"><span style="font-weight: 600">Question:&nbsp;&nbsp;</span></p>
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em"><span style="font-weight: 600">Answer:&nbsp;&nbsp;</span></p>
                                </div>
                                <div class="9u" style="padding: 0 0 0 1em; text-align: left;">
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em; color: #075804;">It says in the description that its 150 class...is this 175g or 150g???</p>
                                    <p style="padding: 0 0 1.5em 0; font-size: 1.2em;">Sorry the Description is wrong and I will change it right away. The disc is 175g.</p>
                                </div>
                                <div class="1u" style="padding: 0; text-align: right;">
                                    <p class="questionLike"><span style="font-weight: 600;">1</span>&nbsp;&nbsp;<i class="fa fa-thumbs-up question" aria-hidden="true"></i></p>
                                </div>
                                <div class="1u" style="padding: 0; text-align: center;">
                                    <div style="border-left: 2px solid dimgrey; margin-left: 45%;"><p style="padding: 0 0 1.5em 0;"></p><p style="padding: 0 0 1.5em 0;"></p><p style="padding: 0 0 1.5em 0;"></p></div>
                                </div>
                                <div class="1u" style="padding: 0; text-align: right; padding-right: .5em;">
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em"><span style="font-weight: 600">Question:&nbsp;&nbsp;</span></p>
                                    <p style="padding: 0 0 .5em 0; font-size: 1.2em"><span style="font-weight: 600">Answer:&nbsp;&nbsp;</span></p>
                                </div>
                                <div class="9u" style="padding: 0 0 0 1em; text-align: left;">
                                    <p style="padding: 0 1em .5em 0; font-size: 1.2em; color: #075804;">It says in the description that its 150 class...is this 175g or 150g???</p>
                                    <p style="padding: 0 1em 1.5em 0; font-size: 1.2em;">Sorry the Description is wrong and I will change it right away. The disc is 175g.Sorry the Description is wrong and I will change it right away. The disc is 175g.</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="12u" style="padding-top: 1em; padding-bottom: 1em; width: 100%; text-align: center;">
                        <div class="bidInfo" style="max-width: 1400px; margin: 0 auto 0 auto;">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="6u" style="padding: 0; text-align: center; border-right:solid 1px black;">
                                    <h2><u>Shipping</u></h2>
                                </div>
                                <div class="6u" style="padding: 0; text-align: center; border-left:solid 1px black;">
                                    <h2><u>Payment</u></h2>
                                </div>
                            </div>
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="6u" style="padding: 0; text-align: left; border-right:solid 1px black;">
                                    <p>FREE Economy Shipping | See details
                                    <br>Item location:
                                    <br>New Lenox, Illinois, United States
                                    <br>Ships to:
                                    <br>Worldwide See exclusions
                                    </p>
                                </div>
                                <div class="6u" style="padding: 0; text-align: left; border-left:solid 1px black;">
                                    <p>We want to make payment for your products as easy as possible! This is why we offer a range of different payment options:</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="12u" style="padding-top: 1em; width: 100%; text-align: center;">
                        <div class="bidInfo" style="max-width: 1400px; margin: 0 auto 0 auto;">
                            <div class="row" style="padding: 0; margin: 0;">
                                <div class="12u" style="padding: 0; text-align: center; margin-top: 1em;">
                                <h2><u>Related Posts</u></h2>
                                    <div class="relatedPosts" style="padding: 1em; padding-top: 0;">
                                        <div style="align: center;"><b><p><span style="color:#075804">$18</span></b> - Content 1 Title</p><img src="<?php echo "test/images/pic20.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$12</span> - Content 2 Title</p><img src="<?php echo "test/images/pic21.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$11</span> - Content 3 Title</p><img src="<?php echo "test/images/pic22.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$6</span> - Content 4 Title</p><img src="<?php echo "test/images/pic23.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$14</span> - Content 5 Title</p><img src="<?php echo "test/images/pic24.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$16</span> - Content 6 Title</p><img src="<?php echo "test/images/pic25.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$22</span> - Content 7 Title</p><img src="<?php echo "test/images/pic26.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                        <div style="align: center;"><p><span style="color:#075804">$9</span> - Content 8 Title</p><img src="<?php echo "test/images/pic27.jpg"; ?>" style="max-height: 200px; display: block; margin-left: auto; margin-right: auto;" alt="" /></div>
                                    </div>
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
$(window).resize(function(){
    $("html").css({"overflow":"scroll"});
});
    
$(document).ready(function(){
    $('.relatedPosts').slick({
        lazyLoad: 'ondemand',
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000
    });

    $('#trigger').click( function(event){       
        event.stopPropagation();        
        $('#drop').toggle();        
    });   
    $(document).click( function(){
        $('#drop').hide();
    });


    $('.simpleLens-gallery-container .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'test/images/loading.gif'
    });

    $('.simpleLens-gallery-container .simpleLens-big-image').simpleLens({
        loading_image: 'test/images/loading2.gif'
    });


    $(".simpleLens-thumbnails-container a").on("click mouseenter", function(){
        $(".selected").removeClass("selected");
        $(this).addClass("selected");

        event.preventDefault(); //prevents page from reloading every time you click a thumbnail

    });// end on click


    $('[data-countdown]').each(function() {
		var $countdown = 0;
        var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			if(event.offset.days > 0){
				$this.html('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + event.strftime('%-Dd %-Hh %-Mm %-Ss'));
			} else {
				if(event.offset.hours > 0) {
					$this.html('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + event.strftime('%-Hh %-Mm %-Ss'));
				} else {
					if(event.offset.minutes > 0) {
						$this.html('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + event.strftime('%-Mm %-Ss'));
						$this.css("color", "red");
					} else {
						if(event.offset.seconds > 0) {
							$this.css("font-weight", "700");
							$this.html('<i id="clock" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp' + event.strftime('%-Ss'));	
							$this.css("color", "red");						
						}
					}
				}
			}
        })
		.on('finish.countdown', function(event) {
			$(this).html('EXPIRED').parent().addClass('disabled');
            $this.css("color", "black");
            $this.css("font-weight", "700");
		});
	});

    $(".saveText").click(function () {
        $(".save").toggleClass("red");
    });

    $(".questionLike").click(function () {
        $(".question").toggleClass("like");
    });


});//end doc ready
</script>