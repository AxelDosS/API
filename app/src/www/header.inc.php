<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/bikestores/app/scripts/css/style.css">
    <style>
            .navbar {
                background-color: #6a0dad; /* Couleur de fond de la barre de navigation (violet) */
            }

            .navbar-brand {
                color: #ffffff; /* Couleur du texte de la marque (blanc) */
                font-size: 24px;
                font-weight: bold;
            }

            .navbar-brand:hover,
            .navbar-brand:focus {
                color: #ffffff; /* Couleur du texte de la marque au survol (blanc) */
            }

            .navbar-nav .nav-item .nav-link {
                color: #ffffff; /* Couleur du texte des liens (blanc) */
                font-size: 18px;
                font-weight: bold;
            }

            .navbar-nav .nav-item .nav-link:hover,
            .navbar-nav .nav-item .nav-link:focus {
                color: #ffffff; /* Couleur du texte des liens au survol (blanc) */
            }

            .btn-login {
                background-color: #6a0dad; /* Couleur de fond du bouton de connexion (violet) */
                border: 2px solid #ffffff; /* Bordure du bouton de connexion (blanc) */
                color: #ffffff; /* Couleur du texte du bouton de connexion (blanc) */
                font-size: 18px;
                font-weight: bold;
                margin-left: 80%;
                margin-top: 10px;
            }

            .btn-login:hover,
            .btn-login:focus {
                background-color: #79c267; /* Couleur de fond du bouton de connexion au survol (vert) */
                color: #ffffff; /* Couleur du texte du bouton de connexion au survol (blanc) */
            }

            .modal-header,
            .close {
                background-color: #6a0dad; /* Couleur de fond de l'en-tête de la modale (violet) */
                color: white !important; /* Couleur du texte de l'en-tête de la modale (blanc) */
                text-align: center;
                font-size: 30px;
            }

            .modal-footer {
                background-color: #f9f9f9; /* Couleur de fond du pied de la modale */
            }
    </style>
    <script>
        function deleteCookie(name) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }

        window.addEventListener('unload', function() {
            deleteCookie('employees_data');
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/bikestores">BikeStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/bikestores">
                            <h4>Home</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/bikestores/app/src/View/AllProducts.php">
                            <h4>Products</h4>
                        </a>
                    </li>
                </ul>
                <?php
                // Fonction pour récupérer tous les cookies
                function getCookies() {
                    $cookies = isset($_COOKIE) ? $_COOKIE : [];
                    $cookiesObject = [];
                    foreach ($cookies as $name => $value) {
                        $cookiesObject[$name] = $value;
                    }
                    return $cookiesObject;
                }

                // Vérifier si le cookie user_role est défini
                if (isset(getCookies()['user_role'])) {
                    $user_role = getCookies()['user_role'];

                    // Afficher différents éléments de menu en fonction du rôle de l'utilisateur
                    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/bikestores/app/src/View/Menu.php">
                                    <h4>Add/Modify/Delete</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/bikestores/app/src/View/EditProfile.php">
                                    <h4>Edit Profile</h4>
                                </a>
                            </li>';
                    switch ($user_role) {
                        case 'chief':
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="/bikestores/employees/all">
                                        <h4>Employees</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/bikestores/app/src/View/AddEmployees.php">
                                        <h4>Add Employee</h4>
                                    </a>
                                </li>';
                            break;
                        case 'it':
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="/bikestores/employees/all/employees">
                                        <h4>All Employees</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/bikestores/app/src/View/AddEmployees.php">
                                        <h4>Add Employee</h4>
                                    </a>
                                </li>';
                            break;
                        default:
                    }
                    echo '</ul>';
                ?>
            </div>
            <?php
                    // Bouton de déconnexion
                    echo '<form method="POST" action="/bikestores/logout">
                            <button type="submit" class="btn btn-default btn-lg">Logout</button>
                        </form>';
                } else {
                    // Si le cookie user_role n'est pas défini, afficher le bouton de connexion
                    
                    echo '<button type="button" class="btn btn-login btn-lg" id="myBtn">Login</button>';
                }
            ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <form role="form" method="POST" action="/bikestores/login">
                                <div class="form-group">
                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                                    <input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                    <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password">
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal();
            });
        });
    </script>
</body>
</html>
