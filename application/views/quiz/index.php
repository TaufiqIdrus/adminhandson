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
                        <?php
                        foreach ($kursus as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->id_kursus . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->kursus . "</td>";
                            echo "<td>" . $row->last_update . "</td>";
                        ?>
                            <td>
                            <a href="quiz/manage/<?=$row->id_kursus?>"><img src="<?php echo base_url();?>assets/img/icons/manage_quiz.png" width="40" height="40"></a>
                            <a href="quiz/list/<?=$row->id_kursus?>"><img src="<?php echo base_url();?>assets/img/icons/list.png" width="33" height="33"></a>
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