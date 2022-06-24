<?php

class UserAdministration
{

    public function __construct($storeDataPath)
    {
        $this->storeDataPath = $storeDataPath;
    }

    function appendUserInformationToJson($content = "")
    {
        $handle = file_get_contents($this->storeDataPath, true);
        $json = json_decode($handle);
        $id = "id_1";
        $id_number = 1;
        while (isset($json->$id)) {
            $id_number++;
            $id = "id_$id_number";
        }
        $json->$id = $content;

        file_put_contents($this->storeDataPath, json_encode($json));
    }

    function searchIfUserExists($email, $password)
    {

        $handle = file_get_contents($this->storeDataPath, true);
        $json = json_decode($handle);
        foreach ($json as $key => $value) {
            if ($value->userEmail === $email && $value->userPassword === $password) {
                return true;
            };
        };
    }
}
