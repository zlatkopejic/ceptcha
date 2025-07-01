<?php



/**
 * Ceptcha abstract class define all neccessery 
 * 
 * methodese and propertyes for creating captcha image
 *
 * @author zlatko
 * @version 1.0
 */
class Ceptcha_Abstract {
    

/**
 * Define width of captcha image
 * 
 * @var int
 */
    
    protected $_width;
 
/**
* Define height of captcah image
* 
* @var int 
*/  
    protected $_height;
    
    
/**
 * Define type of backgraound noise 
 * 
 * @param sting $type
 *  
 */    
    
    protected $_type;
    
    
/**
 * Define ceptcha image
 *  
 */    
    protected $image;




    /**
 * Define dentesty of the background noise
 * 
 * @var int 
 */    
    protected $_noiseDentesty;

/**
 * Define background color
 */
    protected $_background;

/**
 * Define red color 
 * 
 * @var mixed 
 */
    
    protected $_red;

/**
 * Define green color 
 * 
 * @var mixed 
 */
    
    protected $_green;

/**
 * Define blue color.
 *
 * @var mixed
 */
    
    protected $_blue; 
    
    
    
/**
 * Define red noise color 
 * 
 * @var mixed 
 */
    
    protected $_redNoise;

/**
 * Define green noise color 
 * 
 * @var mixed 
 */
    
    protected $_greenNoise;

/**
 * Define blue noise color
 * 
 * @var mixed 
 */
    
    protected $_blueNoise;
    
    
    
    
/**
 * Define noise final color
 *  
 */    
    
    
    protected $_noiseColor;


    /**
 * Define image
 * 
 * @var string
 */
    
  
    
    
    protected $_image;
    
    
    

    /**
 *  Settings captcha image size
 * 
 * @param int $width
 * @param int $height
 * @return Ceptcha_Abstract 
 */    
    
public function size($width,$height){
    
    $this->_width = $width;
    $this->_height=$height;    
    return $this;
    
    
    }

/**
 * Creating new captcha image
 * 
 * @return Ceptcha_Abstract 
 */

public function images()
{
    $this->_image = imagecreatetruecolor($this->_width,$this->_height);
    
    return $this;
}



/**
 * Define ceptcha background color
 * 
 * @param int $red
 * @param int $green
 * @param int $blue 
 */    
public function background($red,$green,$blue)
{
    $this->_red=$red;
    $this->_green=$green;
    $this->_blue=$blue;
    
    $this->_background = imagecolorallocate($this->_image, $this->_red, $this->_green, $this->_blue);
    
    imagefill($this->_image, '0', '0', $this->_background);
   
    return $this;
}



/**
 * Define color of the noise
 * 
 * @param int $redNoise
 * @param int $greenNoise
 * @param int $blueNoise
 * @return Ceptcha_Abstract 
 */
public function noise_color($redNoise,$greenNoise,$blueNoise)
{
    $this->_redNoise=$redNoise;
    $this->_greenNoise=$greenNoise;
    $this->_blueNoise=$blueNoise;
    
    $this->_noiseColor = imagecolorallocate(
            $this->_image, 
            $this->_redNoise, 
            $this->_greenNoise, 
            $this->_blueNoise
            );
    
    return $this;
}




/**
 * Display noise on image
 *
 * @param int $noise_dentesty
 * @return Ceptcha_Abstract 
 */


public function noise($noise_dentesty)
{
    $this->_noiseDentesty=$noise_dentesty;
    
   
    
    for($i='1';$i<$this->_noiseDentesty;$i++)
    {
        $xPosition = rand('0', $this->_width-1);
    
        $yPosition = rand('0',  $this->_height);
        
        imagefilledellipse($this->_image, $xPosition, $yPosition, '1', '1', $this->_noiseColor); 
    }
    
    return $this;
    
}

/**
 *
 * @param int $font_size
 * @return Ceptcha_Abstract 
 */

public function text($font_size)
{
   
    
    $font = 'font4.ttf';
    
    $fontColor = imagecolorallocate($this->_image, '90', '130', '200');
    
    $text = md5(sha1(time()));

    $niz ='';
      
    
    for($o='1';$o<'6';$o++)
    {
    $random = rand('0', '31');
    
   
    
    $finall = $text{$random};
    
    $niz.=$finall;
    
    $separation = ($this->_width/5)-$font_size;
    
    $x = $o*$separation;
    
    
    $y = ($this->_height/2);
    
    imagefttext($this->_image, $font_size, '0', $x, $y, $fontColor, $font, $finall);
    }
    
    $_SESSION['niz']=$niz;
   
    
    return $this;
}

/**
 * Display image 
 * 
 */
public function drow()
{
      header('Content-Type: image/png');
      
      imagepng($this->_image);
        
      imagedestroy($this->_image);
}









}

?>
