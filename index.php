<?php 
require_once('database/conn.php'); //chamando a conexao

$tasks = []; //definindo as tasks como um array

$sql = $pdo->query("SELECT * FROM task ORDER BY id DESC"); // pegando os dados do db

if($sql->rowCount() > 0){
    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="src/styles/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>To Do</title>
</head>
<body>
    <div id="to_do">
        <h1>To Do</h1>

        <form action="actions/create.php" method="POST" class="to-do-form">
            <input type="text" name="description" placeholder="Task" required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i> 
            </button>
        </form>
        <div id="tasks">
            <?php foreach($tasks as $task): //foreach retornando os dados do db ?> 
            <div class="task">
                <input 
                type="checkbox" 
                name="progress" 
                class="progress <?= $task['completed'] ? 'done' : '' ?>"
                data-task-id="<?= $task['id']?>"
                <?= $task['completed'] ? 'checked' : '' //usando o foreach p acessar cada dado especifico ?>
                >
            
            <p class="task-description">
                <?= $task['description'] ?>
            </p>
            <div class="task-actions"> 
                <a class="action-button edit-button">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>

                <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </div>
            <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                <input type="text" class="hidden" name="id" value="<?= $task['id'] ?>">
                <input 
                type="text" 
                name="description"
                placeholder="Edit" 
                value="<?= $task['description'] ?>">
                <button type="submit" class="form-button confirm-button">
                    <i class="fa-solid fa-check"></i> 
                </button>
            </form>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="src/js/script.js"></script>
</body>
</html>