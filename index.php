<!DOCTYPE html>
<html>
<head>
    <title>Landing Page Test</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'/ >
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href='css/custom.css' rel='stylesheet' type='text/css'>

</head>
<body>
  <header>
    <div class="container header-top">
      <div class="container">
        <a href="/postcardmania"><img src="images/header-logo.png" alt="Header logo" /></a>
        <span class="header-contact">Call <a href="tel:5551234567">555-123-4567</a></span>
      </div>
    </div>
    <div class="image-container">
      <div class="form-container">
        <div class="form-header">
          <h1>Professional <span class="blue">Painters</span></h1>
          <h2>of largo, clearwater, tampa</h2>
          <hr />
          <p>We Care About More Than Paint!</p>
          <div class="promo">
            <h3>Schedule Your free Estimate</h3>
            <h3>to redeem promo code for</h3>
            <h2 class="price">$150 off</h2>
            <h4>any job of $3000 or more!</h4>
          </div>
        </div>

        <?php

            // Check for Header Injections
            function has_header_injection($str) {
              return preg_match( "/[\r\n]/", $str );
            }


            if (isset($_POST['contact_submit'])) {

              $name	= trim($_POST['name']);
              $email	= trim($_POST['email']);
              $phone	= $_POST['phone'];

              if (has_header_injection($name) || has_header_injection($email)) {

                die();

              }

              if (!$name || !$email) {
                echo '<h4 class="error">Name and email address are required.</h4><a href="/" class="button block">Go back and try again</a>';
                exit;
              }

              // Admin email
              $to	= "marfy87@gmail.com";

              // Create a subject
              $subject = "$name sent a message via your contact form";

              // Construct the message
              $message  = "Name: $name\r\n";
              $message .= "Email: $email\r\n\r\n";
              $message .= "Phone: $phone";

              $message = wordwrap($message, 72);

              $headers = "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
              $headers .= "From: " . $name . " <" . $email . ">\r\n";
              $headers .= "X-Priority: 1\r\n";
              $headers .= "X-MSMail-Priority: High\r\n\r\n";

              mail($to, $subject, $message, $headers);

              // Client email
              $toClient	= $email;

              $clientSubject = "Dear $name, thanks for contacting us!";

              $clientMessage  = "Thanks for submiting form!";

              $clientMessage = wordwrap($clientMessage, 72);


              // Send the email!
              mail($toClient, $clientSubject, $clientMessage, $headers);
            ?>

            <!-- Success message -->
            <h3>Thanks for contacting us!</h3>
            <p><a href="/postcardmania" class="button block">&laquo; Go back</a></p>

            <?php
              } else {
            ?>
            <div class="form-inputs">
              <form method="post" action="" id="contact-form">
                <div class="field-container">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name">
                </div>
                <div class="field-container">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email">
                </div>
                <div class="field-container">
                  <label for="phone">Phone</label>
                  <input type="phone" id="phone" name="phone">
                </div>
                <input type="submit" class="button submit" name="contact_submit" value="Save $150">
              </form>
            </div>
          <?php
            }
          ?>

        <div class="form-footer">
          <div class="box col-sm-4">
            <i class="fa fa-check-circle" aria-hidden="true"></i>Quality Work
          </div>
          <div class="box col-sm-4">
            <i class="fa fa-check-circle" aria-hidden="true"></i>Professional Painters
          </div>
          <div class="box col-sm-4">
            <i class="fa fa-check-circle" aria-hidden="true"></i>Flexible Schedules
          </div>
        </div>
      </div>
    </div>
  </header>
    <main>
      <div class="container">
        <h1>Professional Painters</h1>
        <h2>Tackling Residential & Commercial Painting Projects</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Phasellus gravida massa pharetra, tempor ligula ut, aliquet nulla.
          Quisque eu quam turpis. Sed porttitor mauris nec quam dignissim,
          et placerat odio scelerisque. In hac habitasse platea dictumst.
          Proin et accumsan nunc, sit amet bibendum purus. Proin at euismod ante.
          Phasellus ipsum orci, feugiat tristique mollis vitae, sagittis sollicitudin libero.
          In tempus ex non ipsum pretium, ac consequat justo fringilla.</p>
          <h2>Why Clients Choose to Hire Our Team:</h2>
          <ul>
            <li>Mauris sit amet urna et leo pulvinar tristique</li>
            <li>Nam eu eros mollis, interdum sapien tincidunt, accumsan erat.</li>
            <li>Maecenas rutrum libero ac diam volutpat, eu vehicula risus molestie.</li>
            <li>Mauris at tellus in lacus efficitur fringilla.</li>
            <li>Nullam lacinia nulla eget quam ornare blandit.</li>
            <li>Sed mollis magna eu mi aliquet scelerisque.</li>
          </ul>
          <p>Donec aliquam sit amet nisi sed consequat. Etiam non gravida nisi.
            Interdum et malesuada fames ac ante ipsum primis in faucibus.
            Aenean feugiat lacinia velit non lacinia. Proin eget tristique leo.</p>
      </div>
    </main>
    <footer>
      <div class="container">
        <p>Schedule your free estimate! <a href="tel:5551234567">555-123-4567</a></p>
      </div>
    </footer>

    <script type="text/javascript" src="assets/jquery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/form-validate.js"></script>
  </body>
</html>
