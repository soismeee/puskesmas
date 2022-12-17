<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak resep</title>
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
        <!-- <p style="text-align: center;"><img src="<?= base_url() ?>/img/logo.png" height="65" , style="float: left;"> -->
            <center>
                <h2>KLINIK DHARMA MULIA</h2>
                <h4>Jln. Raya Bojong Kajen - Bojong Telp. (0285) 4483058 </h4>
            </center>
        </p>
        <hr style="height: 3px; background: black;" />
        <hr />
        <table>
            <tr>
                <td>Resep</td>
                <td>:</td>
                <td width="60%"><?= $resep['resep']; ?></td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>:</td>
                <td><?= $resep['nama_dokter']; ?></td>
                <td>Kode</td>
                <td>:</td>
                <td><?= $resep['kode']; ?></td>
            </tr>
        </table>
        <div id="body">
            <hr /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <table>
                <tr>
                    <td width="60%">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $resep['nama_pasien']; ?></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>:</td>
                                <td><?= $resep['umur']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $resep['alamat_pasien']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>NO. KP. BPJS KESEHARAN</strong></td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                    <td width="40%">
                        <table>
                            <tr>
                                <td>Penerima obat</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>