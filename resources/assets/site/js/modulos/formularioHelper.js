class FormularioHelper {

    async enviarFormulario(el, token) {

        var data = new FormData(el);

        let response = await fetch(el.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            body: data
        });

        if (response.ok) {

            return await response.json();

        } else if (response.status === 422) {

            const responseData = await response.json();

            throw new Error(responseData.erro);

        } else {

            throw new Error("Erro ao enviar o formulário.");
        }
    }

    async enviar(form, token) {

        try{

            Swal.fire({
                title: 'Enviando...',
                text: 'Por favor, aguarde.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const response = await this.enviarFormulario(form, token);

            Swal.close();

            Swal.fire("Sucesso!", response.mensagem, "success").then(() => {
                if(response.redirecionar){
                    window.location.href = response.redirecionar;
                }else{
                    form.reset();
                }
            });

        }catch(Error){

            Swal.fire("Falha!", Error.message, "error");
        }
    }
}

export default FormularioHelper;
