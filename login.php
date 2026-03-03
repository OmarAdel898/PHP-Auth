<?php
require "header.php";
require "navbar.php";
?>
<div class="container mt-5">
    <div class="col-md-4 mx-auto pt-5">
        <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['success']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <div class="card shadow">
            <div class="card-header bg-primary text-white"><h5 class="mb-0">Login</h5></div>
            <div class="card-body">
                <form action="server.php" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="login_email">Email</label>
                        <input class="form-control" type="email" name="login_email" id="login_email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="login_pass">Password</label>
                        <input class="form-control" type="password" name="login_pass" id="login_pass" required>
                    </div>
                    <button name="btn-login" type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
            <div class="card-footer text-center">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </div>
    </div>
</div>
<?php
require "footer.php";
?>