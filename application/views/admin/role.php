    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <a href="<?= base_url('admin/addrole/'); ?>" class="btn btn-primary mb-3">Add New Role</a>
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
                                        <th>Role</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($role as $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">Access</a>
                                                <a href="" class="badge badge-primary">Edit</a>
                                                <a href="<?= base_url('admin/roleDelete/') . $r['id']; ?>" onclick="return confirm('Yaqin ?')" class="badge badge-danger">Delete</a>
                                            </td>
                                            <td><?= $r['role']; ?></td>
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