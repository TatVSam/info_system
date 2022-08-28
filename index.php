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
       
        echo getFullnameFromParts("Иванов", "Андрей", "Георгиевич");
        
    ?>

    <br>

    <?php 
 
        print_r(getPartsFromFullname($example_persons_array[0]["fullname"]));
    ?>

    <br>

    <?php
    

        print_r(getShortName($example_persons_array[0]["fullname"]));

    ?>
     
    <br>
    <?php
        echo getGenderFromName ($example_persons_array[6]["fullname"]);
    ?>

   
        <br>
    <?php
        echo nl2br(getGenderDescription($example_persons_array));
    ?>

   
    <br>
    <?php
        echo getPerfectPartner ("Воеводова", "ирина", "Игоревна", $example_persons_array);
    ?>
</body>
</html>