    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">

                        <a href="<?= base_url('menu/addSubmenu/'); ?>" class="btn btn-primary mb-3">Add New Submenu</a>
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
                                        <th>Title</th>
                                        <th>Menu</th>
                                        <th>url</th>
                                        <th>Icon</th>
                                        <th>Active</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="" class="badge badge-primary">Edit</a>
                                                <a href="<?= base_url('menu/subMenuHapus/'); ?><?= $sm['id']; ?>" onclick="return confirm('Yaqin ?')" class="badge badge-danger">Delete</a>
                                            </td>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['icon']; ?></td>
                                            <td><?= $sm['is_active']; ?></td>
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