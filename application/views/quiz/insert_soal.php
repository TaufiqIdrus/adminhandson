<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
      <a href="<?= base_url() ?>quiz" class="btn btn-secondary">Kembali</a>
        <p class="h1">Insert Soal dan Jawaban Quiz</p>
        <form action="<?= base_url() ?>quiz/insert_soal" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="soal_quiz" class="">Text Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control"> </textarea>
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />



          <label for="tambah">Masukkan jumlah pilihan jawaban</label>
          <div class="form-inline mb-2">
            <input type="number" id="tambahInput" class="form-control mr-3" value="">
            <input type="button" id="inputJudul" class="btn btn-success mr-3" value="Tambah" onclick="addJudul()">

          </div>
          <div id="judul-group">

          </div>
          <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
          <label for="vehicle1"> I have a bike</label><br>
          <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><input aria-label="Checkbox for following text input" type="checkbox" class=""></span></div>
            <input type="text" class="form-control" >
          </div>
          <script type="text/javascript" src="<?= base_url() ?>js/index.js"> </script>

          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>