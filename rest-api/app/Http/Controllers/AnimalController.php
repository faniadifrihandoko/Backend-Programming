<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $animals = ["Jangkrik", "Kelinci"];

    function index()
    {
        echo "Menampilkan data animals" . PHP_EOL;
        foreach($this->animals as $animal) {
            echo $animal . PHP_EOL;
        }
    }

    function store(Request $request)
    {
        //echo "Nama hewan : $request->nama" . PHP_EOL;
        echo "Menambahkan data animals" . PHP_EOL;
        array_push($this->animals, $request->nama);
        $this->index();
    }

    function update(Request $request, $id)
    {
        //echo "Mengedit data animals id : $id hewan : $request->nama";
        echo "Mengeupdate data animals" . PHP_EOL;
        $this->animals[$id] = $request->nama;
        $this->index();
    }

    function destroy($id)
    {
        //echo "Menghapus data animals id : $id";
        unset($this->animals[$id]);
        echo "Data pada index ke : $id terhapus" . PHP_EOL;
        $this->index();
    }
}