<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>dokter" class="btn btn-primary">Kembali</a>
                <p class="h1">Insert data dokter</p>
                <?php
                echo form_open('insert_dokter/insert_dokter');
                $namadokter = array(
                    'name'          => 'namadokter',
                    'id'            => 'namadokter',
                    'class'            => 'position-relative form-group form-control'
                );

                echo form_label('Nama Dokter', 'namadokter');
                echo form_input($namadokter);

                $spesialis = array(
                    'name'          => 'spesialis',
                    'id'            => 'spesialis',
                    'class'            => 'position-relative form-group form-control'
                );

                echo form_label('Spesialis', 'spesialis');
                echo form_input($spesialis);
                $riwayatpendidikan = array(
                    'name'          => 'riwayatpendidikan',
                    'id'            => 'riwayatpendidikan',
                    'type'            => 'textarea',
                    'class'            => 'position-relative form-group form-control'
                );

                echo form_label('Riwayat Pendidikan', 'riwayatpendidikan');
                echo form_textarea($riwayatpendidikan);

                $riwayatpekerjaan = array(
                    'name'          => 'riwayatpekerjaan',
                    'id'            => 'riwayatpekerjaan',
                    'type'            => 'textarea',
                    'class'            => 'position-relative form-group form-control'
                );

                echo form_label('Riwayat Pekerjaan', 'riwayatpekerjaan');
                echo form_textarea($riwayatpekerjaan);

                $motto = array(
                    'name'          => 'motto',
                    'id'            => 'motto',
                    'type'            => 'textarea',
                    'class'            => 'position-relative form-group form-control'
                );

                echo form_label('Motto', 'motto');
                echo form_textarea($motto);
                ?>
                <div class="divider"></div>
                <div class="float-right">
                    <?php
                    $btninsert = array(
                        'name'          => 'btn-insert',
                        'id'            => 'btn-insert',
                        'value'            => 'Insert',
                        'class'            => 'btn btn-primary btn-lg',
                    );
                    echo form_submit($btninsert);
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
