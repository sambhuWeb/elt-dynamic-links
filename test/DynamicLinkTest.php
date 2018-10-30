<?php

namespace test;

use PHPUnit\Framework\TestCase;
use ELT\DynamicLink\DynamicLink;

class DynamicLinkTest extends TestCase
{
    public function setUp()
    {
        $this->dynamicLink = new DynamicLink();
        $this->mockTranslationLinks = [
            'th' => [
                'label' => 'Thai Translation',
                'link' => 'http://www.easythaityping.com',
                'titile' => 'Translate english word, sentence & phrase into Thai for free'
            ],
            'my' => [
                'label' => 'Burmese Translation',
                'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                'titile' => 'Translate english word, sentence & phrase into Burmese for free'
            ],
            'lo' => [
                'label' => 'Lao Translation',
                'link' => 'http://www.easyhindityping.com/english-to-lao-translation',
                'titile' => 'Translate english word, sentence & phrase into Lao for free'
            ],
        ];
    }

    public function tearDown()
    {
        $this->dynamicLink = null;
        $this->mockTranslationLinks = null;
    }

    /**
     * @dataProvider dynamicLinkProvider
     */
    public function testCountryCodeSpecificLink($countryCode, $expectedLink)
    {
        $this->assertEquals(
            $expectedLink,
            $this->dynamicLink->getLink(
                $this->mockTranslationLinks,
                $countryCode
            )
        );
    }

    public function dynamicLinkProvider()
    {
        return [
            [
                'th',
                [
                    'label' => 'Thai Translation',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Translate english word, sentence & phrase into Thai for free'
                ],
            
            ],
            [
                'my',
                [
                    'label' => 'Burmese Translation',
                    'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                    'titile' => 'Translate english word, sentence & phrase into Burmese for free'
                ] 
            ]
        ];
    }
}
