<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Document</title>
</head>
<body>

<h1 class="text-center">DATA MEMBER</h1>

<table class="tab;e table-bordered">
    <tr style="background-color: #c2c2c2;">
        <th class="text-center">#</th>
        <th class="text-center" style="width:20%">Nama</th>
        <th class="text-center" style="width:22%;">Email</th>
        <th class="text-center" style="width:20%">Telepon</th>
        <th class="text-center" style="width:20%">Tanggal Lahir</th>
        <th class="text-center" style="width:25%">Tanggal Daftar</th>
    </tr>
    <?php $no=1; foreach($member as $m):?>
        <tr>
            <td class="text-center" style="width: 5%; height: 60px;"><?= $no++ ?></td>
            <td class="text-center" style="width: 20%;"><?= $m['nama_user'] ?></td>
            <td class="text-center" style="width: 25%;"><?= $m['email'] ?></td>
            <td class="text-center" style="width: 20%;"><?= $m['telepon'] ?></td>
            <td class="text-center" style="width: 15%;"><?= $m['tgl_lahir'] ?></td>
            <td class="text-center" style="width: 25%;"><?= date('d M Y', $m['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        window.print();
        
    </script>
</body>
</html>
