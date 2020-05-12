<?php

function format_phone_number($number) {
	return preg_replace('/[^0-9]/', '', $number);
}
