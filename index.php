<?php
include("conn.php");
session_start();
session_unset();
$sql = "SELECT *
FROM cadastro AS c
INNER JOIN elo AS e ON e.Id_elo = c.elo";

$resTipo = mysqli_query($conn,$sql);


$mensagem = "";
$usuario = "";

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Brawl Fight</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/brawl.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include('nav.php') ?>
    <div id="layoutSidenav_content">
        <main class="container euqsei">
            <div class="container my-4">
                <div class="row text-white py-4 rounded-3 text-center bg-dark">
                    <h1>Bem vindo ao Brawl Fight!</h1><br>
                    <h2>Cadastre no campeonato de Brawlhalla 1 x 1</h2>
                </div>
                <div class="row rounded-3 op mt-3">
                    <table class="text-white table-dark table">
                        <thead>
                            <tr>
                                <th scope="col">Players</th>
                                <th scope="col">Elo</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php while ($linha = mysqli_fetch_assoc($resTipo)) { ?>
                                <td class="text-white " value="<?php echo $linha['id_usuario']; ?>"><?php echo $linha['nick']; ?></td>
                                <td class="text-white" value="<?php echo $linha['Id_elo']; ?>"><?php echo $linha['nome']; ?></td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Guilherme C. Machado & Diego Rodrigues 2022</div>

                </div>
            </div>
        </footer>
    </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</body>


</html>