<?php

include '../configurations/config.php';
include '../models/repartion.php';


function getListeRepartion(){
    return Repartition :: getRepartitions();
}

?>