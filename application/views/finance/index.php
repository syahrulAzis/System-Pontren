    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header">
                            <strong class="card-title"><?= $title; ?> <br> Name : <?= $user['name']; ?></strong>
                        </div>

                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Bulan Ke -</th>
                                        <th>Status</th>
                                        <th>Total Tagihan</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Total Telah dibayarkan</th>

                                    </tr>
                                </thead>
                                <?php
                                $userId = $user['nisn'];
                                $queryPembayaran = "SELECT *
                                    FROM `pembayaran_syahriah`
                                    WHERE `nisn` = $userId
                                                    ";
                                $pembayaran = $this->db->query($queryPembayaran)->result_array();
                                ?>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pembayaran as $p) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
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
                                    Belum Melakukan Pembayaran
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END PAGE CONTAINER-->

    </div>