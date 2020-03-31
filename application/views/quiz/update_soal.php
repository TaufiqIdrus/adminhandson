<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <a href="<?= base_url() ?>quiz/managesoal/<?= $id_kursus ?>" class="btn btn-secondary">kembali</a>
        <p class="h1">Update Soal Quiz</p>
        <form action="<?= base_url() ?>quiz/update_soal" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="soal_quiz" class="">Teks Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control mb-2"><?= $soal ?> </textarea>
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_soal" value="<?= $id_soal ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />
          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
      </div>
    </div>
  </div>