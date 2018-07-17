<?php 


require 'rb.php';




 R::setup( 'mysql:host=localhost;dbname=display_shop',
        'root', '' ); //for both mysql or mariaDB

// ннужно для запоминания пользователя
 session_start();

 ?>