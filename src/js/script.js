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
     $('.progress').on('click', function(){
        if($(this).is(':checked')){
            $(this).addClass('done');
        }else{
            $(this).removeClass('done');
        }
     })
});