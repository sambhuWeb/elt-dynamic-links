<?php

namespace ELT\DynamicLink;

use ELT\DynamicLink\Guards;
use League\ISO3166\ISO3166 as ISOCodes;

class DynamicLink
{
    /**
     * Get the link of the country code provided if it exist on either
     * class or input data array.
     *
     * @param $countryCode String       Two digit country code
     * @param $inputData string|array   If string class name that hold an array of link
     *                                  for e.g. 'TranslationLink', 'TypingLink'
     *                                  If array, it must be the array of links with key
     *                                  as two digit country code.
     */
    public function getLink(String $countryCode, $inputData): array
    {
        Guards::guardAgainstInvalidAlpha2($countryCode);

        if (is_string($inputData)) {
            $class = 'ELT\\DynamicLink\\' . $inputData;
            return (new $class())->getLink($countryCode);
        }

        if (is_array($inputData) && !empty($inputData)) {
            return $inputData[$countryCode]; 
        }
    }
}
