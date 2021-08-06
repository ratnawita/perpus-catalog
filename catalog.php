<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "form";
@$field = array('id'=>$_POST[''],
                'kode'=>$_POST['kode'],
                'judul'=>$_POST['judul'],  
                'penulis'=>$_POST['penulis'], 
                'penerbit'=>$_POST['penerbit'], 
                'tahun'=>$_POST['tahun'],
                'noisbn'=>$_POST['noisbn'],
                );
$redirect = "?menu=form";
@$where = "id = $_GET[id]";
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <title>Catalog Page</title>
    </head>
    
    <body>
    <!-- container -->
    <div class="container">
            <!-- Pembuka Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php" style="color:white;">Perpustakaan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <a class="nav-link" aria-current="page" href="dashboard.php" style="color:white;">Home</a>
                        <a class="nav-link" aria-current="page" href="form.php" style="color:white;">Form</a>
                        <a class="nav-link" aria-current="page" href="catalog.php" style="color:white;">Catalog</a>
                    </ul>
                    <!-- right-navbar -->
                    <form class="d-flex">
                        <div class="nav-right">
                            <a class="nav-link" aria-current="page" style="color:white;" onclick="return confirm('Yakin keluar?');" href="logout.php">Logout</a>
                        </div>
                        </ul>
                    </form>
                </div>
            </div>
            </nav>
        <!-- Penutup Navbar -->
        <br>
        </div>

        <div class="col-md-9 mx-auto mt-5">
            <div class="row mt-4">
            <div class="panel panel-default">

                <!-- form-title -->
                <div class="panel-heading">
                <div class="panel-title">
                    <h4>Catalog Table</h4>
                </div>
                </div>
                
            <div style="padding: 10px;">
                <table align="center" border="1" class="mt-4 table table-bordered" id="data">
                    <tr>
                        <!-- <th>No</th> -->
                        <th>No.</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>NO ISBN</th>
                    </tr>

                    <?php
                        $data = $go->tampil($con,$tabel);
                        $no = 0;
                        if($data ==""){
                            echo "<tr><td colspan='5'>No Record</td></tr>";
                        }else{
                            foreach($data as $r){
                            $no++
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $r['kode']?></td>
                        <td><?php echo $r['judul']?></td>
                        <td><?php echo $r['penulis']?></td>
                        <td><?php echo $r['penerbit']?></td>
                        <td><?php echo $r['tahun']?></td>
                        <td><?php echo $r['noisbn']?></td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
            </div>
            </div>
        </div>
</body>
</html>