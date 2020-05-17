<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>OhNais Ticket</title>
</head>
<body>
    <table class="table table-bordered">
        <tr class="text-center"><td colspan="2"><b>E-Ticket OhNais! Festival</b></td></tr>
        <tr>
            <?php foreach ($event as $d) { ?>
            <td rowspan="2" class="text-center mt-3" style="width:50%;"><img src="assets/images/event/<?= $d->poster ?>" alt="" width="250px" height="350px"></td>
             <?php  } ?>
            <td class="text-center mt-5 pt-2" style="height:10%"><img src="assets/syn.jpg" class="mt-3" alt="" width="120px"></td>

        </tr>
        <?php foreach($tiket as $t): ?>
        <tr>
        <td class="text-center"><img class="img" src="assets/images/qr/<?= $t['qr_code']; ?>" alt="" height="160px" width="160px;"><br>Ticket 1 of <?= $t['qty'] ?></td>
        </tr>
        <tr>
        <td class="text-center" style="font-size:13px;">
            <?php foreach ($detail_tiket as $d) { ?>
        <b style="text-transform:uppercase;">
           <?= $d->nama_event ?> <br>
           <?php foreach ($event as $d) { ?>
           <?= $d->tanggal_event ?> <br>
           <?php  } ?>
           <?= $d->venue ?> <br>

            </b>
            <?php  } ?>
        </td>
        <td class="text-center" style="font-size:13.5px;">
            <?php foreach ($detail_tiket as $d) { ?>
                <b><?= $d->kode_transaksi ?> <br>
                <?= $t['nama_user'] ?><br>
                </b>
                Ordered on <?= date('d F Y',$t['tanggal']) ?> <br>
                <?php  } ?>
                <?php foreach ($data_tiket as $d) { ?>
                <?= $d->kelas ?>
                <?= $d->akses ?>
                <?= $d->qty_tiket ?><br>
                <?php  } ?>

                <?php endforeach; ?>


        </td>
        </tr>
        <tr>
        <td colspan="2" class="text-center text-danger font-weight-bold">TERMS & CONDITIONS
        </td>
        </tr>
        <tr style="font-size:11px;">
        <td style="width:50%;">
          <ul>
            <li><b>Proof of ID is a requirement for every ticket purchased </b><br>
                  Wajib menunjukkan kartu identitas untuk setiap pembelian tiket
            </li>
            <li><b>Tickets are non-refulndable</b><br>
                  Tiket yang sudah dibeli tidak dapat dikembalikan
            </li>
            <li><b>E-Ticket can be exchanged on-site during the event</b><br>
                  E-tiket ini dapat ditukar di tempat saat acara berlangsung
            </li>
            <li><b>We are not responsible for the loss of your e-ticket</b><br>
                  Kami tidak bertanggung jawab atas kehilangan e-ticket anda
            </li>
          </ul>
        </td>
        <td style="width:50%;">
          <ul>
            <li><b>No weapon and no drugs </b><br>
                  Dilarang membawa senjata atau obat-obatan
            </li>
            <li><b>We will have every right to refuse and discharge entry for ticket holders that does not meet the Term & Condition</b><br>
                Penyelenggara berhak untuk tidak memberikan izin untuk masuk ke dalam tempat acara apabila syarat-syarat & ketentuan tidak dipenuhi
            </li>
          </ul>
        </td>
        </tr>

      </tr>

    <tr>
      <td class="text-center text-danger" style="font-size:12px;"><u>Website : www.sejayacorp.com</u></td>
      <td class="text-center text-danger" style="font-size:12px;"><u>Phone : 0821 2912 8467</u></td>
    </tr>
    <tr>
      <td class="text-center uppercase" colspan="2">Terimakasih telah membeli tiket di website kami</td>
    </tr>
    </table>
    <!-- <script src="https://kit.fontawesome.com/c3a6dded80.js" crossorigin="anonymous"></script> -->
</body>
</html>
