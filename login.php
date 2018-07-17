<?php 

require 'db.php';

$data = $_POST;


function get_email(){
    if(isset($data['email']))
    return $email = $data['email'];
    else  return $email = '';
}

if(isset($data['do_login']))

{

	$errors =  array();


	if(trim($data['email'] == ''))
	{
			$errors[] = 'поле email не должно быть пустым';
	}

	if(trim($data['password'] == ''))
	{
			$errors[] = 'поле пароль не должно быть пустым';
	}


	//-- находим пользователя 
	$user = R::findOne('userstest', 'email = ?', array($data['email']));
	//-- если пользователь существует
	if ($user) {

		if (password_verify($data['password'], $user->password)) {
			
			//запоминаем пользователя
			$_SESSION['logged_user'] = $user;
			// echo '<div  style="color: green; "> '.'Добро пожаловать'.' </div>';
			// echo '<a href="index.php">Войти на главную</a>';
			header('Location: /');
		}
		else
		{
			$errors[] = 'Неверное имя пользователя или пароль';	
		}
		
	}else
	{
		$errors[] = 'Пользователь с таким email не найден';
	}

	if(!empty($errors))
	{
	echo '<div  style="color: red; "> '.array_shift($errors).' </div>';
	}


}

 ?>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<div class="container" style=" border: 1px solid gray; margin-top: 150px; width: 350px; ">

<form action="login.php" method="post" style="padding: 30px;">

  <div class="form-group">
    <label for="exampleInputEmail1">Почта</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?=get_email();?>">
     
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>



  
  <a href="signup.php">Зарегистрироваться</a>
  <button name="do_login" type="submit" class="btn btn-primary" style="float: right;">Войти</button>
</form>
	
</div>









		
		
		
		