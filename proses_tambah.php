<?php
include("koneksi.php");
if(isset($_POST['tambah'])){
    $nama_user=$_POST['nama_user'];
    $jabatan=$_POST['jabatan'];
    $nama_bahan=$_POST['nama_bahan'];
    $jenis_bahan=$_POST['jenis_bahan'];
    $stok=$_POST['stok'];
    $harga=$_POST['harga'];
    $kondisi=$_POST['kondisi'];
    $tgl_masuk=$_POST['tgl_masuk'];
    
    $sql="INSERT INTO tb_bahan(nama_bahan,jenis_bahan,stok,harga,kondisi,tgl_masuk) VALUES ('$nama_bahan','$jenis_bahan','$stok','$harga','$kondisi','$tgl_masuk')"; 
    $query=mysqli_query($db,$sql);

    $sql="SELECT max(id_bahan) AS bahan_id FROM tb_bahan LIMIT 1";
    $query=mysqli_query($db,$sql);

    $data=mysqli_fetch_array($query);
    $bahan_id=$data['bahan_id'];

    $sql="INSERT INTO tb_user(nama_user, jabatan, id_bahan) VALUES 
    ('$nama_user', '$jabatan','$bahan_id')";
    $query=mysqli_query($db,$sql);


    if($query){
        header('location:tampil.php?status=sukses');
    }else{
        header('location:tampil.php?status=gagal');
    }
}