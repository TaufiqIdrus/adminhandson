<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <a href="<?= base_url() ?>quiz" class="btn btn-secondary">Kembali</a>
        <p class="h1">Insert Soal dan Jawaban Quiz</p>
        <form action="<?= base_url() ?>quiz/insert_jawaban" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>

          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />
          <input type="hidden" name="id_soal" value="<?= $id_soal ?>" />

          <h5>Harap isi setiap pilihan jawaban yang ada</h5>
          
            <?php
            for ($i = 0; $i < $jumlahpilihan; $i++) { ?>

              <label for="jawaban_quiz<?= $i ?>">Pilihan Jawaban <?= $i + 1 ?></label>
              <input type="hidden" name="id_jawaban<?= $i ?>" value="<?=uniqid()?>" />
              <input type="text" class="form-control" name="jawaban_quiz<?= $i ?>" id="jawaban_quiz<?= $i ?>">

            <?php } ?>
         
          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>