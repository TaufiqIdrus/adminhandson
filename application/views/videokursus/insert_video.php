<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Insert video</p>
                <form action="<?= base_url() ?>videokursus/insert_video" method="POST" enctype="multipart/form-data">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="judul_video" class="">Judul Video</label>
                    <input name="judul_video" type="text" class="form-control">

                    <label for="id_bab" class="">Bab Video</label>
                    <select name="id_bab" class="mb-2 form-control">
                        <?php
                        foreach ($bab_kursus as $row) { ?>
                            <option value="<?= $row->id_bab ?>"><?= $row->bab_kursus ?></option>
                        <?php } ?>

                    </select>

                    <label for="durasi" class="">Durasi</label>
                    <input name="durasi" type="text" class="form-control">
                    <div class="divider"></div>
                    <label for="video" class="">File video</label>
                    <input name="video" type="file" class="form-control-file">
                    <div class="divider"></div>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />
                    <input type="hidden" name="id_video" value="<?= uniqid() ?>" />

                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>