<?php

namespace test;

use PHPUnit\Framework\TestCase;
use ELT\DynamicLink\DynamicLink;
use ELT\DynamicLink\LinkInterface;
use ELT\DynamicLink\TranslationLink;
use ELT\DynamicLink\TypingLink;

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
        $this->mockTypingLinks = [
            'th' => [
                'label' => 'Thai Typing',
                'link' => 'http://www.easythaityping.com',
                'titile' => 'Type in English, get in Thai for FREE.'
            ],
            'hi' => [
                'label' => 'Hindi Typing',
                'link' => 'http://www.easyhindityping.com',
                'titile' => 'Type in English, get in Hindi for FREE.'
            ]
        ];
    }

    public function tearDown()
    {
        $this->dynamicLink = null;
        $this->mockTranslationLinks = null;
        $this->mockTypingLinks = null;
    }

    /**
     * @dataProvider dynamicLinkProvider
     */
    public function testDynamicTranslationLink(
        String $countryCode,
        String $linkClass,
        array $inputData,
        array $expectedLink
    ) {
        $actualLink = $this->dynamicLink->getLink(
            $countryCode,
            $linkClass,
            $inputData
        );

        $this->assertEquals(
            $expectedLink,
            $actualLink
        );
    }

    public function dynamicLinkProvider()
    {
        return [
            [
                'th',
                'TranslationLink',
                [
                    'th' => [
                        'label' => 'Thai Translation',
                        'link' => 'http://www.easythaityping.com',
                        'titile' => 'Translate english word, sentence & phrase into Thai for free [mock data]'
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
                ],
                [
                    'label' => 'Thai Translation',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Translate english word, sentence & phrase into Thai for free [mock data]'
                ],
            ],
            [
                'th',
                'TypingLink',
                [
                    'th' => [
                        'label' => 'Thai Typing',
                        'link' => 'http://www.easythaityping.com',
                        'titile' => 'Type in English, get in Thai for FREE. [mock data]'
                    ],
                    'hi' => [
                        'label' => 'Hindi Typing',
                        'link' => 'http://www.easyhindityping.com',
                        'titile' => 'Type in English, get in Hindi for FREE.'
                    ]
                ],
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Type in English, get in Thai for FREE. [mock data]'
                ],
            ],
            [
                'th',
                'TypingLink',
                [], //use default data
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Type in English, get in Thai for FREE.'
                ],
            ]
        ];
    }
}
