    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">


                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?= $title; ?></strong>
                                <div class="card-body">
                                    <div class="buttons mb-3">
                                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#setorTunai">
                                            <i class="fa fa-plus"></i> Setor Tunai
                                        </button>
                                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#tarikTunai">
                                            <i class="fa fa-minus"></i> Tarik Tunai
                                        </button>
                                    </div>
                                    <?php echo "<font color='red'><b>Seblum Tarik Tunai Cek Terlebih Dahulu Saldo Santri dengan memasukan Nisn dibawah !</b></font><br>"; ?>
                                    <form class="form-inline my-2 my-lg-0 justify-content-end" action="" method="post">
                                        <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Cari nisn disini">
                                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">No.Bukti</th>
                                                <th scope="col">Nisn</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Pemasukan</th>
                                                <th scope="col">Pengeluaran</th>
                                                <th scope="col">Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $saldo = 0;
                                            foreach ($jurnal as $d) :
                                                $date = date_create($d['tgl_transaksi']);

                                                if ($d['debit'] == 0) {
                                                    $nominal = $d['kredit'];

                                                    $saldo = $saldo - $nominal;
                                                } else {
                                                    $nominal = $d['debit'];
                                                    $saldo = $saldo + $nominal;
                                                }
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= date_format($date, "d F Y") ?></td>
                                                    <td><?= $d['id_transaksi'] ?></td>
                                                    <td><?= $d['nisn']; ?></td>
                                                    <td><?= $d['user_bank']; ?></td>
                                                    <td><?= $d['kelas']; ?></td>
                                                    <td><?= $d['keterangan'] ?></td>
                                                    <td style="text-align:right;"><?= number_format($d['debit'], 0, ',', '.') ?></td>
                                                    <td style="text-align:right;"><?= number_format($d['kredit'], 0, ',', '.') ?></td>
                                                    <td style="text-align:right;">Rp <?= number_format($saldo, 0, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            endforeach ?>
                                        </tbody>
                                    </table>
                                    <?php if (empty($jurnal)) : ?>
                                        <div class="alert alert-danger" role="alert" align="center">
                                            Data Is Empty
                                        </div>
                                    <?php endif; ?>
                                    <!-- Enda Data Kosong -->
                                    <!-- jika data Kosong -->
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

    <!-- modal Setor Tunai -->
    <div class="modal fade" id="setorTunai" tabindex="-1" role="dialog" aria-labelledby="setorTunaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setorTunaiLabel">Setor Tunai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('adminfinance/setorTunaiBankSantri/') ?>" method="post">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Enter Nisn</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="nisn" id="nisn" class="form-control">
                                    <option value="">Select Nisn</option>
                                    <?php foreach ($user_id as $u) : ?>
                                        <option value="<?= $u['nisn']; ?>"><b><?= $u['nisn']; ?></b> | <?= $u['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Enter Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="user_bank" id="user_bank" class="form-control">
                                    <option value="">Select Name</option>
                                    <?php foreach ($user_id as $u) : ?>
                                        <option value="<?= $u['name']; ?>"><?= $u['nisn']; ?> | <b><?= $u['name']; ?></b></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Enter Kelas</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="">Select Kelas</option>
                                    <?php foreach ($user_id as $u) : ?>
                                        <option value="<?= $u['kelas']; ?>"><?= $u['nisn']; ?> | <?= $u['name']; ?> | <b><?= $u['kelas']; ?></b></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="inputAddress">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="ex: Pembelian .....">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="inputAddress">Tanggal Transaksi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="date" id="tanggal" name="tanggal">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="inputAddress2">Nominal</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="nominal" name="nominal" placeholder="ex: 100000">
                                <?= form_error('nominal', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal modal Setor Tunai -->

    <!-- modal Tarik Tunai -->
    <div class="modal fade" id="tarikTunai" tabindex="-1" role="dialog" aria-labelledby="tarikTunaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tarikTunaiLabel">Tarik Tunai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('adminfinance/tarikTunaiBankSantri/') ?>" method="post">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Enter Nisn</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="nisn" id="nisn" class="form-control">
                                    <option value="">Select Nisn</option>
                                    <?php foreach ($user_id as $u) : ?>
                                        <option value="<?= $u['nisn']; ?>"><b><?= $u['nisn']; ?></b> | <?= $u['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Enter Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="user_bank" id="user_bank" class="form-control">
                                    <option value="">Select Name</option>
                                    <?php foreach ($user_id as $u) : ?>
                                        <option value="<?= $u['name']; ?>"><?= $u['nisn']; ?> | <b><?= $u['name']; ?></b></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Enter Kelas</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="">Select Kelas</option>
                                    <?php foreach ($user_id as $u) : ?>
                                        <option value="<?= $u['kelas']; ?>"><?= $u['nisn']; ?> | <?= $u['name']; ?> | <b><?= $u['kelas']; ?></b></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="inputAddress">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="ex: Pembelian .....">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="inputAddress">Tanggal Transaksi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="date" id="tanggal" name="tanggal">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="inputAddress2">Nominal</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" id="nominal" name="nominal" placeholder="ex: 100000">
                                <?= form_error('nominal', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal modal Setor Tunai -->