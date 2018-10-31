<?php

namespace ELT\DynamicLink;

use ELT\DynamicLink\Exception\DomainException;
use ELT\DynamicLink\Exception\InvalidArgumentException;
use ELT\DynamicLink\Exception\OutOfBoundsException;
use League\ISO3166\ISO3166 as ISOCodes;

final class Guards
{
    /**
     * Assert that two digit country code looks like an alpha2 key.
     *
     * @param string $alpha3
     *
     * @throws \ELT\DynamicLink\Exception\InvalidArgumentException if input is not a string
     * @throws \ELT\DynamicLink\Exception\DomainException if input does not look like an alpha3 key
     * @throws \ELT\DynamicLink\Exception\OutOfBoundsException if input does not look like an alpha3 key
     */
    public static function guardAgainstInvalidAlpha2($twoDigitCountryCode)
    {
        try {
            (new ISOCodes)->alpha2($twoDigitCountryCode);
        } catch(\League\ISO3166\Exception\InvalidArgumentException $ae) {
            throw new InvalidArgumentException(
                sprintf(
                    'Expected $twoDigitCountryCode to be of type string, got: %s', 
                    gettype($twoDigitCountryCode)
                )
            );
        } catch (\League\ISO3166\Exception\DomainException $de) {
            throw new DomainException(
                sprintf('Not a valid two digit country code key: %s', $twoDigitCountryCode)
            );
        } catch (\League\ISO3166\Exception\OutOfBoundsException $oe) {
            throw new OutOfBoundsException(
                sprintf('No key found matching: %s', $twoDigitCountryCode)
            );
        }
    }
}
