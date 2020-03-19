<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <a href="<?= base_url() ?>quiz/manage/<?= $id_kursus ?>" class="btn btn-secondary">Kembali</a>
        <p class="h1">Masukkan teks soal dan jumlah pilihan jawaban</p>
        <form action="<?= base_url() ?>quiz/insert_soal" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>
          <label for="soal_quiz" class="">Text Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control"> </textarea>

          <!-- <label for="soal_quiz" class="">Text Soal</label>
          <textarea name="soal_quiz" type="textarea" class="form-control"> </textarea> -->
          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          <input type="hidden" name="id_soal" value="<?= uniqid() ?>" />
          <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />

          <!-- <label for="tambah">Masukkan jumlah pilihan jawaban</label> -->
          <label for="">Jumlah Pilihan Jawaban</label>
          <div class="form-inline mb-2">
            <input name="jumlahpilihan" type="number" class="form-control mr-3">
            <!-- <input type="button" id="inputJudul" class="btn btn-success mr-3" value="Tambah"> -->
           
          </div>
          <label for="">Tekan untuk memasukkan pilihan jawaban soal ini</label><br>
          <button type="submit" class="btn btn-success " name="insert">Tambah Soal</button>



          <!-- <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><input aria-label="Checkbox for following text input" type="checkbox" class=""></span></div>
            <input type="text" class="form-control" >
          </div> -->


          <!-- <button type="submit" class="btn btn-primary" name="insert">Insert</button> -->
        </form>
      </div>
    </div>
  </div>
</div>
</div>