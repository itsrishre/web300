<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Miracle - Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Miracle</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="span10">
          <h1>Send Pictures To Friends</h1>
          <p>Miracle is a new way to share images with your friends.</p>
          <div class="alert alert-success">
            <?php
            if(@$_SESSION['flash'])
            {
              echo $_SESSION['flash'];
              unset($_SESSION['flash']);
            }
            else
            {
              echo "Welcome to Miracle. You have ".$_SESSION['credits']." credits";
            }
            if($_SESSION['credits']>0)
              echo "<br> Congrats, the flag is ".$flag;
            ?>
          </div>
        </div>
        <div class="span6">
          <h3>Send a picture</h3>
          <form class="form-horizontal" action="sendimage.php" method="POST">
            <div class="control-group">
              <label class="control-label" for="img_url">Image URL</label>
              <div class="controls">
                <input type="url" name="img_url" id="img_url" placeholder="Image URL">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="username">Username</label>
              <div class="controls">
                <input type="text" name="username" id="username" placeholder="Send to which username">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="submit" class="btn" value="Send Image">
              </div>
            </div>
          </form>
        </div>
        <div class="span4">
          <h3>Send some credits</h3>
          <form class="form-horizontal" action="sendcredits.php" method="GET">
            <div class="control-group">
              <label class="control-label" for="credits">Credits</label>
              <div class="controls">
                <input type="number" name="credits" id="credits" placeholder="Credits to Send">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="username">Username</label>
              <div class="controls">
                <input type="text" name="username" id="username" placeholder="Send to which username">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="submit" class="btn" value="Send Credits">
              </div>
            </div>
          </form>
        </div><!-- /span4 -->
        <div class="span12">
          <h2>Images sent to you </h2>
          <?php
          while($row=$images->fetch_assoc())
          {
            echo "<img src='{$row['url']}'><br>";
          }
          ?>
        </div>
      </div><!-- /row -->
    </div> <!-- /container -->
  </body>
</html>