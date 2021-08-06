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

if (isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}
if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}
if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $tabel, $where);
}
if (isset($_POST['ubah'])) {
    $go->ubah($con, $tabel, $field, $where, $redirect);
}
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
        <title>Input Form</title>
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
                    <h4>Catalog Form</h4>
                </div>
                </div>

                <!-- form-body -->
                <div class="panel-body">
                <form class="form form-vertical" method="post" name="myform">
                <!-- text-body -->
                    <div class="control-group">
                    <label>Kode Buku</label>
                    <div class="controls">
                    <input type="text" name="kode" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['kode']?>" required placeholder="AA010">
                    </div>
                    </div>

                    <div class="control-group">
                    <label>Judul Buku</label>
                    <div class="controls">
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['judul']?>" required placeholder="Masukan judul buku">
                    </div>
                    </div>

                    <div class="control-group">
                    <label>Penulis</label>
                    <div class="controls">
                    <input type="text" name="penulis" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['penulis']?>" placeholder="Masukan Penulis">
                    </div>
                    </div>

                    <div class="control-group">
                    <label>Penerbit</label>
                    <div class="controls">
                    <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['penerbit']?>" placeholder="Masukan Penerbit">
                    </div>
                    </div>

                    <div class="control-group">
                    <label>Tahun Terbit</label>
                    <div class="controls">
                        <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['tahun']?>" placeholder="Masukan Tahun">
                    </div>
                    </div>
                    <!-- oninput="if(value.length>4)value=value.slice(0,4)" pattern="\d*" -->

                    <div class="control-group">
                    <label>NO ISBN</label>
                    <div class="controls">
                    <input type="text" name="noisbn" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['noisbn']?>" required placeholder="Masukan ISBN">
                    </div>
                    </div>

                    <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <?php if(@$_GET['id']==""){ ?>
                        <input type="submit" style="width:100%" class="btn btn-primary mt-3 mb-5 ml-3" name="simpan" value="SIMPAN">
                    <?php }else{ ?>
                        <input type="submit" style="width:100%" name="ubah" class="btn btn-warning mt-3 mb-5 ml-3" value="UBAH">
                    <?php } ?>
                    </td>
                    </tr>     
                </form>
            </div>
            </div>
            
            <div style="padding:10px;">
                <table align="center" border="1" class="mt-2 table table-stripped table-hover bg-white" id="data">
                    <tr>
                        <!-- <th>No</th> -->
                        <th>No.</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>NO ISBN</th>
                        <th>Edit</th>
                        <th>Hapus</th>
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
                        <td><a class="btn btn-danger" href="?menu=form&hapus&id=<?php echo $r['id']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                        <td><a class="btn btn-warning" href="?menu=form&edit&id=<?php echo $r['id']?>">Edit</a></td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
            </div>
            </div>
</body>
</html>