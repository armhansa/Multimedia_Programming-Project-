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
        <li><div class="button"><a href="contact.html">CONTACT</a></div></li>
      </ul>
    </header>
    <script type="text/javascript">
      function hamtog(){
        document.querySelector('.themenulist').classList.toggle('tog');

      }
    </script>