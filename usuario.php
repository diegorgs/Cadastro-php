<?php
include("conn.php");
$sqlTipo = "SELECT * FROM elo";

$resTipo = mysqli_query($conn, $sqlTipo);

$sqlUsuario = "SELECT * FROM cadastro";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['btnCadastrar'])) {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : $_POST[''];
        $email = isset($_POST['email']) ? $_POST['email'] : $_POST[''];
        $senha = isset($_POST['senha']) ? $_POST['senha'] : $_POST[''];
        $elo = isset($_POST['eloValor']) ? $_POST['eloValor'] :  $_POST[''];

        $sql = "INSERT INTO cadastro (nick,email,senha,elo)
        VALUES ('$nome','$email', MD5('$senha'),'$elo')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Cadastro efetuado!')</script>";
            echo "<script>location.href='login.php'</script>";
        } else {
            echo "Erro: " . mysqli_error($conn);
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
    <link href="css/brawl.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="sb-nav-fixed">
    <?php include('nav.php'); ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5 pt-5 ">
                <h1 class="mt-5 pt-5 text-center text-white">Cadastrar do Brawl Fight</h1>
                <ol class="breacrumb mb-4">
                </ol>
                <div class="container col-10 my-1">
                    <form method="POST" class="row needs-validation">
                        <div class="col-3">
                            <label class="form-label text-white">Nick Name</label>
                            <input type="text" name="nome" id="nome" required class="my-1 form-control">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label text-white">Insira o seu email</label>
                            <input type="email" name="email" id="email" required class="my-1 form-control">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label text-white">Crie a sua senha</label>
                            <input type="password" name="senha" id="senha" required class="my-1 form-control">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label text-white">Elo</label>
                            <select name="eloValor" class="text-dark my-1 form-select mb-2">
                                <?php while ($linha = mysqli_fetch_assoc($resTipo)) { ?>
                                    <option class="text-dark" value="<?php echo $linha['Id_elo']; ?>"><?php echo $linha['nome']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="btnCadastrar" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="col-2">
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


    
    <script> 
    
    validacao = document.getElementById('')
    
    
    </script>


    

    <script src="js/valid.js"></script>
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