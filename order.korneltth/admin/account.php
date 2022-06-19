<?php 
    $_PAGE = "Account";
    include "header.php"; 
?>
<div class="container mt-2 card p-4">
    <h3 class="text-center">---- Update Password ----</h3>
    <hr/>
    <form id="update-password" method="POST">
        <div class="row">
            <div class="col-md-4 mt-3">
                Enter Current Password*
                <input type="text" class="form-control" placeholder="Current Password" name="curr_pass" id="curr_pass" required>
            </div>
            <div class="col-md-4 mt-3">
                Enter New Password *
                <input type="text" class="form-control" placeholder="New Password" name="new_pass" id="new_pass" required>
            </div>

            <div class="col-md-4 mt-3">
                Confirm New Password *
                <input type="text" class="form-control" placeholder="Confirm New Password" name="confirm_pass" id="confirm_pass" required>
            </div>
        </div>
        <div class="form-group text-right mt-2">
            <button class="btn btn-md btn-success" type='submit'>Change</button>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>
<script src="assets/js/login.js"></script>