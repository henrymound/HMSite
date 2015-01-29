<?php

    //Downloads XML data from website
    //Used to download database and coord convert
    function download_page($path){
	   $ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL,$path);
	   curl_setopt($ch, CURLOPT_FAILONERROR,1);
	   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	   curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	   $retValue = curl_exec($ch);			 
	   curl_close($ch);
	   return $retValue;
    }

    $databaseXML = download_page("http://www.HotMugg.com/data.xml");//database download url
    // Turn off all error reporting
    //error_reporting(0);

    //Loads XML data from string
    $xml = simplexml_load_string($databaseXML) or die("Error retrieving HotMugg locations.");

    //array to hold distances
    $coffeeshopsArray = new ArrayObject();
    foreach ($xml->location as $location){
        $tempCoffeeshop = new coffeeshop();
        //set coffeeshop variables
        $tempCoffeeshop->setName($location->name);
        $tempCoffeeshop->setAddress($location->address->stringAddress);
        $tempCoffeeshop->setZip($location->address->zip);
        $tempCoffeeshop->setCity($location->address->city);
        $tempCoffeeshop->setState($location->address->state);
        $tempCoffeeshop->setLink($location->link);
        $tempCoffeeshop->setDescription($location->description);
        $tempCoffeeshop->setPhone($location->phone);
        $tempCoffeeshop->setLat($location->lat);
        $tempCoffeeshop->setLong($location->long);
        $tempCoffeeshop->setWithinDistance(false);
    
        $coffeeshopsArray->append($tempCoffeeshop);   
    }


$mapDetails = "";
$objectCounter = 0;
foreach ($coffeeshopsArray as $shop){
    $objectCounter++;
    $nameWithPlus = str_replace(" ", "+", $shop->getName());   
    $formattedName = str_replace("'","&#39;", $shop->getName());
    $mapDetails.="['".$nameWithPlus."', ".$shop->getLat().", ".$shop->getLong().", \"".$shop->getLink()."\", \"".$shop->getDescription()."\", \"".$shop->getAddress()."\", \"".$formattedName."\", ".$objectCounter."],\n"; 
}
rtrim($mapDetails, ",");
$htmlToPrint =("
<base target=\"_parent\"/>
    <style type=\"text/css\">
        .scrollFix {
            line-height: 1.35;
            overflow: hidden;
            white-space: nowrap;
            }
    </style>
       <center>
        <div id=\"map\" style=\"width: 100%; height: 500px;\"></div>
        <script src=\"https://maps.googleapis.com/maps/api/js\"></script>
        <script>

        function initialize() {
            var locations = [
                ".$mapDetails."
            ];

            window.map = new google.maps.Map(document.getElementById('map'), {
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

        var infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();
        
        var pinIcon = new google.maps.MarkerImage(
            \"http://i.imgur.com/a5DFeyu.png\",
            null, /* size is determined at runtime */
            null, /* origin is 0,0 */
            null, /* anchor is bottom center of the scaled image */
            new google.maps.Size(25, 37)
        );  

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: pinIcon
            });

        bounds.extend(marker.position);
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
        
        return function () {
            var contentString = 
                '<div id=\"map\" style=\"width: 375px;overflow:hidden;\"></div>'+
                '<table><font size = \"4\"><a href=\"'+locations[i][3]+'\">'+locations[i][6]+'</font></a></h2>'+
	            '<tr><td>'+locations[i][5]+'</br><i>'+locations[i][4]+'</i></td></tr><tr><td><i><font size = \"2\">HotMugg &#45; Independent Coffeeshops for Independent People</font></i></td></tr></table>'+
                '</div>';
                infowindow.setContent('<div class=\"scrollFix\">'+contentString+'</div>');
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

    map.fitBounds(bounds);

    var listener = google.maps.event.addListener(map, \"idle\", function () {
            map.setZoom(11);
            google.maps.event.removeListener(listener);
        });
    }

    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
        }

    window.onload = loadScript;
    </script>
	</center>
     
    ");

print($htmlToPrint);

//Calculates mile difference between two coordinates
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
    return ($miles * 0.8684);
  } else {
    return $miles;
  }

}

//used to hold coffeeshop data
class coffeeshop{
    public $Name, $Address, $Zip, $City, $State, $Link, $Description, $Phone, $Lat, $Long, $Distance, $WithinDistance;
    
    //Set Variables
    public function setName($name){$this->Name = $name;}
    public function setAddress($address){$this->Address = $address;}    
    public function setZip($zip){$this->Zip = $zip;}    
    public function setCity($city){$this->City = $city;}    
    public function setState($state){$this->State = $state;}    
    public function setLink($link){$this->Link = $link;}    
    public function setDescription($description){$this->Description = $description;}    
    public function setPhone($phone){$this->Phone = $phone;}    
    public function setLat($lat){$this->Lat = $lat;}    
    public function setLong($long){$this->Long = $long;}    
    public function setDistance($distance){$this->Distance = $distance;}
    public function setWithinDistance($withinDistance){$this->WithinDistance = $withinDistance;}
        
    //Get Variables
    public function getName(){return $this->Name;}
    public function getAddress(){return $this->Address;}    
    public function getZip(){return $this->Zip;}    
    public function getCity(){return $this->City;}    
    public function getState(){return $this->State;}    
    public function getLink(){return $this->Link;}    
    public function getDescription(){return $this->Description;}    
    public function getPhone(){return $this->Phone;}    
    public function getLat(){return $this->Lat;}    
    public function getLong(){return $this->Long;}    
    public function getDistance(){return $this->Distance;}
    public function getWithinDistance(){return $this->WithinDistance;}//if the location is found within radius
    
}
?>
