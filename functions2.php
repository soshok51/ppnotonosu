<!DOCTYPE html>
<html>
	<head>
		<title>РЕГИСТРАЦИЯ!!!</title>
		<link rel="stylesheet" href="css.css">
	</head>
	<body>
		<h1>РЕГИСТРАЦИЯ!</h1>
		<form method="post">
			<input name="email" type="email" placeholder="Введите почту"><br><br>
			<input name="password" type="password" placeholder="Введите пароль"><br><br>
			<input name="repeat_password" type="password" placeholder="Введите повторно пароль"><br><br>
			<input name="phone_number" type="tel" placeholder="Введите номер телефона"><br><br>
			<input name="name" type="text" placeholder="Введите имя"><br><br>
			<input name="came_from" type="text" placeholder="Откуда вы о нас узнали?"><br><br>
			<input name="date_birth" type="date" placeholder="Введите дату рождения"><br><br>
			<button type="submit">ЕПТЕГ</button>
		</form>
		<h2>
		<?php
		if (empty($_POST)){
			die();
		}
		$data = [
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'repeat_password' => $_POST['repeat_password'],
			'phone_number' => $_POST['phone_number'],
			'name' => $_POST['name'],
			'came_from' => $_POST['came_from'],
			'date_birth' => new DateTime($_POST['date_birth'])
		];
		function validation(){
			global $data;
			$message = [];
			$status = true;
			$age = (new DateTime())->diff($data['date_birth'])->y;
			if (!(!empty($data['email']) && str_contains($data['email'], '@') && strlen($data['email']) > 5)){
				$status = false;
				$message[] = "Вы не ввели свой email, либо он не содержит собачку и/или менее 5 символов.";
			}
			if (!(!empty($data['password']) && ($data['password'] == $data['repeat_password'] || empty($data['repeat_password'])) && strlen($data['password'] >= 8 && preg_match('/[A-Za-z]/', $data['password']) && preg_match('/[0-9]/', $data['password'])))){
				$status = false;
				$message[] = "Вы не ввели пароль, либо повторно введённый пароль не совпадает, либо ваш пароль не содержит буквы и цифры.";
			}
			if (empty($data['repeat_password'])){
				$status = false;
				$message[] = "Вы не повторили пароль.";
			}
			if (!empty($data['phone_number']) && strlen($data['phone_number']) < 5){
				$status = false;
				$message[] = "Ваш номер телефона меньше 5 символов.";
			}
			if (!(!empty($data['name']) && preg_match('/^[а-яёА-ЯЁa-zA-Z ]+$/u', $data['name']))){
				$status = false;
				$message[] = "Вы не ввели имя, либо оно содержит посторонние символы.";
			}
			if (!preg_match('/site|city|tv|others/i', $data['came_from']) && !empty($data['came_from'])){
				$status = false;
				$message[] = "Мы не знаем источника откуда вы о нас узнали.";
			}
			if (!(!empty($data['date_birth']) && $age >= 15 && $age <= 67)){
				$status = false;
				$message[] = "Вы не ввели дату рождения, либо вы младше 15 или старше 67 лет.";
			}
			if ($status){
				$message[] = "Ваши данные введены корректно! :)";
			}
			return ['status' => $status, 'message' => $message];
		}
		$result = validation();
		foreach ($result['message'] as $i){
			echo $i . "<br>";
		}
		?>
	</body>
</html>