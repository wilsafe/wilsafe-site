<?php
$show_detail = FALSE;

if (isset($_GET['rid'])) {
    $reference_id = $_GET['rid'];

    $result  = [];
    if (($handle = fopen("Certificate Website - users.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // echo "reference_id = " . $reference_id;
            // echo "<br>";
            // echo "data[0] = " . $data[0];
            // echo "<hr>";
            if ($data[0] === $reference_id) {
                $show_detail = TRUE;
                $result = $data;
                break;
            }
        }
        fclose($handle);
        // var_dump($result);
        $name = $result[1];
        $certificate_number = $result[2];
        $course = $result[3];
        $training_date = $result[4];
        $sto = $result[6];
        $certificate = ($result[7] == '') ? "https://i.stack.imgur.com/34AD2.jpg" : $result[7];
    }
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon-16x16.png">
    <link rel="manifest" href="assets/site.webmanifest">

    <title>Certificate Verification | WilSafe Training Center</title>
    <style>
        .inf-content {
            border: 1px solid #DDDDDD;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
        }

        /* Style buttons */
.btn {
    background-color: rgb(19, 224, 80);
    border: none;
    color: white;
    padding: 12px 30px;
    cursor: pointer;
    font-size: 20px;
  }
  
  /* Darker background on mouse-over */
  .btn:hover {
    background-color: rgb(61, 201, 42);
  }

    </style>
</head>

<body>
    <div class="container bootstrap snippet">
        <h1>Certificate Verification</h1>
        <div class="panel-body inf-content">
            <div class="row">
                <?php
                if ($show_detail) {
                ?>
                    <div class="col-md-9">
                        <strong>Student Information</strong><br>
                        <div class="table-responsive">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td class="text-primary"><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Certificate Number</strong></td>
                                        <td class="text-primary"><?php echo $certificate_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Course</strong></td>
                                        <td class="text-primary"><?php echo $course; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Training Date</strong></td>
                                        <td class="text-primary"><?php echo $training_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Safety Training Organization</strong></td>
                                        <td class="text-primary"><?php echo $sto; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <a class="btn" href="<?php echo $certificate; ?>" download="<?php echo $name; ?>.pdf">Download Certificate</a>
                        <iframe src="<?php echo $certificate; ?>" width="100%" height="500px"></iframe>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-md-12 text-center">
                        Nothing to show...
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>