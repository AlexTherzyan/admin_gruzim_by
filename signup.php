<?php 



require 'db.php';

$data = $_POST;

$data_email = $data['email'];

$reg = '';


if(isset($data['do_signup']))
{
	//обрабатываем данные

	$errors =  array();


	if(trim($data['email'] == ''))
	{
			$errors[] = 'поле email не должно быть пустым';
	}

	if(trim($data['password'] == ''))
	{
			$errors[] = 'поле пароль не должно быть пустым';
	}

	if($data['reply_password'] != $data['password'])
	{
			$errors[] = 'повторный пароль не совпадает';
	}

	if (R::count('userstest', 'email = ?', array($data['email'])) > 0) {
		$errors[] = 'пользователь с таким email уже существует';
	}

	if(empty($errors)){
		// все хорошо, регистрируем

		//создаем таблицу users
		$user = R::dispense('userstest');
		$user -> email = $data['email'];
		$user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);
		 //header('Location: signup.php');
		$reg =  '<div class="container" style="color: green; float=right;">' .  'Вы успешно зарегистрированы ' . '</div>';
		 
	}
	else
	{

		echo '<div  style="color: red; "> '.array_shift($errors).' </div>';
	}

}



 ?>
 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<div class="container" style=" border: 1px solid gray; margin-top: 150px; width: 350px; ">

<form action="signup.php" method="post" style="padding: 30px;">

  <div class="form-group">
    <label for="exampleInputEmail1">Ваша почта</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$data_email?>">
     
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Введите пароль</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Введите пароль еще раз</label>
    <input name="reply_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  

  <button name="do_signup" type="submit" class="btn btn-primary" style="float: right;">Зарегистрироваться</button>
</form>
	<?=$reg;?>
</div>
		