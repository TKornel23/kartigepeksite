<?php
    include '../../db/db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if($_POST['task'] == 'add_content'){

            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            
            $image_1 = $_FILES['file_1']['name'];
            $image_2 = (empty($_FILES['file_2']['name']) ? "" : $_FILES['file_2']['name']);
            $image_3 = (empty($_FILES['file_3']['name']) ? "" : $_FILES['file_3']['name']);
            $image_4 = (empty($_FILES['file_4']['name']) ? "" : $_FILES['file_4']['name']);
            $image_5 = (empty($_FILES['file_5']['name']) ? "" : $_FILES['file_5']['name']);

            $id = $_POST['productid'];

            if(empty($title) || empty($price) || empty($description)){
                echo json_encode([
                    'success' => 0,
                    'data' => 'All Fields Are Required'
                ]);
                return;
            }

            else if(empty($image_1)){
                echo json_encode([
                    'success' => 0,
                    'data' => 'Atleast 1 Primary Image is Required'
                ]);
                return;
            }
            else{

                $target_dir = "../../images/";
                move_uploaded_file($_FILES['file_1']['tmp_name'],$target_dir.$image_1);

                if(!empty($image_2)){
                    move_uploaded_file($_FILES['file_2']['tmp_name'],$target_dir.$image_2);
                }
                if(!empty($image_3)){
                    move_uploaded_file($_FILES['file_3']['tmp_name'],$target_dir.$image_3);
                }
                if(!empty($image_4)){
                    move_uploaded_file($_FILES['file_4']['tmp_name'],$target_dir.$image_4);
                }
                if(!empty($image_5)){
                    move_uploaded_file($_FILES['file_5']['tmp_name'],$target_dir.$image_5);
                }


                if(!isset($id) || $id == NULL){

                    $query = "INSERT into product (`title`,`description`,`price`,`image`,`image_2`,`image_3`,`image_4`,`image_5`) values ('$title','$description','$price','$image_1','$image_2','$image_3','$image_4','$image_5')";
                }
                
                $result = mysqli_query($conn, $query);
                if($result){
                    
                    echo json_encode([
                        'success' => 1,
                        'data' => 'Saved Successfully'
                    ]);
                    return;
                }
                else{
                    echo json_encode([
                        'success' => 0,
                        'data' => 'Fail To Save, Try Again'
                    ]);
                    return;
                }
            }
        }
        
        else if($_POST['task'] == 'upd_content'){
            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            
            $image_1 = (empty($_FILES['file_1']['name']) ? "" : $_FILES['file_1']['name']);;
            $image_2 = (empty($_FILES['file_2']['name']) ? "" : $_FILES['file_2']['name']);
            $image_3 = (empty($_FILES['file_3']['name']) ? "" : $_FILES['file_3']['name']);
            $image_4 = (empty($_FILES['file_4']['name']) ? "" : $_FILES['file_4']['name']);
            $image_5 = (empty($_FILES['file_5']['name']) ? "" : $_FILES['file_5']['name']);

            $id = $_POST['productid'];

            if(empty($title) || empty($price) || empty($description)){
                echo json_encode([
                    'success' => 0,
                    'data' => 'All Fields Are Required'
                ]);
                return;
            }

            else{

                $imgInsert = ",";

                $target_dir = "../../images/";

                if(!empty($image_1)){
                    move_uploaded_file($_FILES['file_1']['tmp_name'],$target_dir.$image_1);
                    $imgInsert .= "image = '$image_1', ";
                }

                if(!empty($image_2)){
                    move_uploaded_file($_FILES['file_2']['tmp_name'],$target_dir.$image_2);
                    $imgInsert .= "image_2 = '$image_2', ";
                }

                if(!empty($image_3)){
                    move_uploaded_file($_FILES['file_3']['tmp_name'],$target_dir.$image_3);
                    $imgInsert .= "image_3 = '$image_3', ";
                }

                if(!empty($image_4)){
                    move_uploaded_file($_FILES['file_4']['tmp_name'],$target_dir.$image_4);
                    $imgInsert .= "image_4 = '$image_4', ";
                }

                if(!empty($image_5)){
                    move_uploaded_file($_FILES['file_5']['tmp_name'],$target_dir.$image_5);
                    $imgInsert .= "image_5 = '$image_5', ";
                }

                $imgInsert = rtrim($imgInsert, ", ");
                
                $query = "UPDATE product set 
                    `title` = '$title',
                    `description` = '$description',
                    `price` = '$price'
                    ".$imgInsert."
                    where id = '$id'";

                $result = mysqli_query($conn, $query);
                if($result){
                    
                    echo json_encode([
                        'success' => 1,
                        'data' => 'Updated Successfully'
                    ]);
                    return;
                }
                else{
                    echo json_encode([
                        'success' => 0,
                        'data' => 'Fail To Update, Try Again'. $query
                    ]);
                    return;
                }
            }
        }

        else if($_POST['task'] == 'delete_content'){
            $id = $_POST['productid'];
            $deleteQuery = "DELETE from product where id = '$id'";
            $query = mysqli_query($conn, $deleteQuery);
            if($query){
                echo json_encode([
                    'success' => 1,
                    'data' => 'Deleted Successfully'
                ]);
                return;
            }
            else{
                echo json_encode([
                    'success' => 0,
                    'data' => 'Fail To Delete, Try Again'
                ]);
                return;
            }
        }
    }
?>