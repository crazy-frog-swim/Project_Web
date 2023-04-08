<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pets@home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav>
      <div class="logo">
        <h1>Pets@home</h1>
        <i class="paw fas fa-paw"></i>
      </div>
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li class="shop"><a href="#shop">Shop</a>
          <ul>
            <li><a href="#food">Food</a></li>
          </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
    <div class="container">
      <section class="one" id="home">
        <div class="title">
          <h1>Welcome to the</h1>
          <h2>Pets@home</h2>
        </div>
      </section>
      <section class="two" id="about">
        <div class="title2">
            <h1>About us</h1>
        </div>
        <div class="slideshow">
          <div class="slides">
            <input type="radio" name="r" id="r1">
            <input type="radio" name="r" id="r2">
            <input type="radio" name="r" id="r3">
            <div class="slide first">
              <img src="./images/pet1.jpg" alt="">
            </div>
            <div class="slide">
              <img src="./images/pet2.jpg" alt="">
            </div>
            <div class="slide">
              <img src="./images/pet4.jpg" alt="">
            </div>
          </div>
          <div class="btn-slide">
            <label for="r1" class="bar"></label>
            <label for="r2" class="bar"></label>
            <label for="r3" class="bar"></label>
          </div>
        </div>
        <div class="details-about">
            <p>Pets@home is a new online pet store that established in response to COVID-19. 
                We have hundreds of pet care brands and thousands of products so you can discover exactly 
                what you need to pamper your pet. We carry products for all types of pets as part of our
                objective to become Malaysia's greatest online pet store. We strive to supply you with 
                the all the pet supplies you require.</p>
        </div>
      </section>
      <section class="three">
        <div class="title3" id="shop">
          <h1>Shop</h1>
        </div>
        <ul class="grid-layout">
          <div class="img-grid2" id="food">
            <li><a href="login.php?error=unverifiedsession">Food</a></li>
          </div>
        </ul>
      </section>
      <section class="four">
        <div class="title4" id="contact">
          <h1>Contact Us</h1>
        </div>
        <form method="post" class="contact-form" >
          <input type="text" class="contact-text" placeholder="Name" required name="Name">
          <input type="email" class="contact-text" placeholder="Email" required name="Email">
          <input type="text" class="contact-text" placeholder="Phone" required name="Phone">
          <textarea maxlength="255" class="contact-text" placeholder="Message" required name="Message"></textarea>
          <input type="submit" class="contact-btn" name="submit" placeholder="Your Phone" value="Send">
          <?php
          if(isset($_POST['submit'])){
            if($_POST['submit']){
                echo '<script>alert("Message Sent")</script>';
            }
          }
          ?>
        </form>
      </section>
    </div>
  </body>
</html> 
