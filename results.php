<?php

    // EXPRESSIVE ERRORS FOR CODE TESTING
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // CONNECT TO DATABASE
    include 'dbconfig.php';
    $db = connect_to_db($servername, $username, $password, $dbname);

    // IF ALL 5 FIELDS OF POST ARRAY SET
    if ((isset($_POST))&&(count($_POST) == 5))
    {
        // GET FORM VALUES SUBMITTED
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        // POST COMPANY INFO
        post_company($name, $address, $city, $state, $zip, $db);

        $results_message = "Company Details Submitted Successfully!";
    }
    else
        $results_message = "Submission Failed: Missing inputs.";


    // GET COMPANIES TABLE
    $companies_table = get_companies_table($db);

    // GET EMPLOYEES TABLE
    $employees_table = get_employees_table($db);



    // DATABASE FUNCTIONS

    function connect_to_db($sn, $un, $pw, $dbn)
    {
        // Create connection
        $conn = new mysqli($sn, $un, $pw, $dbn);
        // Check connection
        if ($conn->connect_error) {
            die("Database is currently unavailable: " . $conn->connect_error);
        }
        return $conn;
    }

    function post_company($name, $address, $city, $state, $zip, $db)
    {
        // prepare and bind
        $stmt = $db->prepare("INSERT INTO companies (name, address, city, state, zip) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $address, $city, $state, $zip);
        $stmt->execute();
    }

    function get_companies_table($db)
    {
        // SQL select query (no parameters)
        $sql = "SELECT      c.name, COUNT(e.employee_id) AS employee_count
                FROM	    companies AS c
                LEFT JOIN   employees AS e ON c.company_id = e.company_id
                GROUP BY    c.name";

        if ($result = $db -> query($sql))
        {
             // fetch data & build companies table
            $companies_table = "";
            while ($row = $result -> fetch_row())
            {
                $company_name = $row[0];
                $employee_count = $row[1];
                $companies_table .= "<tr><td>" . $company_name . "</td><td>" . $employee_count . "</td></tr>";
            }
            $result -> free_result();
        }
        return $companies_table;
    }


    function get_employees_table($db)
    {
        // SQL select query (no parameters)
        $sql = "SELECT      e.name AS employee, c.name AS company
                FROM        employees AS e
                LEFT JOIN   companies AS c ON e.company_id = c.company_id";

        if ($result = $db -> query($sql))
        {
             // fetch data & build companies table
            $employees_table = "";
            while ($row = $result -> fetch_row())
            {
                $employee_name = $row[0];
                $company = $row[1];
                $employees_table .= "<tr><td>" . $employee_name . "</td><td>" . $company . "</td></tr>";
            }
            $result -> free_result();
        }
        return $employees_table;
    }

    
?>

<!doctype html>
<html lang="en">
<head>
    <title>Company Details Input Form</title>
</head>
<body class="bg-white">
<!-- Bootstrap Validation Form -->
    <div class="container">
        <div class="bg-primary text-white rounded px-3 py-1 my-3">
            <h3><?php echo $results_message; ?></h3>
        </div>

        <!-- COMPANIES TABLE -->
        <div class="card mb-3">
            <div class="card-header"><h3>Companies:</h3></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Company Name</th><th>Employees</th>
                    </thead>
                    <tbody>
                        <?php echo $companies_table; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- EMPLOYEES TABLE -->
        <div class="card mb-3">
            <div class="card-header"><h3>Employees:</h3></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Employee</th><th>Company</th>
                    </thead>
                    <tbody>
                        <?php echo $employees_table; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

<!-- BOOTSTRAP 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>