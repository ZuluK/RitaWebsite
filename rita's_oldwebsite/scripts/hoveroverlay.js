var $el, $tempDiv, $tempButton, divHeight = 0;

$.fn.middleBoxButton = function(text, url) {
    
    return this.hover(function(e) {
    
        $el = $(this).css("border-color", "white");
        divHeight = $el.height() + parseInt($el.css("padding-top")) + parseInt($el.css("padding-bottom"));
                
        $tempDiv = $("<div />", {
            "class": "overlay rounded"
        });
                
        $tempButton = $("<a />", {
            "href": url,
            "text": text,
            "class": "widget-button rounded",
            "css": {
                "top": (divHeight / 2) - 7 + "px"
            }
        }).appendTo($tempDiv);
                
        $tempDiv.appendTo($el);
        
    }, function(e) {
    
        $el = $(this).css("border-color", "#999");
    
        $(".overlay").fadeOut("fast", function() {
            $(this).remove();
        })
    
    });
    
}

$(function() {
    
    $(".widget-one").middleBoxButton("View Flow Map Page", "http://scottDscott.com/flowmaps_apparel_LSN_w2w.php");
	$(".widget-two").middleBoxButton("View Use Case Page", "http://scottDscott.com/usecase_Landlord.php");
	$(".widget-three").middleBoxButton("View Wireframe Page", "http://scottDscott.com/wireframes_dTank_CAN.php");
	$(".widget-four").middleBoxButton("View User Interaction Page", "http://scottDscott.com/web_dtankonline.php");
	$(".widget-five").middleBoxButton("View Print Page", "http://scottDscott.com/print_logos.php");
	$(".widget-six").middleBoxButton("View Video Page", "http://scottDscott.com/print_theend.php");

});