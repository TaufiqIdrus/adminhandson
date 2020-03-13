<!-- <div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>quiz" class="btn btn-primary">Kembali</a>
                <p class="h1">Insert data Kursus</p>
                <form action="<?= base_url() ?>kursus/insert_kursus" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>

                    <label for="soal_quiz" class="">Teks Soal</label>
                    <textarea name="soal_quiz" type="textarea" class="form-control"> </textarea>

                    <label for="kursus" class="">Judul</label>
                    <input name="kursus" type="text" class="form-control">

                    <div class="divider"></div>
                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div> -->
<div class="container pt-3">
    <form action="">
      <label for="tambah">Tambah judul</label>
      <div class="form-inline mb-2">
        <input type="button" id="inputJudul" class="btn btn-primary mr-3" value="Tambah" onclick="addJudul()">
        <input type="number" id="tambahInput" class="form-control mr-3">
        <input type="button" class="btn btn-warning" value="reset" onclick="resetJudul()">
      </div>
      <label for="judul">Judul</label>
      <div id="judul-group">
      </div>
      <!-- <div class="form-group">
        <input type="text" class="form-control" placeholder="Masukkan judul" name="judul">
      </div> -->
    </form>
  </div>
  


