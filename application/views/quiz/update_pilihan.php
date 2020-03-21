<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <a href="<?= base_url() ?>quiz" class="btn btn-secondary">kembali</a>
        <p class="h1">update Pilihan Jawaban Quiz</p>
        <form action="<?= base_url() ?>quiz/update_jawaban" method="POST">
          <?php
          $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
          );
          ?>

          <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
          

       

          <h5>Harap isi setiap pilihan jawaban yang ada</h5>
          
            <?php $i= 0;
              foreach ($pilihan as $row){
              ?>

              <label for="jawaban_quiz<?= $i ?>">Pilihan Jawaban <?= $i + 1 ?></label>
              <input type="hidden" name="id_jawaban<?= $i ?>" value="<?=$row->id_jawaban?>" />
              <input type="text" name="jawaban_quiz<?= $i ?>" id="jawaban_quiz<?= $i ?>" class="form-control" value="<?=$row->jawaban_quiz?>">

            <?php $i++;} ?>
            <input type="hidden" name="jumlahpilihan" value="<?= $i ?>" />
          <div class="divider"></div>
          <label for="">Tekan untuk memasukkan pilihan jawaban soal yang benar</label><br>
          <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>