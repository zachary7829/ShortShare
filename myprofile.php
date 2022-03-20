<?php
require_once('session.php');
//
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
    <center><h1><strong id="account-name-display">Account Name</strong></h1></center>
    <script>
      var sessionuserid = "<?php Print($_SESSION['user_id']); ?>";
      let jsondata = {};
let xhr = new XMLHttpRequest();
xhr.open('GET',"sessionids/data.json",false);
xhr.send();
if ((xhr.responseText).includes('{')){
jsondata = JSON.parse(xhr.responseText);
  document.getElementById("account-name-display").innerHTML = jsondata[sessionuserid];
} else {
  document.getElementById("account-name-display").innerHTML = 'Username for sessionid not Found';
}
    </script>
  </body>
</html>
<?php
$xml = file_get_contents('sessionids/data.json');
$obj = json_decode($xml);
$key = "" . $_SESSION['user_id'] . "";
$username = $obj->$key;
$xml = file_get_contents('accounts/' . $username . '/data.json');
/*
$obj = json_decode($xml, true);
$keys = array_keys($obj);
$last_key = array_pop($keys);
echo 'Last key: ' . $last_key;
*/
$obj = json_decode($xml);
$key = "" . $_SESSION['user_id'] . "";
$shortcuts = $obj->Shortcuts;
$keys = array_keys($shortcuts);
$elementInIndex = end(array_values($keys));
while ($elementInIndex >= 0){
  echo $shortcuts[$elementInIndex] . '</br>';
  $elementInIndex -= 1;
}
?>