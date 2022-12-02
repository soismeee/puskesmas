<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rekam Medis Pasien</title>,
    <style>
        table,
        thead,
        tr,
        tr,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 6px;
            font-family: 'Lucida Sans', 'Lucida Sans Reguler', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <div id="container">
        <p style="text-align: center;"><img src="img/logo.PNG" height="65" , style="float: left;">
            <center>
                <h3>Catatan Rekam Medis</h3>
                <h4>Jln. Raya Bojong Kajen - Bojong Telp. (0285) 4483058 </h4>
            </center>

        <p> Id Pasien : <?= $pasien['id_pasien']; ?> </p>
        <p> Nama Pasien : <?= $pasien['nama_pasien']; ?> </p>
        <p> Tanggal Lahir : <?= $pasien['tanggal_lahir']; ?> </p>
        <p> Nama KK : <?= $pasien['nama_kk']; ?> </p>
        <p> Alamat Pasien : <?= $pasien['alamat_pasien']; ?> </p>
        <p> Poli : <?= $pasien['nama_poli']; ?> </p>
        <hr />
        <div id="body">
            <table style="width: 100%;">
                <thead>
                    <tr bgcolor="#cccc">
                        <th width="5%">No</th>
                        <th>Tanggal Periksa</th>
                        <th>ID Dokter</th>
                        <th>Data Subjektif</th>
                        <th>Data Objektif</th>
                        <th>Diagnosa</th>
                        <th>Planning</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listRm as $i => $data) : ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= date('d-m-Y', strtotime($data['tanggal_periksa'])); ?></td>
                            <td><?= $data['id_dokter']; ?></td>
                            <td><?= $data['data_subjektif']; ?></td>
                            <td><?= $data['data_objektif']; ?></td>
                            <td><?= $data['diagnosa']; ?></td>
                            <td><?= $data['planning']; ?></td>

                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>