<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan bulanan</title>
    <style>
        table,
        thead,
        tr,
        tr,
        th,
        td {
            border-collapse: collapse;
            padding: 6px;
            font-family: 'Lucida Sans', 'Lucida Sans Reguler', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <div id="container">
        <p style="text-align: center;"><img src="<?= base_url() ?>/img/logo.png" height="65" , style="float: left;">
            <center>
                <h3>Laporan Bulanan</h3>
                <h4>Jln. Raya Bojong Kajen - Bojong Telp. (0285) 4483058 </h4>
            </center>
        </p>
        <hr />
        <div id="body">
            <table style="width: 100%;" border="1">
                <thead>
                    <tr bgcolor="#cccc">
                        <th>No</th>
                        <th>Id Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Poli</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    foreach ($periksa as $p) :
                    ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $p['id_periksa']; ?></td>
                            <td><?= $p['nama_pasien']; ?></td>
                            <td><?= $p['tanggal_periksa']; ?></td>
                            <td><?= $p['nama_poli_periksa']; ?></td>
                            <td><?= $p['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>