@extends('layout')
	
@section('title')
    
	titlettt.
@stop

@section('content')
<script>
  var isChanging = false;
</script>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
            <th>管理</th>
          </tr>
        </thead>
        <tbody>
          <?php  
            foreach($users as $u){
              echo '<tr id="'.$u->username.'">
              <td>'.$u->username.'</td>
              <td>'.$u->password.'</td>
			  <td>'.'<button class="btn btn-warning change-info" type="button" value="'.$u->username.'">修改</button> 
			  <button class="btn btn-danger delete-info" type="button" value="'.$u->username.'">删除</button> '.'</td>
              </tr>';
             
            }
         ?>
        </tbody>
      </table>
      <button class="btn btn-success add-info" type="button" >增加</button> 
    </div>
  </div>
</div>
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
  $('.change-info').click(function(){
    if(isChanging == false){
    
      //Change button text
      $('.change-info').addClass('certain');   
      $('.change-info').text('确定');    
      var btn = $(this);
      var username = btn.attr('value')
      console.log(isChanging);
      console.log(username)
      var tr_id = 'tr#'+username
      // Change username info
      var username_text = $(tr_id+'>td:first').text()
      username_text = '<textarea>'+username_text+'</textarea>'
      console.log(username_text)
      //$(tr_id+'>td:first').html(username_text)
      
      // Change password info   
      var password_text = $(tr_id+'>td:eq(1)').text();
      password_text = '<textarea>'+password_text+'</textarea>';
      console.log(password_text)
      $(tr_id+'>td:eq(1)').html(password_text)
      isChanging = true;
    } 
    else{
      $('.change-info').removeClass('certain');     
      var btn = $(this);
      var username = btn.attr('value')
      console.log(isChanging);
      console.log(username)
      console.log(username)
      var tr_id = 'tr#'+username;
      var username_text = $(tr_id+'>td:first').text()
      var password_text = $(tr_id+'>td:eq(1)>textarea').val()
      //$(tr_id+'>td:first').html(username_text)     
      //$(tr_id+'>td:eq(1)').html(password_text)
      console.log("username_text: "+username_text);
      $('.change-info').text('修改');   
      isChanging == false;
      var url_put = '/change/'+username_text;
      $.ajax({
        method:'put',
        url: url_put,
        data:{username:username_text, password:password_text},
        success: function(){
          $('.table').load('/admin .table','');
        }

      });
    }    
  })
  $('.delete-info').click(function(){
    var btn = $(this);
    var username = btn.attr('value');
    var url_del = '/delete/'+username;
    console.log('delete: '+url_del);
    $.ajax({
      method:'delete',
      url: url_del,
      data:{username:username}
    })
  })

  $('.add-info').click(function(){
    $(window.location).attr('href', '/signin');
  })
 
</script>
@stop
