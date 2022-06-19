<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include '../../db/db.php';

    $curr_pass = $_POST['curr_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $admin_id = $_SESSION['admin']['id'];

    // echo json_encode([
    //     'success' => 1,
    //     'data' => $admin_id
    // ]);
    // return;


    $checkCurrentPassword = "SELECT * from `admin` WHERE id = '$admin_id'";
    $queryCheckCurrentPassword = mysqli_query($conn, $checkCurrentPassword);
    $checkPassword = mysqli_fetch_assoc($queryCheckCurrentPassword);

    if($checkPassword['password'] == $curr_pass){
        if($new_pass == $confirm_pass){
            $updatePassword = "UPDATE `admin` SET `password` = '$confirm_pass' WHERE id ='$admin_id'";
            $queryUpdatePassword = mysqli_query($conn, $updatePassword);
            if($queryUpdatePassword){
                echo json_encode([
                    'success' => 1,
                    'data' => 'Password Has Been Updated Successfully'
                ]);
                return;                
            }
            else{
                echo json_encode([
                    'success' => 0,
                    'data' => 'Fialed to Update Password, Try Again'
                ]);
                return;
            }
        }
        else{
            echo json_encode([
                'success' => 0,
                'data' => 'Both New & Confirm Passwords Donot Match'
            ]);
            return;            
        }
    }

    else{
        echo json_encode([
            'success' => 0,
            'data' => 'Current Password Donot Match'
        ]);
        return;
    }
?>