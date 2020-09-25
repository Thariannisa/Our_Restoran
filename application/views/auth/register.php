<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(<?= base_url('assets/auth/') ?>images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Sign Up
                </span>
            </div>
            <form method="POST" action="<?= base_url('auth/register') ?>" class="login100-form">
                <div class="wrap-input100 m-b-0">
                    <span class="label-input100">Username</span>
                    <input value="<?= set_value('username') ?>" class="input100" type="text" name="username" placeholder="Enter username">
                </div>
                <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                <div class="wrap-input100 m-b-0">
                    <span class="label-input100">Email</span>
                    <input class="input100" value="<?= set_value('email') ?>" type="text" name="email" placeholder="Enter Email">
                </div>
                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                <div class="wrap-input100 m-b-0">
                    <span class="label-input100">Password</span>
                    <input class="input100" value="<?= set_value('password') ?>" type="password" name="password" placeholder="Enter password">
                </div>
                <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn mt-5">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>