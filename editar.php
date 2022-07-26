<?php
session_start();
include("conn.php");
if (!isset($_SESSION["user_email"])) {
    header('location:login.php');
    exit();
}
$usuario = $_SESSION['user_email'];


$sqlElo = "SELECT * FROM elo";
$resElo = mysqli_query($conn, $sqlElo);

$sqlTipo = "SELECT *
FROM cadastro AS c
INNER JOIN elo AS e ON e.Id_elo = c.elo where email ='$usuario'";
$resTipo = mysqli_query($conn, $sqlTipo);

while ($linha = mysqli_fetch_assoc($resTipo)) {
    $nome = $linha['nick'];
    $email = $linha['email'];
    $elo = $linha['nome'];
    $id = $linha['id_usuario'];
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
                <h1 class="mt-5 pt-5 text-center text-white">Altere os dados do cadastro</h1>
                <ol class="breacrumb mb-4">
                </ol>
                <div class="container col-10 my-1">
                    <form method="POST" class="row">

                        <div class="col-4">
                            <label class="form-label text-white">Alterar Nick</label>
                            <input type="text" name="nome" id="nome" class="my-1 form-control" value="<?php echo $nome ?>">
                        </div>
                        <div class="col-4">
                            <label class="form-label text-white">Alterar email</label>
                            <input type="text" name="email" id="email" value="<?php echo $email ?>" class="my-1 form-control">
                        </div>
                        <div class="col-4">
                            <label class="form-label text-white">Alterar elo</label>
                            <select name="eloValor" id="eloValor" class="text-dark my-1 form-select mb-2">
                            <?php while ($linha = mysqli_fetch_assoc($resElo)) { ?>
                                <option class="text-dark" value=" <?php echo $linha['Id_elo']; ?>"> <?php echo $linha['nome']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <button name="btnAtualizar" onclick="atualizar('<?php echo $id ?>')" type="button" class="btn btn-success">Atulizar</button>
                            <button name="btnDeletar" onclick="deletar('<?php echo $id ?>')" type="button" class="btn btn-danger">Deletar</button>
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
        function atualizar(id) {
        
            let idSel = id;
            let nome = document.getElementById('nome').value;
            let email = document.getElementById('email').value;
            let elo = document.getElementById('eloValor').value;

            $.ajax({
                url: 'http://localhost/cadastro/model/atualizar.php',
                method: 'POST',
                data: {
                    nome: nome,
                    email: email,
                    idSel: id,
                    elo: elo
                },
                success: function(res) {
                    alert(res);
                }
            })
        }

        function deletar(id){
            let idSel = id;
            let nome = document.getElementById('nome').value;
            let email = document.getElementById('email').value;
            let elo = document.getElementById('eloValor').value;

            $.ajax({
                url: 'http://localhost/cadastro/model/deletar.php',
                method: 'POST',
                data: {
                    nome: nome,
                    email: email,
                    idSel: id,
                    elo: elo
                },
                success: function(res) {
                    alert(res);
                    window.location.href = "http://localhost/cadastro/index.php";
                }
            })
        }
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</body>

</html>