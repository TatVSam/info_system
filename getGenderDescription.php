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