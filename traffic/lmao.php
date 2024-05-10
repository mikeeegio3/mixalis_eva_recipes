<!DOCTYPE html>

<html lang="en">




<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order form</title>

    <link rel="stylesheet" href="includes/order_form.css" type="text/css" />

    <script src="includes/order_form.js" type="text/javascript"></script>

</head>




<body>

    <?php
    include "connect_db.php";

    $sql = "SELECT * FROM bicycles ORDER BY title";

    $result = mysqli_query($conn, $sql);

    if (isset($_POST["product"])) {
        $product = $_POST["product"];

        echo "Έλαβα: " . $product;
    }
    ?>




    <div id="main">

        <div id="form_content">

            <h1>Order your bike online:</h1>

            <form name="order_form" action="
                
                <?php echo "https://" .
                    $_SERVER["HTTP_HOST"] .
                    $_SERVER["REQUEST_URI"]; 
                    
                ?>" method="POST">

                <table class="demoTbl">

                    <tbody>

                        <tr>

                            <th class="first">Προϊόν</th>

                            <th>Τιμή</th>

                            <th>Ποσότητα</th>

                            <th>Διαθεσιμότητα</th>

                            <th>Σύνολο</th>

                        </tr>

                        <tr>

                            <td>

                                <select name="product" onchange="this.form.submit()">

                                    <?php if (mysqli_num_rows($result) > 0) {
                                        // output data of each row

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Απομονώνουμε τις σειρές

                                            if (
                                                $row["bicycle_id"] == $product
                                            ) {
                                                $selected = " selected";

                                                $bike_img = $row["picture"];

                                                $bike_price = $row["price"];
                                            } else {
                                                $selected = "";
                                            }

                                            echo "<option value=\"" .
                                                $row["bicycle_id"] .
                                                "\"$selected>" .
                                                $row["title"] .
                                                "</option>";
                                        }
                                    } else {
                                        echo "0 results";
                                    } ?>




                                </select>

                            </td>

                            <td class="cur"><?php echo $bike_price .
                                " £"; ?><input type="hidden" name="_price" value="15" /></td>

                            <td class="qty"><input type="text" name="_qty" id="_qty" value="0" size="4" class="cur" pattern="[0-9]+" placeholder="0" onchange="getProductTotal(this)" onclick="checkValue(this)" onblur="reCheckValue(this)" /></td>

                            <td>Σε απόθεμα</td>

                            <td><input type="text" name="_tot" value="0" readonly size="8" class="cur" /></td>

                        </tr>

                        <tr>

                            <td class="submit" colspan="5"><button type="button">Order</button></td>

                        </tr>

                    </tbody>

                </table>

            </form>

        </div> <!-- form -->

        <br />

        <div id="product_details">

            <h2>Bike one: Χαρακτηριστικά</h2>

            <img src="bike_images/bike_1.jpeg" />

            <table class="detailsTbl">

                <tr>

                    <td>Κατασκευαστής:</td>

                    <td>Orient</td>

                </tr>

                <tr>

                    <td>Τύπος:</td>

                    <td>Trekking</td>

                </tr>

                <tr>

                    <td>Διάσταση Τροχού:</td>

                    <td>28"</td>

                </tr>

                <tr>

                    <td>Σπαστό / Αναδιπλούμενο:</td>

                    <td>Όχι</td>

                </tr>

                <tr>

                    <td>Αναρτήσεις:</td>

                    <td>Μπροστινή Ανάρτηση</td>

                </tr>

            </table>

        </div>

    </div>

</body>




</html>



<!-- connect_db.php -->



<?php
$dbserver = "localhost";

$mysql_username = "dpsd20135";

$mysql_password = "dpsd20135"; // Remember: this is NOT your normal password (just

$db_name = "dpsd20135";

$conn = mysqli_connect($dbserver, $mysql_username, $mysql_password, $db_name);

if (!$conn) {
    echo "Failed";

    exit();
}


?>
