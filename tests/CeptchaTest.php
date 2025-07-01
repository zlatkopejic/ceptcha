<?php
require_once '../ceptcha/Ceptcha.php';

use PHPUnit\Framework\TestCase;

class CeptchaTest extends TestCase
{
    public function testSizeAndImages()
    {
        $captcha = new Ceptcha();
        $captcha->size(100, 40);
        $captcha->images();

        $this->assertInstanceOf(Ceptcha::class, $captcha);

        $ref = new ReflectionClass($captcha);
        $widthProperty = $ref->getProperty('_width');
        $widthProperty->setAccessible(true);
        $heightProperty = $ref->getProperty('_height');
        $heightProperty->setAccessible(true);

        $this->assertEquals(100, $widthProperty->getValue($captcha));
        $this->assertEquals(40, $heightProperty->getValue($captcha));
    }
}
