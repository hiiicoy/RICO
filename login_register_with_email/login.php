<?php 
$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group mb-3"> 
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"> 
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Login</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>