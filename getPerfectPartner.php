<?php
    function randomFloat($min = 0, $max = 1) {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }


    function getPerfectPartner ($surname, $name, $patronomyc, $persons_array) {
        $fixedSurname = mb_convert_case ($surname, MB_CASE_TITLE);
        $fixedName = mb_convert_case ($name, MB_CASE_TITLE);
        $fixedPatronomyc = mb_convert_case ($patronomyc, MB_CASE_TITLE);
        $fullname = getFullnameFromParts($fixedSurname, $fixedName, $fixedPatronomyc);
        $gender = getGenderFromName($fullname);
        
        $partnerGender = 0;
        $partnerName = "";
        while($partnerGender != -$gender) {
            $partnerID = mt_rand(0, count($persons_array) - 1);
            $partnerName = $persons_array[$partnerID]["fullname"];
            $partnerGender = getGenderFromName($partnerName);
        }
        
        $randomCompatibility = number_format(randomFloat(50, 100), 2);
        
        $resultString = getShortName($fullname) . " + " . getShortName($partnerName) . " =\n";
        $resultString .= "♡ Идеально на $randomCompatibility% ♡";
        
        return $resultString;
        
    }
    ?>