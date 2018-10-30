<?php

namespace ELT\DynamicLink;

use ELT\DynamicLink\Link;
use ELT\DynamicLink\LinkInterface;

class TypingLink extends Link
{
    public function __construct()
    {
        $this->links = [
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
}
