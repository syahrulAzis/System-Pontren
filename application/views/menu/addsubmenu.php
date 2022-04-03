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
                                <form action="<?= base_url('menu/addSubmenu'); ?>" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">New Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="title" name="title" placeholder="Enter New Title" class="form-control">
                                            <span class="help-block">Please enter new Title</span><br>
                                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">New Submenu</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="menu_id" id="menu_id" class="form-control">
                                                <option value="">Select Menu</option>
                                                <?php foreach ($menu as $m) : ?>
                                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">New Url</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="url" name="url" placeholder="Enter New url" class="form-control">
                                            <span class="help-block">Please enter new Url</span><br>
                                            <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">New Icon</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="icon" name="icon" placeholder="Enter New Icon" class="form-control">
                                            <span class="help-block">Please enter new Icon</span><br>
                                            <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hf-email" class=" form-control-label">Is_active</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                Active ?
                                            </label>
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