<?php

include '../configurations/config.php';
include '../models/repartition.php';


function getListeRepartion(){
    return Repartition :: getRepartitions();
}

?>