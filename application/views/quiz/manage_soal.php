<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Soal Quiz
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>quiz/insert" class="mb-2 mr-2 btn btn-primary">Insert Soal</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">

            <div class="card-body">
                <a href="<?= base_url() ?>quiz" class="btn btn-secondary">Kembali</a>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Text soal</th>
                            <th>Pilihan jawaban</th>
                            <th>Jawaban benar</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>