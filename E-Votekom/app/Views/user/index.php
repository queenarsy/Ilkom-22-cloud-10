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
  <div class="sidebar">
  <div class="logo">
  <img src="<?= base_url('image/logo.png') ?>" alt="Logo" />
</div>

    <ul>
      <li><a href="#kandidat">Kandidat</a></li>
      <li><a href="#visiMisi">Visi Misi Kandidat</a></li> <!-- Ganti Quick Count dengan Visi Misi -->
      <li><a href="#hasilVoting">Hasil Voting</a></li>
      <li><a href="#pengaturan">Pengaturan</a></li>
    </ul>
  </div>

  <div class="main">
    
    <!-- Kandidat -->
    <section id="kandidat" class="section">
      <div class="section-wrapper">
        <h1>Daftar Kandidat</h1>
        <div class="candidates">
          <div class="candidate-card">
            <img src="<?= base_url('assets/img/kandidat1.jpg') ?>" alt="Kandidat 1">
            <h3>Kandidat A</h3>
            <button class="vote-btn">Vote</button>
          </div>
          <div class="candidate-card">
            <img src="<?= base_url('assets/img/kandidat2.jpg') ?>" alt="Kandidat 2">
            <h3>Kandidat B</h3>
            <button class="vote-btn">Vote</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Visi Misi Kandidat -->
    <section id="visiMisi" class="section">
      <div class="section-wrapper">
        <h1>Visi Misi Kandidat</h1>
        <div class="visi-misi">
          <div class="visi-misi-card">
            <h3>Visi Kandidat A</h3>
            <p>Visi Kandidat A adalah membawa perubahan untuk masyarakat yang lebih sejahtera...</p>
          </div>
          <div class="visi-misi-card">
            <h3>Visi Kandidat B</h3>
            <p>Visi Kandidat B adalah memajukan teknologi dan pendidikan di negara ini...</p>
          </div>
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
        <h1>Pengaturan</h1>
        <p>Atur konfigurasi sistem voting di sini.</p>
      </div>
    </section>

  </div>

  <script src="<?= base_url('js/voter_ds.js') ?>"></script>
</body>
</html>