<?php

$view = new stdClass();
$view->pageTitle = 'Homepage';
require_once('Views/index.phtml');
?>
<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Jan 13 2021 11:12:18 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5ffdee642c911889f748a86c" data-wf-site="5ffdee642c9118659a48a86b">
<head>
  <meta charset="utf-8">
  <title>krm</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/krm-5b821e.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Roboto:100,300,regular,500,700,900","Roboto Condensed:300,regular"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">
  <div data-collapse="none" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
    <div class="container w-container">
      <a href="#" class="brand w-nav-brand"><img src="images/krm..svg" loading="lazy" alt="" class="image"></a>
      <nav role="navigation" class="w-nav-menu">
        <a href="login.html" class="nav-link nav-button w-nav-link">Log In</a>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="form-container">
    <div class="section">
      <h1 class="heading">Project Application</h1>
      <p class="paragraph">Please fill up the form with required information.</p>
      <div class="form-block w-form">
        <form id="email-form" name="email-form" data-name="Email Form" class="form"><input type="text" class="text-field w-input" maxlength="256" name="project-name" data-name="project name" placeholder="Project Name" id="project-name" required=""><input type="text" class="text-field w-input" maxlength="256" name="customer-name" data-name="customer name" placeholder="Customer Name" id="customer-name" required=""><input type="text" class="text-field w-input" maxlength="256" name="short-description" data-name="short description" placeholder="Short Description" id="short-description" required=""><input type="text" class="text-field w-input" maxlength="256" name="budget-range" data-name="budget range" placeholder="Budge Range" id="budget-range" required=""><input type="text" class="text-field w-input" maxlength="256" name="deadline" data-name="deadline" placeholder="Deadline" id="deadline" required=""><input type="email" class="text-field w-input" maxlength="256" name="email" data-name="email" placeholder="Email" id="email" required=""><input type="text" class="text-field w-input" maxlength="256" name="other-requirement" data-name="other requirement" placeholder="Other Requirement" id="other-requirement"><input type="submit" value="Submit" data-wait="Please wait..." class="submit-button form-submit-btn w-button"></form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-container"><img src="images/Screenshot-2021-01-13-at-00.21.32.png" loading="lazy" sizes="(max-width: 3360px) 100vw, 3360px" srcset="images/Screenshot-2021-01-13-at-00.21.32-p-500.png 500w, images/Screenshot-2021-01-13-at-00.21.32-p-800.png 800w, images/Screenshot-2021-01-13-at-00.21.32-p-1080.png 1080w, images/Screenshot-2021-01-13-at-00.21.32-p-1600.png 1600w, images/Screenshot-2021-01-13-at-00.21.32-p-2000.png 2000w, images/Screenshot-2021-01-13-at-00.21.32-p-2600.png 2600w, images/Screenshot-2021-01-13-at-00.21.32-p-3200.png 3200w, images/Screenshot-2021-01-13-at-00.21.32.png 3360w" alt=""></div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5ffdee642c9118659a48a86b" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
