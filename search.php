<?php



//
//function isAjax() {
//    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
//}
//
//
//function typeaheadAction(){
//    if(isAjax()){
//        $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
//        if($query){
//
//            $products = R::getAll('SELECT id, title FROM product WHERE title LIKE ? LIMIT 11', ["%{$query}%"]);
//
//            echo json_encode($products);
//        }
//    }
//die;
//}



function search()
{
    $search = null;
    if (isset($_POST['search'])) {

        $search = $_POST['search'];
        return $search = R::getAll("SELECT o.user_id, order_id, info, `status`, name FROM orders o JOIN users u ON o.user_id = u.id WHERE MATCH(name) AGAINST('$search.*')");
    }

}






?>




