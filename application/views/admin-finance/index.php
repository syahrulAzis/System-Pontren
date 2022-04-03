<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg">
                    <a href="<?= base_url('adminfinance/addAdminFinance/'); ?>" class="btn btn-primary mb-3">Add New Transaktion</a>

                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <strong>Seluruh Data Syahriah</strong>
                            <form class="form-inline my-2 my-lg-0 justify-content-end" action="" method="post">
                                <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Cari disini">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Bulan Ke -</th>
                                        <th>Action</th>
                                        <th>Nisn</th>
                                        <th>Nama</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th>Total Tagihan</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Total Telah dibayarkan</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pembayaran as $p) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                <a href="" class="badge badge-primary">Detail</a>
                                                <a href="<?= base_url('adminfinance/deletefinance/') . $p['id']; ?>" onclick="return confirm('Yaqin?')" class="badge badge-danger">Delete</a>
                                            </td>
                                            <td><?= $p['nisn']; ?></td>
                                            <td><?= $p['user_id']; ?></td>
                                            <td><?= $p['kelas']; ?></td>
                                            <td><?= $p['sisa_tagihan']; ?></td>
                                            <td><?= $p['total_tagihan']; ?></td>
                                            <td><?= $p['batas_pembayaran']; ?></td>
                                            <td><?= $p['total_telah_dibayar']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- jika data Kosong -->
                            <?php if (empty($pembayaran)) : ?>
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Is Empty
                                </div>
                            <?php endif; ?>
                            <!-- Enda Data Kosong -->
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