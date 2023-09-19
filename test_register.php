
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <blockquote>
        <form action="" method="post">
            <label for="num1">Enter a first Number</label>
            <input type="number" name="num1" placeholder="Enter a first number" required>
            <br><br>

            <label for="num2">Enter a second Number</label>
            <input type="number" name="num2" placeholder="Enter a second number" required>
            <br><br>
            <button>Submit</button>
        </form>
        <div id="output"></div>
    </blockquote>
    <style>
        #output{
            background: green;
        }
    </style>
    <?php
    // if(!empty($_POST)){
    //     $num1 = $_POST['num1'];
    //     $num2 = $_POST['num2'];

    //     $total = $num1 + $num2;

    //     echo'<script>';
    //     echo'console.log("The answer is : )' + $total;

    //     // echo'document.getElementById("output").innerHTML = '+$total;
    //     echo'</script>';
    // }
    if(!empty($_POST)){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if($num1!=$num2){
            echo'<script>';
            echo'document.getElementById("output").innerText = "False";';
            echo'</script>';
        }else{
            echo'<script>';
            echo'document.getElementById("output").innerText = "True";';
            echo'</script>';
        }
    }
    
        
    ?>
</body>
</html>