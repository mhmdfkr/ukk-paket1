<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>
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