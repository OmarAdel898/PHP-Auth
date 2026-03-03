<?php
require "connection.php";

// Guard: must be logged in
if (!isset($_SESSION['loginId'])) {
    header("location:login.php?message=Please login first");
    exit;
}

$stmt = $conn->prepare("SELECT id, name, email FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

require "header.php";
require "navbar.php";
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Users</h2>
        <a href="register.php" class="btn btn-success">
            <i class="fas fa-user-plus me-1"></i> Add New User
        </a>
    </div>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_GET['message']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (count($users) > 0): ?>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover table-bordered mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($user['name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td class="text-center">
                                    <a href="editUser.php?id=<?= $user['id'] ?>"
                                       class="btn btn-sm btn-warning me-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="server.php?deleteId=<?= $user['id'] ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-muted mt-2">Total: <?= count($users) ?> user(s)</p>
    <?php else: ?>
        <div class="alert alert-warning">No users found.</div>
    <?php endif; ?>
</div>

<?php require "footer.php"; ?>
