<?php

namespace Modules\ZatcaIntegrationKsa\Utils;

use App\Utils\Util;

class ZatcaUtil extends Util
{
    /**
     * @param string $itemName The original item name
     * @return string The cleaned item name
     */
    public function cleanItemName($itemName)
    {
        if (empty($itemName)) {
            return '';
        }

        // Replace all non-alphanumeric and non-space characters with a space
        // \p{L} = all Unicode letters (Arabic, English, etc.)
        // \p{N} = all Unicode numbers
        // _ = underscore (included in \w)
        // \s = whitespace
        $cleanedName = preg_replace('/[^\p{L}\p{N}_\s]+/u', ' ', $itemName);
        
        // Replace multiple spaces with a single space and trim
        $cleanedName = preg_replace('/\s+/', ' ', trim($cleanedName));
        
        // Ensure the name is not empty after cleaning
        if (empty($cleanedName)) {
            $cleanedName = 'Item';
        }        
        
        return $cleanedName;
    }
}

