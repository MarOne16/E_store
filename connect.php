<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('Links.php'); ?>

    <link rel="stylesheet" href="./Style/login.css">
    <title>Document</title>
</head>

<body>

    <?php


    // include('navbar.php');
    ?>
    <?php


//    $_GET['result'];
//
//    switch ($_GET['result']) {
//
//        case 1:
//            echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>inprosses</h5>";
//            break;
//        case 3:
//            echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>suspend</h5>";
//            break;
//        case 4:
//            echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'> reject</h5>";
//            break;
//        case 5:
//            echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'> bannde</h5>";
//            break;
//    }
//



    ?>
    <div class="container">
        <h1 class="CategoriesTitle">Se connecter</h1>
        <form action="actionConnectS&U.php" method="GET">
            <div class="form">
                <input type="mail" class="form-control" name="email" value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>" placeholder="Your email">
            </div>
            <div class="form">
                <input type="password" class="form-control" name="psw" placeholder="password">
            </div>
            <tr>
                <td colspan="2" style="color : red">
                    <?php
                    $result = $_GET['result']?? null;

                    if($result){
                        switch ($_GET['result']) {
    
                            case 1:
                                echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>inprosses</h5>";
                                break;
                            case 3:
                                echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>suspend</h5>";
                                break;
                            case 4:
                                echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'> reject</h5>";
                                break;
                            case 5:
                                echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'> bannde</h5>";
                                break;
                        }
                    }
                

else{
                    if (isset($_GET['err'])) {
                        switch ($_GET['err']) {
                            case 1:
                                echo "<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>login ou psw incorrect</h5>";
                                break;
                                // case 2 :
                                //     echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>inProcess</h5>";
                                //     break;
                                // case 4 :
                                //     echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>rejected</h5>";
                                //     break;
                                // case 5 :
                                //     echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>suspend</h5>";
                                //     break;
                                // case 6 :
                                //     echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>suspend</h5>";
                                //     break;
                        }
                    }
                }

                    ?>

                </td>
            </tr>
            <div class="btn_col">
                <button type="submit" class="btn valider" name="valider">valider</button><br>
                <button class="btn BtnInscription"><a class="" href="inscription.php">S'inscription</a></button>
            </div>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>