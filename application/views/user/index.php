    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <?= $this->session->flashdata('message'); ?>

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?= $title; ?></strong>
                            </div>

                            <div class="card-body">
                                <div class="card-body">
                                    <div class="mx-auto d-block">
                                        <img class="rounded-circle mx-auto d-block" src="<?= base_url('assets/images/profile/') . $user['image']; ?>" alt="Card image cap">
                                        <h5 class="text-sm-center mt-2 mb-1"><?= $user['name']; ?></h5>
                                        <div class="location text-sm-center">
                                            <i class="fas fa-tags"></i> <?= $user['email']; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-text text-sm-center">
                                        <i class="fa fa-save"></i> Scince date : <?= date('d F Y', $user['date_created']); ?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->

    </div>