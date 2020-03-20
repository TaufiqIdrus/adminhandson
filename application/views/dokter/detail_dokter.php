<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>dokter" class="btn btn-secondary">kembali</a>
                <p class="h1">Detail data dokter</p>
                <br>
                <?php
                foreach ($dokter as $row) {
                ?>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Gambar</h5>
                        <img src="<?= $row->gambar ?>" alt="">

                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Nama Dokter</h5>
                        <?= $row->dokter ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">spesialis</h5>
                        <?= $row->spesialis ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Riwayat Pendidikan</h5>
                        <?= $row->rwyt_pendidikan ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Riwayat Pekerjaan</h5>
                        <?= $row->rwyt_pekerjaan ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Motto</h5>
                        <?= $row->motto ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Rating</h5>
                        <?= $row->rating ?>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>