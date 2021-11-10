<?php

#membuat class

class Person
{
    #membuat propperty
    public $nama;
    public $alamat;
    public $jurusan;



    function __construct($nama,$alamat,$jurusan)
    {
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->jurusan = $jurusan;
    }
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
$aufa = new person("aufa","depok","informatika");





$ismail = new person();