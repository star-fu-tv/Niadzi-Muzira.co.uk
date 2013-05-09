<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Niadzi Muzira</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="stylesheets/jewels.css" rel="stylesheet">
</head>
<body>
	<img id="flare" src="img/flare-cloud.png">
	<nav>
    <a href="index.html" id="home-icon" data-icon="&#x68;">
      <span class="visuallyhidden">Home</span>
    </a>
		
		<h1>Niadzi Muzira</h1>
		<ul>
			<li><a href="about.html">About</a></li>
			<li>:</li>
			<li><a href="portfolio.html">Portfolio</a></li>
			<li>:</li>
			<li><a href="contact.php" class="current-page">Contact</a></li>
		</ul>
	</nav>

	<div class="container">
		<div class="row">
			<div class="span10">
				<h1>Can I help?</h1>		
				<p>Enough about me - now I want to get to know you! If you have a project with potential, or a business in need of some juicy online presence, fill out the form below and I'll get back to you as soon as possible.<br>
				In case you were wondering, here are my <a href="#rates" role="button" data-toggle="modal">rates</a>. <!-- I am available for Skype/phone calls, and can also offer assistance on existing websites. -->
				</p>
			</div>
		</div>
	</div>
	


	<!-- Modal -->
<div id="rates" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Niadzi Muzira : Creative Code</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<?php 
// Start PHP form
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
		
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
		
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
		
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = 'nia.radical@gmail.com';
			$subject = 'Niadzi-Muzira.co.uk message from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: Niadzi-Muzira.co.uk <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
	
			}

			$emailSent = true;

		}
	}
}
?>

<div class="row">
	<div class="span8 offset2">

	<!-- if mail sent -->
	<?php if(isset($emailSent) && $emailSent == true) { ?>

		<div align="center" class="contact-thanks">
			<h3>Thanks, your message has been sent. </h3>
		</div>

	<?php } else { ?>

		<!-- if captcha not set -->
		<?php if(isset($hasError) || isset($captchaError)) { ?>
		<p class="error">There was an error submitting the form.<p>
	<?php } ?>
		
		<!-- start email form -->						
		<form action="http://localhost:8888/niadzi-muzira/niadzi/contact.php" id="contactForm" method="post">
			
			<div id="name-email">
				<!-- name input -->
				<!-- <label for="contactName">Your Name</label> -->
				<input type="text" placeholder="Your name.." name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"/>
				
				<!-- check that name is set -->		
				<?php if(isset($nameError)) { 
							if($nameError != '') { ?>
							<span class="error"><?=$nameError;?></span> 
				<?php } } ?>

				<!-- email input -->
				<!-- <label for="email">Email</label> -->
				<input type="text" name="email" placeholder="Your email..." id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>"/>
				
				<!-- check that email is set -->	
				<?php if(isset($emailError)) {
							if($emailError != '') { ?>
							<span class="error"><?=$emailError;?></span>
				<?php } } ?>
			</div>

			<!-- message input -->
			<!-- <label for="comments"></label><br> -->
			<textarea name="comments" rows="10" placeholder="Please include details of your project and preferred contact method..."></textarea>
				<?php if(isset($_POST['comments'])) { 
						if(function_exists('stripslashes')) { 
							echo stripslashes($_POST['comments']); 
						} else { 
							echo $_POST['comments']; } 
				} ?>	
			

			<!-- check that message is set -->
			<?php if(isset($commentError)) {
						if($commentError != '') { ?>
						<span class="error"><?=$commentError;?></span> 
			<?php } } ?>

			<span class="hidden">
				<input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /></li>
				<label for="checking" class="hidden">If you want to submit this form, do not enter anything in this field</label>
				<input type="text" name="checking" id="checking" class="hidden" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" />
				<input type="hidden" name="submitted" id="submitted" value="true" />
			</span>
			<br>
			<button id="submitbutton" type="submit">Send &raquo;</button>

		</form>

	<?php } ?><hr>
	</div>
</div> <!-- end row -->

	

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>	
<script src="js/jquery.imagesloaded.js"></script>
<script src="js/jquery.masonry.js"></script>
<script src="js/bootstrap.min.js"></script>
<script ssrc="js/rainbows.js"></script>
</body>
</html>