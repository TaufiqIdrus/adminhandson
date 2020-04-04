<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage video kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= base_url() ?>videokursus/insert/<?= $id_kursus ?>" class="mb-2 mr-2 btn btn-primary">Insert Video</a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>

                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Video</th>
                            <th>Bab Video</th>
                            <th>Durasi</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($video as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->judul_video . "</td>";
                            echo "<td>" . $this->m_videokursus->display_bab_kursus($row->id_bab) . "</td>";
                            echo "<td>" . $row->durasi . "</td>";
                        ?>
                            <td>
                                <a href="<?= base_url() ?>videokursus/delete_video/<?= $row->id_video ?>?id_kursus=<?= $id_kursus ?>"><i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                <a href="<?= base_url() ?>videokursus/update/<?= $row->id_video ?>?id_kursus=<?= $id_kursus ?>"> <i class="fas fa-edit fa-xs text-white p-2 bg-warning rounded"></i></a>
                                <a href="<?= base_url() ?>videokursus/play/<?= $row->id_video ?>?id_kursus=<?= $id_kursus ?>"> <i class="fas fa-play fa-xs text-white p-2 bg-primary rounded"></i></a>

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