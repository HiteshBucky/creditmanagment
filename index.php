<?php
    require_once('php/config.php'); //connect to database

    $query = "select * from userDetails";
    $result = mysqli_query($connect,$query);
?>
<html>
	<head>
        <title>Credit Management</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container mt-5" >
            <center><h1 style="color: white">CREDIT MANAGEMENT</h1></center>
        </div>
        <div class="container">
            <section class="team-section text-center my-5">
                <h2 class="h1-responsive font-weight-bold my-5">Happy Candidates Says</h2>
                <div class="row text-center" style="color: white">
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($result)) {
                            $i++;
                            echo '<div class="col-md-4 mb-md-0 mb-5 mt-5">';
                            echo '<div class="testimonial">';
                            echo '<div class="avatar mx-auto">';
                            $link = '"https://mdbootstrap.com/img/Photos/Avatars/img%20('."$i".').jpg"';
                                echo "<img src=$link class='rounded-circle z-depth-1 img-fluid'>";
                            echo '</div>';
                            echo '<h4 class="font-weight-bold dark-grey-text mt-4">'. $row["userName"] .' </h4>';
                            echo '<h6 class="font-weight-bold blue-text my-3" style="color: #fff">Credit Points :  '. $row["userCredit"] .'</h6>';
                            echo '<h6 class="font-weight-bold blue-text my-3" style="color: #fff">Country : '. $row["userCredit"] .'</h6>';
                            echo '<p class="font-weight-normal dark-grey-text">';
                                echo '<i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                          eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.';
                            echo '</p>';
                            $transferTO = "transfer.php?name=" . $row["userName"];
                            echo "<a href=$transferTO ><button type='button' class='btn btn-primary' >Click Me</button></a>";
                            echo '</div>';
                            echo '</div>';
                            $i = $i + 1;
                        }
                    ?>
                </div>
            </section>
        </div>

        <table>
			<thead>
				<tr>
                    <th>S No.</th>
    				<th>Name</th>
    				<th>Country</th>
    				<th>Credits</th>
				</tr>
			</thead>
            <!--fetch and display data from MySQL-->
            <?php
                $i=1;

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["userName"] . "</td>";
                    $link = "transfer.php?name=" . $row["userName"];
                    echo "<td>" . $row["userCountry"] . "</td>";
                    echo "<td>" . $row["userCredit"] . "</td>";
                    echo "<td><a href=$link>Select</a><td>";
                    echo "</tr>";
                    ++$i;
                }
            ?>

        </table>
    </body>
</html>






