<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <?= $this->session->flashdata('message'); ?>
                    <div class=" card">
                        <div class="card-header">
                            <strong class="card-title"><?= $title; ?></strong>
                        </div>

                        <div class="card-body card-block">
                            <form action="<?= base_url('adminfinance/addAdminFinance/'); ?>" method="post" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Enter Nisn</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="nisn" id="nisn" class="form-control">
                                            <option value="">Select Nisn</option>
                                            <?php foreach ($user_id as $u) : ?>
                                                <option value="<?= $u['nisn']; ?>"><?= $u['nisn']; ?> | <?= $u['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Enter Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option value="">Select Name</option>
                                            <?php foreach ($user_id as $u) : ?>
                                                <option value="<?= $u['name']; ?>"><?= $u['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Enter Class</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kelas" id="kelas" class="form-control">
                                            <option value="">Select Class</option>
                                            <?php foreach ($user_id as $u) : ?>
                                                <option value="<?= $u['kelas']; ?>">Kelas : <?= $u['kelas']; ?> | <?= $u['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Total Tagihan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="title" name="total_tagihan" placeholder="Enter New total_tagihan" class="form-control">
                                        <?= form_error('total_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Tanggal Pembayaran</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="title" name="batas_pembayaran" placeholder="Enter New batas_pembayaran" class="form-control">
                                        <?= form_error('batas_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Total Telah dibayrakan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="title" name="total_telah_dibayar" placeholder="Enter New total_telah_dibayarkan" class="form-control">
                                        <span class="help-block">Total telah dibayarkan</span><br>
                                        <?= form_error('total_telah_dibayar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="hf-email" class=" form-control-label">Enter Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="sisa_tagihan" id="sisa_tagihan" class="form-control">
                                            <option value="">Select Status</option>

                                            <option value="Telah dibayar">Telah dibayar</option>
                                            <option value="Belum dibayar">Belum dibayar</option>

                                        </select>
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
</div>
<!-- END PAGE CONTAINER-->

</div>