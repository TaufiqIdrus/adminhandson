<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>Kursus" class="btn btn-primary">Kembali</a>
                <p class="h1">Update data Kursus</p>
                <form action="<?= base_url() ?>kursus/update_kursus" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    foreach ($kursus as $row) {
                    ?>
                    <label for="kursus" class="">Judul</label>
                    <input name="kursus" type="text" class="form-control" value="<?= $row->kursus ?>">

                    <label for="harga" class="">Harga</label>
                    <input name="harga" type="number" class="form-control" value="<?= $row->harga ?>">
                    <div class="divider"></div>

                    <label for="deskripsi_singkat" class="">Deskripsi Singkat</label>
                    <textarea name="deskripsi_singkat" type="textarea" class="form-control"><?= $row->deskripsi_singkat?></textarea>

                    <label for="deskripsi_full" class="">Deskripsi Full</label>
                    <textarea name="deskripsi_full" type="textarea" class="form-control"><?= $row->deskripsi_full ?></textarea>

                    <label for="persyaratan" class="">Persyaratan</label>
                    <textarea name="persyaratan" type="textarea" class="form-control"><?= $row->persyaratan ?></textarea>

                    <label for="dokter" class="">Dokter Pengajar</label>
                    <textarea name="dokter" type="textarea" class="form-control"><?= $row->dokter?></textarea>
                    <div class="divider"></div>

                    <label for="id_kategori" class="">Kategori</label>
                    <select name="id_kategori" class="mb-2 form-control">
                        <?php
                        foreach ($kategori as $row) { ?>
                            <option value="<?= $row->id_kategori ?>"><?= $row->kategori ?></option>
                        <?php } ?>
                    </select>
                    <label for="id_bahasa" class="">Bahasa</label>
                    <select name="id_bahasa" class="mb-2 form-control">
                        <?php
                        foreach ($bahasa as $row) { ?>
                            <option value="<?= $row->id_bahasa ?>"><?= $row->bahasa ?></option>
                        <?php } ?>
                    </select>
                    <label for="id_subtitle" class="">Subtitle</label>
                    <select name="id_subtitle" class="mb-2 form-control">
                        <?php
                        foreach ($bahasa as $row) { ?>
                            <option value="<?= $row->id_bahasa ?>"><?= $row->bahasa ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />

                    <div class="divider"></div>
                    <label for="gambar" class="">File Gambar</label>
                    <input name="gambar" type="file" class="form-control-file" >
                    <?php } ?>
                    <div class="divider"></div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>