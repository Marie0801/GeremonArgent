<?php

include '../configurations/config.php';
include '../models/sources.php';


function getListeSource(){
    return Source :: getSources();
}

?>