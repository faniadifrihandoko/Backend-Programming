<?php

#membuat class

class Person
{
   #membuat propperty
    public $nama;
    public $alamat;
    public $jurusan;
}

#membuat object
$aufa = new person();
$aufa->nama = "aufa bilah";
$aufa->alamat = "Depok";
$aufa->Jurusan = "Informatika";
echo $aufa->nama;
echo "<br>";
echo $aufa->alamat;
echo "<br>";
echo $aufa->Jurusan;

$ismail = new person();