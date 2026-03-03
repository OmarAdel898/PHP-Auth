<?php
require "connection.php";

if (!isset($_SESSION['loginId'])) {
    header("location:login.php?message=Please login first");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("location:allUsers.php?message=Invalid user ID");
    exit;
}

$id   = (int) $_GET['id'];
$user = $userModel->find($id);

if (!$user) {
    header("location:allUsers.php?message=User not found");
    exit;
}

require "header.php";
require "navbar.php";
?>

<div class="container mt-5">
    <div class="col-md-5 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h5 class="mb-0"><i class="fas fa-user-edit me-1"></i> Edit User</h5>
            </div>
            <div class="card-body">
                <form action="server.php" method="post">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= htmlspecialchars($user['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" name="btn-update" class="btn btn-warning flex-grow-1">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                        <a href="allUsers.php" class="btn btn-secondary flex-grow-1">
                            <i class="fas fa-times me-1"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
