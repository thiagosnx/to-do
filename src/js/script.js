//usando jquery pra facilitar
$(document).ready(function () {
//sintaxe padrao do jquery, abaixo pegando a classe edit button e passando a função onclick
//em js puro daria mais trabalho, teria que declarar uma variavel pro btn e passar a função com event listener
//em jquery da pra fazer tudo em uma unica linha 
    $('.edit-button').on('click', function(){
        //declarando uma variavel pra pegar uma task qnd clicar no botao de edit, o this é pra pegar so a q clica
        // o closest é pra pegar a task 'mais perto'
        var task = $(this).closest('.task');
        task.find('.progress').addClass('hidden');
        task.find('.task-description').addClass('hidden');
        task.find('.task-actions').addClass('hidden');
        task.find('.edit-task').removeClass('hidden');
        //qnd clico no botao de edit, ele adiciona a classe 'hidden' aos elementos, ou seja
        //adiciona a classe com display none, ou seja, faz ele sumir e a classe de edit-task aparecer, removendo o hidden dela
     });
     $('.progress').on('click', function(){ //adicionando e remvoendo risco no nome ao clicar no checkbox
        if($(this).is(':checked')){
            $(this).addClass('done');
        }else{
            $(this).removeClass('done');
        }
     });

     $('.progress').on('change', function () { //enviando o valor do checkbox para o db como completed true or false
        const id = $(this).data('task-id');
        const completed = $(this).is(':checked');


        $.ajax({
            url: 'actions/update-progress.php',
            method: 'POST',
            data: {id: id, completed: completed},
            dataType: 'json',
            success: function (response) {
                if (response.success) {

                } else {
                    alert('Erro ao editar a tarefa');
                }
            },
            error: function () {
                alert('Ocorreu um erro');
            }
        });
    })
});