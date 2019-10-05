# Dynamic Links

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

# 2. Asset Link

Allows accessing cdn (cloudinary, digital ocean space) link and fallback to local if config is turned off 


   Scenario 1:
   
    $_SERVER['HTTP_HOST'] = 'http://easynepalityping.com';
    
   Input:
   
    $this->assetLink->generate(
        ['local'], 'assets/keyboard/bangla/bengali_keyboard.php'
    );
            
   Output:
   
    http://www.easynepalityping.com/public/assets/keyboard/bangla/bengali_keyboard.php
    
   --
   
   Scenario 2:
      
    define('USE_CLOUDINARY_CDN', true);
    define('USE_DIGITAL_OCEAN_CDN', true);
       
   Input:
    
    $spaceNames = ['cloudinary', 'digital_ocean_space'];
      
    $this->assetLink->generate(
        $spaceNames, 'assets/keyboard/bangla/bengali_keyboard.php', '', 'v1569962666/'
    )
               
   Output:
      
    https://res.cloudinary.com/elt/image/upload/v1569962666/assets/keyboard/bangla/bengali_keyboard.php

    
   --
   
   Scenario 3:
      
    define('USE_CLOUDINARY_CDN', false);
    define('USE_DIGITAL_OCEAN_CDN', true);
       
   Input:
    
    $spaceNames = ['cloudinary', 'digital_ocean_space'];
      
    $this->assetLink->generate(
        $spaceNames, 'assets/keyboard/bangla/bengali_keyboard.php', '', 'v1569962666/'
    )
               
   Output:
      
    https://everest-space.ams3.cdn.digitaloceanspaces.com/assets/keyboard/bangla/bengali_keyboard.php


## Availible Dynamin Link Class ##
1. TranslationLink::class or 'TranslationLink'
2. TypingLink::class or 'TypingLink'


## Running Unit Test ##
phpunit --bootstrap vendor/autoload.php test
or if phpunit not installed
vendor/bin/phpunit

PHPUnit Resource: https://phpunit.de/manual/6.5/en/writing-tests-for-phpunit.html
