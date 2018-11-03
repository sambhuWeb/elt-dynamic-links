<?php
namespace ELT\DynamicLink;

use ELT\DynamicLink\CountriesGroup;

class TranslationLink extends Link
{
    public function links(): array
    {
        $links = [
            'NP' => [
                'label' => 'Nepali Translation',
                'link' => 'http://www.easynepalityping.com/english-to-nepali-translation',
                'title' => 'Translate english word, sentence & phrase into Nepali for FREE.'
            ],
            'IN' => [
                'label' => 'Hindi Translation',
                'link' => 'http://www.easyhindityping.com/english-to-hindi-translation',
                'title' => 'Translate english word, sentence & phrase into Hindi for FREE.'
            ],
            'PK' => [
                'label' => 'Urdu Translation',
                'link' => 'http://www.easyhindityping.com/english-to-urdu-translation',
                'title' => 'Translate english word, sentence & phrase into Urdu for FREE.'
            ],
            'BD' => [
                'label' => 'Bengali Translation',
                'link' => 'http://www.easyhindityping.com/english-to-bengali-translation',
                'title' => 'Translate english word, sentence & phrase into Bangla for FREE.'
            ],
            'LK' => [
                'label' => 'Sinhala Translation',
                'link' => 'http://www.easyhindityping.com/english-to-sinhala-translation',
                'title' => 'Translate english word, sentence & phrase into Sinhala for FREE.'
            ],
            'MM' => [
                'label' => 'Burmese Translation',
                'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                'title' => 'Translate english word, sentence & phrase into Burmese for FREE.'
            ],
            'TH' => [
                'label' => 'Thai Translation',
                'link' => 'http://www.easythaityping.com',
                'title' => 'Translate english word, sentence & phrase into Thai for FREE.'
            ],
            'LA' => [
                'label' => 'Lao Translation',
                'link' => 'http://www.easyhindityping.com/english-to-lao-translation',
                'title' => 'Translate english word, sentence & phrase into Lao for FREE.'
            ],
            'KH' => [
                'label' => 'Khmer Translation',
                'link' => 'http://www.easyhindityping.com/english-to-khmer-translation',
                'title' => 'Translate english word, sentence & phrase into Khmer for FREE.'
            ],
            'VN' => [
                'label' => 'Vietnamese Translation',
                'link' => 'http://www.easyhindityping.com/english-to-vietnamese-translation',
                'title' => 'Translate english word, sentence & phrase into Vietnamese for FREE.'
            ],
            'PH' => [
                'label' => 'Filipino Translation',
                'link' => 'http://www.easyhindityping.com/english-to-filipino-translation',
                'title' => 'Translate english word, sentence & phrase into Filipino for FREE.'
            ],
            'ID' => [
                'label' => 'Indonesian Translation',
                'link' => 'http://www.easyhindityping.com/english-to-indonesian-translation',
                'title' => 'Translate english word, sentence & phrase into Indonesian for FREE.'
            ],
            'BN' => [ //Brunei
                'label' => 'Malay Translation',
                'link' => 'http://www.easyhindityping.com/english-to-malay-translation',
                'title' => 'Translate english word, sentence & phrase into Malay for FREE.'
            ],
            'MY' => [
                'label' => 'Malay Translation',
                'link' => 'http://www.easyhindityping.com/english-to-malay-translation',
                'title' => 'Translate english word, sentence & phrase into Malay for FREE.'
            ],
        ];

        $arabicGroupLinks = $this->getGroupLink(
            CountriesGroup::arabicSpeakingCountriesCode(),
            [
                'label' => 'Arabic Translation',
                'link' => 'http://www.easyhindityping.com/english-to-arabic-translation',
                'title' => 'Translate english word, sentence & phrase into Arabic for FREE.'
            ]
        );

        return array_merge($arabicGroupLinks, $links);
    }
}
