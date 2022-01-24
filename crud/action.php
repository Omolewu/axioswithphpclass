<?php
require "db.php";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE  FROM posts WHERE id=?";
    $delete = $conn->prepare($sql);
    $delete->bind_param('i', $id);
    if ($delete->execute()) {
        header('location:index.php');
    }
}
if(isset($_GET['update'])){
    $id= $_GET['update'];
    $sql = "UPDATE posts SET title=? body=?";
}
