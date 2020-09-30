<html>

<h1> API.php </h1>
<button onclick="press_but()">Click me</button>
<div id="id"></div>
<div id="url"></div>
<div class="image"id="image" style="height:512px;width:512px"></div>


</html>

<style>
  .image img {
    hieght: 100%;
    width: 100%;
  }
</style>

<script>

function ajax_get(url, callback) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      console.log('responseText:' + xmlhttp.responseText);
      try {
        var data = JSON.parse(xmlhttp.responseText);
      } catch (err) {
        console.log(err.message + " in " + xmlhttp.responseText);
        return;
      }
      callback(data);
    }
  };

  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

function press_but(){
  ajax_get('https://api.thecatapi.com/v1/images/search?size=full', function(data) {
    document.getElementById("id").innerHTML = data[0]["id"];
    document.getElementById("url").innerHTML = data[0]["url"];
  
    var html = '<img src="' + data[0]["url"] + '">';
    document.getElementById("image").innerHTML = html;
  });
}

</script>