<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
</head>
<body>
    <h1>Candidate List</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Biography</th>
            <th>Votes</th>
        </tr>
        <?php foreach ($candidates as $candidate): ?>
        <tr>
            <td><?php echo $candidate['nama']; ?></td>
            <td><?php echo $candidate['bio']; ?></td>
            <td><?php echo $candidate['vote']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="<?php echo base_url('candidates/create'); ?>">Create Candidate</a>
    
</body>
</html>