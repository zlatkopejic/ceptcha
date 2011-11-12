<?php

        session_start();
        require_once 'Ceptcha.php';
        
        $captcha = new Ceptcha();
        
        
       $captcha->size('400', '150')
               ->images()
               ->background('200', '200', '200') //background color from 0-255
               ->noise_color('0', '0', '0')//color of the noise   
               ->noise('1000')//number of the dots of noise
               ->text('50')//size of the text letter
               ->drow();
               
       
       
       
       
       
       
       
       
   
       
       
       
       
       
       
       
       
       
       
       
       
       
?>

