<?php

    include '../../db/db.php';

    //check if request is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['task']))
        {
            // check what to do
            if ($_POST['task'] == 'adminlogin')
            {
                // input sanitizing
                $password = strip_tags($_POST['pwd']);

                $password =  htmlspecialchars($password);

                $sql = "SELECT * FROM `admin` WHERE password = '$password'";

                $result = mysqli_query($conn,$sql);
                $admin = mysqli_fetch_array($result);
                
               
                if (!empty($admin)) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION['admin'] = [
                        'id'           => $admin['id'],
                        'userName'     => $admin['name'],
                        /*  */
                    ];

                    echo json_encode(
                        [
                            "success" => 1,
                            "msg"     => 'You have been logged in successfuly.'
                        ]
                    );
                } else {
                    echo json_encode(
                        [
                            "success" => 0,
                            "msg"     => 'Sorry! Username and Password does not match.'
                        ]
                    );
                }

            }
        }
    }

?>
