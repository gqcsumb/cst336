<!DOCTYPE html>

<html lang="en">

   <head>

      <!-- Required meta tags -->

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

      <script type='text/javascript' src='http://code.jquery.com/jquery.min.js'></script>

   </head>

   <body>

      <div class="container">

         <div class="card" style="margin-top:10%">

            <div class="card-header">

               Login

            </div>

            <div class="card-body">

            <div id="error-msg" class="alert alert-danger" style="display:none" role="alert"></div>

               <form name="login-form" action="" id="login-form" method="post">

                  <div class="form-group">

                     <label for="userName">User Name</label>

                     <input type="text" class="form-control" name="userName" id="userName" placeholder="Enter User Name" required>

                  </div>

                  <div class="form-group">

                     <label for="password">Password</label>

                     <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>

                  </div>

                  <button type="submit" id="login_button" class="btn btn-primary user-disabled">Login</button>

               </form>

            </div>

         </div>

      </div>     

  

      <script>

      $(document).ready(function (e)

      {

        $('#userName').focusin(function (e)

        {

            e.preventDefault();

            $("#userName").next('#span_userName_error').remove();

            $('.user-disabled').prop('disabled', false);

        });//end of function on click of loginSubmit button

        // when user name typed this function executed

        // which will check if this user exist, failattempts and reset link and also left days for password change

        $('#userName').focusout(function (e)

        {

            e.preventDefault();

            var user_name = $("#userName").val();

            var data = {

                user_name: user_name

                    };   

            $.ajax(

            {

                //call userdata.php for checking user exist or failattempts and daysleftfor password change

                    type: 'post',

                    url: 'userdata.php',

                    data: data,

                    success: function (response)

                    {

                        var data = $.parseJSON(response);

                        //if status == no then user doesn't exist  

                        if(data.status == "no")

                        {

                            $("#userName").next('#span_user_required').remove();

                            $('#userName').after('<span id="span_userName_error" style="color:red;">User name doesn\'t exist.</span>');

                            $('.user-disabled').prop('disabled', true);

                        }         

                        // if status == fail then account is locked

                        else if(data.status == "fail")

                       {

                            $("#userName").next('#span_user_required').remove();

                            $('#userName').after('<span id="span_userName_error" style="color:red;">You account is locked. Go to http://id.xyz.edu to reset your password</span>');

                            $('.user-disabled').prop('disabled', true);

                        }

                         //if status == reset then left days is 0 for password change

                        else if(data.status == "reset")

                        {

                            $("#userName").next('#span_user_required').remove();

                            $('#userName').after('<span id="span_userName_error" style="color:red;">You must change your password. Go to http://id.xyz.edu</span>');

                            $('.user-disabled').prop('disabled', true);

                        }

                         //if status == left then warning message display for password change

                        else if(data.status == "left")

                        {

                            $("#userName").next('#span_user_required').remove();

                            $('#userName').after('<span id="span_userName_error" style="color:orange;">You have' + data.days + ' days to change your password</span>');

                        }

                    }

            });//end of ajax

        });//end of function on click of loginSubmit button

        // when login button hit

        $('#login_button').on('click', function (e)

        {

            e.preventDefault();

            var user_name = $("#userName").val();

            var password = $("#password").val();

            //validation for username empty

            if($("#userName").val().length == 0)

            {

                $('#userName').next('#span_user_required').remove();

                $('#userName').after('<span id="span_user_required" style="color:red;">This field is required.</span>');

            }

            //validation for password empty

            else if($("#password").val().length == 0)

            {

                $("#userName").next('#span_user_required').remove();

                $("#password").next('#span_password_required').remove();

                $("#password").after('<span id="span_password_required" style="color:red;">This field is required.</span>');

            }

            else

            {

                $("#password").next('#span_password_required').remove();

                var data = {

                    user_name: user_name,

                    password: password

                        };   

                $.ajax(

                {

                    // calll login.php by ajax if authentintcate then it will redirect another home.php

                    // else error message print

                        type:'post',

                        url: 'login.php',

                        data: data,

                        success: function (response)

                        {   

                            if(response == "ok")

                            {

                                window.location.href = "home.php";

                            }

                            else

                            {

                                $('#span_login_error').remove();

                                $('#password').after('<span id="span_login_error" style="color:red;">Sorry, Your credentials doesn\'t match!</span>');

                                $("#userName").focus();

                                $("#userName").val('');

                                $('#password').val('');

                            }

                        },

                        error: function(response)

                        {

                            $('#span_form_error').remove();

                            $('#login_button').after('<span id="span_form_error" style="color:red;">Internal Server Error!</span>');

                            $("#password").focus();

                            $('#password').val('');

                        }

                });//end of ajax

            }

        });//end of function on click of login_button button

      });

    </script>

   </body>

</html>