
<!DOCTYPE html>

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title></title>

</head>

<body>
    <div class="container">

    <h3>Tambah Pelanggan</h3>

    <form action="proses_tambah_pelanggan.php" method="post" enctype="multipart/form-data">

        Nama :
        <input type="text" name="nama" value="" class="form-control">

        Alamat :
        <textarea name="alamat" cols="30" rows="10" class="form-control"></textarea>

        Telp :
        <input type="number" name="telp" value="" class="form-control">

        Foto Pelanggan :
        <input type="file" name="foto_pelanggan" value="" class="form-control">

        Username :
        <input type="text" name="username" value="" class="form-control">

        Password :
        <input type="text" name="password" value="" class="form-control"><br>

        <input type="submit" name="simpan" value="Tambah pelanggan" class="btn btn-primary">

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</div>
</body>

</html>