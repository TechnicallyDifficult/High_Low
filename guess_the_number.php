<?php

fwrite(STDOUT, "I'M THINKING..." . PHP_EOL);

$number = rand(1, 100);

fwrite(STDOUT, 'OK!' . PHP_EOL);
fwrite(STDOUT, 'A NUMBER BETWEEN 1 AND 100.' . PHP_EOL);
for ($guessesTaken = 0; $guessesTaken < 6; $guessesTaken++) {
	fwrite(STDOUT, 'GUESS?' . PHP_EOL);

	$response = trim(fgets(STDIN));
	
	if ((int) $response == $number) {
		fwrite(STDOUT, 'GOOD GUESS!' . PHP_EOL);
		break;
	} elseif ($response < $number) {
		fwrite(STDOUT, 'HIGHER' . PHP_EOL);
	} elseif ($response > $number) {
		fwrite(STDOUT, 'LOWER' . PHP_EOL);
	}
}

if ($guessesTaken < 6) {
	fwrite(STDOUT, "TOOK YOU $guessesTaken GUESSES." . PHP_EOL);
} else {
	fwrite(STDOUT, 'SORRY. NO MORE GUESSES.' . PHP_EOL);
	fwrite(STDOUT, "NUMBER WAS $number." . PHP_EOL);
}