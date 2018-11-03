<?php
namespace ELT\DynamicLink;

use ELT\DynamicLink\Lookup\DomainLinks;

class TranslationLink extends Link
{
    public function links(): array
    {
        $links = [
            'NP' => [
                'label' => 'Nepali Translation',
                'link' => DomainLinks::$links['en-to-ne-translation'],
                'title' => 'Translate english word, sentence & phrase into Nepali for FREE.'
            ],
            'IN' => [
                'label' => 'Hindi Translation',
                'link' => DomainLinks::$links['en-to-hi-translation'],
                'title' => 'Translate english word, sentence & phrase into Hindi for FREE.'
            ],
            'PK' => [
                'label' => 'Urdu Translation',
                'link' => DomainLinks::$links['en-to-ur-translation'],
                'title' => 'Translate english word, sentence & phrase into Urdu for FREE.'
            ],
            'BD' => [
                'label' => 'Bengali Translation',
                'link' => DomainLinks::$links['en-to-bn-translation'],
                'title' => 'Translate english word, sentence & phrase into Bangla for FREE.'
            ],
            'LK' => [
                'label' => 'Sinhala Translation',
                'link' => DomainLinks::$links['en-to-si-translation'],
                'title' => 'Translate english word, sentence & phrase into Sinhala for FREE.'
            ],
            'MM' => [
                'label' => 'Burmese Translation',
                'link' => DomainLinks::$links['en-to-my-translation'],
                'title' => 'Translate english word, sentence & phrase into Burmese for FREE.'
            ],
            'TH' => [
                'label' => 'Thai Translation',
                'link' => DomainLinks::$links['en-to-th-translation'],
                'title' => 'Translate english word, sentence & phrase into Thai for FREE.'
            ],
            'LA' => [
                'label' => 'Lao Translation',
                'link' => DomainLinks::$links['en-to-lo-translation'],
                'title' => 'Translate english word, sentence & phrase into Lao for FREE.'
            ],
            'KH' => [
                'label' => 'Khmer Translation',
                'link' => DomainLinks::$links['en-to-km-translation'],
                'title' => 'Translate english word, sentence & phrase into Khmer for FREE.'
            ],
            'VN' => [
                'label' => 'Vietnamese Translation',
                'link' => DomainLinks::$links['en-to-vi-translation'],
                'title' => 'Translate english word, sentence & phrase into Vietnamese for FREE.'
            ],
            'PH' => [
                'label' => 'Filipino Translation',
                'link' => DomainLinks::$links['en-to-tl-translation'],
                'title' => 'Translate english word, sentence & phrase into Filipino for FREE.'
            ],
            'ID' => [
                'label' => 'Indonesian Translation',
                'link' => DomainLinks::$links['en-to-id-translation'],
                'title' => 'Translate english word, sentence & phrase into Indonesian for FREE.'
            ],
            'BN' => [ //Brunei
                'label' => 'Malay Translation',
                'link' => DomainLinks::$links['en-to-ms-translation'],
                'title' => 'Translate english word, sentence & phrase into Malay for FREE.'
            ],
            'MY' => [
                'label' => 'Malay Translation',
                'link' => DomainLinks::$links['en-to-ms-translation'],
                'title' => 'Translate english word, sentence & phrase into Malay for FREE.'
            ],
            'IR' => [
                'label' => 'Farsi Translation',
                'link' => DomainLinks::$links['en-to-fa-translation'],
                'title' => 'Translate english word, sentence & phrase into Persian for FREE.'
            ],
            'ET' => [
                'label' => 'Amharic Translation',
                'link' => DomainLinks::$links['en-to-am-translation'],
                'title' => 'Translate english word, sentence & phrase into Amharic for FREE.'
            ],
        ];

        $arabicGroupLinks = $this->getGroupLink(
            CountriesGroup::arabicSpeakingCountriesCode(),
            [
                'label' => 'Arabic Translation',
                'link' => DomainLinks::$links['en-to-ar-translation'],
                'title' => 'Translate english word, sentence & phrase into Arabic for FREE.'
            ]
        );

        return array_merge($arabicGroupLinks, $links);
    }
}
