<?php
require_once '../../classes/Autoload.class.php';
// Cria a conexão:
$conn = new Site;
$login = new Login;
$login->VerificarLogin();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - Relatório Usuários</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include '../menu/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar Navbar -->
            <?php include '../menu/topbar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Relatório de Usuários</h1>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabela Usuários</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Cadastro</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Tipo de Usuário</th>
                                    <th>Editar / Visualizar</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cadastro</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Tipo de Usuário</th>
                                    <th>Editar / Visualizar</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $selectUsers = $conn->executeQuery("SELECT * FROM usuario");
                                $selectUsersRows = mysqli_num_rows($selectUsers);
                                while ($selectUsersRows = mysqli_fetch_assoc($selectUsers)):
                                    ?>
                                    <tr>
                                        <td <?=($_SESSION['usuario'] == $selectUsersRows["usuario"])? 'style="color: red !important"' : '' ; ?> ><?= $selectUsersRows["cadastro"] ?></td>
                                        <td <?=($_SESSION['usuario'] == $selectUsersRows["usuario"])? 'style="color: black !important"' : '' ; ?> ><?= $selectUsersRows["nome"] ?></td>
                                        <td <?=($_SESSION['usuario'] == $selectUsersRows["usuario"])? 'style="color: black !important"' : '' ; ?> ><?= $selectUsersRows["cpf"] ?></td>
                                        <td <?=($_SESSION['usuario'] == $selectUsersRows["usuario"])? 'style="color: black !important"' : '' ; ?> ><?= $selectUsersRows["rg"] ?></td>
                                        <td <?=($_SESSION['usuario'] == $selectUsersRows["usuario"])? 'style="color: black !important"' : '' ; ?> ><?= $selectUsersRows["tipo_usuario"] ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['usuario'] == $selectUsersRows["usuario"] || $selectUsersRows["previlegio"] == 3):
                                                ?>
                                                <form action="../../controllers/usuariosController.php?id=<?= $selectUsersRows["usuario_id"] ?>"
                                                      method="post">
                                                    <div class="btn-group btn-block">
                                                        <button class="btn btn-sm btn-primary" name="btnEditar">Editar
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" name="btnExcluir"
                                                                onclick="return confirm('Tem certeza que deseja excluir?')">
                                                            Excluir
                                                        </button>
                                                    </div>

                                                </form>
                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /..container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../menu/footer.php'; ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<?php include '../menu/logoutmodal.php'; ?>

<!-- Bootstrap core JavaScript-->
<script src="../../../vendor/jquery/jquery.min.js"></script>
<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../js/demo/datatables-demo.js"></script>

<?php include_once '../../include/configdatatable.php' ?>

</body>

</html>
