<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <button onclick="kembali()" class="btn btn-secondary">kembali</button>
        <p class="h1">Insert Kategori</p>
        <form action="<?= base_url() ?>voucher_k/insert_kursus" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="id_kursus" class="">Kategori</label>

          <select name="id_kursus" class="mb-2 form-control">
            <?php
            foreach ($kategori as $row) { ?>
              <option value="<?= $row->id_kategori ?>"><?= $row->kategori ?></option>
            <?php } ?>

          </select>

          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_voucher" value="<?= $id_voucher ?>" />
          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>