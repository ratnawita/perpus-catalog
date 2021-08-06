<?php

class controller{

    //function login
    function login($con, $tabel, $username, $password, $redirect){
        $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";
        $jalan = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($jalan);
            if($cek == 1){
                echo "<script>alert('Selamat Datang $username');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Gagal login. Harap Cek Username & Password !');document.location.href=''</script>";
            }
    }
    //penutup function login

    //fungsi simpan
    function simpan($con, $tabel, array $field, $redirect){
        $sql = "INSERT into $tabel SET "; //diakhir SET harus pake spasi -> insert into login set
    
        foreach($field as $key => $value){
            $sql.=" $key = '$value',"; //sebelum key dikasih spasi
        }
        //-> username = '$_POST[username]', password = '$_POST[password]',

        $sql = rtrim($sql, ',');
        //-> insert into login set username = '$_POST[username]', password = '$_POST[password]'

        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil disimpan');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal disimpan');document.location.href='$redirect'</script>";
        }
    }
    //penutup fungsi simpan

    //function tampil
    function tampil($con, $tabel){
        $sql = "SELECT * FROM $tabel";
        $jalan = mysqli_query($con, $sql);
        while($data = mysqli_fetch_assoc($jalan))
            $sisi[] = $data;
            return @$sisi; 
    }
    //penutup function tampil

    //function hapus
    function hapus($con, $tabel, $where, $redirect){
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil dihapus');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagagl dihapus');document.location.href='$redirect'</script>";
        }
    }
    //penutup function hapus

    //function edit
    function edit($con, $tabel, $where){
        $sql = "SELECT * FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $tampung = mysqli_fetch_assoc($jalan);
        return $tampung;
    }
    //penutup function edit

    //function ubah
    function ubah($con, $tabel, array $field, $where, $redirect){
        $sql = "UPDATE $tabel SET ";//inget dibelakang SET ada spasi
        foreach($field as $key => $value){
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql,',');
        $sql.= " WHERE $where";
        // $sql -> UPDATE login SET username='budi', password='123' WHERE id=1;
        
        $jalan = mysqli_query($con, $sql);

        if($jalan){
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }
    //penutup function ubah

    //function upload file
    function upload($foto, $tempat){
        $alamat = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($alamat,"$tempat/$namafile");
        return $namafile;
    }
    //penutup upload

}

?>