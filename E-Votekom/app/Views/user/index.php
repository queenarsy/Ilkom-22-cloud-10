<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewer Dashboard</title>
</head>
<body>
    <h2>Viewer Dashboard</h2>
    <p>Welcome, Viewer!</p>
    
    <div class="dashboard-wrapper">

        <a href="<?= base_url('polls/view'); ?>" class="btn">Go to Polls</a>
        <a href="<?= base_url('user/candidates_view'); ?>" class="btn">View Candidates</a>
        <a href="<?= base_url('Auth/logout'); ?>" class="btn logout">Logout</a>
    </div>
</body>
</html>