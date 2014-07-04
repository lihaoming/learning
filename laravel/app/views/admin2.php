<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign up page</title>

  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <style>
  body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}</style>
</head>
<body>
 <div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>
              用户名
            </th>
            <th>
              密码
            </th>
            
          </tr>
        </thead>
        <tbody>
          <?php  
            foreach($users as $u){
              echo '<tr><td>'.$u->username.'</td><td>'.$u->password.'</td></tr>';
             
            }
         ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
