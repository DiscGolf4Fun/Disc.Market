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

    $('#sellDescription').keyup(function() {
        var text_length = $('#sellDescription').val().length;
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
        var start = document.getElementsByClassName('filter2');
        start = start[0].offsetHeight;
        if (scrolled1 <= scrolled3) { 
            scrolled1 = window.innerHeight + window.scrollY;
            scrolled2 = document.body.offsetHeight;
            scrolled3 = scrolled2 - 100;
            if($("#footer-wrapper").is(":hidden")) { 
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
        if (window.scrollY > start + 500) {
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
        $(".filterButton").css("margin-top","0");
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
            $("#results").css("margin-top","0");
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
            $("#results").css("margin-top","0");
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
            $("#results").css("margin-top","0");
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
            if(globalFilterSearch.length === 0 && 
                globalFilterBrands.length === 0 && 
                globalFilterCategories.length === 0 && 
                globalFilterDiscType.length === 0 && 
                globalFilterNewUsed.length === 0 && 
                globalFilterTopFilter.length === 0 && 
                globalFilterPrice.length === 0 && 
                globalFilterWeight.length === 0 && 
                globalFilterQuality.length === 0) {
                $(".filterButton").css("margin-top","0");
                $("#results").css("margin-top","50px");
                
            } else {
                $(".filterButton").css("margin-top","50px");
                $("#results").css("margin-top","0px");
            }
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
            if(globalFilterSearch.length === 0 && 
                globalFilterBrands.length === 0 && 
                globalFilterCategories.length === 0 && 
                globalFilterDiscType.length === 0 && 
                globalFilterNewUsed.length === 0 && 
                globalFilterTopFilter.length === 0 && 
                globalFilterPrice.length === 0 && 
                globalFilterWeight.length === 0 && 
                globalFilterQuality.length === 0) {
                    if ($(window).width() < 737) {
                        $(".filterButton").css("margin-top","0");
                        $("#results").css("margin-top","0");
                     }
                     else {
                        $(".filterButton").css("margin-top","50px");
                        $("#results").css("margin-top","50px");
                     }
                
                
            } else {
                if ($(window).width() < 737) {
                    $(".filterButton").css("margin-top","0");
                    $("#results").css("margin-top","0px");
                 }
                 else {
                    $(".filterButton").css("margin-top","50px");
                    $("#results").css("margin-top","0px");
                 }
            }
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
            if(globalFilterSearch.length === 0 && 
                globalFilterBrands.length === 0 && 
                globalFilterCategories.length === 0 && 
                globalFilterDiscType.length === 0 && 
                globalFilterNewUsed.length === 0 && 
                globalFilterTopFilter.length === 0 && 
                globalFilterPrice.length === 0 && 
                globalFilterWeight.length === 0 && 
                globalFilterQuality.length === 0) {
                $(".filterButton").css("margin-top","0");
                $("#results").css("margin-top","50px");
                
            } else {
                $(".filterButton").css("margin-top","50px");
                $("#results").css("margin-top","0px");
            }
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
            if(globalFilterSearch.length === 0 && 
                globalFilterBrands.length === 0 && 
                globalFilterCategories.length === 0 && 
                globalFilterDiscType.length === 0 && 
                globalFilterNewUsed.length === 0 && 
                globalFilterTopFilter.length === 0 && 
                globalFilterPrice.length === 0 && 
                globalFilterWeight.length === 0 && 
                globalFilterQuality.length === 0) {
                $(".filterButton").css("margin-top","0");
                $("#results").css("margin-top","50px");
                
            } else {
                $(".filterButton").css("margin-top","50px");
                $("#results").css("margin-top","0px");
            }
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
            if(globalFilterSearch.length === 0 && 
                globalFilterBrands.length === 0 && 
                globalFilterCategories.length === 0 && 
                globalFilterDiscType.length === 0 && 
                globalFilterNewUsed.length === 0 && 
                globalFilterTopFilter.length === 0 && 
                globalFilterPrice.length === 0 && 
                globalFilterWeight.length === 0 && 
                globalFilterQuality.length === 0) {
                $(".filterButton").css("margin-top","0");
                $("#results").css("margin-top","50px");
                
            } else {
                $(".filterButton").css("margin-top","50px");
                $("#results").css("margin-top","0px");
            }
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
            if(globalFilterSearch.length === 0 && 
                globalFilterBrands.length === 0 && 
                globalFilterCategories.length === 0 && 
                globalFilterDiscType.length === 0 && 
                globalFilterNewUsed.length === 0 && 
                globalFilterTopFilter.length === 0 && 
                globalFilterPrice.length === 0 && 
                globalFilterWeight.length === 0 && 
                globalFilterQuality.length === 0) {
                $(".filterButton").css("margin-top","0");
                $("#results").css("margin-top","50px");
                
            } else {
                $(".filterButton").css("margin-top","50px");
                $("#results").css("margin-top","0px");
            }
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
            $("#results").css("margin-top","0");
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
            $("#results").css("margin-top","0");
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

var priceSliderCountMobile = 0;
var PriceSliderMobile = new rSlider({
    target: '#sliderPriceMobile',
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
            if(priceSliderCountMobile != 0) {
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
        priceSliderCountMobile++;
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

var weightSliderCountMobile = 0;
var WeightSliderMobile = new rSlider({
    target: '#sliderWeightMobile',
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
            if (weightSliderCountMobile != 0) {
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
        weightSliderCountMobile++;

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

var qualitySliderCountMobile = 0;
var QualitySliderMobile = new rSlider({
    target: '#sliderQualityMobile',
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
            if(qualitySliderCountMobile !=0) {
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
        qualitySliderCountMobile++;
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

// When the user clicks to go to the Sell Images page it checks the form and shows the images page
function sellImages() {
    var sellTitle = document.getElementById('sellTitle').value;
    var sellCategory = document.getElementById('category').value;
    var sellDescription = document.getElementById('sellDescription').value;
    var sellNewused = document.getElementById('newUsed').value;
    var sellQuality = document.getElementById('quality').value;
    var sellBrand = document.getElementById('brand').value;
    var sellBrandOther = document.getElementById('sellOtherBrand').value;
    var sellMinbid = document.getElementById('sellMinbid').value;
    var sellDiscweight = document.getElementById('sellDiscweight').value;
    var sellDiscplastic = document.getElementById('sellDiscplastic').value;
    var sellDisccolor = document.getElementById('sellDisccolor').value;
    var sellDiscname = document.getElementById('sellDiscname').value;
    var sellDiscink = document.getElementById('sellDiscink').value;
    var sellBagcolor = document.getElementById('sellBagcolor').value;
    var sellApparelsize = document.getElementById('sellApparelsize').value;
    var sellApparelcolor = document.getElementById('sellApparelcolor').value;
    var sellBasketmodel = document.getElementById('sellBasketmodel').value;
    var sellShoesize = document.getElementById('sellShoesize').value;
    var sellShoegender = document.getElementById('sellShoegender').value;

    /*

    if( sellMinbid === "" ) {
        $("#sellMinbid").css('border','2px solid red');
        $("#noMinbid").css('display','block');
        $('div.sellMinBid')[0].scrollIntoView();
    } else {
        $("#sellMinbid").css('border','1px solid black');
        $("#noMinbid").css('display','none;');
    }

    if(sellBrand === "Other"){
        if( sellBrandOther === "") {
            $("#sellOtherBrand").css('border','2px solid red');
            $("#noBrandOther").css('display','block');
            $('div#otherBrand')[0].scrollIntoView();
        } else {
            $("#sellOtherBrand").css('border','1px solid black');
            $("#noBrandOther").css('display','none');
        }
    }

    if( sellBrand === "" ) {
        $("#sellBrand").css('border','2px solid red');
        $("#noBrand").css('display','block');
        $('div.sellBrand')[0].scrollIntoView();
    } else {
        $("#sellBrand").css('border','1px solid black');
        $("#noBrand").css('display','none');
    } 

    if( sellQuality === "" ) {
        $("#sellQuality").css('border','2px solid red');
        $("#noQuality").css('display','block');
        $('div.sellQuality')[0].scrollIntoView();
    } else {
        $("#sellQuality").css('border','1px solid black');
        $("#noQuality").css('display','none');
    } 
    
    if( sellNewused === "" ) {
        $("#sellNewused").css('border','2px solid red');
        $("#noNewused").css('display','block');
        $('div.sellNewused')[0].scrollIntoView();
    } else {
        $("#sellNewused").css('border','1px solid black');
        $("#noNewused").css('display','none');
    }   

    if( sellDescription === "" ) {
        $("#sellDescription").css('border','2px solid red');
        $("#noDescription").css('display','inline-block');
        $('div.sellDescription')[0].scrollIntoView();
    } else {
        $("#noDescription").css('display','none');
        $("#sellDescription").css('border','1px solid black');
    } 

    if( sellCategory === "" ) {
        $("#sellCategory").css('border','2px solid red');
        $("#noCategoryMessage").css('display','block');
        $('div.sellCategory')[0].scrollIntoView();
    } else if( sellCategory === "Shoes") {
        if( sellShoesize === "" ) {
            $("#sellShoesize").css('border','2px solid red');
            $("#noShoesize").css('display','block');
            $('div.shoeSize')[0].scrollIntoView();
        } else {
            $("#sellShoesize").css('border','1px solid black');
            $("#noShoesize").css('display','none');
        } 
        if( sellShoegender === "" ) {
            $("#sellShoegender").css('border','2px solid red');
            $("#noShoegender").css('display','block');
            $('div.shoeGender')[0].scrollIntoView();
        } else {
            $("#sellShoegender").css('border','1px solid black');
            $("#noShoegender").css('display','none');
        }  
    } else if( sellCategory === "Basket") {
        if( sellBasketmodel === "" ) {
            $("#sellBasketmodel").css('border','2px solid red');
            $("#noBasketmodel").css('display','block');
            $('div.basketModel')[0].scrollIntoView();
        } else {
            $("#sellBasketmodel").css('border','1px solid black');
            $("#noBasketmodel").css('display','none');
        }  
    } else if( sellCategory === "Apparel") {
        if( sellApparelcolor === "" ) {
            $("#sellApparelcolor").css('border','2px solid red');
            $("#noApparelcolor").css('display','block');
            $('div.apparelColor')[0].scrollIntoView();
        } else {
            $("#sellApparelcolor").css('border','1px solid black');
            $("#noApparelcolor").css('display','none');
        } 
        if( sellApparelsize === "" ) {
            $("#sellApparelsize").css('border','2px solid red');
            $("#noApparelsize").css('display','block');
            $('div.apparelSize')[0].scrollIntoView();
        } else {
            $("#sellApparelsize").css('border','1px solid black');
            $("#noApparelsize").css('display','none');
        }  
    } else if( sellCategory === "Bag") {
        if( sellBagcolor === "" ) {
            $("#sellBagcolor").css('border','2px solid red');
            $("#noBagcolor").css('display','block');
            $('div.bagColor')[0].scrollIntoView();
        } else {
            $("#sellBagcolor").css('border','1px solid black');
            $("#noBagcolor").css('display','none');
        }  
    } else if( sellCategory === "Disc") {
        if( sellDiscink === "" ) {
            $("#sellDiscink").css('border','2px solid red');
            $("#noDiscink").css('display','block');
            $('div.discInk')[0].scrollIntoView();
        } else {
            $("#sellDiscink").css('border','1px solid black');
            $("#noDiscink").css('display','none');
        } 
        if( sellDiscname === "" ) {
            $("#sellDiscname").css('border','2px solid red');
            $("#noDiscname").css('display','block');
            $('div.discName')[0].scrollIntoView();
        } else {
            $("#sellDiscname").css('border','1px solid black');
            $("#noDiscname").css('display','none');
        } 
        if( sellDisccolor === "" ) {
            $("#sellDisccolor").css('border','2px solid red');
            $("#noDisccolor").css('display','block');
            $('div.discColor')[0].scrollIntoView();
        } else {
            $("#sellDisccolor").css('border','1px solid black');
            $("#noDisccolor").css('display','none');
        } 
        if( sellDiscplastic === "" ) {
            $("#sellDiscplastic").css('border','2px solid red');
            $("#noDiscplastic").css('display','block');
            $('div.discPlastic')[0].scrollIntoView();
        } else {
            $("#sellDiscplastic").css('border','1px solid black');
            $("#noDiscplastic").css('display','none');
        } 
        if( sellDiscweight === "" ) {
            $("#sellDiscweight").css('border','2px solid red');
            $("#noDiscweight").css('display','block');
            $('div.discWeight')[0].scrollIntoView();
        } else {
            $("#sellDiscweight").css('border','1px solid black');
            $("#noDiscweight").css('display','none');
        } 
    } else {
        $("#noCategory").css('display','none');
        $("#sellCategory").css('border','1px solid black');
    }

    if( sellTitle.length === 0 ) {
        $("#sellTitle").css('border','2px solid red');
        $("#noTitle").css('display','block');
        $('div.sellTitle')[0].scrollIntoView();
    } else {
        $("#sellTitle").css('border','1px solid black');
        $("#noTitle").css('display','none');
    }

    // Go to images page if all information is filled out
    if (sellTitle.length !==0 &&
    sellCategory !== "" &&
    sellDescription !== "" &&
    sellNewused !== "" &&
    sellQuality !== "" &&
    sellBrand !== "" &&
    sellMinbid !== "") {

        if(sellBrand === "Other"){
            if(sellBrandOther !== "") {
                $(".sellInfoform").css('display','none');
                return;
            }
        }

        if(sellCategory === "Disc") {
            if(sellDiscweight !== "" &&
                sellDiscplastic !== "" &&
                sellDisccolor !== "" &&
                sellDiscname !== "" &&
                sellDiscink !== ""){
                    $(".sellInfoform").css('display','none');
                    $(".sellImagesform").css('display','block');
                    return;
            }
        } 
        if(sellCategory === "Bag") {
            if(sellBagcolor !== "") {
                $(".sellInfoform").css('display','none');
                $(".sellImagesform").css('display','block');
                return;
            }
        }
        if(sellCategory === "Apparel") {
            if(sellApparelsize !== "" &&
                sellApparelcolor !== "") {
                    $(".sellInfoform").css('display','none');
                    $(".sellImagesform").css('display','block');
                    return;
            }
        }
        if(sellCategory === "Basket") {
            if(sellBasketmodel !== "") {
                $(".sellInfoform").css('display','none');
                $(".sellImagesform").css('display','block');
                return;
            }
        }
        if(sellCategory === "Shoes") {
            if(sellShoesize !== "" &&
                sellShoegender !== "") {
                    $(".sellInfoform").css('display','none');
                    $(".sellImagesform").css('display','block');
                    return;
            }
        }
        
        $(".sellInfoform").css('display','none');
        $(".sellImagesform").css('display','block');
    }
    */
    $(".sellInfoform").css('display','none');
    $(".sellImagesform").css('display','block');
    document.getElementById('main-wrapper').scrollIntoView();


}

function backSellInfo() {
    $(".sellImagesform").css('display','none');
    $(".sellInfoform").css('display','block');
    document.getElementById('main-wrapper').scrollIntoView();
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

function unCheck(value, value2) {
    if(value == 'innova' || value == 'discraft' || value == 'dynamic' || value == 'latitude' || value == 'westside' || value == 'discmania' || value == 'prodigy' || value == 'mvp' || value == 'gateway' || value == 'otherBrand' || value == 'hyzerbomb' || value == 'kastaplast' || value == 'dga' || value == 'milenium' || value == 'legacy' || value == 'fullturn' || value == 'elevation'){
        value2.remove();
        $('input#' + value).not(this).prop('checked', false);
        getPostsBrands(value);
    }
    if (value == 'disc' || value == 'bag' || value == 'apparel' || value == 'basket' || value == 'shoes' || value == 'accessory') {
        value2.remove();
        $('input#' + value).not(this).prop('checked', false);
        getPostsCategories(value);
    }
    if (value == 'driver' || value == 'fairway' || value == 'midrange' || value == 'putter') {
        value2.remove();
        $('input#' + value).not(this).prop('checked', false);
        getPostsDiscType(value);
    }
    if (value == 'new' || value == 'used') {
        value2.remove();
        $('input#' + value).not(this).prop('checked', false);
        getPostsNewUsed(value);
    }
    if (value == 'winning' || value == 'losing') {
        value2.remove();
        $('input#' + value).not(this).prop('checked', false);
        getPostsWinningLosing(value);
    }

    if (value == 'all') {
        $('input#innova').not(this).prop('checked', false);
        $('input#discraft').not(this).prop('checked', false);
        $('input#dynamic').not(this).prop('checked', false);
        $('input#latitude').not(this).prop('checked', false);
        $('input#westside').not(this).prop('checked', false);
        $('input#discmania').not(this).prop('checked', false);
        $('input#prodigy').not(this).prop('checked', false);
        $('input#mvp').not(this).prop('checked', false);
        $('input#gateway').not(this).prop('checked', false);
        $('input#hyzerbomb').not(this).prop('checked', false);
        $('input#dga').not(this).prop('checked', false);
        $('input#milenium').not(this).prop('checked', false);
        $('input#legacy').not(this).prop('checked', false);
        $('input#kastaplast').not(this).prop('checked', false);
        $('input#fullturn').not(this).prop('checked', false);
        $('input#elevation').not(this).prop('checked', false);
        $('input#otherBrand').not(this).prop('checked', false);

        $('input#disc').not(this).prop('checked', false);
        $('input#bag').not(this).prop('checked', false);
        $('input#apparel').not(this).prop('checked', false);
        $('input#basket').not(this).prop('checked', false);
        $('input#shoes').not(this).prop('checked', false);
        $('input#accessory').not(this).prop('checked', false);

        $('input#driver').not(this).prop('checked', false);
        $('input#fairway').not(this).prop('checked', false);
        $('input#midrange').not(this).prop('checked', false);
        $('input#putter').not(this).prop('checked', false);

        $('input#new').not(this).prop('checked', false);
        $('input#used').not(this).prop('checked', false);

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

$('.filterButtonMobile').click( function(e) {
    console.log("Open1: Mobile Filters");
    setTimeout(function(){ $('.filterPopup').scrollTop(0); });
    $('html').attr("style", "height: 100%;", "overflow: hidden;");
    $('body').attr("style", "height: 100%;", "overflow: hidden;");
    $('.filterPopup').show();
})


$('.filterMobileClose2').click( function(e) {
    console.log("Close: Mobile Filters");
    $('html').attr("style", "height: auto;", "overflow: auto;");
    $('body').attr("style", "height: auto;", "overflow: auto;");
    $('.filterPopup').hide();
})

// This function is used when the MoreBrands button is clicked in the buy page filter.
function moreBrands() {
    $('.moreBrands').replaceWith('<a onclick="lessBrands()" class="lessBrands" style="color: #0a7e07; font-weight: 600;">Less Brands&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-up"></i></a>');
    $('.filterItem.hide').attr("style", "display: block;");
}
function lessBrands() {
    $('.lessBrands').replaceWith('<a onclick="moreBrands()" class="moreBrands" style="color: #0a7e07; font-weight: 600;">More Brands&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>');
    $('.filterItem.hide').attr("style", "display: none;");
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

$('.close-thik4').click( function(e) {
    console.log("Close: Filter Mobile");
    $('.filterPopup').hide();
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

$('a#loginToggle2').click( function(e) {
    e.preventDefault();
    mobileMenu.show();
    dimmer.hide();
    loginDiv.hide();
    $('html, body').css("overflow","auto");
    console.log("Close Login");
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

$('.save-modal').click( function(e) {
    $('#confirm-img').css("display","block");
    $('.imageNormal').css("display","none");
    $('.imageUploaded').css("display","block");

});







