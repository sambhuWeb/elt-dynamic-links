<?php

namespace ELT\DynamicLink;

class TranslationLink extends Link
{
    public function __construct()
    {
        $this->links = [
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
}
