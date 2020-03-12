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
                        <?php
                        foreach ($kursus as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->id_kursus . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->deskripsi_singkat . "</td>";
                            echo "<td>" . $row->harga . "</td>";
                        ?>
                            <td>
                                <a href="kursus/delete_kursus/<?= $row->id_kursus ?>" class="badge badge-danger ">Delete</a>
                                <a href="kursus/update/<?= $row->id_kursus ?>" class="badge badge-success ">Update</a>
                                <a href="kursus/detail/<?= $row->id_kursus ?>" class="badge badge-primary ">Detail</a>

                            </td>
                        <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>