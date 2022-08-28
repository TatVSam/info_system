<?php
   function getPartsFromFullname ($fullname) {
    $keys = ["surname", "name", "patronymic"];
    $fullnameArray = explode(" ", $fullname);
    return array_combine($keys, $fullnameArray);

}

?>