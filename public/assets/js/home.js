const URL_calculadora = 'http://localhost:5600';
const URL_MODULO = 'http://localhost:5500/api'

$('#budget-form').submit(function(event) {
    event.preventDefault();
    sendBudget();
});

$('#economy-form').submit(function(event) {
    event.preventDefault();
    sendEconomy();
});

$('#customPlanModalForm').submit(function(event) {
    event.preventDefault();
    sendCustomPlanModalForm();
});




function sendBudget(){//envia o form pro controlador da calculadora

    var jsonContent = { // cria o json com os valores do form
        valorPacote : $('#valorPacote').val(),
        placasAdicionais : $('#quantidadeAdicionalPlaca').val()
    } 
    console.log(jsonContent);
    $.ajax({
        url: URL_calculadora + '/budget',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(jsonContent),
        success: function(response) {
            console.log(response);
            $('#resultado').val(response['valorBudget']).prop('disabled', true);
        },
        error: function(error) {
            console.error('Erro na requisição:', error);
        }
    });

}

function sendEconomy(){//envia o form pro controlador da calculadora
    
    var jsonContent = { // cria o json com os valores do form
        quantidadePlacas : $('#quantidadePlacas').val(),
        quantidadePlacasAdicionais : $('#quantidadeAdicional').val(),
        usoCliente : $('#consumoMedio').val()
    }
    
    $.ajax({
        url: URL_calculadora + '/economy', 
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(jsonContent),
        success: function(response) {
            console.log(response.economiaTotal);
            if(response.economiaTotal < 0){
                $('#economyOutput').text("produçao nao sera suficiente pra suprir sua demanda");
            }else if(response.economiaTotal == 0){
                $('#economyOutput').text("produçao igual a demanda seus custos serao zerados");
            }else{
                $('#economyOutput').text("produçao gera mais que a demanda o saldo sera positivo");
            }
        },
        error: function(error) {
            console.error('Erro na requisição:', error);
        }
    });

}

function sendCustomPlanModalForm(){//pegas as informaçao do primeiro form e joga pro form de finalizar compra

    pacotesCustom = $('#pacotesCustom').val();
    quantidadeCustom = $('#quantidadeCustom').val();

    $('#customPlanModal').modal('hide');

    $('#pacoteEscohido').val(pacotesCustom)
    $('#quantidadeEscolhida').val(quantidadeCustom)

    $('#finalCustomPlanModal').modal('show');

}

function finalizarCompra(){

}

function buscarFatura(id_compra){

    $.ajax({
        url: URL_MODULO + '/cliente/faturas/' + id_compra, 
        type: 'GET',
        contentType: 'application/json',
        success: function(response) {
            venda = response['venda']
            fatura = venda['fatura'];

            $('#comprasModal').modal('hide');
            $('#faturaModal').modal('show');
            content = `
            <tr>
                <th id='id'>${fatura['id']}</th>
                <th id='StatusPagamento'>${fatura['pago'] == 0 ? 'pagamento pendente' : 'pago'}</th>
                <th id='Valor'>R$ ${fatura['valor']}</th>
                <th><button class="btn btn-success" onclick="gerarPdf(${venda['id']})">Gerar PDF</button></th>
            </tr>
            `
           $('#tableFaturaBody').html(content);

        },
        error: function(error) {
            console.error('Erro na requisição:', error);
        }
    });
  
}

function deletarCompra(id_compra) {
    $.ajax({
        url: URL_MODULO + '/compras-cliente/' + id_compra,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response && response.success) {
                alert(response.message);
            } else {
                alert(response.message);
            }
            location.reload();
        },
        error: function (error) {
            alert('Erro ao deletar a compra. Tente novamente.');
            location.reload();
        }
    });
}


function gerarPdf(id){
    $.ajax({
        url: URL_MODULO + '/pdf/' + id,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        xhrFields: {
            responseType: 'blob' // Indica que a resposta é um Blob (Binary Large Object)
        },
        success: function(response) {
            // Cria um objeto Blob com a resposta
            var blob = new Blob([response], { type: 'application/pdf' });
    
            // Cria um link para download
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'documento.pdf';
    
            // Adiciona o link ao documento e simula o clique para iniciar o download
            document.body.appendChild(link);
            link.click();
    
            // Remove o link do documento
            document.body.removeChild(link);
        },
        error: function(error) {
            console.log(error);
        }
    });
    
    
}


