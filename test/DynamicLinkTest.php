<?php
namespace test;

use PHPUnit\Framework\TestCase;
use ELT\DynamicLink\DynamicLink;
use ELT\DynamicLink\Exception\DomainException;
use ELT\DynamicLink\Exception\OutOfBoundsException;

class DynamicLinkTest extends TestCase
{
    public function setUp()
    {
        $this->dynamicLink = new DynamicLink();
    }

    public function tearDown()
    {
        $this->dynamicLink = null;
    }

    /**
     * @test
     * @dataProvider dynamicLinkClassProvider
     */
    public function link_class_returns_country_specific_link(
        String $countryCode,
        String $linkClass,
        array $expectedLink
    ) {
        $actualLink = $this->dynamicLink->getLink(
            $countryCode,
            $linkClass
        );

        $this->assertEquals(
            $expectedLink,
            $actualLink
        );
    }

    /**
     * @test
     * @dataProvider externalInputLinkProvider
     */
    public function injected_link_array_returns_country_specific_link(
        $countryCode,
        $inputLinks,
        $expectedLink
    ) {
        $actualLink = $this->dynamicLink->getLink(
            $countryCode,
            $inputLinks
        );

        $this->assertEquals(
            $expectedLink,
            $actualLink
        );
    }

    /**
     * @test
     * @dataProvider invalidTwoDigitCountryCodeProvider
     */
    public function invalid_two_digit_country_code_throws_various_exception(
        $twoDigitCountryCode,
        string $expectedException
    ) {
        $this->expectException($expectedException);

        $this->dynamicLink->getLink($twoDigitCountryCode, TranslationLink::class);
    }

    /**
     * Invalid two digit count code (Alpha2) provider.
     * @return array
     */
    public function invalidTwoDigitCountryCodeProvider()
    {
        return [
            ['A', DomainException::class],
            ['ABC', DomainException::class],
            [1, DomainException::class],
            [12, DomainException::class],
            ['AB', OutOfBoundsException::class],
        ];
    }

    public function dynamicLinkClassProvider()
    {
        return [
            [
                'EG',
                \TranslationLink::class,
                [
                    'label' => 'Arabic Translation',
                    'link' => 'http://www.easyhindityping.com/english-to-arabic-translation',
                    'title' => 'Translate english word, sentence & phrase into Arabic for FREE.'
                ],
            ],
            [
                'TH',
                \TranslationLink::class,
                [
                    'label' => 'Thai Translation',
                    'link' => 'http://www.easyhindityping.com/english-to-thai-translation',
                    'title' => 'Translate english word, sentence & phrase into Thai for FREE.'
                ],
            ],
            [
                'mm',
                \TranslationLink::class,
                [
                    'label' => 'Burmese Translation',
                    'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                    'title' => 'Translate english word, sentence & phrase into Burmese for FREE.'
                ],
            ],
            [
                'AE', //UAE
                \TypingLink::class,
                [
                    'label' => 'Arabic Typing',
                    'link' => 'http://www.easyarabictyping.com',
                    'title' => 'Type in English, get in Arabic for FREE.'
                ],
            ],
            [
                'th',
                \TypingLink::class,
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'title' => 'Type in English, get in Thai for FREE.'
                ],
            ],
            [
                'in',
                \TypingLink::class,
                [
                    'label' => 'Hindi Typing',
                    'link' => 'http://www.easyhindityping.com',
                    'title' => 'Type in English, get in Hindi for FREE.'
                ],
            ],
            [
                'ir',//Iran
                \TypingLink::class,
                [
                    'label' => 'Farsi Typing',
                    'link' => 'http://www.easypersiantyping.com',
                    'title' => 'Type in English, get in Farsi for FREE.'
                ]
            ]
        ];
    }

    public function externalInputLinkProvider()
    {
        return [
            [
                'th',
                [
                    'th' => [
                        'label' => 'Thai Translation',
                        'link' => 'http://www.easythaityping.com',
                        'title' => 'Translate english word, sentence & phrase into Thai for free [mock data]'
                    ],
                    'my' => [
                        'label' => 'Burmese Translation',
                        'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                        'title' => 'Translate english word, sentence & phrase into Burmese for free [mock data]'
                    ],
                    'lo' => [
                        'label' => 'Lao Translation',
                        'link' => 'http://www.easyhindityping.com/english-to-lao-translation',
                        'title' => 'Translate english word, sentence & phrase into Lao for free [mock data]'
                    ],
                ],
                [
                    'label' => 'Thai Translation',
                    'link' => 'http://www.easythaityping.com',
                    'title' => 'Translate english word, sentence & phrase into Thai for free [mock data]'
                ],
            ],
            [
                'th',
                [
                    'th' => [
                        'label' => 'Thai Typing',
                        'link' => 'http://www.easythaityping.com',
                        'title' => 'Type in English, get in Thai for FREE. [mock data]'
                    ],
                    'hi' => [
                        'label' => 'Hindi Typing',
                        'link' => 'http://www.easyhindityping.com',
                        'title' => 'Type in English, get in Hindi for FREE. [mock data]'
                    ]
                ],
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'title' => 'Type in English, get in Thai for FREE. [mock data]'
                ],
            ]
        ];
    }
}
