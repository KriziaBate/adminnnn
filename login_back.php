<?php
include('connect/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_email = $_POST["email"];
    $input_password = $_POST["password"];

    // Hash the input password using SHA-512
    $hashed_password = hash("sha512", $input_password);

    // Check the commuter table
    $stmt = $connect->prepare("SELECT commuterid, password, status FROM commuter WHERE email = ?");
    $stmt->bind_param("s", $input_email);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($commuterid, $password, $status);
    $stmt->fetch();

    if ($stmt->num_rows == 1 && $hashed_password == $password) {
        if ($status !== '1') {
            // Account is banned
            header("Location: index.php?error=banned");
            exit();
        }

        session_id($commuterid);
        session_start();

        $_SESSION["commuterid"] = $commuterid;
        $_SESSION["role"] = "commuter"; // Set role session for commuter

        header("Location: commuter.php");
        exit();
    } else {
        $stmt->close();

        // If not found in commuter table, check dispatcher table
        $stmt = $connect->prepare("SELECT dispatcherid, password, status FROM dispatcher WHERE email = ?");
        $stmt->bind_param("s", $input_email);
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($dispatcherid, $password, $status);
        $stmt->fetch();

        if ($stmt->num_rows == 1 && $hashed_password == $password) {
            if ($status !== '1') {
                // Account is banned
                header("Location: index.php?error=banned");
                exit();
            }

            session_id($dispatcherid);
            session_start();

            $_SESSION["dispatcherid"] = $dispatcherid;
            $_SESSION["role"] = "dispatcher"; // Set role session for dispatcher

            header("Location: dispatcher.php");
            exit();
        } else {
            $stmt->close();

            // If not found in dispatcher table, check driver table
            $stmt = $connect->prepare("SELECT driverid, password, status FROM driver WHERE email = ?");
            $stmt->bind_param("s", $input_email);
            $stmt->execute();
            $stmt->store_result();

            $stmt->bind_result($driverid, $password, $status);
            $stmt->fetch();

            if ($stmt->num_rows == 1 && $hashed_password == $password) {
                if ($status !== '1') {
                    // Account is banned
                    header("Location: index.php?error=banned");
                    exit();
                }

                session_id($driverid);
                session_start();

                $_SESSION["driverid"] = $driverid;
                $_SESSION["role"] = "driver"; // Set role session for driver

                header("Location: driveraccount.php");
                exit();
            } else {
                $stmt->close();

                // If not found in driver table, check admin table
                $stmt = $connect->prepare("SELECT adminid, password, status FROM adminacc WHERE email = ?");
                $stmt->bind_param("s", $input_email);
                $stmt->execute();
                $stmt->store_result();

                $stmt->bind_result($adminid, $password, $status);
                $stmt->fetch();

                if ($stmt->num_rows == 1 && $hashed_password == $password) {
                    if ($status !== '1') {
                        // Account is banned
                        header("Location: index.php?error=banned");
                        exit();
                    }

                    session_id($adminid);
                    session_start();

                    $_SESSION["adminid"] = $adminid;
                    $_SESSION["role"] = "admin"; // Set role session for admin

                    header("Location: dashboard.php");
                    exit();
                } else {
                    $stmt->close();
                    header("Location: index.php?error=true");
                    exit();
                }
            }
        }
    }
}

$conn->close();
?>
