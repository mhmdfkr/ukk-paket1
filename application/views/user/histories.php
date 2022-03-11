<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <?= $this->session->flashdata('message'); ?>

    <div class="row mb-3">
        <div class="col-md-4">
            <form action="<?= base_url('user/histories') ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-3 small" placeholder="Search for..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <a class="text-right">All data activity : <?= $total_rows; ?></a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($history != null) : ?>
                <?php foreach ($history as $h) : ?>
                    <tr>
                        <th scope="row"><?= ++$start  ?></th>
                        <td><?= $h['date']; ?></td>
                        <td><?= $h['time']; ?></td>
                        <td><?= $h['location']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>

                <tr>
                    <td class="text-center" colspan="4">Data tidak ditemukan!</td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>

    <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->