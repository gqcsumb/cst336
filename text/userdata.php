<?php

    require_once 'config.php';

    if(isset($_POST['user_name']))

    {

        $user_name = trim($_POST['user_name']);

        //$user_name = 'jlopez';

        $sql = "SELECT failedAttempts, daysLeftPwdChange FROM fe_login WHERE username='$user_name'";

       

        $result = mysqli_query($link, $sql)

        or

        die("database error:". mysqli_error($link));

        $response = array();

        if (mysqli_num_rows($result) == 0)

        {

            $response['status'] = 'no';

            echo json_encode($response);

        }

        else

        {

            $row = mysqli_fetch_assoc($result);

            if($row['failedAttempts'] >= 3)

            {

                $response['status'] = 'fail';

                echo json_encode($response);

            }

            else if($row['daysLeftPwdChange'] <= 0)

            {

                $response['status'] = 'reset';

                echo json_encode($response);

          }

            else if($row['daysLeftPwdChange'] > 0 && $row['daysLeftPwdChange'] <= 15)

            {

                $response['status'] = 'left';

                $response['days'] = $row['daysLeftPwdChange'];

                echo json_encode($response);

            }

        }

    }

?>