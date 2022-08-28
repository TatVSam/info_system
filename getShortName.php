<?php
function getShortName($fullname) {
        $fullnameParts = getPartsFromFullname($fullname);
        return $fullnameParts["name"] . " " . mb_substr($fullnameParts["surname"], 0, 1) . ".";       
    }
?>