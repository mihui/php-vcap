<?php
declare(strict_types=1);

namespace ENV;

use PHPUnit\Framework\TestCase;

final class VCAPTest extends TestCase {

    /**
     * @covers \ENV\VCAP
     */
    public function testCanBeCreatedFromInstance() {

        $this->assertInstanceOf(
            VCAP::class,
            VCAP::getInstance()
        );
    }

    /**
     * @covers \ENV\VCAP
     */
    public function testCanBeUsed() {

        $credentails = VCAP::getInstance()->getServiceCredential('tone_analyzer');

        $this->assertEquals(
            'your_username_tone_analyzer', 
            $credentails['username']
        );

        $variables = VCAP::getInstance()->getServiceVariables('conversation', 'label');
        $this->assertEquals(
            'conversation', 
            $variables[0]
        );

        $this->assertEquals(
            TRUE, 
            VCAP::getInstance()->isLocal()
        );

        $nullVar = VCAP::getInstance()->getServiceVariable('what', 'nothing');
        $this->assertNull($nullVar);

        $payload = VCAP::getInstance()->getVCAP();

        $this->assertArrayHasKey('cloudantNoSQLDB', $payload);
    }
}
