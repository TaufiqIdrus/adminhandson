<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>

                <?php
                foreach ($video as $row) {
                ?>
                    <br>
                    <div>
                        <h2><?= $row->judul_video ?></h2>
                        <div class="divider"></div>
                        <video width="320" height="240" controls>
                            <source src="<?= base_url() ?>upload/video/<?= $row->video ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <!-- <label for="judul_video" class="">Judul Video</label> -->


                    <!-- <label for="id_bab" class="">Bab Video</label> -->


                <?php } ?>

            </div>
        </div>
    </div>
