<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/dashboard.css'); ?>">

    <title>Viewer Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px 0;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Viewer Dashboard</h2>
    <p>Welcome, Viewer!</p>
    
    <!-- Tombol untuk menuju ke halaman polling -->
    <a href="<?php echo base_url('polls/view'); ?>">
        <button>Go to Polls</button>
    </a>

    <br>
    
    <!-- Tombol untuk menuju ke halaman pembuatan kandidat -->
    <a href="<?php echo base_url('candidates/create'); ?>">
        <button>Create Candidate</button>
    </a>

    <a href="<?php echo base_url('candidates/index'); ?>">
        <button>View Candidates</button>
    </a>

    <br><br>
    <a href="<?php echo base_url('Auth/logout'); ?>">Logout</a>
</body>
</html>