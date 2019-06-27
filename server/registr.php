<?php 

function check($username,$link){
  $ch = true;
  $usernames = mysqli_query($link,"SELECT username FROM `users`") or die(mysql_error());
  while ($result = mysqli_fetch_array($usernames)) {
    if($username == $result['username']){
      $ch = false;
      require_once 'registr.html';
      echo '<br>Такое имя пользователя уже существует!';
    }
  }
  return $ch;
}
   $username = htmlentities($_POST['username']);
   $password = md5(htmlentities($_POST['password']));
   $date = date('Y-m-d H:i:s');
   $link = mysqli_connect('localhost', 'root', '', 'authorization');

   if (!$link) {
     echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
     exit;
   }

   /*$verification = new Verification($username,$link);
   $verification->check();*/
   $ch = check($username,$link);

   if(isset($_POST['username']) && isset($_POST['password'])){
     if($ch == true){
      $sql = mysqli_query($link, "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('{$username}', '{$password}', '{$date}')");
      if ($sql) {
        echo '<p>Привет ' . $username . '</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }
   }

   mysqli_close($link);

  