skel.breakpoints({
	xlarge: "(max-width: 1680px)",
	large:  "(max-width: 1280px)",
	medium: "(max-width: 980px)",
	small:  "(max-width: 750px)",
	xsmall: "(max-width: 480px)"
});


if(window.scrollY != 0){
    $('html, body').scrollTop(0);
}

window.onunload = function () {
    window.scrollTo(0,0);
};

// Get the modal
var modal = document.getElementById('id01');

var globalFilter = [];
var globalFilterBrands = [];
var globalFilterCategories = [];
var globalFilterDiscType = [];
var globalFilterNewUsed = [];
var globalFilterSearch = [];
var globalFilterPrice = [];
var globalFilterWeight = [];
var globalFilterQuality = [];
var globalFilterTopFilter = "";
var globalFilterCount;
var globalScrollCount = 0;

var globalFilterSearchMyPosts = [];
var globalFilterTopFilterMyPosts;

var globalFilterSearchCurrentBids = [];
var globalFilterTopFilterCurrentBids;

$('#priceButton').hide();
$('#weightButton').hide();
$('#qualityButton').hide();



$( document ).ready(function() {

    tab = $('.tabs h3 a');

	tab.on('click', function(event) {
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');

		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});

    var text_max = 250;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });

    function getPostsCount(value) {
        console.log("getPostsCount");
        globalFilterCount = value;
        console.log("Count:", globalFilterCount);
    }

    if (document.getElementById('logoutButton')) {
        document.getElementById('logoutButton').onclick = function() {
            document.getElementById('logoutForm').submit();
        };
    }
})

var scrolled1 = window.innerHeight + window.scrollY;
var scrolled2 = document.body.offsetHeight;
var scrolled3 = scrolled2 - 100;
var initialScrollEvent = true;
var scrollOnce = true;


if (document.location.href.indexOf('buy.php') !== -1){ 
    window.onscroll = function() {
        var navMobile = document.getElementById("navMobile");
        // Get the offset position of the navbar
        var sticky = navMobile.offsetTop + navMobile.offsetHeight;

        console.log(sticky);

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        if (window.pageYOffset >= sticky) {
            navMobile.classList.add("sticky")
        } else {
            navMobile.classList.remove("sticky");
        }
        
        var start = document.getElementById("filterBox").scrollHeight;
        if (scrolled1 <= scrolled3) { 
            scrolled1 = window.innerHeight + window.scrollY;
            scrolled2 = document.body.offsetHeight;
            scrolled3 = scrolled2 - 100;
            if($("#footer-wrapper").is(":hidden")) { 
                $("#postsLoader").scrollTop($("#postsLoader")[0].scrollHeight);
                $(".postsLoader").css("display","block");
                if (scrolled1 >= scrolled3 && scrollOnce == true) {
                    scrollOnce = false;
                    var timeout = setTimeout(function (){ 
                            getPostsScroll(globalScrollCount);
                            scrollOnce = true;
                    }, 2000);
                }
            } else {
                $('.postsLoaderContainer').css("display","none");
            }           

        }
        if (window.scrollY > start) {
            $('#toTopButton').attr("style", "display: block");
            $('#toTopButton').attr("style", "bottom: 3em");


        } else {
            $('#toTopButton').attr("style", "display: none");
        }
        initialScrollEvent = false;
        scrolled1 = window.innerHeight + window.scrollY;
        scrolled2 = document.body.offsetHeight;
        scrolled3 = scrolled2 - 100; 
    }

};


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


$("#exit").on("click", function (event) {

    modal.style.display = "none";
})

$('input[type="range"]').on('input.valueLow', function () {

    var control = $(this),
        controlMin = control.attr('min'),
        controlMax = control.attr('max'),
        controlVal = control.val(),
        controlThumbWidth = control.data('thumbwidth');

    var range = controlMax - controlMin;

    var position = ((controlVal - controlMin) / range) * 100;
    var positionOffset = Math.round(controlThumbWidth * position / 100) - (controlThumbWidth / 2);
    var output = control.next('output');

    output
        .css('left', 'calc(' + position + '% - ' + positionOffset + 'px)')
        .text(controlVal);

});


function createAccount() {
    window.location.href = "signup.php";
    return false;
}


function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    console.log(tabName);

    if (tabName == "Login") {
        document.getElementsByClassName("loginButton")[0].style.borderBottom = "1px solid white";
        document.getElementsByClassName("signupButton")[0].style.borderBottom = "1px solid black";
    }
    if (tabName == "SignUp") {
        document.getElementsByClassName("signupButton")[0].style.borderBottom = "1px solid white";
        document.getElementsByClassName("loginButton")[0].style.borderBottom = "1px solid black";
    }

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getuser.php?q=" + str, true);
        xmlhttp.send();
    }
}

function isInArray(words, word) {
    return words.indexOf(word.toString().toLowerCase()) > -1;
}


function getPostsHome() {
    console.log("getPostsHome");
    $.post("/test/includes/postsHome.inc.php", {
    }, function (data) {
        $("#resultsHome").html(data);
    });
}
getPostsHome();

function getPostsMyPosts() {
    console.log("getPostsMyPosts");

    $.post("/test/includes/postsMyPostsFilter.inc.php", {
        "partialPost": globalFilterSearchMyPosts,
        "topFilterPost" : globalFilterTopFilterMyPosts
    }, function (data) {
        $("#filterResultsMyPosts").html(data);
    });

    $.post("/test/includes/postsMyPosts.inc.php", {
    }, function (data) {
        $("#resultsMyPosts").html(data);
    });
}
getPostsMyPosts();

function getPostsCurrentBids() {
    console.log("getPostsCurrentBids");

    $.post("/test/includes/postsCurrentBidsFilter.inc.php", {
        "partialPost": globalFilterSearchCurrentBids,
        "topFilterPost" : globalFilterTopFilterCurrentBids
    }, function (data) {
        $("#filterResultsCurrentBids").html(data);
    });

    $.post("/test/includes/postsCurrentBids.inc.php", {
    }, function (data) {
        $("#resultsCurrentBids").html(data);
    });
}
getPostsCurrentBids();


function getPostsFirst() {
    console.log("getPostFirst");
    globalScrollCount = 0;
    $.post("/test/includes/posts.inc.php", {
        "scrollCount" : globalScrollCount
    }, function (data) {
        $("#results").html(data);
    });
}
getPostsFirst();

function clearAllPosts() {
    console.log("clearAllPosts");
    topFunction();
    document.getElementById('topFilterDropdown').value = "endingSoonest";
    globalScrollCount = 0;
    globalFilterBrands = [];
    globalFilterSearch = [];
    globalFilterCategories = [];
    globalFilterDiscType = [];
    globalFilterNewUsed = [];
    globalFilterTopFilter = "";
    unCheck('all');
        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
        });
}


function getPostsScroll(value) {
    console.log("getPostsScroll");
        if(value != globalScrollCount){
            console.log("YEEEEEEP");
        }
        globalScrollCount = globalScrollCount + 1;
        $.post("/test/includes/posts.inc.php", {
            "scrollCount" : globalScrollCount,
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $('body').css({ overflow: 'auto' });
            $(".postsLoader").css("display","none");
            $('.postsLoaderContainer').css("display","none");
            $("#results").append(data);
        });
}



var searchTest;
function getPostsSearch() { 
    value = document.getElementById("searchBuypage").value;
    if (value != globalFilterSearch) {  
        console.log("getPostsSearch"); 
        globalScrollCount = 0;   
        globalFilterSearch = value;
        console.log("Search:", globalFilterSearch);
        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
            $( "#search1" ).keyup();
            searchTest = value;            
        });
    }
}


var searchTest2;
function getPostsSearchMyPosts(value) { 
    if (value != globalFilterSearchMyPosts) {  
        globalScrollCount = 0;   
        globalFilterSearchMyPosts = value;
        console.log("Search:", globalFilterSearchMyPosts);
        $.post("/test/includes/postsMyPostsFilter.inc.php", {
            "partialPost": globalFilterSearchMyPosts,
            "topFilterPost" : globalFilterTopFilterMyPosts
        }, function (data) {
            $("#filterResultsMyPosts").html(data);
        });
    
        $.post("/test/includes/postsMyPosts.inc.php", {
            "partialPost": globalFilterSearchMyPosts,
            "topFilterPost" : globalFilterTopFilterMyPosts
        }, function (data) {
            $("#resultsMyPosts").html(data);
            $( "#search1MyPosts" ).keyup();
            searchTest2 = value;            
        });
    }
}


var searchTest3;
function getPostsSearchCurrentBids(value) { 
    if (value != globalFilterSearchCurrentBids) {  
        globalScrollCount = 0;   
        globalFilterSearchCurrentBids = value;
        console.log("Search:", globalFilterSearchCurrentBids);
        $.post("/test/includes/postsCurrentBidsFilter.inc.php", {
            "partialPost": globalFilterSearchCurrentBids,
            "topFilterPost" : globalFilterTopFilterCurrentBids
        }, function (data) {
            $("#filterResultsCurrentBids").html(data);
        });
    
        $.post("/test/includes/postsCurrentBids.inc.php", {
            "partialPost": globalFilterSearchCurrentBids,
            "topFilterPost" : globalFilterTopFilterCurrentBids
        }, function (data) {
            $("#resultsCurrentBids").html(data);
            $( "#search1CurrentBids" ).keyup();
            searchTest3 = value;            
        });
    }
}


function getPostsBrands(value) {
    console.log("getPostsBrands");
    globalScrollCount = 0;
    if(globalFilterBrands.includes(value)){
        globalFilterBrands = globalFilterBrands.filter(function(e) { return e !== value });
    } else {
        globalFilterBrands.push(value);
    }
        console.log("Brands: ", globalFilterBrands);

        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);

        });
}

function getPostsCategories(value) {
    console.log("getPostCategories");
    globalScrollCount = 0;
    if(globalFilterCategories.includes(value)){
        globalFilterCategories = globalFilterCategories.filter(function(e) { return e !== value });
    } else {
        globalFilterCategories.push(value);
    }
        console.log("Categories: ",globalFilterCategories);

        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
        });
}

function getPostsDiscType(value) {
    console.log("getPostsDiscType");
    globalScrollCount = 0;
    if(globalFilterDiscType.includes(value)){
        globalFilterDiscType = globalFilterDiscType.filter(function(e) { return e !== value });
    } else {
        globalFilterDiscType.push(value);
    }
        console.log("DiscType: ", globalFilterDiscType);
        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
        });
}

function getPostsNewUsed(value) {
    console.log("getPostsNewUsed");
    if(globalFilterNewUsed.includes(value)){
        globalFilterNewUsed = globalFilterNewUsed.filter(function(e) { return e !== value });
    } else {
        globalFilterNewUsed.push(value);
    }
        console.log("NewUsed: ", globalFilterNewUsed);
        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
        });
}

function getPostsWinningLosing(value) {
    console.log("getPostsWinningLosing");
    if(globalFilterNewUsed.includes(value)){
        globalFilterNewUsed = globalFilterNewUsed.filter(function(e) { return e !== value });
    } else {
        globalFilterNewUsed.push(value);
    }
        console.log("NewUsed: ", globalFilterNewUsed);
        $.post("/test/includes/postsFilter.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#filterResults").html(data);
        });

        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
        });
}

function getPostsTopFilter(value) {
    console.log("getPostsTopFilter");
        globalScrollCount = 0;
        globalFilterTopFilter = value;
        console.log("TopFilter: ", globalFilterTopFilter);
        $.post("/test/includes/posts.inc.php", {
            "partialPost": globalFilterSearch,
            "brandsPost": globalFilterBrands,
            "categoryPost": globalFilterCategories,
            "discTypePost": globalFilterDiscType,
            "newUsedPost": globalFilterNewUsed,
            "topFilterPost" : globalFilterTopFilter,
            "pricePost" : globalFilterPrice,
            "weightPost" : globalFilterWeight,
            "qualityPost" : globalFilterQuality
        }, function (data) {
            $("#results").html(data);
        });
}

function getPostsTopFilterMyPosts(value) {
    console.log("getPostsTopFilterMyPosts");
        globalScrollCount = 0;
        globalFilterTopFilterMyPosts = value;

        console.log("TopFilter: ", globalFilterTopFilterMyPosts);
        $.post("/test/includes/postsMyPosts.inc.php", {
            "partialPost": globalFilterSearchMyPosts,
            "topFilterPost" : globalFilterTopFilterMyPosts
        }, function (data) {
            $("#resultsMyPosts").html(data);
        });
}

function getPostsTopFilterCurrentBids(value) {
    console.log("getPostsTopFilterCurrentBids");
        globalScrollCount = 0;
        globalFilterTopFilterCurrentBids = value;

        console.log("TopFilter: ", globalFilterTopFilterCurrentBids);
        $.post("/test/includes/postsCurrentBids.inc.php", {
            "partialPost": globalFilterSearchCurrentBids,
            "topFilterPost" : globalFilterTopFilterCurrentBids
        }, function (data) {
            $("#resultsCurrentBids").html(data);
        });
}

function loadContent() {
    document.getElementsByClassName('buyContent').style.width = '100%';
}

function refreshPage(){
    $(window).scrollTop(0);
    location.reload();
} 

var priceSliderCount = 0;
var PriceSlider = new rSlider({
    target: '#sliderPrice',
    values: {min: 1, max: 100},
    range: true, // range slider
    set:    null, // an array of preselected values
    width:    false,
    scale:    false,
    labels:   false,
    tooltip:  true,
    step:     1, // step size
    disabled: false, // is disabled?
    onChange: function (vals) {
        valsPrint = "$" + (vals.replace(/,/g , " - $"));
        var valsSplit = vals.split(",");
        if(valsSplit[1] == "100"){
            valsPrint = valsPrint + "+";
        }
        $("#resultsPrice").html(valsPrint);

        globalFilterPrice = valsSplit;
        globalScrollCount = 0;
        if(globalFilterPrice[0] != 1 || globalFilterPrice[1] != 100) {
            console.log("PriceSlider");
            $.post("/test/includes/postsFilter.inc.php", {
                "partialPost": globalFilterSearch,
                "brandsPost": globalFilterBrands,
                "categoryPost": globalFilterCategories,
                "discTypePost": globalFilterDiscType,
                "newUsedPost": globalFilterNewUsed,
                "topFilterPost" : globalFilterTopFilter,
                "pricePost" : globalFilterPrice,
                "weightPost" : globalFilterWeight,
                "qualityPost" : globalFilterQuality
            }, function (data) {
                $("#filterResults").html(data);
            });

            $.post("/test/includes/posts.inc.php", {
                "partialPost": globalFilterSearch,
                "brandsPost": globalFilterBrands,
                "categoryPost": globalFilterCategories,
                "discTypePost": globalFilterDiscType,
                "newUsedPost": globalFilterNewUsed,
                "topFilterPost" : globalFilterTopFilter,
                "pricePost" : globalFilterPrice,
                "weightPost" : globalFilterWeight,
                "qualityPost" : globalFilterQuality
            }, function (data) {
                $("#results").html(data);
            });
        } else {
            if(priceSliderCount != 0) {
                console.log("PriceSlider2");
                $.post("/test/includes/postsFilter.inc.php", {
                    "partialPost": globalFilterSearch,
                    "brandsPost": globalFilterBrands,
                    "categoryPost": globalFilterCategories,
                    "discTypePost": globalFilterDiscType,
                    "newUsedPost": globalFilterNewUsed,
                    "topFilterPost" : globalFilterTopFilter,
                    "pricePost" : globalFilterPrice,
                    "weightPost" : globalFilterWeight,
                    "qualityPost" : globalFilterQuality
                }, function (data) {
                    $("#filterResults").html(data);
                });

                $.post("/test/includes/posts.inc.php", {
                    "partialPost": globalFilterSearch,
                    "brandsPost": globalFilterBrands,
                    "categoryPost": globalFilterCategories,
                    "discTypePost": globalFilterDiscType,
                    "newUsedPost": globalFilterNewUsed,
                    "topFilterPost" : globalFilterTopFilter,
                    "pricePost" : globalFilterPrice,
                    "weightPost" : globalFilterWeight,
                    "qualityPost" : globalFilterQuality
                }, function (data) {
                    $("#results").html(data);
                });
            }
        }
        priceSliderCount++;
    }
});

var weightSliderCount = 0;
var WeightSlider = new rSlider({
    target: '#sliderWeight',
    values: {min: 130, max: 200},
    range: true, // range slider
    set:    null, // an array of preselected values
    width:    false,
    scale:    false,
    labels:   false,
    tooltip:  true,
    step:     1, // step size
    disabled: false, // is disabled?
    onChange: function (vals) {
        valsPrint = (vals.replace(/,/g , "g - "));
        var valsSplit = vals.split(",");
        valsPrint = valsPrint + "g";
        globalScrollCount = 0;
        $("#resultsWeight").html(valsPrint);

        globalFilterWeight = valsSplit;
        if(globalFilterWeight[0] != 130 || globalFilterWeight[1] != 200) {
            console.log("WeightSlider");
            $.post("/test/includes/postsFilter.inc.php", {
                "partialPost": globalFilterSearch,
                "brandsPost": globalFilterBrands,
                "categoryPost": globalFilterCategories,
                "discTypePost": globalFilterDiscType,
                "newUsedPost": globalFilterNewUsed,
                "topFilterPost" : globalFilterTopFilter,
                "pricePost" : globalFilterPrice,
                "weightPost" : globalFilterWeight,
                "qualityPost" : globalFilterQuality
            }, function (data) {
                $("#filterResults").html(data);
            });

            $.post("/test/includes/posts.inc.php", {
                "partialPost": globalFilterSearch,
                "brandsPost": globalFilterBrands,
                "categoryPost": globalFilterCategories,
                "discTypePost": globalFilterDiscType,
                "newUsedPost": globalFilterNewUsed,
                "topFilterPost" : globalFilterTopFilter,
                "pricePost" : globalFilterPrice,
                "weightPost" : globalFilterWeight,
                "qualityPost" : globalFilterQuality
            }, function (data) {
                $("#results").html(data);
            });
        } else {
            if (weightSliderCount != 0) {
                console.log("WeightSlider2");
                $.post("/test/includes/postsFilter.inc.php", {
                    "partialPost": globalFilterSearch,
                    "brandsPost": globalFilterBrands,
                    "categoryPost": globalFilterCategories,
                    "discTypePost": globalFilterDiscType,
                    "newUsedPost": globalFilterNewUsed,
                    "topFilterPost" : globalFilterTopFilter,
                    "pricePost" : globalFilterPrice,
                    "weightPost" : globalFilterWeight,
                    "qualityPost" : globalFilterQuality
                }, function (data) {
                    $("#filterResults").html(data);
                });

                $.post("/test/includes/posts.inc.php", {
                    "partialPost": globalFilterSearch,
                    "brandsPost": globalFilterBrands,
                    "categoryPost": globalFilterCategories,
                    "discTypePost": globalFilterDiscType,
                    "newUsedPost": globalFilterNewUsed,
                    "topFilterPost" : globalFilterTopFilter,
                    "pricePost" : globalFilterPrice,
                    "weightPost" : globalFilterWeight,
                    "qualityPost" : globalFilterQuality
                }, function (data) {
                    $("#results").html(data);
                });
            }
        }
        weightSliderCount++;

    }
});

var qualitySliderCount = 0;
var QualitySlider = new rSlider({
    target: '#sliderQuality',
    values: {min: 1, max: 10},
    range: true, // range slider
    set:    null, // an array of preselected values
    width:    false,
    scale:    false,
    labels:   false,
    tooltip:  true,
    step:     1, // step size
    disabled: false, // is disabled?
    onChange: function (vals) {
        valsPrint = (vals.replace(/,/g , " - "));
        var valsSplit = vals.split(",");
        globalScrollCount = 0;
        $("#resultsQuality").html(valsPrint);

        globalFilterQuality = valsSplit;
        if(globalFilterQuality[0] != 1 || globalFilterQuality[1] != 10) {
            console.log("QualitySlider");
            $.post("/test/includes/postsFilter.inc.php", {
                "partialPost": globalFilterSearch,
                "brandsPost": globalFilterBrands,
                "categoryPost": globalFilterCategories,
                "discTypePost": globalFilterDiscType,
                "newUsedPost": globalFilterNewUsed,
                "topFilterPost" : globalFilterTopFilter,
                "pricePost" : globalFilterPrice,
                "weightPost" : globalFilterWeight,
                "qualityPost" : globalFilterQuality
            }, function (data) {
                $("#filterResults").html(data);
            });

            $.post("/test/includes/posts.inc.php", {
                "partialPost": globalFilterSearch,
                "brandsPost": globalFilterBrands,
                "categoryPost": globalFilterCategories,
                "discTypePost": globalFilterDiscType,
                "newUsedPost": globalFilterNewUsed,
                "topFilterPost" : globalFilterTopFilter,
                "pricePost" : globalFilterPrice,
                "weightPost" : globalFilterWeight,
                "qualityPost" : globalFilterQuality
            }, function (data) {
                $("#results").html(data);
            });
        } else {
            if(qualitySliderCount !=0) {
                console.log("QualitySlider2");
                $.post("/test/includes/postsFilter.inc.php", {
                    "partialPost": globalFilterSearch,
                    "brandsPost": globalFilterBrands,
                    "categoryPost": globalFilterCategories,
                    "discTypePost": globalFilterDiscType,
                    "newUsedPost": globalFilterNewUsed,
                    "topFilterPost" : globalFilterTopFilter,
                    "pricePost" : globalFilterPrice,
                    "weightPost" : globalFilterWeight,
                    "qualityPost" : globalFilterQuality
                }, function (data) {
                    $("#filterResults").html(data);
                });

                $.post("/test/includes/posts.inc.php", {
                    "partialPost": globalFilterSearch,
                    "brandsPost": globalFilterBrands,
                    "categoryPost": globalFilterCategories,
                    "discTypePost": globalFilterDiscType,
                    "newUsedPost": globalFilterNewUsed,
                    "topFilterPost" : globalFilterTopFilter,
                    "pricePost" : globalFilterPrice,
                    "weightPost" : globalFilterWeight,
                    "qualityPost" : globalFilterQuality
                }, function (data) {
                    $("#results").html(data);
                });
            }
        }
        qualitySliderCount++;
    }
});

function closePost() {
    var start = document.getElementById("filterBox").scrollHeight;
    if (window.scrollY > start) {
        $('#toTopButton').attr("style", "display: block");
        $('#toTopButton').attr("style", "bottom: 3em");


    } else {
        $('#toTopButton').attr("style", "display: none");
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    var body = $("html, body");
    body.stop().animate({scrollTop:0}, 500, 'swing', function() {
    });
}

// When the user clicks on the button, scroll to the top of the document
function topFunctionRefresh() {
    var body = $("html, body");
    body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
    });
}


$('.filterItem').on('click','input:checkbox[name=filterCheckbox]', function(e){
        e.stopPropagation();
        var $checks = $(this).find('input:checkbox[name=filterCheckbox]');
        $checks.prop("checked", !$checks.is(":checked"));
        $checks.change();
});
$('.filterItem').on('click', function(e){
        e.stopPropagation();
        var $checks = $(this).find('input:checkbox[name=filterCheckbox]');
        $checks.prop("checked", !$checks.is(":checked"));
        $checks.change();
});


var keynum, lines = 1;

      function limitLines(obj, e) {
        // IE
        if(window.event) {
          keynum = e.keyCode;
        // Netscape/Firefox/Opera
        } else if(e.which) {
          keynum = e.which;
        }

        if(keynum == 13) {
          if(lines == obj.rows) {
            return false;
          }else{
            lines++;
          }
        }
      }

function unCheck(value) {
    if(value == 'innova' || value == 'discraft' || value == 'dynamic' || value == 'latitude' || value == 'westside' || value == 'discmania' || value == 'prodigy' || value == 'mvp' || value == 'gateway' || value == 'otherBrand'){
        $box = "#" + value;
        $($box).prop( "checked", false );
        getPostsBrands(value);
    }
    if (value == 'disc' || value == 'bag' || value == 'apparel' || value == 'basket' || value == 'shoes' || value == 'accessory') {
        $box2 = "#" + value;
        $($box2).prop( "checked", false );
        getPostsCategories(value);
    }
    if (value == 'driver' || value == 'fairway' || value == 'midrange' || value == 'putter') {
        $box3 = "#" + value;
        $($box3).prop( "checked", false );
        getPostsDiscType(value);
    }
    if (value == 'new' || value == 'used') {
        $box4 = "#" + value;
        $($box4).prop( "checked", false );
        getPostsNewUsed(value);
    }
    if (value == 'winning' || value == 'losing') {
        $box5 = "#" + value;
        $($box5).prop( "checked", false );
        getPostsWinningLosing(value);
    }

    if (value == 'all') {
        $("#innova").prop( "checked", false );
        $("#discraft").prop( "checked", false );
        $("#dynamic").prop( "checked", false );
        $("#latitude").prop( "checked", false );
        $("#westside").prop( "checked", false );
        $("#discmania").prop( "checked", false );
        $("#prodigy").prop( "checked", false );
        $("#mvp").prop( "checked", false );
        $("#gateway").prop( "checked", false );
        $("#otherBrand").prop( "checked", false );

        $("#disc").prop( "checked", false );
        $("#bag").prop( "checked", false );
        $("#apparel").prop( "checked", false );
        $("#basket").prop( "checked", false );
        $("#shoes").prop( "checked", false );
        $("#accessory").prop( "checked", false );

        $("#driver").prop( "checked", false );
        $("#fairway").prop( "checked", false );
        $("#midrange").prop( "checked", false );
        $("#putter").prop( "checked", false );

        $("#new").prop( "checked", false );
        $("#used").prop( "checked", false );

        unSearch();
        unSliderPrice();
        unSliderWeight();
        unSliderQuality();
        
    }
}

function unSearch(){
    $('#searchBuypage').val('');
    getPostsSearch();
}

function unSearchMyPosts(){
    $('#search1MyPosts').val('');
    getPostsSearchMyPosts();
}

function unSearchCurrentBids(){
    $('#search1CurrentBids').val('');
    getPostsSearchCurrentBids();
}

function unSliderPrice(){
    PriceSlider.setValues(1, 100);
}

function unSliderWeight(){
    WeightSlider.setValues(130,200);
}

function unSliderQuality(){
    QualitySlider.setValues(1,10);
}



var dimmer = $('.dimmer');
var loginDiv = $('.loginDiv');
var exit = $('.exit');
var forgotPassword = $('.forgotPassword');
var newAccount = $('.newAccount');
var termsOfService = $('.termsOfService');
var dimmer2 = $('.dimmer2');
var mobileMenu = $('.dropdownMenu');

$('.forgot').click( function(e) {
    console.log("Open: Forgot Password");
    $('.forgotPassword').show();
})

$('.forgot2').click( function(e) {
    console.log("Close: Forgot Password");
    $('.forgotPassword').hide();
})

$('.terms').click( function(e) {
    console.log("Open: Terms of Service");
    setTimeout(function(){ $('.termsOfService').scrollTop(0); });
    $('.termsOfService').show();
})

$('.terms2').click( function(e) {
    console.log("Close: Terms of Service");
    $('.termsOfService').hide();
})

$('.close-thik3').click( function(e) {
    console.log("Close: New Account");
    window.history.replaceState({}, document.title, "/");
    dimmer2.hide();
    newAccount.hide();
})

$('.close-thik2').click( function(e) {
    console.log("Close: Terms of Service");
    $('.termsOfService').hide();
})


$('.close-thik').click( function(e) {
    console.log("Close: Forgot Password");
    $('.forgotPassword').hide();
})

$('a#loginToggle').click( function(e) {
    e.preventDefault();
    mobileMenu.hide();
    dimmer.show();
    loginDiv.show();
    $('html, body').css("overflow","hidden");
    console.log("Show Login");

})

$('.dimmer').click( function(e) {
    e.preventDefault();
    dimmer.hide();
    loginDiv.hide();
    forgotPassword.hide();
    termsOfService.hide();
    $('html, body').css("overflow","auto");
    console.log("Hide Login");

})

$('.dimmer2').click( function(e) {
    e.preventDefault();
    window.history.replaceState({}, document.title, "/");
    dimmer2.hide();
    newAccount.hide();
    $('html, body').css("overflow","auto");
    console.log("Hide New Account");

})

grecaptcha.ready(function() {
    //grecaptcha.execute('6LdrEYoUAAAAACql8qTRAYI-QUhq9cSM_wiYsa70', {action: 'action_name'}).then(function(token) {
    // Verify the token on the server.
    //});
});





