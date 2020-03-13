<?php
/**
 * This file is part of the arcticfalcon/emv-qr-cps library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Juan Falcón <jcfalcon@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace bocilanakayam\EmvQr;

use bocilanakayam\EmvQr\DataObjects\CountryCode;
use bocilanakayam\EmvQr\DataObjects\GloballyUniqueIdentifier;
use bocilanakayam\EmvQr\DataObjects\MerchantCategoryCode;
use bocilanakayam\EmvQr\DataObjects\MerchantCity;
use bocilanakayam\EmvQr\DataObjects\MerchantName;
use bocilanakayam\EmvQr\DataObjects\PayloadFormatIndicator;
use bocilanakayam\EmvQr\DataObjects\PointOfInitializationMethod;
use bocilanakayam\EmvQr\DataObjects\TransactionCurrency;
use bocilanakayam\EmvQr\Templates\MerchantAccountInformation;

class EmvQr
{
    public static function basicStaticMerchantPayload(
        string $merchantAccountInformationId,
        string $merchantAccountInformationValue,
        string $merchantCategoryCode,
        string $transactionCurrency,
        string $countryCode,
        string $merchantName,
        string $merchantCity
    ): MerchantPayload {
        $merchantAccountInformation = new MerchantAccountInformation(
            $merchantAccountInformationId,
            new GloballyUniqueIdentifier($merchantAccountInformationValue)
        );

        $merchantPayload = new MerchantPayload(
            new PayloadFormatIndicator(),
            new PointOfInitializationMethod(PointOfInitializationMethod::STATIC),
            $merchantAccountInformation,
            new MerchantCategoryCode($merchantCategoryCode),
            new TransactionCurrency($transactionCurrency),
            null,
            null,
            null,
            null,
            new CountryCode($countryCode),
            new MerchantName($merchantName),
            new MerchantCity($merchantCity),
            null
        );

        return $merchantPayload;
    }
}
