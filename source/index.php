<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');
$query = "SELECT * FROM `project` WHERE 1;";
$stmt = $connect->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">
  <link href="css/grid.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  <script defer src="js/ScrollSmoother.min.js"></script>
  <script defer src="js/main.js"></script>
  <title>Carlos Cano Portfolio</title>
</head>

<div id="smooth-wrapper">
  <div id="smooth-content">
    
    <body>
      <section class="app">
        <h1 class="hidden">Carlos Cano Portfolio</h1>
        <div id="sticky-nav-con" class="nav">
            <header class="grid-con">
              <nav id="main-nav" class="col-span-full">
                <h2 class="hidden">Main Navigation</h2>
                <button id="nav-works">Study Cases</button>
                <button id="nav-references">References</button>
                <button id="nav-contact">Contact</button>
              </nav>
            </header>
        </div>
      </section>

      <main>
        
        <section id="hero-section" class="col-span-full" data-speed="1">
          <h1 id="name-main">CARLOS</h1>
          <h1 id="lname-main" data-speed="1.2">CANO</h1>
          <div class="slider-con">
            <div class="slider" data-speed="1.5">
              <p>Front-End Web Developer - Graphic & Motion Designer - Photographer & Videographer -</p>
              <p>Front-End Web Developer - Graphic & Motion Designer - Photographer & Videographer -</p>
            </div>
          </div>
        </section>

        <section class="grid-con">
          <div class="hero-text-con col-span-full">
            <div class="hero-text-con-1 m-col-start-3 m-col-end-6">
              <p>Hi, I’m Carlos, a web developer living in Canada. The "CA" in my portfolio name stands for both my initials and Canada, where I’m currently crafting websites — a fun little coincidence!</p>
            </div>
            <div class="hero-text-con-2" >
              <p>Coming from a graphic design background, I’ve shifted my focus to front-end development, creating dynamic and visually appealing websites.</p>
            </div>
          </div>
          <img src="images/arrow-down.svg" class="arrow-down col-span-full m-col-span-1" data-lag="1.3">
        </section>
        


        <section id="work-section" class="col-span-full skew">
          <h2 class="hidden">Works Section</h2>
          <h2 class="titles-main col-span-full">WORKS</h2>
          <div class="col-span-full">
            <video src="videos/main_reel.mp4" playsinline loop muted autoplay></video>
          </div>
          <h2 id="studyCases-main" class="titles-main col-span-full">STUDY CASES</h2>

          <?php
          foreach($results as $row) {
          echo ' 
          
            <div id="projects-section" class="grid-con">
              <h2 class="main-work-title col-span-full"> '.$row["title"].' - <br>Webpage</h2>
              <h5 class="col-span-full">'.$row["date"].'</h5>
              <img src="images/arrow-left-right.svg" class="arrow-left-right col-span-full">
              <div class="col-span-full">
                <video src="videos/'.$row["video"].'" playsinline loop muted autoplay></video>
              </div>
            </div>

          
            <div id="goal-bg" class="grid-con">
              <div class="text-goal col-span-full m-col-span-3" data-lag="0.3">
                <h3>Goal</h3>
                <p>'.$row["goal"].'</p>
              </div>
              <div class="text-project col-span-full m-col-span-8">
                <div data-lag="0.2">
                  <h3>Process</h3>
                  <p>'.$row["process"].'</p>
                </div>
                <div data-lag="0.4">
                  <h3>Outcome</h3>
                  <p>'.$row["outcome"].'</p>
                </div>
              </div>
              <img src="images/arrow-down-white.svg" class="arrow-down col-span-full m-col-start-12" data-lag="1">
            </div>
          
          ';
          }
          ?>
        </section>


        <section id="ref-main" data-speed="0.7">
          <h2 class="titles-main col-span-full">REFERENCES</h2>
          <div class="grid-con">
            <h2 class="hidden">References Section</h2>
            <div class="col-span-3 m-col-start-2 m-col-span-4">
              <p>“Andres has a well-marked analytical ability and an open mind for user research and communication, he is characterized by having empathy and the ability to focus on the user experience.”</p>
              <p class="ref-name">Diana Ortiz
                <span class="ref-title">Master in Business Administratiosn and Project Management</span>
              </p>
            </div>
            <div class="col-span-3 m-col-start-7 m-col-span-4">
              <p>“He has experience in translating the needs to the field of the product or service industry to which he is going to design.”</p>
              <p class="ref-name">Diana Ortiz
                <span class="ref-title">Master in Business Administratiosn and Project Management</span>
              </p>
            </div>
            <div class="col-span-3 m-col-start-2 m-col-span-4">
              <p>“besides being creative, is also interested in continuing to develop and learn new tools and techniques that will allow him to obtain better results in his field of work.”</p>
              <p class="ref-name">Jaime Vareles
                <span class="ref-title">Sr. Graphic Designer</span>
              </p>
            </div>
            <div class="col-span-3 m-col-start-7 m-col-span-4">
              <p>“I consider Andres a very creative, proactive, collaborative person with a lot of potential in his area of ​​knowledge.”</p>
              <p class="ref-name">Angelica Peralta
                <span class="ref-title">Digital Marketing and Social Media Specialist</span>
              </p>
            </div>
            <img src="images/arrow-down.svg" class="arrow-down col-span-full m-col-start-12">
          </div>
        </section>

        <section id="contact-main" data-speed="1.2">
          <h2 class="titles-main col-span-full">CONTACT</h2>
          <div class="grid-con">
            <h2 class="col-span-full">Share your brillant idea!</h2>
            <div id="contact-hero-form" class="col-span-full m-col-start-1 m-col-end-8">
              <form id="contact_form">
                  <input id="name" type="text">
                  <input id="email" type="email">
                  <textarea id="msg" placeholder="Message"></textarea>
                  <input id="submit" type="submit" value="Send me a message">
                  <section id="feedback"><p>*Please fill out all required sections</p></section>
              </form>
            </div>

            <div id="contact-text" class="col-span-full m-col-start-8 m-col-end-13">
              <p>Here you can check more details of my background<br>
              <a href="https://www.linkedin.com/in/carlos-cano-m/" target="_blank">LinkedIn</a></p>
              <p>and here you can send me a direct email<br>
              <a href="mailto:hello@carloscano.ca" target="_blank">hello@carloscano.ca</a></p>
            </div>
          </div>
        </section>
      </main>
    </body>
    
    <footer id="footer-main" class="col-span-full">
      <p>©2024 Carlos Cano. All Rights Reserved</p>
    </footer>

  </div>
</div>

</html>