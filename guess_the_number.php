<?php

fwrite(STDOUT, PHP_EOL . "I'M THINKING..." . PHP_EOL);

$min = $argc > 1 ? (int) $argv[1] : 1;
$max = $argc > 2 ? (int) $argv[2] : $min + 99;
$number = mt_rand($min, $max);
$maxGuesses = (int) log(($max - $min + 1), 2);

fwrite(STDOUT, 'OK!' . PHP_EOL . PHP_EOL);
fwrite(STDOUT, "A NUMBER BETWEEN $min AND $max" . PHP_EOL);
fwrite(STDOUT, "$maxGuesses GUESSES" . PHP_EOL . PHP_EOL);

for ($guessesTaken = 0; $guessesTaken < $maxGuesses; $guessesTaken++) {
	fwrite(STDOUT, 'GUESS?' . PHP_EOL);

	$response = trim(fgets(STDIN));
	
	if ((int) $response == $number) {
		fwrite(STDOUT, PHP_EOL . 'GOOD GUESS!' . PHP_EOL);
		break;
	} elseif ($response < $number and $guessesTaken < $maxGuesses) {
		fwrite(STDOUT, PHP_EOL . 'HIGHER' . PHP_EOL);
	} elseif ($response > $number and $guessesTaken < $maxGuesses) {
		fwrite(STDOUT, PHP_EOL . 'LOWER' . PHP_EOL);
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