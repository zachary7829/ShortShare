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
  if (file_exists("accounts/" . $username . "/" . $name . "/" . "/versions.json")) {
    $fh = fopen("accounts/" . $username . "/" . $name . "/" . "/versions.json", 'r+');
    $stat = fstat($fh);
    ftruncate($fh, $stat['size']-2);
    fclose($fh);
    $fh = fopen("accounts/" . $username . "/" . $name . "/" . "/versions.json", 'a');
    $result = ',"' . $version . '"]}';
    fwrite($fh, $result);
    fclose($fh);
    mkdir("accounts/" . $username . "/" . $name . "/" . $version);
    $fp = fopen("accounts/" . $username . "/" . $name . "/" . $version . "/" . "/data.json","a");
    $result = '{"Shortcut Name":"' . $name . '","Shortcut Version":"' . $version . '","Shortcut iCloud Link":"' . $icloudlink . '","Username":"' . $username . '"}';
    fwrite($fp, $result);
    fclose($fp);
    echo '<br>Your shortcut has been updated!</br>';
  } else {
    mkdir("accounts/" . $username . "/" . $name);
  mkdir("accounts/" . $username . "/" . $name . "/" . $version); //remember to filter for ./ in usernames latr
  $fp = fopen("accounts/" . $username . "/" . $name . "/" . $version . "/data.json","a");
  fwrite($fp, $result);
  fclose($fp);
  $fp = fopen("accounts/" . $username . "/" . $name . "/versions.json","a");
  $result = '{"Versions:"["' . $version . '"]}';
  fwrite($fp, $result);
  fclose($fp);
  if (file_exists("accounts/" . $username . "/" . "data.json")) {
    $fh = fopen("accounts/" . $username . "/" . "data.json", 'r+');
    $stat = fstat($fh);
    ftruncate($fh, $stat['size']-2);
    fclose($fh);
    $fh = fopen("accounts/" . $username . "/data.json", 'a');
    $result = ',"' . $name . '"]}';
    fwrite($fh, $result);
    fclose($fh);
    echo 'Your shortcut has been created and uploaded!';
  } else {
    $fp = fopen("accounts/" . $username . "/" . "data.json","a");
    $result = '{"Shortcuts":["' . $name . '"]}';
    fwrite($fp, $result);
    fclose($fp);
    echo 'Your first shortcut has been created and uploaded!';
  }
  }
} else {
	echo 'You need to provide your shortcut name, shortcut version, and/or shortcut icloud link.';
}
echo 'Hello There, ' . $username . '!';
?>
  </body>
</html>