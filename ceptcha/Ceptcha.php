<?php


require_once 'Ceptcha_Abstract.php';

/**
 * Description of Ceptcha
 *
 * @author zlatko
 */
class Ceptcha extends Ceptcha_Abstract{
  
/**
 * Example how method from abstract class can be changed
 * 
 * 
 * Changed method text, color red, green and blue is  
 * random generated and in abstract class it is fixed
 * 
 * @param int $font_size
 * @return Ceptcha 
 */    
public function text($font_size) {
    
     
    $font = 'rustic-regular.ttf';
    
  

    
    $text = md5(sha1(time()));

    $niz ='';
      
    
    for($o='1';$o<'6';$o++)
    {
    $random = rand('0', '31');
    
    $red = rand(0,255);//don't exist in abstract class
     
    $green = rand(0,255);//don't exist in abstract class
    
    $blue = rand(0,255);
    
    $fontColor = imagecolorallocate($this->_image, $red, $green, $blue);
    
    $finall = $text[$random];
    
    $niz.=$finall;
    
    $angle = rand(-30,30);//dont exist in abstract class
    
    $separation = ($this->_width/5) - $font_size;

    $x = $o * $separation;
    
    
    $y = ($this->_height/2);
    
    imagefttext($this->_image, $font_size, $angle, $x, $y, $fontColor, $font, $finall);
    }
    
    $_SESSION['niz']=$niz;
   
    
    return $this;
  
 
}
    
}

?>
