<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>profil" class="btn btn-secondary">kembali</a>
                <p class="h1">Insert profil user</p>
                <form action="<?= base_url() ?>profil/insert_profil" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="firstname" class="">Nama Depan</label>
                    <input name="firstname" type="text" class="form-control">

                    <label for="lastname" class="">Nama Belakang</label>
                    <input name="lastname" type="text" class="form-control">

                    <label for="birthdate" class="">Tanggal Lahir</label>
                    <input name="birthdate" class="form-control input-mask-trigger" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" im-insert="false">

                    <label for="nomor_telepon" class="">Nomor Telepon</label>
                    <input name="nomor_telepon" type="text" class="form-control">

                    <label for="alamat" class="">Alamat</label>
                    <input name="alamat" type="text" class="form-control">

                    <label for="pendidikan" class="">Pendidikan</label>
                    <textarea name="pendidikan" type="textarea" class="form-control"> </textarea>

                    <div class="divider"></div>
                    <label for="profilepic" class="">Foto Profil</label>
                    <input name="profilepic" type="file" class="form-control-file">
                    <div class="divider"></div>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_user" value="<?= $id_user ?>" />

                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>