<?php 

require 'db.php';
require('data.php');
require('functions.php');
require('config.php');
require('pagination.php');

require('search.php');


if(isset($_SESSION['logged_user']))
{
if ($config['enable']){
    
	 $session_name =  $_SESSION['logged_user']->email;
//	 '<a href="login.php">Выйти</a>';

    
   //$orders = R::getAll('SELECT o.user_id, order_id, info, `status`, name FROM orders o JOIN users u ON o.user_id = u.id');


//   $search = search();
   $pagination = pagination(3);

   $page_items = $pagination['page_items'];
   $offset = $pagination['offset'];


    $orders = R::getAll("SELECT o.user_id, order_id, info, `status`, name FROM orders o JOIN users u ON o.user_id = u.id ORDER BY order_id DESC  LIMIT $page_items OFFSET $offset ");




function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

    function typeaheadAction(){
        if(isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){

                $products = R::getAll('SELECT id, title FROM product WHERE title LIKE ? LIMIT 11', ["%{$query}%"]);

                echo json_encode($products);
            }
        }
    die;
    }


if (isset($_POST['change'])){


   echo $info  = $_POST['changedName'];
    $id = $_POST['change'];
    echo $id;
    $change = R::exec( "update orders set info=$info where order_id=$id" );





}


  if(isset($_POST['delete'])){

      $delete = $_POST['delete'];
     echo $delete;

//    $post = R::load( 'orders', $delete );



//    $needles = R::findAll('orderes',' order_id = ?',  $delete );
//       var_dump($needles);
//      R::trash( $post );
  }
 	 
	

    $page_content = includeTemplate('main.php',
                                                ['category'     => $category,
                                                 'orders'       => $orders,
                                                 'search'       => $search,
                                                 'pages'        => $pagination['pages'],
                                                 'pages_count'  => $pagination['page_count'],
                                                 'curr_page'    => $pagination['cur_page'],
                                                 'record_count' => $pagination['record_count']

                                                 ]);
    $layout_content = includeTemplate('linkLayout.php', [
        'content' => $page_content,
        'session_name'    => $session_name,
        'title' => 'GifTube - Главная страница'
    ]);

    print($layout_content);



}
else{
   $pageContent = require_once('error_404.php');
}
	
	
}
else  header('Location: login.php');

?>





 <!-- <a href="signup.php">Зарегистрироваться</a> -->
 <!-- <a href="login.php">Войти</a> -->
 