<?php

include '../configurations/config.php';
include '../models/revenue.php';


function getListeRevenue(){
    return Revenue :: getRevenues();
}

?>