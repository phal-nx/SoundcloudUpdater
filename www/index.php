<h4><a href="login.php" style="font-family: verdana,helvetica,arial,sans-serif">Change Login</a></h4>
<h3 style="font-family: verdana,helvetica,arial,sans-serif; font-size: 22px; margin-top: 10px; margin-bottom: 10px;font-weight: normal;">Soundcloud Links to repost daily (separate by newline)</h3>
<?php
// configuration
$url = 'http://ec2-54-69-224-246.us-west-2.compute.amazonaws.com';
$file = '/var/www/html/topost.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<form action="" method="post">
<textarea style="width: 600px; height: 200px; border: 3px solid #cccccc; padding: 5px" rows=25 columns=100 name="text"><?php echo htmlspecialchars($text) ?></textarea>
<br>
<input type="submit" style="background: #25A6E1;	background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	padding:8px 13px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:17px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9" />
</form>
