<?php

if ($argc > 1) {
	$min = $argv[1];
	while (!is_numeric($min) and $min !== '') {
		fwrite(STDOUT, PHP_EOL . 'MIN VALUE ERROR -- NEED NUMBER' . PHP_EOL);
		fwrite(STDOUT, 'PLEASE PROVIDE OR LEAVE BLANK TO USE DEFAULT' . PHP_EOL);
		$min = trim(fgets(STDIN));
	}
	if ($min === '') {
		$min = 1;
	} else {
		if ((int) $min != (double) $min) {
			fwrite(STDOUT, 'MIN VALUE FLOAT ACCEPTED -- ROUNDING DOWN' . PHP_EOL);
		}
		$min = (int) $min;
	}
} else {
	$min = 1;
}

if ($argc > 2) {
	$max = $argv[2];
	while (!is_numeric($max) and $max !== '') {
		fwrite(STDOUT, PHP_EOL . 'MAX VALUE ERROR -- NEED NUMBER' . PHP_EOL);
		fwrite(STDOUT, 'PLEASE PROVIDE OR LEAVE BLANK TO USE DEFAULT' . PHP_EOL);
		$max = trim(fgets(STDIN));
	}
	if ($max === '') {
		$max = $min + 99;
	} else {
		if ((int) $max != (double) $max) {
			fwrite(STDOUT, 'MAX VALUE FLOAT ACCEPTED -- ROUNDING DOWN' . PHP_EOL);
		}
		$max = (int) $max;
	}
} else {
	$max = 100;
}

fwrite(STDOUT, PHP_EOL . "I'M THINKING..." . PHP_EOL);

$number = mt_rand($min, $max);
$maxGuesses = (int) log(($max - $min + 1), 2);

fwrite(STDOUT, 'OK!' . PHP_EOL . PHP_EOL);
fwrite(STDOUT, "A NUMBER BETWEEN $min AND $max" . PHP_EOL);
fwrite(STDOUT, "$maxGuesses GUESSES" . PHP_EOL . PHP_EOL);

for ($guessesTaken = 0; $guessesTaken < $maxGuesses;) {
	fwrite(STDOUT, 'GUESS?' . PHP_EOL);

	$response = trim(fgets(STDIN));

	if (!is_numeric($response)) {
		fwrite(STDOUT, PHP_EOL . 'NUMBERS ONLY' . PHP_EOL);
	} else {
		if ((int) $response != (double) $response) {
			fwrite(STDOUT, PHP_EOL . 'FLOAT ACCEPTED -- ROUNDING DOWN');
			$response = (int) $response;
		}
		if ($response == $number) {
			fwrite(STDOUT, PHP_EOL . 'GOOD GUESS!' . PHP_EOL);
			break;
		} elseif ($response < $number and $guessesTaken < $maxGuesses) {
			fwrite(STDOUT, PHP_EOL . 'HIGHER' . PHP_EOL);
		} elseif ($response > $number and $guessesTaken < $maxGuesses) {
			fwrite(STDOUT, PHP_EOL . 'LOWER' . PHP_EOL);
		}
		$guessesTaken++;
	}
}

if ($guessesTaken < $maxGuesses) {
	$guessesTaken++;
	fwrite(STDOUT, "TOOK YOU $guessesTaken GUESSES" . PHP_EOL);
} else {
	fwrite(STDOUT, 'SORRY. NO MORE GUESSES' . PHP_EOL);
	fwrite(STDOUT, "NUMBER WAS $number" . PHP_EOL);
}

exit(0);