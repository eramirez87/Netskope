<?php
include_once('connect.php');
$connect = new Connect();
echo json_encode($connect->push_comment( $_POST ));
