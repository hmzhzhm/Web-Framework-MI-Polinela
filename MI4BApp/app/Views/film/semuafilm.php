<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Tabel Film</title>
</head>

<body>
<?= $this->extend('layout/page_layout'); echo $this->section('content') ?>
<div class="container">
    <div class="row" >
        <?php foreach ($semuafilm as $film) : ?>
        <div class="col-md-3">
            <div class="card">
                <img src="/assets/cover/<?=$film["cover"] ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $film["nama_film"]?></h5>
                    <p class="card-text"><?= $film["nama_genre"] ?> || <?= $film["duration"] ?></p>
                    <a href="#" class="btn btn-info">Detail</a>
                    <a href="#" class="btn btn-success">Update</a>
                    <a href="#" class="btn btn-warning">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
    <script src="/assets/js/bootstrap.min.js"></script>

    <?= $this->endSection() ?>
</body>

</html>