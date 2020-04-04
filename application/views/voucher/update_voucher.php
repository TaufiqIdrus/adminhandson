<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Update Voucher</p>
                <form action="<?= base_url() ?>voucher/update_voucher" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    foreach ($voucher as $row) {
                    ?>
                        <label for="kode_voucher" class="">Kode Voucher</label>
                        <input name="kode_voucher" type="text" class="form-control" value="<?= $row->kode_voucher ?>"></input>

                        <label for="deskripsi" class="">Deskripsi</label>
                        <textarea name="deskripsi" type="textarea" class="form-control"><?= $row->deskripsi ?></textarea>

                        <label for="jenispotongan" class="">Jenis Potongan</label>
                        <select name="jenispotongan" class="form-control">
                            <?php if ($row->jenispotongan == 'persentase') {
                                echo '<option value="persentase">Persentase</option>';
                                echo '<option value="nominal">Nominal</option>';
                            } else {
                                echo '<option value="nominal">Nominal</option>';
                                echo '<option value="persentase">Persentase</option>';
                            }
                            ?>
                        </select>

                        <label for="tersedia_untuk" class="">Tersedia Untuk</label>

                        <select name="tersedia_untuk" class="form-control">
                            <?php if ($row->tersedia_untuk == 'kursus') {
                                echo '<option value="kursus">Kursus</option>';
                                echo '<option value="kategori">Kategori</option>';
                                echo '<option value="semua">Semua</option>';
                            } else if ($row->tersedia_untuk == 'kategori') {
                                echo '<option value="kategori">Kategori</option>';
                                echo '<option value="kursus">Kursus</option>';
                                echo '<option value="semua">Semua</option>';
                            }else{
                                echo '<option value="semua">Semua</option>';
                                echo '<option value="kategori">Kategori</option>';
                                echo '<option value="kursus">Kursus</option>';
                            }
                            ?>
                        </select>

                        <label for="potongan" class="">Jumlah Potongan</label>
                        <input name="potongan" type="number" class="form-control" value="<?= $row->potongan ?>"></input>

                        <label for="jumlah_tersedia" class="">Jumlah Tersedia</label>
                        <input name="jumlah_tersedia" type="number" class="form-control" value="<?= $row->jumlah_tersedia ?>"></input>

                        <label for="expired_date" class="">Berlaku Hingga</label>
                        <input name="expired_date" class="form-control input-mask-trigger" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" im-insert="false" value="<?= $row->expired_date ?>">

                        <div class="divider"></div>
                        <label for="reseller" class="">Reseller</label>
                        <input name="reseller" type="text" class="form-control" placeholder="Kosongkan Jika Tidak Ada" value="<?= $row->reseller ?>"></input>

                        <label for="bonus_reseller" class="">Bonus Reseller</label>
                        <input name="bonus_reseller" type="number" class="form-control" placeholder="Kosongkan Jika Tidak Ada" value="<?= $row->bonus_reseller ?>"></input>



                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <input type="hidden" name="id_voucher" value="<?= $id_voucher ?>" />
                        <div class="divider"></div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <?php
                        echo "</tr>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>