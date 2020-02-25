<?php
/**
 * Created by PhpStorm.
 * User: baofan
 * Date: 2020/1/2
 * Time: 11:01
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LuckyControllerTest extends WebTestCase
{
    public function testGenerateUniqueId()
    {
        $client = static::createClient();

        $client->request('GET', '/gid.json');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
}