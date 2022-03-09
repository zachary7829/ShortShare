<?php
session_start();
?>
<html>
  <head>
    <title>ShortShare</title>
    <style>
a {
    text-decoration: none;
}
@media (prefers-color-scheme: dark) {
  body {
    background-color: black;
    color: lightgreen;
  }
}
@media (prefers-color-scheme: light) {
    /*
    light mode. not used atm but just in case i want to ever add a light mode to my site
    */
  body {
    background-color: black;
    color: lightgreen;
  }
}

.site-nav {
    border-radius:10px;
    display: flex;
    background: #252a34;
    color: white;
    padding: 1em;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
}

.mypfp {
    border-radius:100px;
    max-width: 10%;
    max-width: 10%;
}
body {
    font-family: Arial, Helvetica, sans-serif;
}
.githublink {
    background: linear-gradient(to right, royalblue, royalblue 50%, lightblue 50%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 100%;
    background-position: 100%;
    transition: background-position 275ms ease;
    color: lightblue;
    text-align: right;
}
.githublink:hover {
    color: royalblue;
    background-position: 0 100%;
}
  </style>
  </head>
  <body>
    <nav class="site-nav">ShortShare<a class="githublink" href="./index.php">‎ ‎ Home</a></a></nav>
    &nbsp;
<?php
if (isset($_POST['SHORTCUT_NAME'], $_POST['SHORTCUT_VERSION'], $_POST['SHORTCUT_ICLOUDLINK'])) {
	$name = $_POST['SHORTCUT_NAME'];
  $version = $_POST['SHORTCUT_VERSION'];
  $icloudlink = $_POST['SHORTCUT_ICLOUDLINK'];
  $xml = file_get_contents('sessionids/data.json');
  $obj = json_decode($xml);
  $key = "" . $_SESSION['user_id'] . "";
  $username = $obj->$key;

	// show the $name and $email
	echo "<br>Uploading $version of $name to ShortShare...</br>";
  echo "<br>iCloud Link of $name is $icloudlink...</br>";
  $result = '{"Shortcut Name":"' . $name . '","Shortcut Version":"' . $version . '","Shortcut iCloud Link":"' . $icloudlink . '","Username":"' . $username . '"}';
  $filename = 'shortcuts/data.json';
  if (is_writable($filename)) {
    if (!$fp = fopen($filename, 'a')) {
      echo "Cannot open file ($filename)";
      exit;
    }
    fwrite($fp, $result);
    fclose($fp);
  }
} else {
	echo 'You need to provide your shortcut name, shortcut version, and/or shortcut icloud link.';
}
echo 'Hello There!'
?>
  </body>
</html>