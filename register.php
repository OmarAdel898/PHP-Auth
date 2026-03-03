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
        <div class="card shadow">
            <div class="card-header bg-success text-white"><h5 class="mb-0">Register</h5></div>
            <div class="card-body">
                <form action="server.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password <small class="text-muted">(8-20 digits only)</small></label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" name='btn-register' class="btn btn-success w-100">Register</button>
                </form>
            </div>
            <div class="card-footer text-center">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </div>
    </div>
</div>
<?php
require "footer.php";
?>  