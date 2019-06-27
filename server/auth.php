<?php 
       $username = htmlentities($_POST['username']);
       $password = md5(htmlentities($_POST['password']));
       $link = mysqli_connect('localhost', 'root', '', 'authorization');
       if (!$link) {
              echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
              exit;
       }

       $coinc = false;
              if(isset($_POST['username']) && isset($_POST['password'])){
                 $sql = mysqli_query($link,"SELECT `username`, `password` FROM `users`") or die(mysql_error());
                 while ($result = mysqli_fetch_array($sql)) {
                    if($username == $result['username'] && $password == $result['password']){
                       $coinc = true;
                     }
                 }
              }
       
       if($coinc==true){
              echo 'Приветствую, ' . $username . '!!!';
       }else{
              require_once 'index.html';
              echo '<br>Проверьте правильность ввода имени пользователя и пароля!';
       }

   /*if(isset($_POST['username']) && isset($_POST['password'])){
     if($ch == true){
      $sql = mysqli_query($link, "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('{$username}', '{$password}', '{$date}')");
      if ($sql) {
        echo '<p>Привет ' . $username . '</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }
   }*/