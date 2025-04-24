<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewer Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('CSS/voter_ds.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>

    <!-- Logo kiri atas -->
    <div class="logo-container">
        <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Logo" class="logo">
    </div>

    <div class="dashboard-wrapper">
        <p>Welcome, Viewer!</p>

        <div class="button-group">
            <a href="<?= base_url('polls/view'); ?>" class="btn">Go to Polls</a>
            <a href="<?= base_url('user/candidates_view'); ?>" class="btn">View Candidates</a>
            <a href="<?= base_url('Auth/logout'); ?>" class="btn logout">Logout</a>
        </div>
    </div>

</body>
</html>
