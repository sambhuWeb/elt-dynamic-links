<?php
namespace ELT\DynamicLink;

use ELT\DynamicLink\Lookup\DomainLinks;

class TypingLink extends Link
{
    public function links()
    {
        $links = [
            'NP' => [
                'label' => 'Nepali Typing',
                'link' => DomainLinks::$links['ent'],
                'title' => 'Type in English, get in Nepali for FREE.'
            ],
            'IN' => [
                'label' => 'Hindi Typing',
                'link' => DomainLinks::$links['eht'],
                'title' => 'Type in English, get in Hindi for FREE.'
            ],
            'PK' => [
                'label' => 'Urdu Typing',
                'link' => DomainLinks::$links['eut'],
                'title' => 'Type in English, get in Urdu for FREE.'
            ],
            'BD' => [
                'label' => 'Bengali Typing',
                'link' => DomainLinks::$links['ebt'],
                'title' => 'Type in English, get in Bangla for FREE.'
            ],
            'LK' => [
                'label' => 'Sinhala Typing',
                'link' => DomainLinks::$links['est'],
                'title' => 'Type in English, get in Sinhala for FREE.'
            ],
            'TH' => [
                'label' => 'Thai Typing',
                'link' => DomainLinks::$links['etht'],
                'title' => 'Type in English, get in Thai for FREE.'
            ],
            'IR' => [//Iran
                'label' => 'Farsi Typing',
                'link' => DomainLinks::$links['ept'],
                'title' => 'Type in English, get in Farsi for FREE.'
            ],
            'ET' => [//Ethopia
                'label' => 'Amharic Typing',
                'link' => DomainLinks::$links['ept'],
                'title' => 'Type in English, get in Amharic for FREE.'
            ]
            
        ];

        $arabicGroupLinks = $this->getGroupLink(
            CountriesGroup::arabicSpeakingCountriesCode(),
            [
                'label' => 'Arabic Typing',
                'link' => DomainLinks::$links['eat'],
                'title' => 'Type in English, get in Arabic for FREE.'
            ]
        );

        return array_merge($arabicGroupLinks, $links);
    }
}
