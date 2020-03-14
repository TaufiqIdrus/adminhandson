<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>profil" class="btn btn-primary">Kembali</a>
                <p class="h1">Update profile user</p>
                <form action="<?= base_url() ?>profil/update_profil" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    foreach ($profil as $row) {
                    ?>
                        <label for="firstname" class="">Nama Depan</label>
                        <input name="firstname" type="text" class="form-control" value="<?= $row->firstname ?>">

                        <label for="lastname" class="">Nama Belakang</label>
                        <input name="lastname" type="text" class="form-control" value="<?= $row->lastname ?>">

                        <label for="birthdate" class="">Tanggal Lahir</label>
                        <input name="birthdate" class="form-control input-mask-trigger" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" im-insert="false" value="<?= $row->birthdate ?>">

                        <label for="nomor_telepon" class="">Nomor Telepon</label>
                        <input name="nomor_telepon" type="text" class="form-control" value="<?= $row->nomor_telepon ?>">

                        <label for="alamat" class="">Alamat</label>
                        <input name="alamat" type="text" class="form-control" value="<?= $row->alamat ?>">

                        <label for="pendidikan" class="">Pendidikan</label>
                        <textarea name="pendidikan" type="textarea" class="form-control"><?= $row->pendidikan ?></textarea>

                        <div class="divider"></div>

                        <label for="profilepic" class="">Foto Profil</label>
                        <input name="profilepic" type="file" class="form-control-file" value="res">

                        <div class="divider"></div>

                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <input type="hidden" name="id_user" value="<?= $id_user ?>" />
                        <input type="hidden" name="id_profil" value="<?= $row->id_profile ?>" />

                    <?php } ?>
                    <button type="submit" class="btn btn-primary" name="insert">Update</button>

                </form>

            </div>
        </div>
    </div>
</div>
</div>