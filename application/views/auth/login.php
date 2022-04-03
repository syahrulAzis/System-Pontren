<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="<?= base_url('assets/'); ?>images/icon/ns.png" alt="CoolAdmin">
                        </a>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="login-form">
                        <form action="" method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" value="<?= set_value('email'); ?>" type="text" name="email" placeholder="Email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <a href="#">Forgotten Password?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Don't you have account?
                                <a href="<?= base_url('auth/registration'); ?>">Sign Up Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>