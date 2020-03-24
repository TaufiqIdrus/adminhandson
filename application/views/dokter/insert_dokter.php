<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>dokter" class="btn btn-secondary">kembali</a>
                <p class="h1">Insert data Dokter</p>
                <form action="<?= base_url() ?>dokter/insert_dokter" method="POST" enctype="multipart/form-data">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="dokter" class="">Nama Dokter</label>
                    <input name="dokter" type="text" class="form-control">

                    <label for="spesialis" class="">Spesialis</label>
                    <input name="spesialis" type="text" class="form-control">
                    
                    <div class="divider"></div>

                    <label for="rwyt_pendidikan" class="">Riwayat Pendidikan</label>
                    <textarea name="rwyt_pendidikan" type="textarea" class="form-control"> </textarea>

                    <label for="rwyt_pekerjaan" class="">Riwayat Pekerjaan</label>
                    <textarea name="rwyt_pekerjaan" type="textarea" class="form-control"> </textarea>

                    <label for="motto" class="">Motto</label>
                    <textarea name="motto" type="textarea" class="form-control"> </textarea>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_dokter" value="<?= uniqid() ?>" />
                    <div class="divider"></div>
                    
                    <label for="gambar" class="">File Gambar</label>
                    <input name="gambar" type="file" class="form-control-file">
                    <div class="divider"></div>

                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>