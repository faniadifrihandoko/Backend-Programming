<?php

#membuat class

class Person
{
    #membuat propperty
    public $nama;
    public $alamat;
    public $jurusan;

    # membuat method
    function setNama($data){
        $this->nama = $data;
    }
    function getNama()
    {
        return $this->nama;
    }

    function setAlamat($data)
    {
        $this->alamat=$data;
    }
    function getAlamat()
    {
        return $this->alamat;
    }

    function setJurusan($data)
    {
        $this->jurusan=$data;
    }
    function getJurusan()
    {
        return $this->jurusan;
    }


}


#membuat object
$aufa = new person();
$aufa->setNama("Aufa Billah");
$aufa->setAlamat("Depok");
$aufa->setJurusan("Informatika");

echo $aufa->getNama();
echo "<br>";
echo $aufa->getAlamat();
echo "<br>";
echo $aufa->getJurusan();



$ismail = new person();