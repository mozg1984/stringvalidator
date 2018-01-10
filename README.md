Author:

	Khisamutdinov Radik

Email:

	mozg1984@gmail.com

Description:

	A simple library for validating the string for matching opening and closing parentheses

Example of using:

	$testString = "Some string for validating";
	$stringValidator = new StringValidator($testString);
	echo ($stringValidator->validate() ? "IS VALID" : "IS NOT VALID") . "\n";