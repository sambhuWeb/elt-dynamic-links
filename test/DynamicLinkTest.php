<?php

namespace test;

use PHPUnit\Framework\TestCase;
use ELT\DynamicLink\DynamicLink;
use ELT\DynamicLink\Exception\DomainException;
use ELT\DynamicLink\Exception\InvalidArgumentException;
use ELT\DynamicLink\Exception\OutOfBoundsException;

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


     //testdox Passing get link with bad input throws various exceptions.

    /**
     * @test
     * @dataProvider invalidTwoDigitCountryCodeProvider
     */
    public function invalid_two_digit_country_code_throws_various_exception(
        $twoDigitCountryCode,
        string $expectedException
    ) {
        $this->expectException($expectedException);

        $this->dynamicLink->getLink($twoDigitCountryCode, 'TranslationLink');
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
        // $invalidNumeric = sprintf('{^Not a valid %s key: .*$}', ISO3166::KEY_ALPHA2);
        // $expectedString = sprintf('{^Expected \$%s to be of type string, got: .*$}', ISO3166::KEY_ALPHA2);
        // $noMatch = sprintf('{^No "%s" key found matching: .*$}', ISO3166::KEY_ALPHA2);

        // return [
        //     ['A', DomainException::class, $invalidNumeric],
        //     ['ABC', DomainException::class, $invalidNumeric],
        //     [1, InvalidArgumentException::class, $expectedString],
        //     [123, InvalidArgumentException::class, $expectedString],
        //     ['AB', OutOfBoundsException::class, $noMatch],
        // ];
    }

    public function dynamicLinkClassProvider()
    {
        return [
            [
                'th',
                'TranslationLink',
                [
                    'label' => 'Thai Translation',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Translate english word, sentence & phrase into Thai for FREE.'
                ],
            ],
            [
                'th',
                'TypingLink',
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Type in English, get in Thai for FREE.'
                ],
            ],
            [
                'th',
                'TypingLink',
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Type in English, get in Thai for FREE.'
                ],
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
                        'titile' => 'Translate english word, sentence & phrase into Thai for free [mock data]'
                    ],
                    'my' => [
                        'label' => 'Burmese Translation',
                        'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                        'titile' => 'Translate english word, sentence & phrase into Burmese for free [mock data]'
                    ],
                    'lo' => [
                        'label' => 'Lao Translation',
                        'link' => 'http://www.easyhindityping.com/english-to-lao-translation',
                        'titile' => 'Translate english word, sentence & phrase into Lao for free [mock data]'
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
                [
                    'th' => [
                        'label' => 'Thai Typing',
                        'link' => 'http://www.easythaityping.com',
                        'titile' => 'Type in English, get in Thai for FREE. [mock data]'
                    ],
                    'hi' => [
                        'label' => 'Hindi Typing',
                        'link' => 'http://www.easyhindityping.com',
                        'titile' => 'Type in English, get in Hindi for FREE. [mock data]'
                    ]
                ],
                [
                    'label' => 'Thai Typing',
                    'link' => 'http://www.easythaityping.com',
                    'titile' => 'Type in English, get in Thai for FREE. [mock data]'
                ],
            ]
        ];
    }
}
