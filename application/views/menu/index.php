<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($menu as $m) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <a href="" class="badge bg-success text-decoration-none">edit</a>
                            <a href="" class="badge bg-danger text-decoration-none">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>