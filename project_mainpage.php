<!-- REFERENCES Test Oracle file for UBC CPSC304 2018 Winter Term 1
  Created by Jiemin Zhang
  Modified by Simona Radu
  Modified by Jessica Wong (2018-06-22) -->

<?php
// The preceding tag tells the web server to parse the following text as PHP
// rather than HTML (the default)

// The following 3 lines allow PHP errors to be displayed along with the page
// content. Delete or comment out this block when it's no longer needed.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set some parameters

// Database access configuration
$config["dbuser"] = "ora_divu2002";            // change "cwl" to your own CWL
$config["dbpassword"] = "a49509540";    // change to 'a' + your student number
$config["dbserver"] = "dbhost.students.cs.ubc.ca:1522/stu";
$db_conn = NULL;    // login credentials are used in connectToDB()

$success = true;    // keep track of errors so page redirects only if there are no errors

$show_debug_alert_messages = False; // show which methods are being triggered (see debugAlertMessage())

// The next tag tells the web server to stop parsing the text as PHP. Use the
// pair of tags wherever the content switches to PHP
?>
<?php
// The preceding tag tells the web server to parse the following text as PHP
// rather than HTML (the default)

// The following 3 lines allow PHP errors to be displayed along with the page
// content. Delete or comment out this block when it's no longer needed.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set some parameters

// Database access configuration
$config["dbuser"] = "ora_divu2002";            // change "cwl" to your own CWL
$config["dbpassword"] = "a49509540";    // change to 'a' + your student number
$config["dbserver"] = "dbhost.students.cs.ubc.ca:1522/stu";
$db_conn = NULL;    // login credentials are used in connectToDB()

$success = true;    // keep track of errors so page redirects only if there are no errors

$show_debug_alert_messages = False; // show which methods are being triggered (see debugAlertMessage())

// The next tag tells the web server to stop parsing the text as PHP. Use the
// pair of tags wherever the content switches to PHP
?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Job Search Management System</title>
    <style>
        body {
            background-color: #669999;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        h2 {
            color: black;
        }

        p {
            color: white;
            font-size: large;
        }

        label {
            font-size: medium;
        }

        a:link {
            font-size: large;
            color: black;
            background-color: transparent;
        }

        a:visited {
            color: black;
            background-color: transparent;
        }

        a:hover {
            color: white;
            background-color: transparent;
            text-decoration: underline;
        }

        #User a {
            font-size: x-large;
            color: black;
            text-decoration: none;
        }

        #Company a {
            font-size: medium;
            color: black;
            text-decoration: none;
        }

        #JobListing a {
            font-size: medium;
            color: black;
            text-decoration: none;
        }

        #JobApplication a {
            font-size: medium;
            color: black;
            text-decoration: none;
        }

        #SavedJobs a {
            font-size: medium;
            color: black;
            text-decoration: none;
        }

        #index a {
            color: black;
            text-decoration: none;
        }

        #index a:hover {
            color: black;
            text-decoration: underline;
        }

        #index {
            background-color: #c6ebeb;
            width: 15%;
            border-radius: 5%;
        }

        #index h2 {
            display: flex;
            justify-content: center;
            padding-top: 2%;
        }

        #index li {
            padding-left: 5%;
            padding-bottom: 5%;
        }

        #home {
            display: flex;
            justify-content: center;
            background-color: #c6ebeb;
            padding: 2%;
            border-radius: 5%;
        }

        #button {
            background-color: azure;
            padding: 0.5%;
            border-radius: 20%;
        }
    </style>
</head>

<body>

    <h1 id="home" style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> JOB PORTAL </h1>
    <hr>
    <section id="index">
        <h2>Index</h2>
        <a href=#User>
            <li>User</li>
        </a>
        <a href=#Company>
            <li>Company</li>
        </a>
        <a href=#JobListing>
            <li>Job Listing</li>
        </a>
        <a href=#JobApplication>
            <li>Job Application</li>
        </a>
        <a href=#SavedJobs>
            <li>Save Jobs</li>
        </a>
    </section>
    <hr>
    <hr>
    <section id="JobListing">
        <p>
        <form method="post" action="project_mainpage.php">
            <a href=#index>
                <h2 id="reset">Job Listing</h2>
            </a>
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            <p>
                Please input the following job posting information <br> <br>
                Job ID: <input type="text" name="insJID" required> <br><br>
                Requirements: <input type="text" name="insReq"> <br><br>
                Position: <input type="text" name="insPos"> <br> <br>
                User ID: <input type="text" name="insFUID"> <br> <br>
                Company ID: <input type="text" name="insFCID"> <br> <br>
            </p>
            <input type="submit" value="SUBMIT" id="button" name="insertSubmit">
            <hr>
            <hr>
        </form>
        </p>
    </section>
    <section id="SavedJobs">
        <p>
        <form method="post" action="project_mainpage.php">
            <a href=#index>
                <h2 id="reset">Saved Jobs</h2>
            </a>
            <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
            <p>
                Please input the Saved jobs information ID to delete<br> <br>
                Job ID: <input type="text" name="insSavedJob"> <br> <br>
            </p>
            <input type="submit" value="SUBMIT" id="button" name="deleteSubmit">
            <hr>
            <hr>
        </form>
        </p>
    </section>
    <section id="JobListing">
        <a href=#index>
            <h2 id="reset">Job Listing</h2>
        </a>
        <p>
        <form method="post" action="project_mainpage.php">
            <a href=#index>
                <h2 id="reset">Select From Where</h2>
            </a>
            <input type="hidden" id="selectQueryRequest" name="selectQueryRequest">
            <p>
                SELECT: <input type="text" name="Select"> <br> <br>
                FROM: <input type="text" name="From"> <br> <br>
                WHERE: <input type="text" name="Where"> <br><br>
            </p>
            <input type="submit" value="SUBMIT" id="button" name="selectQuerySubmit">
            <hr>
            <hr>
        </form>
        </p>
    </section>
    <section id="ProjectionFromWhere">
        <p>
        <form method="post" action="project_mainpage.php">
            <a href=#index>
                <h2 id="reset">Projection From Where</h2>
            </a>
            <input type="hidden" id="projectQueryRequest" name="projectQueryRequest">
            <p>
                SELECT: <input type="text" name="Select"> <br> <br>
                FROM: Job Listing;
            </p>
            <input type="submit" value="SUBMIT" id="button" name="projectQuerySubmit">
            <hr>
            <hr>
        </form>
        </p>
    </section>
    <section id="Join">
        <p>
        <form method="post" action="project_mainpage.php">
            <a href=#index>
                <h2 id="reset">Join Saved Jobs and Filter With</h2>
            </a>
            <input type="hidden" id="joinRequest" name="joinRequest">
            <p>
                SELECT JOB ID:<input type="text" name="joinJobID"> <br><br>
            </p>
            <input type="submit" value="SUBMIT" id="button" name="joinQuerySubmit">
            <hr>
            <hr>
        </form>
        </p>
    </section>
    <h2>Display Tuples in JobListing</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="displayTuplesRequest" name="displayTuplesRequest">
        <input type="submit" name="displayTuples" id="button"></p>
    </form>
    <h2>Display Tuples in Saved Jobs and Filter With</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="displayDeleteTuplesRequest" name="displayDeleteTuplesRequest">
        <input type="submit" name="displayAfterDeleteTuples" id="button"></p>
    </form>
    <h2>Display Tuples in Interview and Users</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="displayUpdateTuplesRequest" name="displayUpdateTuplesRequest">
        <input type="submit" name="displayUpdatedTuples" id="button"></p>
    </form>
    <h2>Find the number of applicants for each company (using GROUP BY)</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="groupTuplesRequest" name="groupTuplesRequest">
        <input type="submit" name="groupTuples" id="button"></p>
    </form>
    <h2>Find the number of applicants for each company having more than 1 applicant (using GROUP BY and HAVING)</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="havingTuplesRequest" name="havingTuplesRequest">
        <input type="submit" name="havingTuples" id="button"></p>
    </form>
    <h2> Find the average number of jobs posted grouped by company</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="nestedTuplesRequest" name="nestedTuplesRequest">
        <input type="submit" name="nestedTuples" id="button"></p>
    </form>
    <h2>Find the users who have applied to a job in every company</h2>
    <form method="GET" action="project_mainpage.php">
        <input type="hidden" id="divisionTuplesRequest" name="divisionTuplesRequest">
        <input type="submit" name="divisionTuples" id="button"></p>
    </form>
    <hr>
    <hr>

    <?php
    // The following code will be parsed as PHP

    function debugAlertMessage($message)
    {
        global $show_debug_alert_messages;

        if ($show_debug_alert_messages) {
            echo "<script type='text/javascript'>alert('" . $message . "');</script>";
        }
    }

    function executePlainSQL($cmdstr)
    { //takes a plain (no bound variables) SQL command and executes it
        //echo "<br>running ".$cmdstr."<br>";
        global $db_conn, $success;

        $statement = oci_parse($db_conn, $cmdstr);
        //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($db_conn); // For oci_parse errors pass the connection handle
            echo htmlentities($e['message']);
            $success = False;
        }

        $r = oci_execute($statement, OCI_DEFAULT);
        if (!$r) {
            echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
            $e = oci_error($statement); // For oci_execute errors pass the statementhandle
            echo htmlentities($e['message']);
            $success = False;
        }

        return $statement;
    }

    function executeBoundSQL($cmdstr, $list)
    {
        global $db_conn, $success;

        $statement = oci_parse($db_conn, $cmdstr);

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($db_conn);
            echo htmlentities($e['message']);
            $success = False;
        }

        foreach ($list as $tuple) {
            foreach ($tuple as $bind => $val) {
                oci_bind_by_name($statement, $bind, $val);
                unset($val);
            }

            $r = oci_execute($statement, OCI_NO_AUTO_COMMIT);


            if (!$r) {
                $e = oci_error($statement);
                if (strpos($e['message'], 'integrity constraint') !== false) {
                    echo "Oops, integrity constraint violated!";
                } else {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    echo htmlentities($e['message']);
                    $success = False;
                }
                echo "<br>";
            }
        }

        oci_commit($db_conn);
    }




    function printResult($result)
    { //prints results from a select statement
        echo "<br>Retrieved data from table JobListing:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        echo "<tr><th>JobID</th><th>Req</th><th>Pos</th><th>Uid</th><th>Cid</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            // echo json_encode($row);
            echo "<tr><td>" . $row["JOBID"] . "</td><td>" . $row["REQUIREMENTS"] . "</td><td>" . $row["POSITION"] . "</td><td>" . $row["USERID"] . "</td><td>" . $row["COMPANYID"] . "</td></tr>";
        }
        echo "</table>";
    }

    function printGroupResult($result)
    { //prints results from a select statement
        echo "<br>Retrieved data from table JobListing:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        echo "<tr><th>Applicants</th><th>Cid</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            // echo json_encode($row);
            echo "<tr><td>" . $row["APPLICANTS"] . "</td><td>" . $row["COMPANYID"] . "</td></tr>";
        }
        echo "</table>";
    }

    function printDivisionResult($result)
    {
        echo "<br>Retrieved data from myUser:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        $headers = true;
        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            if ($headers) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headers = false;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function printNestedResult($result)
    {
        echo "<br>Retrieved data from myUser:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        $headers = true;
        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            if ($headers) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headers = false;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function printDeleteResult($result, $result2)
    {
        echo "<br>Retrieved data from table SavedJobs:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        echo "<tr><th>Saved Job #</th><th>Saved Date</th><th>User ID</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            echo "<tr><td>" . $row["SAVEDJOBNUMBER"] . "</td><td>" . $row["SAVEDDATE"] . "</td><td>" . $row["USERID"] . "</td></tr>";
        }
        echo "</table>";
        echo "<br></br>";
        echo "<br>Retrieved data from table Filter With:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        echo "<tr><th>Saved Job #</th><th>Job ID</th></tr>";

        while ($row = OCI_Fetch_Array($result2, OCI_ASSOC)) {
            echo "<tr><td>" . $row["SAVEDJOBNUMBER"] . "</td><td>" . $row["JOBID"] . "</td></tr>";
        }
        echo "</table>";
    }

    function printUpdateResult($result, $result2)
    {
        echo "<br>Retrieved data from table Interviews:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        echo "<tr><th>Interview ID</th><th>Interview Mode</th><th>User ID</th><th>Company ID</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            echo "<tr><td>" . $row["INTERVIEWID"] . "</td><td>" . $row["INTERVIEWMODE"] . "</td><td>" . $row["USERID"] . "</td><td>" . $row["COMPANYID"] . "</td></tr>";
        }
        echo "</table>";
        echo "<br></br>";
        echo "<br>Retrieved data from table Users:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        echo "<tr><th>User ID</th><th>User Name</th><th>User Password</th><th>Education</th></tr>";

        while ($row = OCI_Fetch_Array($result2, OCI_ASSOC)) {
            echo "<tr><td>" . $row["USERID"] . "</td><td>" . $row["USERNAME"] . "</td><td>" . $row["USERPASSWORD"] . "</td><td>" . $row["EDUCATION"] . "</td></tr>";
        }
        echo "</table>";
    }

    function printJoinResult($result4)
    {
        echo "<br>Retrieved data from Joined SavedJobs and JobListing:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        $headers = true;
        while ($row = OCI_Fetch_Array($result4, OCI_ASSOC)) {
            if ($headers) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headers = false;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function printProjectionResult($result4, $select)
    { //prints results from a select statement
        echo "<br>Retrieved data from table JobListing:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        // echo "<tr><th>JobID</th><th>Requirements</th><th>Position</th><th>UserID</th><th>CompanyID</th></tr>";

        $headers = true;
        while ($row = OCI_Fetch_Array($result4, OCI_ASSOC)) {
            if ($headers) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headers = false;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function printSelectResult($result, $from)
    {
        echo "<br>Retrieved data from table $from:<br>";
        echo "<style>table, th, td {border: 1px solid black;}</style>";
        echo "<table>";
        $headers = true;
        while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {
            if ($headers) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</tr>";
                $headers = false;
            }
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function connectToDB()
    {
        global $db_conn;
        global $config;

        // Your username is ora_(CWL_ID) and the password is a(student number). For example,
        // ora_platypus is the username and a12345678 is the password.
        // $db_conn = oci_connect("ora_cwl", "a12345678", "dbhost.students.cs.ubc.ca:1522/stu");
        $db_conn = oci_connect($config["dbuser"], $config["dbpassword"], $config["dbserver"]);

        if ($db_conn) {
            debugAlertMessage("Database is Connected");
            return true;
        } else {
            debugAlertMessage("Cannot connect to Database");
            $e = OCI_Error(); // For oci_connect errors pass no handle
            echo htmlentities($e['message']);
            return false;
        }
    }

    function disconnectFromDB()
    {
        global $db_conn;

        debugAlertMessage("Disconnect from Database");
        oci_close($db_conn);
    }

    function handleUpdateRequest()
    {
        global $db_conn;

        $interviewID = $_POST['interviewID'];
        // $old_mode = $_POST['oldMode'];
        $new_mode = $_POST['newMode'];
        // $old_userID = $_POST['oldUserID'];
        $new_userID = $_POST['newUserID'];
        // $old_CID = $_POST['oldCID'];
        $new_CID = $_POST['newCID'];

        if (is_numeric($new_mode) && $new_mode != null) {
            echo 'New Mode can not be number';
            exit();
        } else if (!is_numeric($new_userID) && $new_userID != null) {
            echo 'New User ID must be a number';
            exit();
        } else if (!is_numeric($new_CID) && $new_CID != null) {
            echo 'New Company ID must be a number';
            exit();
        } else if (!is_numeric($interviewID) && $interviewID != null) {
            echo 'Interview ID must be a number';
            exit();
        } else {
            if ($new_mode != null) {
                executePlainSQL("UPDATE Interviews SET InterviewMode='" . $new_mode . "' WHERE InterviewID='" . $interviewID . "'");
            }
            if ($new_userID != null) {
                executePlainSQL("UPDATE Interviews SET UserID='" . $new_userID . "' WHERE InterviewID='" . $interviewID . "'");
            }
            if ($new_CID != null) {
                executePlainSQL("UPDATE Interviews SET CompanyID='" . $new_CID . "' WHERE InterviewID='" . $interviewID . "'");
            }
            oci_commit($db_conn);
        }

        // you need the wrap the old name and new name values with single quotations
        // executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
        // oci_commit($db_conn);
    }

    function handleProjectRequest()
    {
        global $db_conn;
        $select = $_POST['Select'];

        if ($select == null) {
            echo 'Select can not be null';
            exit();
        } else {
            executePlainSQL("SELECT " . $select . " FROM JobListing");
            $result4 = executePlainSQL("SELECT " . $select . " FROM JobListing");
            oci_commit($db_conn);
            printProjectionResult($result4, $select);
        }
    }

    function handleJoinRequest()
    {
        global $db_conn;
        $joinJobID = $_POST['joinJobID'];
        if ($joinJobID == null) {
            executePlainSQL("SELECT * FROM FilterWith f, SavedJobs s WHERE s.SavedJobNumber = f.SavedJobNumber");
            $result4 = executePlainSQL("SELECT * FROM FilterWith f, SavedJobs s WHERE s.SavedJobNumber = f.SavedJobNumber");
            oci_commit($db_conn);
            printJoinResult($result4);
        } else {
            executePlainSQL("SELECT * FROM FilterWith f, SavedJobs s WHERE s.SavedJobNumber = f.SavedJobNumber AND f.jobID = $joinJobID");
            $result4 = executePlainSQL("SELECT * FROM FilterWith f, SavedJobs s WHERE s.SavedJobNumber = f.SavedJobNumber AND f.jobID = $joinJobID");
            oci_commit($db_conn);
            printJoinResult($result4);
        }
    }

    function handleSelectRequest()
    {
        global $db_conn;
        $select = $_POST['Select'];
        $from = $_POST['From'];
        $where = $_POST['Where'];

        if ($select == null) {
            echo 'Select can not be null';
            exit();
        } else if ($from == null) {
            echo 'From can not be null';
            exit();
        } else if ($where == null) {
            executePlainSQL("SELECT " . $select . " FROM " . $from);
            $result = executePlainSQL("SELECT " . $select . " FROM " . $from);
            oci_commit($db_conn);
            printSelectResult($result, $from);
        } else {
            executePlainSQL("SELECT " . $select . " FROM " . $from . " WHERE " . $where);
            $result = executePlainSQL("SELECT " . $select . " FROM " . $from . " WHERE " . $where);
            // printResult($result);
            oci_commit($db_conn);
            printSelectResult($result, $from);
        }
    }

    function handleDeleteRequest()
    {
        global $db_conn;
        $savedJobID = $_POST['insSavedJob'];

        if (!is_numeric($savedJobID)) {
            echo 'Saved Job ID must be a number';
            exit();
        } else {
            executePlainSQL("DELETE FROM SAVEDJOBS WHERE SavedJobNumber ='" . $savedJobID . "'");
            oci_commit($db_conn);
        }
    }

    function handleInsertRequest()
    {
        global $db_conn;
        $jobID = $_POST['insJID'];
        $requirements = $_POST['insReq'];
        $position = $_POST['insPos'];
        $userID = $_POST['insFUID'];
        $companyID = $_POST['insFCID'];

        if (!is_numeric($jobID) || $jobID == null) {
            echo 'Job ID must be a number';
            exit();
        } else if (is_numeric($requirements)) {
            echo 'Invalid Requirements type. Must be valid Numeric String';
            exit();
        } else if (is_numeric($position)) {
            echo 'Invalid Position type. Must be valid Numeric String';
            exit();
        } else if (!is_numeric($userID)) {
            echo 'User ID must be a number';
            exit();
        } else if (!is_numeric($companyID)) {
            echo 'Company ID must be a number';
            exit();
        } else {
            if ($requirements == null) {
                $requirements = "-";
            }
            if ($position == null) {
                $position = "-";
            }
            if ($userID == null) {
                $userID = "-";
            }
            if ($companyID == null) {
                $companyID = "-";
            }
            $tuple = array(
                ":bind1" => $jobID,
                ":bind2" => $requirements,
                ":bind3" => $position,
                ":bind4" => $userID,
                ":bind5" => $companyID
            );
            $alltuples = array(
                $tuple
            );
            executeBoundSQL("INSERT INTO JobListing VALUES(:bind1, :bind2, :bind3, :bind4, :bind5)", $alltuples);
            oci_commit($db_conn);
        }
    }

    function handleCountRequest()
    {
        global $db_conn;

        $result = executePlainSQL("SELECT Count(*) FROM demoTable");

        if (($row = oci_fetch_row($result)) != false) {
            echo "<br> The number of tuples in demoTable: " . $row[0] . "<br>";
        }
    }

    function handleDisplayRequest()
    {
        global $db_conn;
        $result = executePlainSQL("SELECT * FROM JobListing");
        printResult($result);
    }

    function handleGroupRequest()
    {
        global $db_conn;
        $result = executePlainSQL("SELECT COUNT(userID) AS Applicants,CompanyID FROM jobListing GROUP BY companyID");
        printGroupResult($result);
    }

    function handleHavingRequest()
    {
        global $db_conn;
        $result = executePlainSQL("SELECT COUNT(userID) AS Applicants,CompanyID FROM jobListing GROUP BY companyID HAVING COUNT(userID) > 1");
        printGroupResult($result);
    }

    function handleNestedRequest()
    {
        global $db_conn;
        // $result = executePlainSQL("SELECT COUNT(DISTINCT UserID) AS NOA FROM myUser U WHERE UserID IN (SELECT DISTINCT A.UserID FROM Attains A FULL OUTER JOIN JobListing JL ON A.JobID = JL.JobID WHERE JL.CompanyID = 90410)");
        $result = executePlainSQL("SELECT AVG(ListedJobs) AS AverageListedJobs FROM (SELECT CompanyID, COUNT(*) AS ListedJobs FROM JobListing GROUP BY CompanyID)");
        printNestedResult($result);
    }
    function handleDivisionRequest()
    {
        global $db_conn;
        $result = executePlainSQL("SELECT UserName FROM myUser U
                                    WHERE NOT EXISTS (
                                        (SELECT C.CompanyID FROM Company C)
                                        MINUS
                                        (SELECT J.CompanyID FROM JobListing J WHERE J.UserID = U.UserID)
                                    )");
        printDivisionResult($result);
    }

    function handleDeleteDisplayRequest()
    {
        global $db_conn;
        $result = executePlainSQL("SELECT * FROM SavedJobs");
        $result2 = executePlainSQL("SELECT * FROM FilterWith");
        printDeleteResult($result, $result2);
    }

    function handleUpdateDisplayRequest()
    {
        global $db_conn;
        $result = executePlainSQL("SELECT * FROM Interviews");
        $result2 = executePlainSQL("SELECT * FROM myUser");
        printUpdateResult($result, $result2);
    }

    // HANDLE ALL POST ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handlePOSTRequest()
    {
        if (connectToDB()) {
            if (array_key_exists('resetTablesRequest', $_POST)) {
                handleResetRequest();
            } else if (array_key_exists('updateQueryRequest', $_POST)) {
                handleUpdateRequest();
            } else if (array_key_exists('insertQueryRequest', $_POST)) {
                handleInsertRequest();
            } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                handleDeleteRequest();
            } else if (array_key_exists('selectQueryRequest', $_POST)) {
                handleSelectRequest();
            } else if (array_key_exists('projectQueryRequest', $_POST)) {
                handleProjectRequest();
            } else if (array_key_exists('joinRequest', $_POST)) {
                handleJoinRequest();
            }
            disconnectFromDB();
        }
    }

    // HANDLE ALL GET ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handleGETRequest()
    {
        if (connectToDB()) {
            if (array_key_exists('countTuples', $_GET)) {
                handleCountRequest();
            } elseif (array_key_exists('displayTuples', $_GET)) {
                handleDisplayRequest();
            } elseif (array_key_exists('displayAfterDeleteTuples', $_GET)) {
                handleDeleteDisplayRequest();
            } elseif (array_key_exists('displayUpdatedTuples', $_GET)) {
                handleUpdateDisplayRequest();
            } elseif (array_key_exists('groupTuples', $_GET)) {
                handleGroupRequest();
            } elseif (array_key_exists('havingTuples', $_GET)) {
                handleHavingRequest();
            } elseif (array_key_exists('nestedTuples', $_GET)) {
                handleNestedRequest();
            } elseif (array_key_exists('divisionTuples', $_GET)) {
                handleDivisionRequest();
            }
            disconnectFromDB();
        }
    }
    if (
        isset($_POST['reset']) || isset($_POST['updateSubmit'])
        || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit']) || isset($_POST['selectQuerySubmit'])
        || isset($_POST['projectQuerySubmit']) || isset($_POST['joinQuerySubmit'])
    ) {
        handlePOSTRequest();
    } else if (
        isset($_GET['countTupleRequest']) || isset($_GET['displayTuplesRequest']) || isset($_GET['groupTuplesRequest']) || isset($_GET['havingTuplesRequest'])
        || isset($_GET['displayDeleteTuplesRequest']) || isset($_GET['displayUpdateTuplesRequest']) || isset($_GET['displaySelectRequest']) || isset($_GET['divisionTuplesRequest']) || isset($_GET['nestedTuplesRequest'])
    ) {
        handleGETRequest();
    }
    // End PHP parsing and send the rest of the HTML content
    ?>





</body>

</html>