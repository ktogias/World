<?php 
use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PhpPact\Consumer\Matcher\Matcher;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use CodeceptionPactPhp\Standalone\ProviderVerifier\ExtendedVerifier;
use PhpPact\Broker\Service\BrokerHttpClient;
use PhpPact\Http\GuzzleClient;

class WorldCest
{
    protected  $matcher;
    protected  $config;
    protected  $builder;
    protected  $verifier;
    protected  $veriferConfig;
    protected  $brokerHttpClient;
    
    public function _before(AcceptanceTester $I)
    {
        $this->config = new MockServerEnvConfig();
        $this->builder = new InteractionBuilder($this->config);

        $this->matcher = new Matcher();
        
        
        $this->veriferConfig = new PhpPact\Standalone\ProviderVerifier\Model\VerifierConfig();
        $this->veriferConfig->setBrokerUri(new \GuzzleHttp\Psr7\Uri('https://ktogias.pactflow.io'));
        $this->veriferConfig->setProviderName('WorldService');
        $this->veriferConfig->setProviderBaseUrl(new \GuzzleHttp\Psr7\Uri('http://localhost'));

        $this->brokerHttpClient = new BrokerHttpClient(new GuzzleClient(), $this->veriferConfig->getBrokerUri(), [
            'Authorization' => 'Bearer <token>',     
        ]);
   
        $this->verifier = new ExtendedVerifier($this->veriferConfig, null, null, $this->brokerHttpClient);
       
    }

   
    public function tryToPactVerifyAll(){
        $this->verifier->verifyAll();
    }
}
