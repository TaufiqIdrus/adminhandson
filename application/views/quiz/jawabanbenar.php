<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>quiz" class="btn btn-secondary">kembali</a>
                <p class="h1">Insert jawaban quiz yang benar</p>
                <form action="<?= base_url() ?>quiz/insert_benar" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_soal" value="<?= $id_soal ?>" />

                    <h5>Harap pilih salah satu jawaban yang benar</h5>
                    <select name="id_jawaban" class="form-control">
                    <?php
                    foreach ($pilihan as $row) { ?>
                        
                            <option value="<?=$row->id_jawaban?>"><?=$row->jawaban_quiz?></option>
                        

                    <?php } ?>
                    </select>
                    <div class="divider"></div>
                    <button type="submit" class="btn btn-primary" name="insert">Selesai</button>
                </form>
            </div>
        </div>
    </div>
</div>