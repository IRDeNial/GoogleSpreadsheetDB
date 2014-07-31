<?php
    function fetchUserList($url,$cols) {
        // Converts the column integer input to a decimal for future use.
        $cols = number_format($cols,1);
        
        // Get our information, then parse it.
        $jsonData = json_decode(file_get_contents($url),true);
        
        // Store all entries in the $entries array.
        $entries = $jsonData['feed']['entry'];;
        
        // Create an array for future use to store the final data in.
        $info = array();
        
        $j=-1; // So we can have a 2D array starting at 0.
        
        // Loop through each of the elements in the $entries array so we can get the real data.
        for($i=0;$i<count($entries);$i++) {
            // If (Current Entry) % 3 is not 0, then place the entry into the current array
            if(fmod($i,$cols)!=0) {
                $info[$j][$i] = $entries[$i]['content']['$t'];
            } else {
                // Otherwise, increment J and input the data into the next array
                $j++;
                $info[$j][$i] = $entries[$i]['content']['$t'];
            }
        }
        // Return our array of information!
        return $info;
    }
?>
