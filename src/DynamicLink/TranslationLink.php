<?php

namespace ELT\DynamicLink;

class TranslationLink extends Link
{
    public function links(): array
    {
        return [
            'TH' => [
                'label' => 'Thai Translation',
                'link' => 'http://www.easythaityping.com',
                'titile' => 'Translate english word, sentence & phrase into Thai for FREE.'
            ],
            'MY' => [
                'label' => 'Burmese Translation',
                'link' => 'http://www.easyhindityping.com/english-to-burmese-translation',
                'titile' => 'Translate english word, sentence & phrase into Burmese for FREE.'
            ],
            'LA' => [
                'label' => 'Lao Translation',
                'link' => 'http://www.easyhindityping.com/english-to-lao-translation',
                'titile' => 'Translate english word, sentence & phrase into Lao for FREE.'
            ],
        ];
    }
}
