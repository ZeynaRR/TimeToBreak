<?php

include "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <style>
        .dashboard{
            background: #4A707C;
            height: 100vh;
        }

        .profile{
            padding: 25%;
        }

        .form1{
            padding: 10%;
            background: #6299AB;
            margin: 74px -5px;
        }

        .form1 label{
            display: block;
        }

        .form1 input{
            padding: 5px 17px;
            border-radius: 8px;
            border: none;
        }
        .form1 button{
            border: none;
            border-radius: 12px;
            margin-left: 20px;
            padding: 5px 17px;
            background: #4F4F4F;
            color: white;
        }

        .form2{
            padding: 10%;
            background: #E98182;
            margin: 0 -5px;
        }

        .form2 button{
            border: none;
            border-radius: 12px;
            margin-left: 20px;
            padding: 5px 17px;
            background: #e65153;
            color: white;
        }

        .form2 h2{
            margin-bottom: 46px;
            text-align: center;
        }

        .form2 select{
            width: 180px;
            padding: 5px;
            border-radius: 8px;
            background: #dc3573;
            border: none;
        }
    </style>
</head>
<body>
<div class="row dashboard">
    <div class="col-4">
    <div class="profile">
            <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155">
            <h2>Mon profile</h2>
        </div>
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col-8">
                <section class="form1">
                    <form action="">
                        <label for="">Pseudo: <input type="text" name=""></label>
                        <label for="">Login : <input type="text" name=""><button>Modifier</button></label>
                        <label for="">Mot de passe: <input type="password" name=""><button>Rénitialiser</button></label>
                    </form>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <section class="form2">
                    <h2>Centres d'intérêts</h2>
                    <form action="">
                        <div class="row">
                            <div class="col-6">
                                <button>Aventure</button>
                                <button>Cuisine</button>
                            </div>
                            <div class="col-6">
                                <select name="" id="">
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                    <option value="">Option 3</option>
                                    <option value="">Option 4</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
  </div>
</body>
</html>