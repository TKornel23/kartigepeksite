<?php

    require('admin/assets/db/db.php');

    if(isset($_POST['submit'])){
        $searchQuery = $_POST['search'];
        $data = "SELECT * from product WHERE title LIKE '%$searchQuery%' ORDER BY id DESC";    
    }
    else{
        $data = "SELECT * from product ORDER BY id DESC";
    }
    
    $query = mysqli_query($conn , $data);
    $countRows = mysqli_num_rows($query);

    if($countRows > 0){
        $message = $countRows." Product(s) Found";
    }
    else{
        $message = "No Matching Product Found, Try a Different Search";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
    rel="stylesheet"
    />
    <title>Product Catalog</title>
</head>
<body style="background-color: #eee;">
<section>
    <div class="text-center mt-5">
        <form class="text-center" method="POST">
            <input class="form-control w-50 d-inline" type="text" name="search" value="<?=(isset($_POST['search']) ? $_POST['search'] : "")?>" placeholder="Search..." />
            <input class="btn btn-md btn-info" type="submit" name="submit" value="Search"/>
        </form>
    </div>
    <h5 class="text-center mt-4"><?=$message?> </h5>
    <div class="container py-2">
        <div class="row justify-content-center mb-3">
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3 mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                    <img src="admin/assets/images/<?=$row['image']?>"
                                        class="w-100" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h4><?= ucwords($row['title'])?></h4>
                                    <p class="text-truncate mb-4 mb-md-0">
                                        <?=$row['description']?>
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">$<?=$row['price']?></h4>
                                    </div>
                                    <div class="d-flex flex-column mt-4">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?=$row['id']?>" type="button">View Images</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModal<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Product #<?=$row['id']?></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="carouselExampleIndicators<?=$row['id']?>" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" id="div_view_image">
                                            <img class="w-100" id="view_image_1" src="admin/assets/images/<?=$row['image']?>" alt="First slide">
                                        </div>
                                        <?php if(!empty($row['image_2'])) { ?>
                                            <div class="carousel-item">
                                                <img class="w-100" src="admin/assets/images/<?=$row['image_2']?>" alt="Second slide">
                                            </div>
                                        <?php } if(!empty($row['image_3'])) { ?>
                                            <div class="carousel-item">
                                                <img class="w-100" src="admin/assets/images/<?=$row['image_3']?>" alt="Second slide">
                                            </div>
                                        <?php } if(!empty($row['image_4'])) { ?>
                                            <div class="carousel-item">
                                                <img class="w-100" src="admin/assets/images/<?=$row['image_4']?>" alt="Second slide">
                                            </div>
                                        <?php } if(!empty($row['image_5'])) { ?>
                                            <div class="carousel-item">
                                                <img class="w-100" src="admin/assets/images/<?=$row['image_5']?>" alt="Second slide">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators<?=$row['id']?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators<?=$row['id']?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                
                                <p class="mt-5">
                                    <h4>Description</h4>
                                    <?=$row['description']?>
                                </p>

                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
    ></script>
</body>
</html>
