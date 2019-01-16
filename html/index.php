<?php
  include('includes/header.html');
?>

<header>
  <section class="intro-wrapper">
    <p>This is a template for a simple forum.
      <br>This is where you put a description of your forum.
      <br>The background image can be swapped out.
      <br>The button below can be used to redirect.</p>
    <button class="header-button" onclick="location.href = 'post.php';">Write a post!</button>
  </section>
</header>

<section class="featured-page-area">
  <section class="featured-page-wrapper">
    <section class="featured-page">
      <img src="./img/image3.jpg">
      <h1><a href="threads.php">MY FIRST POST</a></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p><a href="threads.php" class="more-link">READ MORE</a></p>
    </section>

    <section class="featured-page">
      <img src="./img/image2.jpg">  
      <h1><a href="threads.php">MY SECOND POST</a></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p><a href="threads.php" class="more-link">READ MORE</a></p>          
    </section>

    <section class="featured-page">
      <img src="./img/image1.jpg">  
      <h1><a href="threads.php">MY THRID POST</a></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p><a href="threads.php" class="more-link">READ MORE</a></p>          
    </section>
  </section>
</section>

<section class="widget-area">
  <section class="widget-wrapper">
    <section class="widget-text">
      <h2>A LIST OF LINKS</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.</p>
      <ul>
        <li><a href="">Lorem ipsum dolor sit amet</a></li>
        <li><a href="">Consectetur adipisicing elit</a></li>
        <li><a href="">Sed do eiusmod
    tempor incididunt</a></li>
        <li><a href="">Labore et dolore magna aliqua</a></li>
      </ul>
    </section>

    <section class="widget-text">
      <h2>SOCIAL MEDIA</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua <a href="">this is a link</a>.</p>   
    </section>

    <section class="widget-text">
      <h2>RECENT NEWS</h2>
      <ul class="widget-news-list">
        <li>            
          <a href="">Important update!</a>
          <br><span class="date">Augsut 11, 2014</span>
        </li>
        <li>
          <a href="">More news</a>
          <br><span class="date">May 24, 2015</span>  
        </li>
        <li>
          <a href="">Anoter update</a>
          <br><span class="date">October 1, 2016</span>               
        </li>                           
      </ul>
    </section>
  </section>
</section>

<section class="testimonial-area">
  <section class="testimonial-wrapper">
    <section class="testimonial-text">
      <p>Best blog I've ever read!</p>
      <h2>- John Smith</h2>
    </section>
    <section class="testimonial-text">
      <p>Fantastic design!</p>
      <h2>- Al Gore</h2>              
    </section>
  </section>
</section>


<?php
  include('includes/footer.html');
?>