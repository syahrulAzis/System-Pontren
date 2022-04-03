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
                    <div class="login-form">
                        <form action="" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" id="name" value="<?= set_value('name'); ?>" type="text" name="name" placeholder="Full Name">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" name="email" type="text" value="<?= set_value('email'); ?>" id="email" placeholder="Email Adress">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nisn</label>
                                <input class="au-input au-input--full" name="nisn" type="text" value="<?= set_value('nisn'); ?>" id="nisn" placeholder="nisn Adress">
                                <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>kelas</label>
                                <input class="au-input au-input--full" name="kelas" type="text" value="<?= set_value('kelas'); ?>" id="kelas" placeholder="kelas Adress">
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label>Repeat Password</label>
                                    <input class="au-input au-input--full" type="password" id="password2" name="password2" placeholder="Password">
                                </div>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"><i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Registration</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span></button>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="<?= base_url('auth'); ?>">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>