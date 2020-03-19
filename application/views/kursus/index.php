<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Tabel Kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>kursus/insert" class="mb-2 mr-2 btn btn-primary">Insert Kursus</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi Singkat</th>
                            <th>Harga</th>
                            <th>Last Update</th>
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
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                                <a href="kursus/delete_kursus/<?= $row->id_kursus ?>" class="badge badge-danger tombol-hapus">Delete</a>
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