<?php

function getBreaksTime()
{
	$breaksTime = [['begin' => date("2021-05-04 01:24:32"),'end' => date("2021-05-04 03:30:00")], ['begin' => date("2021-05-07 01:24:32"),'end' => date("2021-05-11 03:30:00")]];

	return $breaksTime;
}

function isTimeToBreak($breaksTime)
{
	$now = date("Y-m-d H:i:s");

	$isBreak = false;

	foreach($breaksTime as $break){
		if($break['begin'] <= $now && $now <= $break['end'])
		{
			$isBreak = true;
		}
	}

	return $isBreak;
}