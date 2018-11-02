<?php
namespace ELT\DynamicLink;

class LinkGenerate
{
    public function buildOne(String $language, String $link = '', String $title)
    {
        $languageTitleCase = ucfirst($language);
        $languageLowerCase = strtolower($language);

        return [
            'label' => 'Thai Typing',
            'link' => 'http://www.easythaityping.com',
            'titile' => 'Type in English, get in Thai for FREE.'
        ];
    }
}
