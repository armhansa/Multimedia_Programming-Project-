<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Mr+De+Haviland" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
</head>
<body>
  <?php
  session_start();
  if (!isset($_SESSION['liked'])) {
    $_SESSION['liked'] = [];
  }
  // $_SESSION['liked'] = [];
  // print_r($_SESSION['liked']);
  
  function conn(){
    $conn = new mysqli("localhost", "it58070041", "#Helloworld01", "it58070041_arti");
    if ($conn->connect_error) {
      echo "<script>window.location = 'http://www.google.co.th'</script>";
    }
    echo "Connected successfully";
    return $conn;
  }

  $conn = conn();
  $sql_main = "SELECT * FROM menu WHERE 1 ORDER BY liked DESC";
  $result = $conn->query($sql_main);
  ?>
  <script type="text/javascript">
    let liked = [];
    <?php 
    for ($i=0; $i < sizeof($_SESSION['liked']); $i++) { 
      echo "liked.push(".$_SESSION['liked'][$i].");";
    }
     ?>
    let themenu = [];
    themenu['main'] = [];
    themenu['drink'] = [];
    themenu['dessert'] = [];

    <?php
    while($row = $result->fetch_assoc()) {
      echo "themenu['".$row['type']."'].push( {id:'".$row['id']."',name:'".$row['name']."',price:".$row['price'].",liked:".$row['liked']."});";
    }
    ?>
  </script>
  <div id="container" align="center">
   <header id="menu">
      <div id="ham" onclick="hamtog()">
        MENU
      </div>
      <ul class="themenulist">
        <li><div id="logo"><span>Artisan</span></div></li>
        <li><div class="button"><a href="index.html">HOME</a></div></li>
        <li><div class="button"><a href="promotion.html">PROMOTION</a></div></li>
        <li><div class="active button"><a href="menu.php">MENU</a></div></li>
        <li><div class="button"><a href="team.html">TEAM</a></div></li>
        <li><div class="button"><a href="contact.php">CONTACT</a></div></li>
      </ul>
    </header>
    <script type="text/javascript">
      function hamtog(){
        document.querySelector('.themenulist').classList.toggle('tog');

      }
    </script>

    <div class="green_main">
      <h2>MAINS</h2>
      <div style="width: 100px; height: 5px; background-color: #FFF"></div>
      <p style="font-size: 16px; margin-top: 18px;">Lunch Menu</p>
      <p style="color: #888; font-size: 14px; margin-top: 6px;">Served daily between 12:00-17:00</p>
      <div style="margin-top: 30px;">
        <div style="display: inline-block;" id="section_main">

        </div>
      </div>

      <h2 style="margin-top: 100px;">Dessert</h2>
      <div style="width: 100px; height: 5px; background-color: #FFF"></div>
      <div style="margin-top: 30px;">
        <div style="display: inline-block;" id="section_dessert">
        </div>
      </div>

      <h2 style="margin-top: 100px;">Drink</h2>
      <div style="width: 100px; height: 5px; background-color: #FFF"></div>
      <div style="margin-top: 30px;">
        <div style="display: inline-block;" id="section_drink">
        </div>

      </div>
    </div>

    <footer>
      <div id="address" align="center">
        <p class="font-8 center">33 Nak Niwat Rd, Khwaeng Lat</p>
        <p class="font-8 center">Phrao, Khet Lat Phrao, Krung</p>
        <p class="font-8 center">Thep Maha Nakhon 10230</p>
      </div>
      <div id="socials">
        <a href="https://www.facebook.com"><img id="social" src="src/fb.png"/></a>
        <a href="https://www.twitter.com"><img id="social" src="src/tw.png"/></a>
        <a href="https://www.instagram.com/"><img id="social" src="src/ig.png"/></a>
      </div>
    </footer>
    
  </div>
  <iframe src="like.php" id="heartframe" style="display: none;"></iframe>

  <script type="text/javascript">

    function rnder(thetype){
      let txt = '';
      let theloop = themenu[thetype].length;
      for (var i = 0; i < theloop; i++) {
        let m = themenu[thetype][i];
        txt += '<div class="mm"> <img src="src/'+thetype+'_'+(i+1)+'.webp" width="250" height="250" style="margin: 25px;"> <div class="menu-desc"> <span style="font-size: 15px; float: left;">'+m.price+' THB</span> <span style="font-size: 18px;" class="menu-name"><b>'+m.name+'</b></span> <span menuid="'+m.id+'" class="heart unlike" style="float: right;" onclick="heartthis(this)"> <span>'+m.liked+'</span> </span> </div> </div>';
      }

      document.querySelector('#section_'+thetype).innerHTML = txt;
    }
    rnder('main');
    rnder('drink');
    rnder('dessert');

    function heartthis(e){
      let likeval = parseInt(e.innerText);
      let menuid = e.getAttribute('menuid');

      if (e.classList[2] == 'like') {
        likeval--;
        heartframe.setAttribute('src','unlike.php?menuid='+menuid);
      }
      else{
        likeval++;
        heartframe.setAttribute('src','like.php?menuid='+menuid);
      }
      e.innerHTML = '<span>'+likeval+'</span>';
      e.classList.toggle('like');

    }

    for (var i = 0; i < liked.length; i++) {
      document.querySelector('[menuid="'+liked[i]+'"]').classList.add('like');
    }
  </script>
</body>
</html>