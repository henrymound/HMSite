<?php
	$title = $_GET["title"];
	$descriptionLong = $_GET["descriptionLong"];
	$lat = $_GET["lat"];
	$long = $_GET["long"];
	$address = $_GET["address"];
    $latForCenter = $lat+0.001734;
	$toDisplay = "
    <html>
      <head>
        <meta name=\"viewport\" content=\"initial-scale=.9, user-scalable=no\">
        <meta charset=\"utf-8\">
        <title>Simple markers</title>
        <style>
          html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
          }
        </style>
        <script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp\"></script>
        <script>
    function initialize() {
      var myLatlng = new google.maps.LatLng(".$lat.", ".$long.");
    
      var mapOptions = {
        center: new google.maps.LatLng(".$latForCenter.", ".$long."),
        zoom: 16,
      }
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        
      var contentString = '<div id=\"content\">'+
          '<div id=\"siteNotice\">'+
          '</div>'+
          '<h2 id=\"firstHeading\" class=\"firstHeading\"><a href=\"https://www.google.com/maps?daddr=".$lat.",".$long."\">".$title."</a></h2>'+
          '<div id=\"bodyContent\">'+
          '<table><tr><td><img src=\"http://www.HotMugg.com/resources/Final-Logo.png\" alt=\"Logo\" style=\"width:115px;height:91px\"></td><td>".$address."<p>".$descriptionLong."</td></tr><tr><td><i>HotMugg – Independent Coffeeshops for Independent People</i></td></tr></table>'+
          ''+
          '</div>'+
          '</div>';
    
      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: '".$title."'
            });
    
    
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
      });
    
    
      var infowindow = new google.maps.InfoWindow({
          content: contentString
      });
    
        infowindow.open(map,marker);
    
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
    
        </script>
      </head>
      <body>
        <div id=\"map-canvas\"></div>
      </body>
      
      </style>
    
    <style type=\"text/css\">
    .tftable {font-size:12px;color:#ffffff;width:100%;border-width: 1px;border-color: #2e2e2e;border-collapse: collapse;}
    .tftable th {font-size:12px;background-color:#2e2e2e;border-width: 1px;padding: 8px;border-style: solid;border-color: #2e2e2e;text-align:left;}
    .tftable tr {background-color:#4d4d4d;}
    .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #2e2e2e;}
    .tftable tr:hover {background-color:#2e2e2e;}
    
    a:link {
      color: #7b0001;
      background-color: transparent;
    }
    
    a:hover {
      color: black;
    }
    
    </style>
      
    </html>";
    print($toDisplay);
?>
