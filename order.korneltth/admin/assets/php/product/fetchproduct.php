<?php
    include("../../db/db.php");		

    $data = "SELECT * from product ORDER BY id DESC";
    $query = mysqli_query($conn , $data);
    $count = mysqli_num_rows($query);

    if($count > 0){
        $i = 1;
        while($row = mysqli_fetch_assoc($query)) {
            $array[] = array( 
                "id"        =>  $i,
                "title"      =>  $row['title'],
                "price"     =>  $row['price'],
                "view"     =>  "<button class='btn btn-sm btn-dark view-btn' data-id='" . $row['id'] . "'><i class='fas fa-eye' aria-hidden='true'></i></button>",
                "update"    => "<button class='btn btn-sm btn-primary update-btn' data-id='" . $row['id'] . "'><i class='fas fa-pen' aria-hidden='true'></i></button>",
                "delete"    => "<button class='btn btn-sm btn-danger delete-btn' data-id='" . $row['id'] . "'><i class='fas fa-trash' aria-hidden='true'></i></button>"
            );
            $i++;
        }
        
        //print_r($array);
    
        $dataset = array(
            "echo" => 1,
            "totalrecords" => count($array),
            "totaldisplayrecords" => count($array),
            "data" => $array
        );
    }

    else{

        $array[] = array( 
            
            "id"=>'No Matching Record Found',
            "title"=>'',
            "price"=>'',
            "view"=>'',
            "update"=> "",
            "delete"=> ""
        );
        $dataset = array(
            "echo" => 1,
            "totalrecords" => count($array),
            "totaldisplayrecords" => count($array),
            "data" => $array
        );
    }

    echo json_encode($dataset);

?>