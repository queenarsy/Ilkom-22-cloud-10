<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #222;
        }

        .top-actions {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #333;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #b02a37;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 16px;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background-color: #f2f2f2;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        p {
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>User List</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <div class="top-actions">
        <a href="<?= base_url('create/user') ?>" class="btn">Create User</a>
        <a href="<?= base_url('admin/index') ?>" class="btn">Kembali kehalaman Admin</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($users) && is_array($users)): ?>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= esc($user['user_id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['password']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['role']) ?></td>
                        <td>
                            <a href="<?= base_url('users/edit/' . $user['user_id']) ?>" class="btn">Edit</a>
                            <form action="<?= base_url('users/delete/' . $user['user_id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
