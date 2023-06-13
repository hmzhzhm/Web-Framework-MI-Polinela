<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Genre</title>
</head>
<body>
    <h1>Data Genre</h1>
    <table class="table table-bordered" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama Genre</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($semuagenre as $row) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?php echo $row['nama_genre']?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>