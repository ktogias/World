<?php 
class HelloTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        require 'src/world.php';
    }

    protected function _after()
    {
    }

    // tests
    public function testShouldReturnWorld()
    {
        $this->expectOutputRegex("/^.*world.*$/i");
    }
    
    public function testShouldReturnJsonEncodedObject(){
        $this->expectOutputRegex("/^{\".*\"}$/");
    }
    
    public function testShouldSetApplicationJsonContentTypeHeader(){
       $headers=xdebug_get_headers();
       $this->assertContains('Content-Type: application/json', $headers);
    }
    
}