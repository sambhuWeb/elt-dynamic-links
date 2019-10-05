<?php
namespace ELT\AssetLink;

class AssetLink
{
    public function generate(
        array $spaceNames,
        string $spacePath,
        string $additionalUrlParts = '',
        string $version = ''
    ): string {
        if (empty($spaceNames)) {
            return (new LocalLinkGenerator)->linkGenerate($spaceNames, $spacePath, $additionalUrlParts, $version);
        }

        foreach ($spaceNames as $spaceName) {
            if ($spaceName === 'cloudinary' && USE_CLOUDINARY_CDN === true) {
                return (new CloudinaryLinkGenerator)->linkGenerate($spaceNames, $spacePath, $additionalUrlParts, $version);
            }

            if ($spaceName === 'digital_ocean_space' && USE_DIGITAL_OCEAN_CDN === true) {
                return (new DigitalOceanSpaceLinkGenerator)->linkGenerate($spaceNames, $spacePath, $additionalUrlParts, $version);
            }

            if ($spaceName === 'local') {
                return (new LocalLinkGenerator)->linkGenerate($spaceNames, $spacePath, $additionalUrlParts, $version);
            }
        }

        return (new LocalLinkGenerator)->linkGenerate($spaceNames, $spacePath, $additionalUrlParts, $version);
    }
}
