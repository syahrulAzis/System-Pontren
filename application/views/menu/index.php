    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <a href="<?= base_url('menu/addmenu/'); ?>" class="btn btn-primary mb-3">Add New Menu</a>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header">
                            <strong class="card-title"><?= $title; ?></strong>
                        </div>

                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Menu</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($menu as $m) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="" class="badge badge-primary">Edit</a>
                                                <a href="<?= base_url('menu/deleteMenu/') . $m['id']; ?>" onclick="return confirm('Yaqin?')" class="badge badge-danger">Delete</a>
                                            </td>
                                            <td><?= $m['menu']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END PAGE CONTAINER-->

    </div>