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
                                <form action="<?= base_url('menu/addMenu'); ?>" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">New Menu</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="menu" name="menu" placeholder="Enter New Menu" class="form-control">
                                            <span class="help-block">Please enter new menu</span><br>
                                            <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
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