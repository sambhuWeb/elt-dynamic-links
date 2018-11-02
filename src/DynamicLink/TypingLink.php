<?php
namespace ELT\DynamicLink;

class TypingLink extends Link
{
    public function links(): array
    {
        return [
            'TH' => [
                'label' => 'Thai Typing',
                'link' => 'http://www.easythaityping.com',
                'title' => 'Type in English, get in Thai for FREE.'
            ],
            'IN' => [
                'label' => 'Hindi Typing',
                'link' => 'http://www.easyhindityping.com',
                'title' => 'Type in English, get in Hindi for FREE.'
            ]
        ];
    }
}
