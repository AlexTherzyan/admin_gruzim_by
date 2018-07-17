<?php 


 function includeTemplate($filename, $content = [])
{

    if (is_readable($filename)) {
        ob_start();
        extract($content);
        require_once $filename;
        return ob_get_clean();
    } else return "файл не найден";
}


function searchUserByEmail($email, $users){
     $result = null;

     foreach ($users as $user){
         if ($user['email'] == $email){
             $result = $user;
             break;
         }
     }

     return $result;
}


?>