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
var globalFilterTopFilter;
var count;

$( document ).ready(function() {
    var text_max = 250;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
})

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

function getPostsFirst() {
    $.post("includes/posts.inc.php", {
    }, function (data) {
        $("#results").html(data);
    });
}
window.onload = getPostsFirst;

function getPostsSearch(value) {
        globalFilterSearch = value;
        console.log("Search:", globalFilterSearch);
        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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

function getPostsBrands(value) {
    if(globalFilterBrands.includes(value)){
        globalFilterBrands = globalFilterBrands.filter(function(e) { return e !== value });
    } else {
        globalFilterBrands.push(value);
    }
        console.log("Brands: ", globalFilterBrands);

        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
    if(globalFilterCategories.includes(value)){
        globalFilterCategories = globalFilterCategories.filter(function(e) { return e !== value });
    } else {
        globalFilterCategories.push(value);
    }
        console.log("Categories: ",globalFilterCategories);

        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
    if(globalFilterDiscType.includes(value)){
        globalFilterDiscType = globalFilterDiscType.filter(function(e) { return e !== value });
    } else {
        globalFilterDiscType.push(value);
    }
        console.log("DiscType: ", globalFilterDiscType);
        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
    if(globalFilterNewUsed.includes(value)){
        globalFilterNewUsed = globalFilterNewUsed.filter(function(e) { return e !== value });
    } else {
        globalFilterNewUsed.push(value);
    }
        console.log("NewUsed: ", globalFilterNewUsed);
        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
        globalFilterTopFilter = value;
        console.log("TopFilter: ", globalFilterTopFilter);
        $.post("includes/posts.inc.php", {
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



function refreshPage(){
    $(window).scrollTop(0);
    location.reload();
} 

var PriceSlider = new rSlider({
    target: '#sliderPrice',
    values: {min: 1, max: 200},
    range: true, // range slider
    set:    null, // an array of preselected values
    width:    false,
    scale:    false,
    labels:   false,
    tooltip:  true,
    step:     1, // step size
    disabled: false, // is disabled?
    onChange: function (vals) {
        console.log(vals);
        valsPrint = "$" + (vals.replace(/,/g , " - $"));
        var valsSplit = vals.split(",");
        if(valsSplit[1] == "200"){
            valsPrint = valsPrint + "+";
        }
        $("#resultsPrice").html(valsPrint);
        console.log(valsSplit);

        globalFilterPrice = valsSplit;
        console.log("Price: ", globalFilterPrice);
        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
});

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
        console.log(vals);
        valsPrint = (vals.replace(/,/g , "g - "));
        var valsSplit = vals.split(",");
        valsPrint = valsPrint + "g";
        if(valsSplit[1] == "200"){
            valsPrint = valsPrint + "+";
        }
        
        $("#resultsWeight").html(valsPrint);
        console.log(valsSplit);

        globalFilterWeight = valsSplit;
        console.log("Weight: ", globalFilterWeight);
        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
});

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
        console.log(vals);
        valsPrint = (vals.replace(/,/g , " - "));
        var valsSplit = vals.split(",");
        
        $("#resultsQuality").html(valsPrint);
        console.log(valsSplit);

        globalFilterQuality = valsSplit;
        console.log("Quality: ", globalFilterQuality);
        $.post("includes/postsFilter.inc.php", {
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

        $.post("includes/posts.inc.php", {
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
});

function scrollFunction() {
    var start = document.getElementById("filterBox").scrollHeight;
    if (document.body.scrollTop > start || document.documentElement.scrollTop > start) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    var body = $("html, body");
    body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
    });
}

function getPostModal(postId) {    
	console.log(postId);
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
}

function unSearch(){
    $('#search1').val("");
    getPostsSearch("");
}

function unSliderPrice(){
    PriceSlider.setValues(1,200);
}

function unSliderWeight(){
    WeightSlider.setValues(130,200);
}

function unSliderQuality(){
    QualitySlider.setValues(1,10);
}

