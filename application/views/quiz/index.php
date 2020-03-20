<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage Quiz
                        <div class="page-title-subheading">
                        </div>
                    </div>
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
                            <th>Jumlah Soal</th>
                            <th>Last Update</th>
                            
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kursus as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                            <a href="quiz/manage/<?=$row->id_kursus?>" class="badge badge-primary">Manage</a>
                            <a href="quiz/list/<?=$row->id_kursus?>" class="badge badge-success">List</a>
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