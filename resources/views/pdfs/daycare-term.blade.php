<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Prestação de Serviços de Creche para Cães</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 21cm;
            margin: 0 auto;
            padding: 20px;

        }

        h4 {
            text-align: center;
        }

        h6 {
            line-height: 0.7;
        }

        p {
            font-size: 10px;
            text-align: justify;

        }
    </style>
</head>

<body>
    <h4>Contrato de Prestação de Serviços de Creche para Cães</h4>
    <div>
        <p><strong>CONTRATANTE:</strong></p>
        <p> {{ $customer->name }}, RG: {{ $customer->rg }}, CPF: {{ $customer->cpf }}, residente em
            {{ $customer->address->address . ', ' . $customer->address->number . ' - ' . $customer->address->city . '/' . $customer->address->state }},
            tutora do cão de nome {{ $pet->name }}, da raça {{ $pet->breed->name }} e porte
            @if ($pet->size == 'mini')
                Mini
            @elseif ($pet->size == 'small')
                Pequeno
            @elseif ($pet->size == 'average')
                Médio
            @elseif ($pet->size == 'big')
                Grande
            @elseif ($pet->size == 'giant')
                Gigante
            @endif
            .
        </p>

    </div>
    <div>
        <p><strong>CONTRATADO:</strong></p>
        <p>Sweet Lounge Pet Store Eireli, inscrito no CNPJ: 30.746.414/0001-25, localizado Rua Itupava, 457, Alto da
            Glória, Curitiba, Paraná, CEP: 80060-272</p>
    </div>

    <!-- Cláusulas do contrato -->

    <p><strong>CLÁUSULA 1 - OBJETO DO CONTRATO</strong></p>
    <p>1.1 O Contratante contrata os serviços de creche para cães oferecidos pelo Contratado, situado no endereço
        mencionado acima.</p>

    <p><strong>CLÁUSULA 2 - PERÍODO DE PRESTAÇÃO DE SERVIÇO E HORÁRIOS DE ENTREGA/RETIRO DO ANIMAL
        </strong></p>
    <p>2.1 O serviço será prestado durante {{ $plan->days }} dias no mês, com duração de {{ $plan->session_type }}
        horas por dia.</p>
    <p>2.2 O Contratante poderá trazer e retirar o animal nos seguintes horários:</p>
    <p>&nbsp;&nbsp;&nbsp;- De segunda a sexta-feira: das 7h30 às 19h30.</p>
    <p>&nbsp;&nbsp;&nbsp;- Sábado: das 9h às 15h.</p>
    <p>2.3 Importante: Sábado é considerado um dia completo, independentemente do horário de chegada e saída. Caso o
        Contratante opte por deixar o animal apenas no sábado, será cobrada uma diária completa.
    </p>
    <p>
        2.4 O Contratante tem uma tolerância de 15 minutos após o horário de encerramento estabelecido para a retirada
        do animal. Após esse período, será aplicada uma cobrança adicional correspondente a uma diária completa por cada
        período excedente de 15 minutos.
    </p>
    <p><strong>CLÁUSULA 3 - VALOR DO SERVIÇO, MULTA E JUROS POR ATRASO</strong></p>
    <p>3.1 O valor do serviço de creche é de R$ {{ number_format($plan->price, 2, ',', '.') }} por mês.</p>
    <p>3.2 O pagamento do valor mencionado na Cláusula 3.1 deve ser efetuado até o dia
        {{ \Carbon\Carbon::parse($enrollment->initial_date_plan)->day }} de cada mês.
    </p>
    <p>3.3 Em caso de atraso no pagamento, o Contratante concorda em pagar uma multa equivalente a 1% (um por cento) do
        valor total devido, além de juros de 2% (dois por cento) ao mês sobre o valor em atraso, calculados a partir da
        data de vencimento até a data efetiva de pagamento.
    </p>
    <p><strong>CLÁUSULA 4 - DURAÇÃO E RENOVAÇÃO DO CONTRATO
        </strong></p>
    <p>4.1 O contrato tem duração indefinida e será automaticamente renovado a cada mês, desde que o Contratante
        mantenha o pagamento das mensalidades em dia.
    </p>
    <p>4.2 O Contratante concorda em pagar a mensalidade até a data de vencimento especificada pelo Contratado.
    </p>
    <p>4.3 O Contratado reserva o direito de encerrar o contrato e cessar a prestação de serviços caso o Contratante
        deixe de efetuar o pagamento das mensalidades devidas.
    </p>
    <p><strong>CLÁUSULA 5 - DEVERES DO CONTRATANTE</strong></p>
    <p>5.1 O animal entregue para a creche deve possuir vacinas, vermífugos, anti-parasitários atualizadas, deve estar
        castrado e gozar de boa saúde.</p>
    <p>5.2 O Contratante deve informar imediatamente o Contratado sobre quaisquer doenças ou condições de saúde do
        animal que possam representar risco para outros animais na creche. O cachorro será impedido de frequentar a
        creche enquanto houver risco à saúde de outros animais, sem direito a reembolso pelos dias não utilizados.
    </p>
    <p>5.3 O Contratante é responsável pelos danos causados pelo seu animal a outros animais ou ao patrimônio do
        estabelecimento.
    </p>
    <p><strong>CLÁUSULA 6 - DEVERES DO CONTRATADO</strong></p>
    <p>6.1 O Contratado compromete-se a prestar os serviços de creche para cães de acordo com os mais altos padrões de
        cuidado e segurança animal, zelando pelo bem-estar físico e emocional do animal.
    </p>
    <p>6.2 O Contratado fornecerá ao animal água, alimentação (caso solicitado pelo Contratante), supervisão constante,
        e um ambiente seguro e limpo durante o período de creche. </p>
    <p>6.3 Em caso de emergência médica ou comportamental, o Contratado tomará medidas imediatas para garantir o cuidado
        adequado do animal e informará prontamente o Contratante sobre a situação.
    </p>
    <p>6.4 O Contratado se esforçará para garantir que o animal seja mantido em áreas apropriadas para seu tamanho,
        temperamento e compatibilidade com outros animais na creche.
    </p>
    <p>
        6.5 O Contratado se compromete a cumprir todas as regulamentações e normas aplicáveis relacionadas à prestação
        de serviços de creche para cães.
    </p>
    <p><strong>CLÁUSULA 7 - DISPOSIÇÕES GERAIS</strong></p>
    <p>7.1 Qualquer alteração ou adição a este contrato deve ser feita por escrito e assinada por ambas as partes.
    </p>
    <p>7.2 Este contrato é regido pelas leis vigentes no Brasil.
    </p>
    <p><strong>CLÁUSULA 8 - RESPONSABILIDADE POR ACIDENTES E INCIDENTES</strong></p>
    <p>8.1 O Contratado não se responsabiliza por acidentes, ferimentos ou incidentes que possam ocorrer durante a
        estadia do animal na creche, a menos que tais incidentes sejam causados diretamente por negligência comprovada
        do Contratado.
    </p>
    <p><strong>CLÁUSULA 9 - AUTORIZAÇÃO PARA TRATAMENTO VETERINÁRIO DE EMERGÊNCIA</strong></p>
    <p>9.1 O Contratante autoriza o Contratado a buscar tratamento veterinário de emergência para o animal, caso seja
        necessário, e concorda em arcar com todas as despesas veterinárias relacionadas.
    </p>
    <p><strong>CLÁUSULA 10 - TERMOS DE CANCELAMENTO</strong></p>
    <p>10.1 Em caso de cancelamento por parte do Contratante antes do término do período contratado, não haverá
        reembolso das mensalidades já pagas.
    </p>
    <p><strong>CLÁUSULA 11 - ALTERAÇÕES NO HORÁRIO OU PERÍODO DE CRECHE
        </strong></p>
    <p>11.1 O Contratante pode solicitar alterações no horário ou período de creche mediante acordo prévio com o
        Contratado. Tais alterações podem estar sujeitas a taxas adicionais.
    </p>
    <p><strong>CLÁUSULA 12 - ENCERRAMENTO DO CONTRATO</strong></p>
    <p>12.1 Antes de encerrar o contrato, o Contratado notificará o Contratante por escrito, descrevendo as razões do
        encerramento e concedendo ao Contratante um prazo razoável para tomar as medidas corretivas necessárias.
    </p>
    <p><strong>CLÁUSULA 13 - LEI APLICÁVEL E FORO</strong></p>
    <p>13.1 Este contrato é regido pelas leis da jurisdição de Curitiba, e qualquer disputa decorrente deste contrato
        será resolvida perante os tribunais dessa jurisdição.
    </p>
    <p><strong>CLÁUSULA 14 - COMUNICAÇÕES</strong></p>
    <p>14.1 Todas as comunicações entre as partes devem ser realizadas por escrito e enviadas para os endereços e
        contatos fornecidos neste contrato.</p>
    <p><strong>CLÁUSULA 15 - ACEITAÇÃO DO CONTRATO
        </strong></p>
    <p>15.1 O Contratante declara ter lido, entendido e concordado com todos os termos e condições deste contrato no
        momento da assinatura.
    </p>
    @php
        \Carbon\Carbon::setLocale('pt_BR');
    @endphp
    <!-- Assinaturas e Data -->
    <p><strong>LOCAL E DATA DA CELEBRAÇÃO DO CONTRATO</strong></p>
    <p>Local: Curitiba/Paraná</p>
    <p>Data: {{ Carbon\Carbon::now()->isoFormat('dddd D [de] MMMM [de] YYYY') }}</p>

    <div>
        <p><strong>CONTRATANTE:</strong></p>
        <br />
        <p>Assinatura: _________________________________________________</p>
    </div>
    <br /> <br />
    <div>
        <p><strong>CONTRATADO:</strong></p>
        <br />
        <p>Assinatura: _________________________________________________</p>
    </div>
</body>

</html>
