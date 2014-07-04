@extends('layout')
	
@section('title')
    
	titlettt.
@stop

@section('content')
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
              echo '<tr>
              <td>'.$u->username.'</td>
              <td>'.$u->password.'</td>
			  <td>'.'btns'.'</td>
              </tr>';
             
            }
         ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop