<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TradeStatusType extends Enum
{
    const WaitingPayment = 0;
    const WaitingDispatch = 1;
    const WaitingforEvaluationReceived_Buyer = 2;
    const WaitingforEvaluationReceived_Seller = 3;
    const TradeEnd = 4;
}
