//Disable "right click" to prevent downloading images --> credits: http://stackoverflow.com/users/993915/pranav 
// at:http://stackoverflow.com/questions/4753695/disabling-right-click-on-images-using-jquery
//also this work: http://www.dynamicdrive.com/dynamicindex9/noright.htm

jQuery.noConflict();
jQuery(document).ready(function($){

//---
var message="Function Disabled";

function clickIE() {
    if (document.all) {
        (message);
        return false;
    }
}

function clickNS(e) {
    if (document.layers || (document.getElementById && !document.all)) {
        if (e.which == 2||e.which == 3) {
            (message);
            return false;
        }
    }
}

if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickNS;
} else {
    document.onmouseup = clickNS;
    document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false")
//---


});