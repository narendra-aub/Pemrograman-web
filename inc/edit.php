<form action="../index.php?aksi=edit" method="POST">
<?php
require_once "../app/Mhsw.php";

$pinjam = new Pinjam();

// foreach($mahasiswa->edit($_GET['id']) as $d){

    if(isset($_GET["id_pinjam"])){
        $ids = $pinjam->setid($_GET["id_pinjam"]);
        foreach($pinjam->edit($ids) as $d);

    }
    // foreach($mhsw->edit($_GET['id']) as $d){
?>
<table>
<fieldset>
        <p>
            <label>Id:</label>
            <input type="text" name="id_pinjam" value="<?php echo $d['id_pinjam'] ?>"/>
        </p>
        <p>
            <label>Id kaset:</label>
            <input type="text" name="id_kaset" value="<?php echo $d['id_kaset'] ?>"/>
        </p>
        <p>
            <label>Nama Peminjam:</label>
            <input type="text" name="nama_peminjam" value="<?php echo $d['nama_peminjam'] ?>"/>
        </p>
        <p>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?php echo $d['tanggal'] ?>" />
        </p>

        <p>
            <input type="submit" name="submit" value="Edit" />
        </p>
        </fieldset>
</table>
</form>