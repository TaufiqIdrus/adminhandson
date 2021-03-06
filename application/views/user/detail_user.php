<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <p class="h1">Detail data user</p>
                <br>
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <?php
                foreach ($user as $row) {
                ?>
                    <div class="divider"></div>
                    <h4>Detail akun user</h4>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Username</h5>
                        <?= $row->username ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Email Address</h5>
                        <?= $row->emailaddress ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Level</h5>
                    <?= $row->level;
                }
                foreach ($profil as $row) { ?>
                    </div>
                    <div class="divider"></div>
                    <h4>Detail profil user</h4>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Gambar</h5>
                        <img src="<?= base_url() ?>upload/profil/<?= $row->gambar ?>" alt="" height="200" width="200">
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Nama Lengkap</h5>
                        <?= $row->firstname . " " . $row->lastname ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Tanggal Lahir</h5>
                        <?= $row->birthdate ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Nomor Telepon</h5>
                        <?= $row->nomor_telepon ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">Alamat</h5>
                        <?= $row->alamat ?>
                    </div>
                    <div class="card-shadow-primary border mb-3 card card-body border-primary">
                        <h5 class="card-title">pendidikan</h5>
                        <?= $row->pendidikan ?>
                    </div>



                <?php } ?>
            </div>
        </div>
    </div>