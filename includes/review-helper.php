<?php 
require_once 'dbhandler.php';
date_default_timezone_set('UTC');

if (isset($_POST['review-submit'])) {
    session_start();
    $uname = $_SESSION['username'];
    $title = $_POST['review-title'];
    $data = date('Y-m-d H:i:s');
    $review = $_POST('review');
    $item_id = $_POST('item-id');
    $rating = $_POST('rating');
    $sql = "INSERT INTO reviews (item_id, uname, title, review_text, rev_data, rating_num, status) VALUES ($item_id, '$uname', '$title', '$review', '$date', '$rating',1);";
    $stmt = mysqli_stmt_init($conn);
    $result = $conn->query($sql);
    header("Location: ../review.php?id=$item_id");
    exit();
}


function error($msg){
    $resp = array("success"=> false, "message"=>$msg);
    return json_encode($resp);
}
