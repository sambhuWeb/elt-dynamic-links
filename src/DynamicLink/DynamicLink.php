<?php
namespace ELT\DynamicLink;

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
     *
     * @throws \ELT\DynamicLink\Exception\InvalidArgumentException if input is not a string
     * @throws \ELT\DynamicLink\Exception\DomainException if input does not look like an alpha3 key
     * @throws \ELT\DynamicLink\Exception\OutOfBoundsException if input does not look like an alpha3 key
     *
     * @return array
     */
    public function getLink(String $countryCode, $inputData): array
    {
        Guards::guardAgainstInvalidAlpha2($countryCode);

        if (is_string($inputData)) {
            $class = 'ELT\\DynamicLink\\' . $inputData;
            return (new $class())->getLink(strtoupper($countryCode));
        }

        if (is_array($inputData) && !empty($inputData)) {
            return $inputData[$countryCode]; 
        }
    }
}
