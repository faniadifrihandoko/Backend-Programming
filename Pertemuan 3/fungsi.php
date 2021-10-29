<?php

#membuat fungsi

function hitungLuasLingkaran($jariJari)
{
    $phi = 3.14;
    $luasLingkaran = $phi * $jariJari * $jariJari;
    return $luasLingkaran;
}

echo hitungLuasLingkaran(5);
echo "<br>";
echo hitungLuasLingkaran(9);