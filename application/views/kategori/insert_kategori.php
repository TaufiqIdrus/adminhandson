<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Insert data Kategori</p>
                <form action="<?= base_url() ?>kategori/insert_kategori" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="kategori" class="">Kategori</label>
                    <input name="kategori" type="textarea" class="form-control"> </input>
                    <label for="deskripsi" class="">Deskripsi Kategori</label>
                    <textarea name="deskripsi" type="textarea" class="form-control"> </textarea>
                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <div class="divider"></div>
                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>