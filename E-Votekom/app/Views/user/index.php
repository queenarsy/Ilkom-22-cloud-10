<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>e-Voting Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url('CSS/voter_ds.css'); ?>">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo-container">
      <img src="<?= base_url('image/MIPAVOTEW.png'); ?>" alt="Logo" class="sidebar-logo" />
    </div>

    <ul>
      <li><a href="#kandidat">Kandidat</a></li>
      <li><a href="#visiMisi">Visi Misi Kandidat</a></li>
      <li><a href="#hasilVoting">Hasil Voting</a></li>
      <li><a href="<?= base_url('pengguna/profil'); ?>">Pengaturan</a></li>
      <li><a href="<?= base_url('Auth/logout'); ?>" class="btn logout">Logout</a></li>
    </ul>
  </div>

  <!-- MAIN CONTENT -->
  <div class="main">
    
    <!-- Kandidat -->
    <section id="kandidat" class="section">
      <div class="section-wrapper">
        <h1>Daftar Kandidat</h1>

        <?php if (session()->getFlashdata('message')): ?>
          <div class="alert success">
            <?= session()->getFlashdata('message') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert error">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <div class="candidates">
          <?php foreach ($candidates as $candidate): ?>
            <div class="candidate-card">
              <?php if (!empty($candidate['photo'])): ?>
                <img src="<?= base_url('uploads/' . $candidate['photo']) ?>" alt="Candidate Photo" class="candidate-photo">
              <?php endif; ?>

              <h3><?= esc($candidate['nama']) ?></h3>
              <form action="<?= base_url('Candidates/vote/' . $candidate['kadidat_id']) ?>" method="post">
                <button class="vote-btn" type="submit">Vote</button>
              </form>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Visi Misi -->
    <section id="visiMisi" class="section">
      <div class="section-wrapper">
        <h1>Visi Misi Kandidat</h1>
        <div class="visi-misi">
          <?php foreach ($candidates as $candidate): ?>
            <div class="visi-misi-card">
              <h3>Visi <?= esc($candidate['nama']) ?></h3>
              <p><?= esc($candidate['bio']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Hasil Voting -->
    <section id="hasilVoting" class="section">
      <div class="section-wrapper">
        <h1>Hasil Voting</h1>
        <div class="chart-container">
          <canvas id="votingResultsChart"></canvas>
        </div>
      </div>
    </section>

    <!-- Pengaturan -->
    <section id="pengaturan" class="section">
      <div class="section-wrapper">
        <h1>Terima Kasih Telah Berpartisipasi</h1>
        <p>Suara Anda sangat berharga bagi kami.</p>
      </div>
    </section>

  </div>

  <!-- ChartJS Script -->
  <script>
    const labels = <?= json_encode(array_column($candidates, 'nama')) ?>;
    const data = <?= json_encode(array_column($candidates, 'vote')) ?>;

    const ctx = document.getElementById('votingResultsChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Jumlah Vote',
          data: data,
          backgroundColor: 'rgba(54, 162, 235, 0.7)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            precision: 0
          }
        }
      }
    });
  </script>

  <script src="<?= base_url('js/voter_ds.js') ?>"></script>
</body>
</html>
