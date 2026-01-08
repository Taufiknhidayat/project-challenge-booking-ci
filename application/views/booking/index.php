<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi Pesanan Lapangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>Lapangan</th>
                            <th>Waktu Main</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($bookings as $b) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $b['customer_name']; ?></td>
                            <td><?= $b['court_name']; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($b['booking_time'])); ?></td>
                            <td><?= $b['duration']; ?> Jam</td>
                            <td>Rp <?= number_format($b['total_price'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($bookings)) : ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data booking.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>