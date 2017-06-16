<?php
/**
 * @author : Ugurkan Kaya
 * @date   : 16.06.2017
 * @PHP Pagination Implementation
 */

require("vendor/autoload.php");

$paginator = new Paginator([
    "perPage"      => 10,
    "pageIndex"    => 5,
    "totalResults" => 100,
    "currentPage"  => $_GET["page"] ?? 1
]);

var_dump($paginator->hasPreviousPage());

var_dump($paginator->hasNextPage());

var_dump($paginator->paginate());
