<?php 

$string = "ten symbol";

$one = preg_split('##', $string, -1, PREG_SPLIT_NO_EMPTY);

echo "<pre>";
echo "function preg_replace";
echo "<br>";
print_r($one);

echo "<br>";
echo "<br>";

echo "function preg_match with offset";
preg_match('#.#', $string, $two, PREG_OFFSET_CAPTURE, -1);

echo "<br>";
print_r($two);

echo "<br>";
echo "<br>";

echo "function preg_match with substr in cycle\n";
for ($i = 0; ; $i++) { 
	preg_match('#.#', substr($string, $i), $three);
	if (empty($three)) break;
	print_r($three);
	echo $i;
	echo "<--<br>";
}

echo "<br>";
echo "<br>";

echo "function preg_replace with parameter 'count'\n";
preg_replace('#.#', '1', $string, -1, $four);
echo $four;

echo "<br>";
echo "<br>";

echo "function preg_replace and explode, but explode returns one more item\n";
echo "since we have 10 elements that surround 11 nothing\n";
echo "from this it turns out that by cutting out 10 elements we get 11 nothing\n";
$five = preg_replace('#.#', '1', $string);
$five = explode('1', $five);
print_r($five);

echo "<br>";
echo "<br>";

echo "count symbol through file\n";
$six = fopen('test.txt', 'w+');
file_put_contents('test.txt', $string);

while (false !== ($char = fgetc($six))) {
	echo ++$j."--".$char;
	echo "<br>";
}
fclose($six);