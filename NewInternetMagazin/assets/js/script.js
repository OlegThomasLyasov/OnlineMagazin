"use strict"

document.addEventListener('DOMContentLoaded', function(){
    const form=document.getElementById('form');
    const oshibka=document.getElementById('alert-validation');
    const vseok=document.getElementById('alert-order-done');
    form.addEventListener('submit',formSend);

    async function formSend(e){
        e.preventDefault();

        let error = formValidate(form);

        let formData = new FormData(form);

        if (error===0){
            form.classList.add('_sending');
            let response = await fetch ('sendmail.php',{
                method: 'POST',
                body: formData
            });

            if (response.ok){
                let result = await response.json();
                oshibka.classList.add('hidden');
                vseok.classList.remove('hidden');
                form.reset();
                form.classList.remove('_sending');
                console.log('отправка');
                alert(result.message);
            }
            else{
                alert("Ошибка");
                form.classList.remove('_sending');
            }   
        }   
        else{
            oshibka.classList.remove('hidden');
            alert("Заполните обязательные поля!");

        }
    }

    function formValidate(form){
        let error =0;
        let formReq = document.querySelectorAll('._req');
        for (let index=0; index<formReq.length;index++){
            const input = formReq[index];

            formRemoveError(input);

            if (input.classList.contains('._email')){
                if (emailTest(input)){
                    formAddError(input);
                    error++;
                }
                
            }else {
                if (input.value ===''){
                    formAddError(input);
                    error++;
                }
            }

        }
        return error;
    }

    function formAddError(input){
        input.parentElement.classList.add('_error');
        input.classList.add('_error');
    }

    function formRemoveError(input){
        input.parentElement.classList.remove('_error');
        input.classList.remove('_error');
    }

    function emailTest(input){
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(input.value);
    }
});