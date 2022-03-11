<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <?= $this->session->flashdata('message'); ?>
    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline navbar-search mb-3">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-3 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
        <!-- <a href="<?= base_url('user/pdf'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm-3 my-3"><i class="fas fa-download fa-sm text-white-50"></i> Export file</a> -->
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Location</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($history != null) : ?>
                <?php foreach ($history as $key => $h) : ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $h['lokasi']; ?></td>
                        <td><?= $h['jam']; ?></td>
                        <td><?= $h['tanggal']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>

                <tr>
                    <td class="text-center" colspan="4">Data tidak ditemukan!</td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->