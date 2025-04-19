<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Candidate</title>
    <link rel="stylesheet" href="<?= base_url('CSS/c_candidate.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>

    <!-- Logo kiri atas -->
    <div class="logo-container">
        <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Logo" class="logo">
    </div>

    <!-- Form Create Candidate -->
    <div class="form-wrapper">
        <h2>Create Candidate</h2>

        <form action="<?= base_url('candidates/store'); ?>" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="name">Candidate Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="input-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" required></textarea>
            </div>

            <div class="input-group">
                <label for="photo">Upload Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

</body>
</html>
