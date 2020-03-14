<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>videokursus" class="btn btn-primary">Kembali</a>
                <p class="h1">Insert video</p>
                <form action="<?= base_url() ?>videokursus/insert_video" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="judul_video" class="">Judul Video</label>
                    <input name="judul_video" type="text" class="form-control">

                    <label for="url_video" class="">URL Video</label>
                    <input name="url_video" type="text" class="form-control">

                    <label for="durasi" class="">Durasi</label>
                    <input name="durasi" type="text" class="form-control">
                    
                    <div class="divider"></div>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />

                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>