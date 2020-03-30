<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <p class="h1">Update video</p>
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>

                <form action="<?= base_url() ?>videokursus/update_video" method="POST" enctype="multipart/form-data">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    foreach ($video as $row) {
                    ?>
                        <label for="judul_video" class="">Judul Video</label>
                        <input name="judul_video" type="text" class="form-control" value="<?= $row->judul_video ?>">

                        <label for="id_bab" class="">Bab Video</label>
                        <select name="id_bab" class="mb-2 form-control">
                            <?php
                            $bab_kursus = $this->m_videokursus->display_bab($id_kursus);
                            foreach ($bab_kursus as $row_bab) { ?>
                                <option value="<?= $row_bab->id_bab ?>"><?= $row_bab->bab_kursus ?></option>
                            <?php } ?>

                        </select>


                        <label for="durasi" class="">Durasi</label>
                        <input name="durasi" type="text" class="form-control" value="<?= $row->durasi ?>">

                        <div class="divider"></div>
                        <label for="video" class="">File video</label>
                        <input name="video" type="file" class="form-control-file">
                        <div class="divider"></div>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <input type="hidden" name="id_kursus" value="<?= $row->id_kursus ?>" />
                        <input type="hidden" name="old_video" value="<?= $row->video ?>" />
                        <input type="hidden" name="id_video" value="<?= $id_video ?>" />
                    <?php } ?>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>