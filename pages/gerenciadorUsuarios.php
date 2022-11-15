<?php include('../php/dadosArmazenados.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/gerenUsu.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gerenciamento de Usuários</title>
</head>
<body>
    <div class="grid-container">
        <div class="header">
            <figure>
                <img src="../icons/icone-engrenagem.png" alt=""width="40" height="40">
            </firgure>
            <nav>
                 
                <div class="nav-user">USUARIOS</div>
                <div class="nav-add"><a href="./formularioUsuarios.php">ADICIONAR</a></div>

            </nav>
        </div>

        <div class="exit">
            <div class="box">
                <div class='bx bx-log-out icon' ></div>
                <a href="../php/sai.php">Sai</a>
            </div>
        </div>

        <div class="m-5">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Data de Craição</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['sobrenome']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['celular']."</td>";
                        echo "<td>".$user_data['genero']."</td>";
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td>".$user_data['dataCriacao']."</td>";
                        
                        echo "<td>
                        <a class='btn btn-sm btn-primary' data-bs-toggle='modal' href='#myModal'id=$user_data[id] title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='../php/delete.php?id=$user_data[id]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";

                    }
                    ?>
            </tbody>
        </table>
    </div>
               
    </div>   


    <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../php/saveEdit.php" method="POST" >
                            <?php include('../php/edit.php'); ?>
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input class="form-control" type="text" name="firstname" placeholder="Digite o primeiro nome" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Sobrenome</label>
                                <input class="form-control" type="text" name="lastname" placeholder="Digite o sobrenome" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Digite o e-mail" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Celular</label>
                                <input  class="form-control" type="tel" name="number" placeholder="(xx) xxxx-xxxx" required>
                            </div>
                            <div class="gender-inputs">
                                <div class="gender-group">
                                    <div class="gender-input">
                                        <p>
                                        <label for="cEst">Gênero:</label>
                                            <select name="gender" id="cEst">
                                                <optgroup>
                                                    <option >Feminino</option>
                                                    <option >Masculino</option>
                                                </optgroup>
                                            </select>
                                        </p> 
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Senha</label>
                                <input class="form-control" type="password" name="password" placeholder="Digite a senha" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Confirme a Senha</label>
                                <input class="form-control" type="password" name="confirmPassword" placeholder="Digite a senha novamente" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Data de Craição</label>
                                <input class="form-control" type="date" name="creation-date">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="update" id="update" class="btn btn-primary">Alterar</button>
                                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancela</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  
</body>
</html>