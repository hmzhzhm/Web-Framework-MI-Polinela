<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Hind:wght@300&family=Kalam&family=Lobster&family=Rubik+Puddles&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Acme', sans-serif;
        }
    </style>
    <title>Tabel</title>
</head>
<body>
    <h1 style="text-align: center;">Data Film</h1>
    <table class="table table-bordered" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama Film</th>
            <th>Genre</th>
            <th>Durasi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($data_film as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?php echo $row['nama_film']?></td>
                <td><?php echo $row['genre']?></td>
                <td><?php echo $row['duration']?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>