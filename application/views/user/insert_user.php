<div class="app-main__outer">
<div class="animated slideInDown">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <button onclick="kembali()" class="btn btn-secondary">kembali</button>
                <p class="h1">Insert data user</p>
                <form action="<?= base_url() ?>user/insert_user" method="POST">
                    <?php
                    $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <label for="username" class="">Username</label>
                    <input name="username" type="text" class="form-control">

                    <label for="emailaddress" class="">Email Address</label>
                    <input name="emailaddress" type="email" class="form-control" ">

                    <label for="level" class="">Level</label>

                    <select name="level" class="mb-2 form-control">
                        <option value="admin">Admin</option>
                        <option value="biasa">Biasa</option>
                    </select>

                    <label for="password" class="">Password</label>
                    <input name="password" type="password" class="form-control">

                    <label for="password_confirm" class="">Konfirmasi Password</label>
                    <input name="password_confirm" type="password" class="form-control">

                    <div class="divider"></div>

                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                    <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                </form>
            </div>
        </div>
    </div>