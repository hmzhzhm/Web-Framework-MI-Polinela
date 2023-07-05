<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
</head>

<body>
    <?= $this->extend('layout/page_layout') ?>
    <?= $this->section('content') ?>
    <h1 style="text-align: center;">Data Film</h1>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Semua Film</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="/film/add" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama Film</th>
            <th>Poster</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($data_film as $film): ?>
            <tr>
                <td>
                    <?= $i++; ?>
                </td>
                <td>
                    <?php echo $film['nama_film'] ?>
                </td>
                <td>
                    <center><img src="/assets/cover/<?= $film["cover"] ?>" style="max-width: 50px; height: auto;"
                            class="card-img-top" alt=""></center>
                </td>
                <td>
                    <?php echo $film['nama_genre'] ?>
                </td>
                <td>
                    <?php echo $film['duration'] ?>
                </td>
                <td>
                    <a href="/film/update/<?= encryptUrl($film["id"]); ?>" class="btn btn-success">Update</a>
                    <a class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script>
        function confirmDelete() {
            swal({
                title: "Apakah Anda yakin?",
                text: "setelah dihapus! data anda akan benar-benar hilang!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        window.location.href = "/film/destroy/<?= encryptUrl($film['id']) ?>";

                    } else {
                        swal("Data tidak jadi dihapus!");
                    }
                });
        }
    </script>
    <?= $this->endSection() ?>

</body>

</html>