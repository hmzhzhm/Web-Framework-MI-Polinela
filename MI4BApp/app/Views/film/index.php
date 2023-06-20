<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
</head>

<body>
<?= $this->extend('layout/page_layout'); echo $this->section('content') ?>
    <h1 style="text-align: center;">Data Film</h1>
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
        <?php foreach ($data_film as $data): ?>
            <tr>
                <td>
                    <?= $i++; ?>
                </td>
                <td>
                    <?php echo $data['nama_film'] ?>
                </td>
                <td>
                    <center><img src="/assets/cover/<?=$data["cover"] ?>" style="max-width: 50px; height: auto;" class="card-img-top" alt=""></center>
                </td>
                <td>
                    <?php echo $data['nama_genre'] ?>
                </td>
                <td>
                    <?php echo $data['duration'] ?>
                </td>
                <td>
                    <a href="" class="btn btn-success">Update</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $this->endSection() ?>

</body>

</html>