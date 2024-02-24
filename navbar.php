<div class="art-menu-bar">
  <div class="art-menu-bar-frame">
    <div class="art-menu-bar-header">
      <a class="art-menu-bar-btn" href="#" id="menuToggle">
        <span></span>
      </a>
    </div>

    <div class="art-current-page"></div>
      
    <div class="art-scroll-frame">
      <nav id="swupMenu">
        <ul class="main-menu">
          <li class="menu-item">
            <a href="index.php" id="home">Home</a>
          </li>
          <li class="menu-item">
            <a href="portfolio-3-col.php" id="portfolio">Portfolio</a>
          </li>
          <li class="menu-item">
            <a href="history.php" id="history">History</a>
          </li>
          <li class="menu-item">
            <a href="contact.php" id="contact">Contact</a>
          </li>
          <li class="menu-item">
            <a href="blog.php" id="blog">Blog</a>
          </li>
          <li class="menu-item">
            <a href="login.php" id="login">Log In</a>
          </li>
        </ul>
      </nav>

      <ul class="art-language-change">
      <li class="art-fil-lang"><a href="#">FIL</a></li>
        <li class="art-active-lang"><a href="#">EN</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.main-menu .menu-item');

    menuItems.forEach(function(item) {
      item.addEventListener('click', function() {
        // Remove 'current-menu-item' class from all menu items
        menuItems.forEach(function(menuItem) {
          menuItem.classList.remove('current-menu-item');
        });
        
        // Add 'current-menu-item' class to the clicked menu item
        item.classList.add('current-menu-item');
      });
    });
  });
</script>


