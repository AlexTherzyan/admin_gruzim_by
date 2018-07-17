<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 10.07.2018
 * Time: 14:32
 */



function pagination ($elements_by_page)
{

    $cur_page = $_GET['page'] ?? 1;
    $page_items = $elements_by_page;
    $record_count = R::count(orders);
    $page_count = ceil($record_count / $page_items);
    $offset = ($cur_page - 1) * $page_items;
    $pages =  range(1,$page_count);

    $pagination = [
        'cur_page' => $cur_page,
        'page_items' => $page_items,
        'record_count' => $record_count,
        'page_count' => $page_count,
        'offset' => $offset,
        'pages' => $pages,
    ];



    return   $pagination ;

}