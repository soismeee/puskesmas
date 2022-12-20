<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rekam Medis Pasien</title>
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
            <center>
                <h3>Catatan Rekam Medis</h3>
                <h4>Jln. Raya Bojong Kajen - Bojong Telp. (0285) 4483058 </h4>
            </center>
        </p>
        <center>
            <table>
                <tr>
                    <td width="100px">Nama</td>
                    <td>:</td>
                    <td width="300px"><?= $pasien['nama_pasien']; ?></td>
                    <td width="150px">Tanggal lahir</td>
                    <td>:</td>
                    <td width="250px"><?= date('d/m/Y', strtotime($pasien['tanggal_lahir'])); ?></td>
                </tr>
                <tr>
                    <td>Nama KK</td>
                    <td>:</td>
                    <td><?= $pasien['nama_kk']; ?></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $pasien['alamat_pasien']; ?></td>
                </tr>
                <tr>
                    <td>No. Index</td>
                    <td>:</td>
                    <td><?= $pasien['id_pasien']; ?></td>
                    <td>No. BPJS</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </center>
        <hr />
        <div id="body">
            <table style="width: 100%;" border="1">
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
                            <td><?= date('d/m/Y', strtotime($data['tanggal_periksa'])); ?></td>
                            <td><?= $data['nama_dokter']; ?></td>
                            <td><?= $data['data_subjektif']; ?></td>
                            <td><?= $data['data_objektif']; ?></td>
                            <td><?= $data['nama_penyakit']; ?></td>
                            <td><?= $data['planning']; ?></td>

                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>