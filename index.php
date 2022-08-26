<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'info_system.php';
    ?>

    <?php
    function getFullnameFromParts ($surname, $name, $patronymic) {
        return $surname . " " . $name . " " . $patronymic;
    }
    ?>

    <?php
        echo getFullnameFromParts("Иванов", "Андрей", "Георгиевич");
        
    ?>

    <br>

    <?php 
    function getPartsFromFullname ($fullname) {
        $keys = ["surname", "name", "patronymic"];
        $fullnameArray = explode(" ", $fullname);
        return array_combine($keys, $fullnameArray);

    }
 
    print_r(getPartsFromFullname($example_persons_array[0]["fullname"]));
    ?>
    <br>

    <?php
    function getShortName($fullname) {
        $fullnameParts = getPartsFromFullname($fullname);
        return $fullnameParts["name"] . " " . mb_substr($fullnameParts["surname"], 0, 1) . ".";       
    }

    print_r(getShortName($example_persons_array[0]["fullname"]));

    ?>
    <?php
        function  getGenderFromName($fullname) {
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
    <br>
    <?php
        echo getGenderFromName ($example_persons_array[6]["fullname"]);
    ?>

    <?php
    function getGenderDescription ($persons_array) {
	
        $resultString = "Гендерный состав аудитории:\n---------------------------\n";
    
    
        $males = array_filter ($persons_array, function ($person) {
            return getGenderFromName($person["fullname"]) > 0;
            
        } );
        
        $maleProportion = round(count($males) / count($persons_array) * 100, 1);
        
        $resultString .= "Мужчины - $maleProportion%\n";
        
        $females = array_filter ($persons_array, function ($person) {
            return getGenderFromName($person["fullname"]) < 0;
            
        } );
        
        $femaleProportion = round(count($females) / count($persons_array) * 100, 1);
        
        $resultString .= "Женщины - $femaleProportion%\n";
        
        $indefinite = array_filter ($persons_array, function ($person) {
            return getGenderFromName($person["fullname"]) == 0;
            
        } );
        
        $indefiniteProportion = round(count($indefinite) / count($persons_array) * 100, 1);
        
        $resultString .= "Не удалось определить - $indefiniteProportion%";
        
        return $resultString;
    }
    ?>
        <br>
    <?php
        print_r(getGenderDescription($example_persons_array));
    ?>

    <?php
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
        
        $randomCompatibility = round(50 + mt_rand() / mt_getrandmax() * 50, 2);
        
        $resultString = getShortName($fullname) . " + " . getShortName($partnerName) . " =\n";
        $resultString .= "♡ Идеально на $randomCompatibility% ♡";
        
        return $resultString;
        
    }
    ?>
    <br>
    <?php
        echo getPerfectPartner ("Воеводова", "ирина", "Игоревна", $example_persons_array);
    ?>
</body>
</html>