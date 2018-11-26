<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Mr+De+Haviland" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="container" align="center">
    <header id="menu">
      <div id="ham" onclick="hamtog()">
        MENU
      </div>
      <ul class="themenulist">
        <li><div id="logo"><span>Artisan</span></div></li>
        <li><div class="button"><a href="index.html">HOME</a></div></li>
        <li><div class="button"><a href="promotion.html">PROMOTION</a></div></li>
        <li><div class="button"><a href="menu.php">MENU</a></div></li>
        <li><div class="button"><a href="team.html">TEAM</a></div></li>
        <li><div class="active button"><a href="contact.php">CONTACT</a></div></li>
      </ul>
    </header>
    <script type="text/javascript">
      function hamtog(){
        document.querySelector('.themenulist').classList.toggle('tog');

      }
    </script>

    <div style="height: 799px; background: #1a0e04; padding-top: 30px">
      <div style="height: 100%;width: 538px;">
        <img class="mySlides" src="src/contact_1.webp" width="538" height="381">
        <img class="mySlides" src="src/contact_2.webp" width="538" height="381">
        <img class="mySlides" src="src/contact_3.webp" width="538" height="381">
        <img class="mySlides" src="src/contact_4.webp" width="538" height="381">

        <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="display-right" onclick="plusDivs(+1)">&#10095;</button>

        <form action="send_message.php"method="POST">
          <div style="margin-top: 80px;"></div>
            <input class="u-input" type="text" name="fname" placeholder="Name *" style="height: 29px;"><br>
            <input class="u-input" type="text" name="email" placeholder="Email *" style="height: 29px;"><br>
            <input class="u-input" type="text" name="subject" placeholder="Subject *" style="height: 29px;"><br>
            <textarea class="u-input" name="message" placeholder="Message *" cols="60" rows="6"></textarea><br>
            <button class="u-submit" type="submit" name="send" value="Send">Send</button>
          </div>
        </form>

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

  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1} 
        if (n < 1) {slideIndex = x.length} ;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none"; 
        }
        x[slideIndex-1].style.display = "block"; 
    }

  </script>
  <?php if(isset($_GET) && $_GET['alert'] == 'true') { ?>
  <script>alert("Message Sent");</script>
  <?php } ?>

</body>
</html>