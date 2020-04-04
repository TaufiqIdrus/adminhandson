<div class="app-main__outer">
<div class="animated slideInDown">
  <div class="app-main__inner">
  <div class="app-page-title">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <button onclick="kembali()" class="btn btn-secondary">kembali</button>
        <p class="h1">Insert Jawaban Quiz</p>
        <form action="<?= base_url() ?>quiz/insert_jawaban" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>

          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_soal" value="<?= $id_soal ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />


          <label for="jawaban_quiz">Teks Jawaban</label>
          <input type="hidden" name="id_jawaban" value="<?= uniqid() ?>" />
          <input type="text" name="jawaban_quiz" id="jawaban_quiz" class="form-control">

          <div class="divider"></div>
          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>