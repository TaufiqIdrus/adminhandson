<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
      <button onclick="kembali()" class="btn btn-secondary">kembali</button>
        <p class="h1">Update Bab Video Kursus</p>
        <form action="<?= base_url() ?>babkursus/update_bab" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="bab_kursus" class="">Judul bab kursus</label>
          <input type="text" name="bab_kursus" id="bab_kursus" class="form-control" value="<?=$bab_kursus?>">
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_bab" value="<?= $id_bab?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />
          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="insert">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>