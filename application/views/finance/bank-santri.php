    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-8">
                        <h2 class="title-1 m-b-25">Daftar Pengeluaran</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">No.Bukti</th>
                                        <th scope="col">Uraian</th>
                                        <th scope="col">Pemasukan</th>
                                        <th scope="col">Pengeluaran</th>
                                        <th scope="col"><b>Saldo</b></th>
                                    </tr>
                                </thead>
                                <?php
                                $nisn = $user['nisn'];
                                $bank_santri = "SELECT a.id,a.id_transaksi,a.nisn,a.user_bank, a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a LEFT JOIN jurnal_detail b on a.id = b.id_jurnal WHERE a.nisn = '$nisn' order by a.tgl_transaksi asc";

                                $jurnal = $this->db->query($bank_santri)->result_array();
                                ?>
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
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money-box"></i>
                                    </div>
                                    <div class="text">
                                        <span>Saldo <?= $user['name']; ?></span>
                                        <h2>Rp <?= number_format($saldo) ?></h2>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
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