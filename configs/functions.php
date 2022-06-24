<?php

function appendUserInformationToJson($pathFileName, $content = "")
{
    $handle = file_get_contents($pathFileName, true);
    $json = json_decode($handle);
    $id = "id_1";
    $id_number = 1;
    while (isset($json->$id)) {
        $id_number++;
        $id = "id_$id_number";
    }
    $json->$id = $content;

    file_put_contents($pathFileName, json_encode($json));
}
