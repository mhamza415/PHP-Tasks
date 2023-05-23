<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tasks</title>
</head>
<body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['int1']) or !isset($_POST['int2']) or !isset($_POST['operator'])) {
            http_response_code(400);
            print json_encode(["status" => 'F', "message" => 'One of the fields is empty']);
        } else {
            $calculator = new Calculator($_POST['int1'], $_POST['int2'], $_POST['operator']);
            return json_encode([
                "status" => 'F',
                "message" => $calculator->calculate_result()
            ]);
        }
    }

    class Calculator {
        private $int1;
        private $int2;
        private $result;
        private $operator;

        function __construct($int1, $int2, $operator) {
            $this->int1 = $int1;
            $this->int2 = $int2;
            $this->operator = $operator;
        }

        public function calculate_result() {
            $calculate = new Calculator($this->int1, $this->int2, $this->operator);
            print $calculate->result();
        }

        public function result() {
            switch ($this->operator) {
                case '*':
                    $this->result = $this->int1 * $this->int2;
                    break;
                case '+':
                    $this->result = $this->int1 + $this->int2;
                    break;
                case '-':
                    $this->result = $this->int1 - $this->int2;
                    break;
                case '/':
                    if ($this->int2 == 0) {
                        $this->result = -1;
                    } else {
                        $this->result = $this->int1 / $this->int2;
                    }
                    break;
                default:
                    $this->result = 0;
            }
            return $this->result;
        }
    }
    ?>

</body>
</html>

