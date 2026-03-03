<?php
require "connection.php";
require "header.php";
require "navbar.php";
?>

<div class="container mt-5">
    <?php if(isset($_SESSION['loginId'])): ?>
        <div class="alert alert-success">
            Welcome back, <strong><?= htmlspecialchars($_SESSION['userName'] ?? '') ?></strong>!
        </div>
        <a href="allUsers.php" class="btn btn-primary">View All Users</a>
    <?php else: ?>
        <div class="jumbotron text-center p-5">
            <h1 class="display-4">Welcome to MyApp</h1>
        </div>
    <?php endif; ?>
</div>

<?php
require "footer.php";
?>