<?php
    function getGenderDescription ($persons_array) {
	
        $resultString = "Гендерный состав аудитории:\n---------------------------\n";
    
    
        $men = array_filter ($persons_array, function ($person) {
            return getGenderFromName($person["fullname"]) > 0;
            
        } );
        
        $menProportion = round(count($men) / count($persons_array) * 100, 1);
        
        $resultString .= "Мужчины - $menProportion%\n";
        
        $women = array_filter ($persons_array, function ($person) {
            return getGenderFromName($person["fullname"]) < 0;
            
        } );
        
        $womenProportion = round(count($women) / count($persons_array) * 100, 1);
        
        $resultString .= "Женщины - $womenProportion%\n";
        
        $indefinite = array_filter ($persons_array, function ($person) {
            return getGenderFromName($person["fullname"]) == 0;
            
        } );
        
        $indefiniteProportion = round(count($indefinite) / count($persons_array) * 100, 1);
        
        $resultString .= "Не удалось определить - $indefiniteProportion%";
        
        return $resultString;
    }
    ?>