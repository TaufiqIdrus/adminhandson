<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Detail data Kursus</p>
                <br>
                <?php
                foreach ($kursus as $row) {
                ?>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Judul Kursus</h5>
                        <?= $row->kursus ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Harga</h5>
                        <?= $row->harga ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">deskripsi Singkat</h5>
                        <?= $row->deskripsi_singkat ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Deskripsi Lengkap</h5>
                        <?= $row->deskripsi_full ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Persyaratan</h5>
                        <?= $row->persyaratan ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Dokter Pengajar</h5>
                        <?= $row->dokter ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Kategori</h5>
                        <?= $this->m_kategori->display_byID($row->id_kategori)[0]->kategori ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Bahasa</h5>
                        <?= $this->m_bahasa->display_byID($row->id_bahasa)[0]->bahasa ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Subtitle</h5>
                        <?= $this->m_bahasa->display_byID($row->id_subtitle)[0]->bahasa ?>

                    </div>

                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Gambar</h5>
                        <img src="<?= $row->gambar ?>" alt="">
                    <?php } ?>

                    </div>
            </div>
        </div>
    </div>