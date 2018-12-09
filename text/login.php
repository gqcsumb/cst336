<?php

    require_once 'config.php';

    if(isset($_POST['user_name']) && isset($_POST['password']))

    {

        $user_name = trim($_POST['user_name']);

        $password = trim($_POST['password']);

        $selectsql = "SELECT password, failedAttempts FROM fe_login WHERE username='$user_name'";

       

        $result = mysqli_query($link, $selectsql)

        or

        die("database error:". mysqli_error($link));

        if (mysqli_num_rows($result) == 0)

        {

            echo "no";

        }

        else

        {

            $row = mysqli_fetch_assoc($result);

            if($row['password'] == $password)

            {

                echo "ok";

            }

            else

            {

                $failed_attempts = $row['failedAttempts'] + 1;

                $updateSql = "UPDATE fe_login SET failedAttempts = '$failed_attempts' WHERE username = '$user_name'";

                if (mysqli_query($link, $updateSql))

                {

                    echo "fail"; // credentials doesn't match

                }

            }

        }

    }

?>