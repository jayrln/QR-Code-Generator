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

                    <form action="<?php echo base_url(); ?>Welcome/Submit" method="post">
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
                            <label class="control-label">Birthdate:</label>
                            <input class="form-control form-control" placeholder="" type="date" name="bdate" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address: <small class="font-italic">(Street/Subdivision/Purok/Barangay)</small></label>
                            <input class="form-control form-control" placeholder="" type="text" name="address" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mobile No.: <small class="font-italic">(09xx)-xxx-xxxx</small></label>
                            <input class="form-control form-control" id="phone" type="text" name="phone" onKeyup="formatPhone(this);" maxlength="15"  autocomplete="off" required>
                        </div>
                        
                        <input type="hidden" name="action" value="generate_qrcode">
                        
                        <small><p class="text-justify">By submitting this form, I declare that the information I have given is true, correct, and complete. I am aware that I may be held liable for knowingly providing incorrect information. </p>
                        <p class="text-justify">I also voluntarily and freely consent to the collection and sharing of the above personal information only in relation to COVID-19 measures, in accordance with the Data Privacy Act.</p></small>
                        <div class="form-group">
                            <button class="btn btn-light btn btn-block" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                   
                </div>
            </div>
        
           
        </div>
    </div>
</div>

</body>
</html>

<script>
	
	function formatPhone(obj) {
	    var numbers = obj.value.replace(/\D/g, ''),
	        char = {0:'(',4:') ',7:'-'};
	    obj.value = '';
	    for (var i = 0; i < numbers.length; i++) {
	        obj.value += (char[i]||'') + numbers[i];
	    }
	}
</script>
