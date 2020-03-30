<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <button onclick="kembali()" class="btn btn-secondary">kembali</button>
        <p class="h1">Insert Soal Quiz</p>
        <form action="<?= base_url() ?>quiz/insert_soal" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="soal_quiz" class="">Teks Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control"> </textarea>
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_soal" value="<?= uniqid() ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />
          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>