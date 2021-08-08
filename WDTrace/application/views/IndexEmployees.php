<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid pt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-10 col-md-6 col-lg-6 col-xl-5">
            <div class="card bg-info text-white">
                <div class="card-header"><center>Header title here</center></div>
                <div class="card-body">

                    <form action="<?php echo base_url(); ?>IndexEmployees/Submit" method="post">
                        <div class="form-group">
                            <label class="control-label">Emp No.:</label>
                            <input class="form-control form-control" placeholder="" type="text" name="empno" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">First Name:</label>
                            <input class="form-control form-control" placeholder="" type="text" name="fname" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Middle Name:</label>
                            <input class="form-control form-control" placeholder="" type="text" name="mname" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name:</label>
                            <input class="form-control form-control" placeholder="" type="text" name="lname" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address: <small class="font-italic">(Street/Subdivision/Purok/Barangay)</small></label>
                            <input class="form-control form-control" placeholder="" type="text" name="address" autocomplete="off" required>
                        </div>
                        <input type="hidden" name="action" value="generate_qrcode">

                        <div class="form-group">
                            <button class="btn btn-light btn btn-block" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        
           
        </div>
    </div>
</div>

</body>
</html>
