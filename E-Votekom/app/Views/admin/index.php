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
    
    <!-- Tombol untuk menuju ke halaman polling -->
    <a href="<?php echo base_url('polls/view'); ?>" style="text-decoration: none;">
        <button style="padding: 10px 20px; font-size: 16px;">Go to Polls</button>
    </a>

    <br><br>
    <a href="Auth/logout">Logout</a>
</body>
</html>