<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <a href="<?= base_url() ?>quiz" class="btn btn-secondary">Kembali</a>
        <p class="h1">Update teks soal</p>
        <form action="<?= base_url() ?>quiz/update_soal" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="soal_quiz" class="">Text Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control mb-2"><?=$soal?> </textarea>

          <!-- <label for="soal_quiz" class="">Text Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control"> </textarea> -->
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_soal" value="<?= $id_soal ?>" />
          <button type="submit" class="btn btn-primary" name="update">Update Soal</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>