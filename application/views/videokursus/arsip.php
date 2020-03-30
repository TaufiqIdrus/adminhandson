<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Arsip video kursus
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Video</th>
                            <th>Bab Video</th>
                            <th>Durasi</th>
                            <th>Kursus</th>
                            <th>Tanggal Arsip</th>
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
                            echo "<td>" . $this->m_videokursus->display_kursus($row->id_kursus) . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>