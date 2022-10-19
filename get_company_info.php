<?php



?>

<!doctype html>
<html lang="en">
<head>
    <title>Company Details Input Form</title>
</head>
<body class="bg-light">
<!-- Bootstrap Validation Form -->
<div class="container">
<div class="bg-primary text-white rounded px-3 py-1 my-3">
    <h1>Company Details Input Form</h1>
</div>
<div class="card">
<div class="card-body">
<form method="post" action="results.php" class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="name" class="form-label">Company Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="company name" value="" required>
    <div class="invalid-feedback">
      Enter a company name
    </div>
  </div>
  <div class="col-md-8">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="address" value="" required>
    <div class="invalid-feedback">
      Enter a company address
    </div>
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="city" value="" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-3">
    <label for="state" class="form-label">State</label>
    <select class="form-select" name="state" id="state" placeholder="state" value="" required>
      <option selected disabled value="">choose...</option>
      <option value="CA">CA</option>
      <option vaule="NY">NY</option>
    </select>
    <div class="invalid-feedback">
      Please select a state from the drop-down list.
    </div>
  </div>
  <div class="col-md-3">
    <label for="zip" class="form-label">Zip</label>
    <input type="text" class="form-control" name="zip" id="zip" value="" placeholder="*****" maxlength="5" pattern="^\d{5}$" required>
    <div class="invalid-feedback">
      Please provide a valid 5-digit zip.
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

</div>
</div>
</div>
</body>

<!-- BOOTSTRAP 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
// CODE SOURCE: https://getbootstrap.com/docs/5.0/forms/validation/
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

</script>

</html>