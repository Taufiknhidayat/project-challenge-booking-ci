<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message'); ?>
            
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCourtModal">Tambah Lapangan Baru</a>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lapangan</th>
                                <th>Tipe</th>
                                <th>Harga/Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($courts as $c) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $c['name']; ?></td>
                                <td><?= $c['type']; ?></td>
                                <td>Rp <?= number_format($c['price_per_hour']); ?></td>
                                <td><span class="badge badge-success"><?= $c['status']; ?></span></td>
                                <td>
                                    <a href="<?= base_url('court/delete/') . $c['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus?')">hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newCourtModal" tabindex="-1" role="dialog" aria-labelledby="newCourtModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-header" id="newCourtModalLabel">Tambah Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('court'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nama Lapangan">
                    </div>
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="">Pilih Tipe</option>
                            <option value="Futsal">Futsal</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Basket">Basket</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="price_per_hour" placeholder="Harga per Jam">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>