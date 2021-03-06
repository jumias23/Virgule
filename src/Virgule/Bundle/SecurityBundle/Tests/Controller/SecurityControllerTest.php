<?php

namespace Virgule\Bundle\SecurityBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase {

    public function testCompleteScenario() {
        // Create a new client to browse the application
        $client = static::createClient();
        $client->followRedirects();
        
        // Check default URL
        $crawler = $client->request('GET', '/');
        //$this->assertEquals(302, $client->getResponse()->getStatusCode());
        //$this->assertTrue($client->getResponse()->isRedirection('/login'));
        
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Test wrong credentials
        $crawler = $this->fillAndSubmitLoginForm($client, $crawler, 'Toto', 'Toto');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->logResponse($client);
        $this->assertTrue($crawler->filter('html:contains("identification a échoué")')->count() > 0);
        
        $crawler = $this->fillAndSubmitLoginForm($client, $crawler, 'prof1', 'password');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
    private function fillAndSubmitLoginForm($client, $crawler, $username, $password)  {
        // Fill in the form and submit it
        $form = $crawler->selectButton('Connexion')->form(array(
            '_username' => $username,
            '_password' => $password
            ));

        $crawler = $client->submit($form);
        return $crawler;
    }
}
?>