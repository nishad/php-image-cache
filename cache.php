<?php

# Ok, the file does not exist on our server. Get it from the remote server
# http://example.com/pictures/$image_path

$image_path = $_GET['querystring'];

# You may want to do some sanity checking here, depending on which file names
# you are allowing.
$url = "http://example.com/pictures/$image_path";


# Check to see if we can load the URL at all.
$data = @file_get_contents($url);

if($data)
{
  # Permission to write to server is required.
  file_put_contents("$image_path", $data);

  # Redirect the user to the remote server this time.
  # Next time she will get the cached image.
  header("Location: $url");

} else {

  # Did not find the image on remote server. Send user to our missing image.
  header("Location: http://example.com/images/missing.png");
}

?>
