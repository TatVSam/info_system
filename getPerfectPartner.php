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

        //если пол не определен, нельзя найти партнера
        if ($gender == 0) {
            return "Пол не определен. Невозможно подобрать идеального партнера!";
        }

        // проверяем, есть ли в базе люди противоположного пола
        $containsOppositeGender = false;

        foreach ($persons_array as $key => $name) {
            if (getGenderFromName($persons_array[$key]["fullname"]) == -$gender) {
                $containsOppositeGender = true;
            }
        }

       
        if (!$containsOppositeGender) {
            return "Нет партнера подходящего пола!";
        }
        
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