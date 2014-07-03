<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign up page</title>
  <style>
    @import url(//fonts.googleapis.com/css?family=Lato:700);

    body {
      margin:0;
      font-family:'Lato', sans-serif;
      text-align:center;
      color: #999;
    }

    .welcome {
      width: 300px;
      height: 200px;
      position: absolute;
      left: 50%;
      top: 50%;
      margin-left: -150px;
      margin-top: -100px;
    }

    a, a:visited {
      text-decoration:none;
    }

    h1 {
      font-size: 32px;
      margin: 16px 0 0 0;
    }
  </style>
</head>
<body>
  
<h1><?php echo $note ?> </h1>
  <form class="form-horizontal" method='post' action='/signin'>
    <fieldset>
      <div id="legend" class="">
        <legend class="">Signing up</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Username</label>
          <div class="controls">
            <input type="text" placeholder="username" class="input-xlarge" name="username">
            
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Password</label>
          <div class="controls">
            <input  placeholder="Password" class="input-xlarge" type="password" name="password">
            
          </div>
        </div>

     <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Sign in</label>
          <div class="controls">
            <input  type="submit" name="submit" value='Sign in'>
            
          </div>
        </div>

    </fieldset>
  </form>

</body>
</html>
