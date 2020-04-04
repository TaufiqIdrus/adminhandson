<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Insert Voucher</p>
                <form action="<?= base_url() ?>voucher/insert_voucher" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="kode_voucher" class="">Kode Voucher</label>
                    <input name="kode_voucher" type="text" class="form-control mb-2"></input>

                    <label for="deskripsi" class="">Deskripsi</label>
                    <textarea name="deskripsi" type="textarea" class="form-control mb-2"></textarea>

                    <label for="jenispotongan" class="">Jenis Potongan</label>
                    <select name="jenispotongan" class="form-control mb-2">
                        <option value="persentase">Persentase</option>
                        <option value="nominal">Nominal</option>
                    </select>

                    <label for="tersediauntuk" class="">Tersedia Untuk</label>
                    <select name="tersediauntuk" class="form-control mb-2">
                        <option value="kategori">Kategori</option>
                        <option value="kursus">Kursus</option>
                        <option value="semua">Semua</option>
                    </select>

                    <label for="potongan" class="">Jumlah Potongan</label>
                    <input name="potongan" type="number" class="form-control mb-2"></input>

                    <label for="jumlah_tersedia" class="">Jumlah Tersedia</label>
                    <input name="jumlah_tersedia" type="number" class="form-control mb-2"></input>

                    <label for="expired_date" class="">Berlaku Hingga</label>
                    <input name="expired_date" class="form-control mb-2 input-mask-trigger" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" im-insert="false">

                    <div class="divider"></div>
                    <label for="reseller" class="">Reseller</label>
                    <input name="reseller" type="text" class="form-control mb-2" placeholder="Kosongkan Jika Tidak Ada"></input>

                    <label for="bonus_reseller" class="">Bonus Reseller</label>
                    <input name="bonus_reseller" type="number" class="form-control mb-2" placeholder="Kosongkan Jika Tidak Ada" value="0"></input>
                    
                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <div class="divider"></div>
                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>