<?php
        function getGenderFromName($fullname) {
            
            $genderSum = 0;
            $fullnameParts = getPartsFromFullname($fullname);

            if (mb_substr($fullnameParts["patronymic"], -3, 3) == "вна") {
                $genderSum -= 1;
            } elseif (mb_substr($fullnameParts["patronymic"], -2, 2) == "ич") {
                $genderSum +=1;
            }
            
            if (mb_substr($fullnameParts["name"], -1, 1) == "а") {
                $genderSum -= 1;
            } elseif (mb_substr($fullnameParts["name"], -1, 1) == "н" || mb_substr($fullnameParts["name"], -1, 1) == "й" ) {
                $genderSum +=1;
            }
            
            if (mb_substr($fullnameParts["surname"], -2, 2) == "ва") {
                $genderSum -= 1;
            } elseif (mb_substr($fullnameParts["surname"], -1, 1) == "в") {
                $genderSum +=1;
            }
            
            return $genderSum <=> 0;
        }
    ?> 