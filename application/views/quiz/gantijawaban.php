<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Ganti jawaban quiz yang benar</p>
                <form action="<?= base_url() ?>quiz/ganti_jawaban" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_soal" value="<?= $id_soal ?>" />
                    <input type="hidden" name="id_kursus" value="<?= $id_kursus ?>" />

                    <label for="id_jawaban">Harap pilih salah satu jawaban yang benar</label>
                    <select name="id_jawaban" class="form-control">
                        <?php
                        foreach ($pilihan as $row) { ?>

                            <option value="<?= $row->id_jawaban ?>"><?= $row->jawaban_quiz ?></option>


                        <?php } ?>
                    </select>
                    <div class="divider"></div>
                    <button type="submit" class="btn btn-primary" name="insert">Selesai</button>
                </form>
            </div>
        </div>
    </div>
</div>