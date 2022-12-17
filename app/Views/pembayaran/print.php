<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kuitansi pembayaran</title>
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
        <hr />
        <h4>KLINIK DHARMA MULIA</h4>
        <h4>Jln. Raya Bojong Kajen - Bojong Telp. (0285) 4483058 </h4>
        </p>
        <!-- <hr style="height: 3px; background: black;" /> -->

        <div id="body">
            <center>
                <h2>KWITANSI</h2>
            </center>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td width="60%"><?= $nota['nama_pasien']; ?></td>
                    <td>No. RM</td>
                    <td>:</td>
                    <td><?= $nota['id_rm']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $nota['alamat_pasien']; ?></td>
                    <td>Dokter</td>
                    <td>:</td>
                    <td><?= $nota['nama_dokter']; ?></td>
                </tr>
            </table>
            <hr style="height: 2px; background: black;">
            <table>
                <tr>
                    <td width="70%">
                        <h4><strong>JENIS TRANSAKSI</strong></h4>
                    </td>
                    <td>
                        <h4><strong>JUMLAH</strong></h4>
                    </td>
                </tr>
            </table>
            <hr style="height: 2px; background: black;">
            <table>

                <tr>
                    <td width="70%">
                        <p><?= $nota['jenis_transaksi']; ?></p>
                    </td>
                    <td>
                        <p><?= $nota['jumlah']; ?></p>
                    </td>
                </tr>
            </table>
            <hr style="height: 2px; background: black;">
            <table>
                <tr>
                    <td>
                        <h4><strong>Total</strong></h4>
                    </td>
                    <td></td>
                    <td>
                        <h4><strong>Rp. <?= number_format($nota['total'], 2, ',', '.') ?></strong></h4>
                    </td>
                </tr>
            </table>
            <hr style="height: 2px; background: black;">
            <table>
                <tr>
                    <td width="75%"></td>
                    <td><?= $nota['nama_dokter']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>