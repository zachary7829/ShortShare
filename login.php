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

.site-home-link {
    color: white;
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
    <nav class="site-nav"><a class="site-home-link" href="./index.php">ShortShare</a><a class="githublink" href="./browse.html">‎ ‎ Browse</a><a class="githublink" href="./private.php">‎ ‎ Private</a></a></nav>
    &nbsp;
  </body>
</html>
<?php
if (isset($_POST['ACCOUNT_NAME'], $_POST['ACCOUNT_PASSWORD'])) {
	$name = $_POST['ACCOUNT_NAME'];
  $unhashedpw = $_POST['ACCOUNT_PASSWORD'];
  $xml = file_get_contents('accounts/data.json');
  $obj = json_decode($xml);
  $key = "Account Password";
  $hashedpw = $obj->$key;
  $iscorrectpw = password_verify($unhashedpw, $hashedpw);
  if ($iscorrectpw == 1){
    echo '<br>Correct Password</br>';

    $sessionuserid = uniqid('',true);
    $result = '{"' . $sessionuserid . '":"' . $name . '"}';
    $filename = 'sessionids/data.json';
    if (is_writable($filename)) {
      if (!$fp = fopen($filename, 'a')) {
        echo "Cannot open file ($filename)";
        exit;
      }
      fwrite($fp, $result);
      fclose($fp);
    }
    $_SESSION['user_id'] = $sessionuserid;
    /*header('Location: public.php');*/
  } else {
    echo '<br>Incorrect Password</br>';
  }
} else {
	echo '<br>You need to provide your account name, account password, and/or account email.</br>';
}
ob_flush();
?>