<?php
   $file_path = "example.txt";
   $file_contents = file_get_contents($file_path);
   echo "<pre>" . $file_contents . "</pre>";

   $file_handle=fopen($file_path,"r");
   $line_count = 0;
    $word_count = 0;
    $char_count = 0;
    while(!feof($file_handle)) {
        $line = fgets($file_handle);
        $line_count++;
    
        $words = explode(" ", $line);
        $word_count += count($words);
    
        $char_count += strlen($line);
        
    }
    
    fclose($file_handle);
    echo "Total number of lines: " . $line_count . "<br>";
    echo "Total number of words: " . $word_count . "<br>";
    echo "Total number of characters: " . $char_count . "<br>";
    ?>