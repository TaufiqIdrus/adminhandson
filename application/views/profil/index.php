<div class="app-main__outer">
<div class="animated slideInLeft">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>Manage user profile
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>profil/arsip/" class="btn btn-primary"><i class="fas fa-archive fa-xs text-white rounded "></i> Arsip</a>
                <div class="divider"></div>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Keterangan Profil</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($user as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->username . "</td>";
                            if ($this->m_profil->cek_profil($row->id_user) == 0) {
                        ?><td>Belum Ada</td><?php
                                                } else {
                                                    ?>
                                <td>Sudah Ada</td>
                            <?php
                                                }
                            ?>
                            <td>
                                <?php

                                if ($this->m_profil->cek_profil($row->id_user) == 0) {
                                ?><a href="profil/insert/<?= $row->id_user ?>" class="badge badge-primary">Add profile</a><?php
                                                                                                                        } else {
                                                                                                                            ?>
                                    <a href="profil/update/<?= $row->id_user ?>" class="badge badge-success">Edit profil</a>
                                    <a href="profil/delete/<?= $row->id_user ?>"><i class="fas fa-trash fa-xs text-white p-2 bg-danger rounded"></i></a>
                                <?php
                                                                                                                        }

                                ?>

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