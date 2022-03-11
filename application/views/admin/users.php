<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-3">
            <form action="<?= base_url('admin/users'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search keyword..." name="keyword" autocomplete="off" autofocus>
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>
            </form>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">NIK</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($member as $key => $m) : ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $m['name']; ?></td>
                    <td><?= $m['nik']; ?></td>
                    <td><?= $m['email']; ?></td>
                    <td><a href="<?= base_url('admin/detail_history/') . $m['id']; ?>" class="btn btn-primary">Activity</a>
                        <a href="<?= base_url('admin/delete/') . $m['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->