<?php

include '../configurations/config.php';
include '../models/dettes.php';


function getListeDette(){
    return Dette :: getDettes();
}

?>