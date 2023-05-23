<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisible </title>
</head>
<body>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    if (!isset($requestData['array'])) {
        http_response_code(400);
        echo json_encode(["status" => 'F', "message" => 'Array data is missing']);
    } else {
        $count = countDivisibleByThree($requestData['array']);
        echo json_encode(["status" => 'S', "output" => $count]);
    }
}

function countDivisibleByThree($array) {
    $count = 0;

    foreach ($array as $element) {
        if ($element > 300) {
            return 0; // If any element is greater than 300, return 0 immediately
        }

        if ($element % 3 === 0) {
            $count++;
        }
    }

    return $count;
}
?>

</body>
</html>