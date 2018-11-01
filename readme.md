# Usuage #

## Get Translation Link / Typing Link by country ##

`
    use ELT\DynamicLink\DynamicLink;

    $this->dynamicLink = new DynamicLink();
    
    $this->dynamicLink->getLink('th', \TranslationLink::class);
    or 
    $this->dynamicLink->getLink('th', 'TranslationLink');

`

## Get Custom Link ##

`
use ELT\DynamicLink\DynamicLink;

...

$customInput = [
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
    'la' => [
        'label' => 'Lao Translation',
        'link' => 'http://www.easyhindityping.com/english-to-lao-translation',
        'titile' => 'Translate english word, sentence & phrase into Lao for free [mock data]'
    ],
],

$twoDigitCountryCode = 'la';

$this->dynamicLink = new DynamicLink();
$this->dynamicLink->getLink($twoDigitCountryCode, $customInput)

`

## Availible Dynamin Link Class ##
1. TranslationLink::class or 'TranslationLink'
2. TypingLink::class or 'TypingLink'


## Running Unit Test ##
phpunit --bootstrap vendor/autoload.php test
or if phpunit not installed
vendor/bin/phpunit

PHPUnit Resource: https://phpunit.de/manual/6.5/en/writing-tests-for-phpunit.html
