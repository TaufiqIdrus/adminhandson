<div class="app-main__outer">
<div class="animated slideInDown">
  <div class="app-main__inner">
  <div class="app-page-title">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <button onclick="kembali()" class="btn btn-secondary">kembali</button>
        <p class="h1">Insert Dokter Pengajar Kursus</p>
        <form action="<?= base_url() ?>dokterkursus/insert_dokter" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="id_dokter" class="">Dokter pengajar kursus</label>

          <select name="id_dokter" class="mb-2 form-control">
            <?php
            foreach ($dokter as $row) { ?>
              <option value="<?= $row->id_dokter ?>"><?= $row->dokter ?></option>
            <?php } ?>

          </select>

          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_dokterkursus" value="<?= uniqid() ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />
          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>