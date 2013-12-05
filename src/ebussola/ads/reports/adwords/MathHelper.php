<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/12/13
 * Time: 16:56
 */

namespace ebussola\ads\reports\adwords;


class MathHelper extends \ebussola\ads\reports\MathHelper {

    /**
     * @param int $conversion
     * @param int $clicks
     *
     * @return float
     */
    static public function calcConvRate($conversion, $clicks) {
        if ($conversion > 0 && $clicks > 0) {
            $div = $conversion / $clicks;
            return $div * 100;
        } else {
            return (float) 0;
        }
    }

    /**
     * @param float $cost
     * @param int $conversion
     *
     * @return float
     */
    static public function calcCostConv($cost, $conversion) {
        if ($cost > 0 && $conversion > 0) {
            return $cost / $conversion;
        } else {
            return (float) 0;
        }
    }

}