<div class="app-main__outer">
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
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Keterangan Profil</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($user as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row->username . "</td>";
                            if ($this->m_profil->cek_profil($row->id_user) == 0) {
                                ?><td>Belum Ada</td><?php
                            }else{
                                ?> 
                                <td>Sudah Ada</td>
                                <?php
                            }
                        ?>
                            <td>
                                <?php

                                if ($this->m_profil->cek_profil($row->id_user) == 0) {
                                    ?><a href="profile/insert/<?=$row->id_user?>"><img src="<?php echo base_url();?>assets/img/icons/add_user.png" width="32" height="32"></a><?php
                                }else{
                                    ?> 
                                    <a href="profile/update/<?=$row->id_user?>"><img src="<?php echo base_url();?>assets/img/icons/edit.png" width="30" height="30"></a>
                                    <a href="profile/delete/<?=$row->id_user?>"><img src="<?php echo base_url();?>assets/img/icons/delete_user.png" width="30" height="30"></a>
                                    <?php
                                }

                                ?>

                                 </td>
                        <?php
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>