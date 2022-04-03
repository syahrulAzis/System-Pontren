    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?= $title; ?></strong>
                            </div>

                            <div class="card-body card-block">
                                <?= form_open_multipart('user/edit'); ?>
                                <!-- <form action="" method="post" class="form-horizontal"> -->
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="email" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="email" name="email" value="<?= $user['email']; ?>" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="name" class=" form-control-label">Full Name</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="name" value="<?= $user['name']; ?>" name="name" class="form-control">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">Picture</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" id="image" name="image" class="form-control-file">
                                                    <label for="custom-file-label"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->

    </div>