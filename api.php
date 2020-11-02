<?php

#api key 0bae0402f11e41d58adc4924c9c7da6f

#q=51.952659,7.632473

if(!empty($_GET['location'])){

  $maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($_GET['location']);
  
  $maps_json = file_get_contents($maps_url);
  $maps_array = json_decode($maps_json, true);
  
  $lat = $maps_array['results'][0]['geometry']['location']['lat'];
  $lng = $maps_array['results'][0]['geometry']['location']['lng'];
  
  $google_url = 'https://maps.googleapis.com/maps/api/streetview?size=400x400&location=' . $lat . ',' . $lng . '&fov=80&heading=70&pitch=0
&key=YOUR_API_KEY&signature=YOUR_SIGNATURE';
  
  $instagram_url = 'https://api.instagram.com/v1/media/serach?lat=' . $lat . '&lng=' . $lng . '&client_id=ba606989f224f60b57dc152b9a259e77';
  
  file_get_contents($instagram_url);
  $instagram_array = json_decode($instagram_json, true);
  
}


?>





<html lang="en">
<head>
  <meta charset="utf-8"/>
  <title> API Call </title>
</head>



<body>
  <form action="">
    <input type="text" name="location"/>
    <button type="submit"> submit </button>
    
    <br/>
    <?php
    if(!empty($instagram_array))
    {
      foreach($instagram_array['data'] as $image)
      {
        echo '<img src"'.$image['images']['low_resolution']['url'].'" alt=""/>';
      }
    }
    ?>
    
    
  </form>
</body>



</html>