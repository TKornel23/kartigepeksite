<?php 
    $_PAGE = "Home";
    include "header.php"; 
?>

<div class="container mt-2 card p-4">
    <h3 class="text-center">---- Add Product ----</h3>
    <hr/>
    <form id="add-product" method="POST" enctype='multipart/form-data'>
        <input type="hidden" class="form-control" id="productid" name="productid">
        <input type="hidden" class="form-control" id="task" name="task" value="add_content">
        <div class="row">
            <div class="col-md-4 mt-3">
                Enter Title *
                <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" required>
            </div>
            <div class="col-md-4 mt-3">
                Enter Price *
                <input type="text" class="form-control" placeholder="Enter Price" name="price" id="price" required>
            </div>

            <div class="col-md-4 mt-3">
                Select Image #1 <strong>(Primary) *</strong>
                <input type="file" name="file_1"/>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3 mt-3">
                Select Image #2
                <input type="file" name="file_2"/>
            </div>
            <div class="col-md-3 mt-3">
                Select Image #3
                <input type="file" name="file_3"/>
            </div>
            <div class="col-md-3 mt-3">
                Select Image #4
                <input type="file" name="file_4"/>
            </div>
            <div class="col-md-3 mt-3">
                Select Image #5
                <input type="file" name="file_5"/>
            </div>
        </div>
        <br/>
        Enter Description *
        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Description" required></textarea>

        <div class="form-group text-right mt-2">
            <button class="btn btn-md btn-info enableOnInput" onclick="location.reload();">Reset</button>
            <button class="btn btn-md btn-success enableOnInput" type='submit'>Save</button>
        </div>
    </form>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>View Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Product #<span id="view_id"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="div_view_image">
                            <img class="d-block w-100" id="view_image_1" src="https://images.pexels.com/photos/268941/pexels-photo-268941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="First slide">
                        </div>
                        <div class="d-none" id="div_view_image_2">
                            <img class="d-block w-100" id="view_image_2" src="https://images.pexels.com/photos/268941/pexels-photo-268941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Second slide">
                        </div>
                        <div class="d-none" id="div_view_image_3">
                            <img class="d-block w-100" id="view_image_3" src="https://images.pexels.com/photos/268941/pexels-photo-268941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Third slide">
                        </div>
                        <div class="d-none" id="div_view_image_4">
                            <img class="d-block w-100" id="view_image_4" src="https://images.pexels.com/photos/268941/pexels-photo-268941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Third slide">
                        </div>
                        <div class="d-none" id="div_view_image_5">
                            <img class="d-block w-100" id="view_image_5" src="https://images.pexels.com/photos/268941/pexels-photo-268941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="text-center mt-4">
                    <h2 id="view_title"></h2>
                </div>
                
                <p id="view_description"></p>

                <div class="text-right mt-3">
                    <button class="btn btn-md btn-info" id="view_price"></button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="assets/js/product.js"></script>
