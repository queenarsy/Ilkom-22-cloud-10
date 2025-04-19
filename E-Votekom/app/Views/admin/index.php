<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('CSS/dasboard.css'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>admin Dashboard</title>

</head>
<body>

    <div class="dashboard-wrapper">
        <!-- Tambahkan logo di atas -->
        <div class="logo-container">
            <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Logo" class="logo">
        </div>

        <h2>Viewer Dashboard</h2>
        <p>Welcome, Viewer!</p>

        <a href="<?= base_url('polls/view'); ?>" class="btn">Go to Polls</a>
        <a href="<?= base_url('candidates/create'); ?>" class="btn">Create Candidate</a>
        <a href="<?= base_url('candidates/index'); ?>" class="btn">View Candidates</a>
        <a href="<?= base_url('Auth/logout'); ?>" class="btn logout">Logout</a>
    </div>

</body>
</html>
