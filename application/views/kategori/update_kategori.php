<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Update data Kategori</p>
                <form action="<?= base_url() ?>kategori/update_kategori" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    foreach ($kategori as $row) {
                    ?>

                        <label for="kategori" class="">Kategori</label>
                        <input name="kategori" type="text" class="form-control" value="<?= $row->kategori ?>"> </input>
                        <label for="deskripsi" class="">Deskripsi Kategori</label>
                        <textarea name="deskripsi" type="textarea" class="form-control"><?= $row->deskripsi ?></textarea>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>" />
                        <div class="divider"></div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <?php
                        echo "</tr>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>