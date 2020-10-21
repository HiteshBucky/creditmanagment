<?php
    require_once('php/config.php'); //connect to database

    $name = $_GET['name'];
    $query = "select * from userDetails where userName='" . $name . "'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    
    $query = "select name from userDetails where userName = '" . $row['userName'] . "'";
    $result = mysqli_query($connect,$query);

    if(isset($_POST['transfer'])) {
        if($_POST['credits_tr'] > $row['userCredit']) {
            echo "Credits transferred cannot be more than " . $row['userCredit'] . "<br>";
        }

        else {
            echo "Hello". $row['userName'];
            echo $_POST['to_user'];
            $query = "update userdetails set userCredit=userCredit-" . $_POST['credits_tr'] . " where userName='" . $row['userName'] . "'";
            mysqli_query($connect,$query);

            $query = "update userdetails set userCredit=userCredit+" . $_POST['credits_tr'] . " where userName='" . $_POST['to_user'] . "'";
            mysqli_query($connect,$query);

            $query = "insert into transfercredit values('" . $row['userName'] . "','" . $_POST['to_user'] . "'," . $_POST['credits_tr'] . ")";
            mysqli_query($connect,$query);

            header("Location: index.php");
        }
    }
?>

<html>
	<head>
        <title>Transfer Credits</title>
        <link rel="stylesheet" href="transferStyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <body>
        <div class="container">
            <a href="index.php">&lt; Back</a>
            <br><br>
            <center>
                <h1>Hello <?php echo $row['userName'] ?></h1>
                 <br>
                <h2><b style="color: red"><?php echo $row['userCredit'] ?></b></h2>
            </center>
            <br>
            <br><br>

            <form action="#" method="post">
                <fieldset>
                    <legend>Transfer details</legend>
                    Credits:
                    <input class="form-control form-control-lg" type="number"  name="credits_tr" min=0 value=1 required placeholder="Enter credit to transfer ">
                    <br><br>
                    Transfer to: 

                    <?php
                        require_once('php/config.php');

                        if($r_set = $connect->query("SELECT * from userDetails where userName !='" . $name . "' ")){

                            echo "<select class='form-control form-control-lg' id=userName name='to_user' placeholder='Select recipient name '>";
                            while ($row = $r_set->fetch_assoc()) {
                                echo "<option value=$row[userName] >$row[userName]</option>";
                            }
                            echo "</select>";
                        }
                    ?>

                    <br>
                </fieldset>
                <br>
                <center><button type="submit" class="btn btn-primary btn-lg" name="transfer" value="Transfer">Transfer Credits</button></center>
            </form>
        </div>
    </body>
</html>


