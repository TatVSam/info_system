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
        include 'getFullnameFromParts.php';
        include 'getPartsFromFullname.php';
        include 'getShortName.php';
        include 'getGenderFromName.php';
        include 'getGenderDescription.php';
        include 'getPerfectPartner.php';
    ?>

    <?php
        //функция для словесного обозначения пола
        function genderOutput ($genderValue) {
            switch ($genderValue) {
                case -1:
                    return 'женщина';
                case 1:
                    return'мужчина';
                 case 0:
                    return 'пол не определен';                 
            }
        }
    ?>

    <h3>getFullnameFromParts</h3>
    <p>
    <?php
       
       echo nl2br('getFullnameFromParts("Иванов", "Андрей", "Георгиевич") = ' . getFullnameFromParts("Иванов", "Андрей", "Георгиевич") . "\n\n");
         
       echo 'getFullnameFromParts("Балаян", "Анаит", "Сергеевна") = ' . getFullnameFromParts("Балаян", "Анаит", "Сергеевна");
     
    ?>

    </p>

    <h3>getPartsFromFullname</h3>

    <p>
    <?php 
        echo 'getPartsFromFullname("Пушкин Александр Сергеевич") = ';
        print_r(getPartsFromFullname("Пушкин Александр Сергеевич"));
        echo nl2br("\n\n");
        echo nl2br('$example_persons_array[0]["fullname"] = ' . $example_persons_array[0]["fullname"] . "\n\n");
        echo 'getPartsFromFullname($example_persons_array[0]["fullname"]) = ';
        print_r(getPartsFromFullname($example_persons_array[0]["fullname"]));
    ?>

    

    </p>

    <h3>getShortName</h3>
    <p>
    <?php    
        echo nl2br('getShortName("Лермонтов Михаил Юрьевич") = ' . getShortName("Лермонтов Михаил Юрьевич") . "\n\n");
   
        echo nl2br('$example_persons_array[1]["fullname"] = ' . $example_persons_array[1]["fullname"] . "\n\n");
        echo nl2br('getShortName($example_persons_array[1]["fullname"])) = ' . getShortName($example_persons_array[1]["fullname"]));
     
    ?>

    </p>

    <h3>getGenderFromName</h3>

    <p>
    <?php
        echo nl2br('$example_persons_array[6] = ' . $example_persons_array[6]["fullname"] . "\n\n");
        $genderValue = getGenderFromName ($example_persons_array[6]["fullname"]);
        $genderStr = genderOutput($genderValue);


        echo 'getGenderFromName ($example_persons_array[6]["fullname"]) = ' . getGenderFromName ($example_persons_array[6]["fullname"]) . " => ";
        echo nl2br($genderStr . "\n\n");

        echo nl2br('$example_persons_array[10] = ' . $example_persons_array[10]["fullname"] . "\n\n");
        $genderValue = getGenderFromName ($example_persons_array[10]["fullname"]);
        $genderStr = genderOutput($genderValue);


        echo 'getGenderFromName ($example_persons_array[10]["fullname"]) = ' . getGenderFromName ($example_persons_array[10]["fullname"]) . " => ";
        echo nl2br($genderStr . "\n\n");

        echo nl2br('$example_persons_array[8] = ' . $example_persons_array[8]["fullname"] . "\n\n");
        $genderValue = getGenderFromName ($example_persons_array[8]["fullname"]);
        $genderStr = genderOutput($genderValue);


        echo 'getGenderFromName ($example_persons_array[8]["fullname"]) = ' . getGenderFromName ($example_persons_array[8]["fullname"]) . " => ";
        echo nl2br($genderStr . "\n");



    ?>

   
    </p> 

    <h3>getGenderDescription</h3>

    <p>

    <?php
        echo nl2br(getGenderDescription($example_persons_array));
    ?>

    </p>
    
    <h3>getPerfectPartner</h3>

    <p>
    <?php
        echo nl2br('getPerfectPartner ("Воеводов", "аЛекСей", "Игоревич", $example_persons_array) = ' . "\n");
        echo nl2br(getPerfectPartner ("Воеводов", "аЛекСей", "Игоревич", $example_persons_array) . "\n\n");

        echo nl2br('getPerfectPartner ("аль-Хорезми", "Мухаммад", "ибн-Муса", $example_persons_array) = ' . "\n");
        echo getPerfectPartner ("аль-Хорезми", "Мухаммад", "ибн-Муса", $example_persons_array);
        
    ?>
    </p>

    <style>

        * {
            padding: 0;
            margin: 0;    
        }

        p {
            margin: 10px 0px 10px 10px;
            font: 16px/1.5 Arial, sans-serif;
        }

        h3 {
            margin: 15px 0px 15px 20px;
            font: bold 20px/1.5 Arial, sans-serif;
        }


    </style>
</body>
</html>