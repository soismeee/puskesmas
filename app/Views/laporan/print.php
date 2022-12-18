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
            <center>
                <h3>KLINIK DARMA MULIA</h3>
                <h4>LAPORAN PELAYANAN RAWAT JALAN</h4>
                <H4>Periode <?= date('F Y', strtotime($bulan)); ?></H4>
            </center>
        </p>
        <hr />
        <div id="body">
            <table style="width: 100%;" border="1">
                <thead>
                    <tr bgcolor="#cccc">
                        <th scope="col">No</th>
                        <th scope="col">Diagnosa Penyakit</th>
                        <th scope="col">Jumlah kasus</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($listpenyakit as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['nama_penyakit']; ?></td>
                            <td><?= $p['jml_kasus']; ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>