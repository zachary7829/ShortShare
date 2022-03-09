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
    <!--
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD SHORTCUT</button>
      -->
    <form action="uploadshortcut.php" method="POST">
    <div>
        <label for="SHORTCUT_NAME">Shortcut Name:</label>
        <input type="text" id="SHORTCUT_NAME" name="SHORTCUT_NAME" />
    </div>
    <div>
        <label for="SHORTCUT_VERSION">Shortcut Version:</label>
        <input type="text" id="SHORTCUT_VERSION" name="SHORTCUT_VERSION" />
    </div>
    <div>
        <label for="SHORTCUT_ICLOUDLINK">iCloud Link:</label>
        <input type="text" id="SHORTCUT_ICLOUDLINK" name="SHORTCUT_ICLOUDLINK" />
    </div>
    <button type="submit" name="submit">Submit Shortcut</button>
    </form>
    <form action="signup.php" method="POST">
    <div>
        <label for="ACCOUNT_NAME">Account Name:</label>
        <input type="text" id="ACCOUNT_NAME" name="ACCOUNT_NAME" />
    </div>
    <div>
        <label for="ACCOUNT_PASSWORD">Account Password:</label>
        <input type="password" id="ACCOUNT_PASSWORD" name="ACCOUNT_PASSWORD" />
    </div>
    <div>
        <label for="ACCOUNT_EMAIL">Email:</label>
        <input type="text" id="ACCOUNT_EMAIL" name="ACCOUNT_EMAIL" />
    </div>
    <button type="submit" name="submit">Sign Up</button>
    </form>
    <form action="login.php" method="POST">
    <div>
        <label for="ACCOUNT_NAME">Account Name:</label>
        <input type="text" id="ACCOUNT_NAME" name="ACCOUNT_NAME" />
    </div>
    <div>
        <label for="ACCOUNT_PASSWORD">Account Password:</label>
        <input type="password" id="ACCOUNT_PASSWORD" name="ACCOUNT_PASSWORD" />
    </div>
    <button type="submit" name="submit">Login</button>
    </form>
    <?php
    ?> 
    <p>ShortShare</p>
    <p>by Zachary Keffaber (zachary7829)</p>
  </body>
</html>