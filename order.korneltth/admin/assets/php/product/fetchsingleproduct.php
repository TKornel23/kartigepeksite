<?php
    include("../../db/db.php");		

    $data = "SELECT * from product WHERE id = '".$_POST['id']."'";
    $query = mysqli_query($conn , $data);
    $row = mysqli_fetch_assoc($query);

    echo json_encode([
        'success' => 1,
        'title' => $row['title'],
        'price' => $row['price'],
        'description' => $row['description'],
        'image' => $row['image'],
        'image_2' => $row['image_2'],
        'image_3' => $row['image_3'],
        'image_4' => $row['image_4'],
        'image_5' => $row['image_5']

    ]);
    return;
?>