<?php
namespace App;

class Counters
{
    /**
     * format some count data
     *
     * @param int $count
     * @param array $messages
     * @return string
     */
    public static function getDaysCountDescription(int $count)
	{
		if ($count < 0)
            return '';
        
        $messages = [
            'ZERO' => "#COUNT# дней",
            'ONE' => "#COUNT# день",
            'TEN' => "#COUNT# дней",
            'MOD_ONE' => "#COUNT# день",
            'MOD_TWO' => "#COUNT# дня",
            'OTHER' => "#COUNT# дней"
        ];

		$val = ($count < 100 ? $count : $count % 100);
		$dec = $val % 10;

		if ($val == 0)
		{
			$messageId = 'ZERO';
		}
		elseif ($val == 1)
		{
			$messageId = 'ONE';
		}
		elseif ($val >= 10 && $val <= 20)
		{
			$messageId = 'TEN';
		}
		elseif ($dec == 1)
		{
			$messageId = 'MOD_ONE';
		}
		elseif (2 <= $dec && $dec <= 4)
		{
			$messageId = 'MOD_TWO';
		}
		else
		{
			$messageId = 'OTHER';
		}

		return (isset($messages[$messageId])
			? str_replace('#COUNT#', $count, $messages[$messageId])
			: ''
		);
	}
}
