// Fetching Data

var vendorData = $('#example').DataTable({
	"processing":true,
	"ajax":{
		url:"assets/php/product/fetchproduct.php",
		type:"POST",
		dataType:"json"
	},
	"columns": [
        {data: 'id'},
        {data: 'title'},
        {data: 'price'},
        {data: 'view'},
        {data: 'update'},
        {data: 'delete'},
    ],
});	

$(document).ready(function(){
    vendorData.ajax.reload();
});

// Adding & Updating Data
$(document).on('submit', '#add-product', (function (e) {
    e.preventDefault();
    $('.enableOnInput').prop('disabled', true);
    // console.log('I am clicked');
    $.ajax({
        url: 'assets/php/product/editproduct.php',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            console.log(response);
            //var obj = JSON.parse(response);
            if (response.success == 1) {
                toastr.success(response.data);
                $('#add-product')[0].reset();
                $('#productid').val('');
                $('#description').text('');
                vendorData.ajax.reload();
            } else {
                toastr.error(response.data);
            }

            $('.enableOnInput').prop('disabled', false);
        },
        error: function (response) {
            console.log(response);
            toastr.error('Error:' + response.msg);
            $('.enableOnInput').prop('disabled', false);
        }
    });
}));

// Deleting Data
$(document).on('click', '.delete-btn', (function (e) {
    e.preventDefault();
    var res = confirm("Are You Sure To Delete ?");
    if(res == true)
    {
        id = $(this).attr("data-id");
        //console.log('I am clicked');
        $.ajax({
            url: 'assets/php/product/editproduct.php',
            type: "POST",
            data: { 
                'productid': id,
                'task': 'delete_content' 
            },
            cache: false,
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                if (response.success == 1) {
                    toastr.success(response.data);
                    vendorData.ajax.reload();
                } else {
                    toastr.error(response.data);
                }
            },
            error: function (response) {
                console.log(response);
                toastr.error('Error:' + response.msg);
            }
        });
    }
}));

// Fetching Data For UpdateList
$(document).on('click', '.update-btn', (function (e) {
    e.preventDefault();

    id = $(this).attr("data-id");
   
    $.ajax({
        url: 'assets/php/product/fetchsingleproduct.php',
        type: "POST",
        data: { 
            'id': id, 
        },
        cache: false,
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
            if (response.success == 1) {
                $("#title").val(response.title);
                $("#price").val(response.price);
                $("#description").text(response.description);
                $("#productid").val(id);
                $("#task").val('upd_content');
            } else {
                console.log(response);
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}));


// Fetching Data For View
$(document).on('click', '.view-btn', (function (e) {
    e.preventDefault();

    id = $(this).attr("data-id");
   
    $.ajax({
        url: 'assets/php/product/fetchsingleproduct.php',
        type: "POST",
        data: { 
            'id': id, 
        },
        cache: false,
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
            if (response.success == 1) {
                $('#myModal').modal('show');
                $("#view_title").html(response.title);
                $("#view_price").html("Price: $"+response.price);
                $("#view_description").html(response.description);
                $("#view_id").html(id);
                $("#view_image_1").attr("src", "assets/images/"+response.image);

                $('#div_view_image_2').addClass('d-none');
                $('#div_view_image_3').addClass('d-none');
                $('#div_view_image_4').addClass('d-none');
                $('#div_view_image_5').addClass('d-none');
                $('#div_view_image_2').removeClass('carousel-item');
                $('#div_view_image_3').removeClass('carousel-item');
                $('#div_view_image_4').removeClass('carousel-item');
                $('#div_view_image_5').removeClass('carousel-item');
                $('#div_view_image_2').removeClass('active');
                $('#div_view_image_3').removeClass('active');
                $('#div_view_image_4').removeClass('active');
                $('#div_view_image_5').removeClass('active');

                $('#div_view_image').addClass('active');

                if(response.image_2 != ""){
                    $('#div_view_image_2').removeClass('d-none');
                    $('#div_view_image_2').addClass('carousel-item');
                    $("#view_image_2").attr("src", "assets/images/"+response.image_2);
                }

                if(response.image_3 != ""){
                    $('#div_view_image_3').removeClass('d-none');
                    $('#div_view_image_3').addClass('carousel-item');
                    $("#view_image_3").attr("src", "assets/images/"+response.image_3);
                }

                if(response.image_4 != ""){
                    $('#div_view_image_4').removeClass('d-none');
                    $('#div_view_image_4').addClass('carousel-item');
                    $("#view_image_4").attr("src", "assets/images/"+response.image_4);
                }

                if(response.image_5 != ""){
                    $('#div_view_image_5').removeClass('d-none');
                    $('#div_view_image_5').addClass('carousel-item');
                    $("#view_image_5").attr("src", "assets/images/"+response.image_5);
                }
                
            } else {
                console.log(response);
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}));