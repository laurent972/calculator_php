<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Page Simple</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Simple</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Calculator</h1>
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="number" name="num01" placeholder="number one">
            <select name="operator">
                <option value="add">+</option>
                <option value="substract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="num02" placeholder="number two">
            <button>Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Grab data
            $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
            $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            // Error handlers
            $errors = false;

            if (empty($num01) || empty($num02) || empty($operator)) {
                echo "<p class='danger'>Fill in all fields !</p>";
                $errors = true;
            }

            if (!is_numeric($num01) || !is_numeric($num02)) {
                echo "<p class='danger'>Write numbers please !</p>";
                $errors = true;
            }

            //calculate
            if (!$errors) {
                $value = 0;
                switch ($operator) {
                    case "add":
                        $value = $num01 + $num02;
                        break;
                    case "substract":
                        $value = $num01 - $num02;
                        break;
                    case "multiply":
                        $value = $num01 * $num02;
                        break;
                    case "divide":
                        $value = $num01 / $num02;
                        break;
                    default:
                        echo "<p class='danger'>Something get wrong !</p>";
                }

                echo "<p class='success'>Result = " . $value . "</p>";
            }
        }

        ?>


    </div>
</body>

</html>