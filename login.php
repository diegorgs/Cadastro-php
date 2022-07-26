<?php
session_start();
session_unset();
include("conn.php");
$usuario = "";
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST["senha"])) {
        $senha = $_POST["senha"];
        $usuario = $_POST["email"];

        $sql = "SELECT email,
                id_usuario,
                case when senha = MD5('$senha') then 1 ELSE 0 END AS status
                FROM cadastro 
                WHERE email = '$usuario'";
                
        $tabela = (mysqli_query($conn, $sql));
        $retorno = (mysqli_num_rows($tabela));
        if ($retorno == 0) {
            $mensagem = ("<div class='alert alert-warning my-2 p-1'> Usuário inválido </div>");
        } else {
            $linha = mysqli_fetch_assoc($tabela);
            if ($linha["status"] == 0) {
                $mensagem = ('<div class="alert alert-danger fw-bold my-2 p-1">Senha incorreta.</div>');
            } else {
                $_SESSION["user_id"] = $linha["id_usuario"];
                $_SESSION["user_nick"] = $linha["nick"];
                $_SESSION["user_email"] = $linha["email"];
                header('location:editar.php');
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Brawl Figth</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/brawl.css" rel="stylesheet" />

</head>

<body class="sb-nav-fixed">
    <?php include('nav.php'); ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 pt-5 mt-5">
                <div class="container">
                    <form method="POST">
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <div class=" bg-dark py-2 rounded-3">
                                    <div class="pb-5 ">
                                        <div class="container mt-5">
                                            <h1 class="mt-5 text-white text-center">Entrar</h1>

                                            <label class="form-label text-white">Email</label>
                                            <input type="text" name="email" id="email" class="form-control">

                                            <label class="form-label text-white  mt-4">Senha</label>
                                            <input type="password" name="senha" id="senha" class="form-control">

                                            <button type="submit" name="btnCadastrar" class="btn btn-primary mt-4">Logar</button>
                                            <?php echo $mensagem ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                    </form>
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