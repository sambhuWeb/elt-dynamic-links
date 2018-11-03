<?php
namespace ELT\DynamicLink;

class TypingLink extends Link
{
    public function links(): array
    {
        $links = [
            'NP' => [
                'label' => 'Nepali Typing',
                'link' => 'http://www.easynepalityping.com',
                'title' => 'Type in English, get in Nepali for FREE.'
            ],
            'IN' => [
                'label' => 'Hindi Typing',
                'link' => 'http://www.easyhindityping.com',
                'title' => 'Type in English, get in Hindi for FREE.'
            ],
            'PK' => [
                'label' => 'Urdu Typing',
                'link' => 'http://www.easyurdutyping.com',
                'title' => 'Type in English, get in Urdu for FREE.'
            ],
            'BD' => [
                'label' => 'Bengali Typing',
                'link' => 'http://www.easybengalityping.com',
                'title' => 'Type in English, get in Bangla for FREE.'
            ],
            'LK' => [
                'label' => 'Sinhala Typing',
                'link' => 'http://www.easysinhalatyping.com',
                'title' => 'Type in English, get in Sinhala for FREE.'
            ],
            'TH' => [
                'label' => 'Thai Typing',
                'link' => 'http://www.easythaityping.com',
                'title' => 'Type in English, get in Thai for FREE.'
            ],
            'IR' => [//Iran
                'label' => 'Farsi Typing',
                'link' => 'http://www.easypersiantyping.com',
                'title' => 'Type in English, get in Farsi for FREE.'
            ]
            
        ];

        $arabicGroupLinks = $this->getGroupLink(
            CountriesGroup::arabicSpeakingCountriesCode(),
            [
                'label' => 'Arabic Typing',
                'link' => 'http://www.easyarabictyping.com',
                'title' => 'Type in English, get in Arabic for FREE.'
            ]
        );

        return array_merge($arabicGroupLinks, $links);
    }
}
