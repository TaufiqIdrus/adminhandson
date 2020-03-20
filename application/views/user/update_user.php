<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a href="<?= base_url() ?>user" class="btn btn-primary">Kembali</a>
                <p class="h1">Update data user</p>
                <form action="<?= base_url() ?>user/update_user" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    foreach ($user as $row) {
                    ?>
                        <label for="username" class="">Username</label>
                        <input name="username" type="text" class="form-control" value="<?= $row->username ?>">

                        <label for="emailaddress" class="">Email Address</label>
                        <input name="emailaddress" type="email" class="form-control" value="<?= $row->emailaddress ?>" >

                        <label for="level" class="">Level</label>

                        <select name="level" class="mb-2 form-control">
                            <option value="admin">Admin</option>
                            <option value="biasa">Biasa</option>
                        </select>

                        <label for="password" class="">Password</label>
                        <input name="password" type="password" class="form-control">

                        <label for="password_confirm" class="">Konfirmasi Password</label>
                        <input name="password_confirm" type="password" class="form-control">
                    <?php } ?>

                    <div class="divider"></div>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    <input type="hidden" name="id_user" value="<?= $id_user ?>" />

                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>