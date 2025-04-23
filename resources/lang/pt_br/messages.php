<?php

return [
    'cnpj_tab' => "Consulta CNPJ",
    'settings_tab' => "Configurações",
    'help_tab' => "Ajuda",

    'loading' => "Carregando...",

    'yes' => "Sim",
    'no' => "Não",

    'save' => "Salvar",
    'search' => "Buscar",
    'cnpj_search_info' => "Digite o CNPJ no formato 00.000.000/0000-00.",

    'company_created' => "Cadastrado com sucesso!",

    'bitrix_company_save' => "Cadastrar no Bitrix24",

    'btn_are_you_sure' => "Tem certeza?",
    'btn_confirm' => "Confirmar",
    'btn_cancel' => "Cancelar",

    'rf' => [
        'title' => "Empresa na Receita Federal",
        'name' => "Nome",
        'fantasy_name' => "Nome Fantasia",
        'phone' => "Telefone",
        'email' => "E-mail",
        'city' => "Cidade",
        'district' => "Bairro",
        'uf' => "Estado",
        'street' => "Logradouro",
        'additional' => "Complemento",
        'number' => "Número",
        'cep' => "CEP",

        'main_activities' => "Atividades Principais",
        'side_activities' => "Atividades Secundárias",

        'qsa' => "Quadro de Sócios e Administradores (QSA)",

        'status' => "Situação",
        'status_date' => "Data Situação",
        'status_reason' => "Motivo Situação",

        'company_size' => "Porte",
        'company_type' => "Tipo",

        'legal_nature' => "Natureza Jurídica",
        'opened_since' => "Abertura",
        'last_update' => "Última Atualização",
        'special_situation' => "Situação Especial",
        'special_situation_date' => "Data Situação Especial",
        'efr' => "Ente Federativo Responsável (EFR)",
        'share_capital' => "Capital Social",
    ],

    'bitrix' => [
        'title' => "Empresa no Bitrix24",
        'name' => "Nome",
        'responsible' => "Pessoa Responsável",

        'btn_redirect_to_crm' => "Redirecionar para o CRM",
        'btn_update' => "Atualizar no Bitrix24",
    ],

    'settings' => [
        'cnpj_field' => "Campo do CNPJ",
        'cpnj_controll'=> "Controle de duplicidade de CNPJ",
        'cpnj_controll_description' => "Ativando esta opção, será adicionado um controle dentro da entidade empresas, para não permitir que uma empresa seja criada manualmente com um CNPJ existente.",
        'main_activity_description' => "Atividade Principal (Descrição)",
        'main_activity_id' => "Atividade principal (Código)",
        'side_activity_description' => "Atividades Secundárias (Descrição)",
        'side_activity_id' => "Atividades Secundárias (Código)",
        'status_date' => "Data Situação",
        'qsa' => "Quadro de Sócios e Administradores (QSA)",
        'situation' => "Situação",
        'company_size' => "Porte",
        'opened_since' => "Abertura",
        'legal_nature' => "Natureza Jurídica",
        'fantasy_name' => "Nome Fantasia",
        'last_update' => "Última Atualização",
        'status' => "Status",
        'type' => "Tipo",
        'additional' => "Complemento",
        'efr' => "Ente Federativo Responsável (EFR)",
        'status_reason' => "Motivo Situação",
        'special_situation' => "Situação Especial",
        'special_situation_date' => "Data Situação Especial",
        'share_capital' => "Capital Social",
        'cpnj_mask' => "Salvar Cnpj com máscara?",
        'token_api' => "Token API",
        'token_api_description' => "Deixe em branco caso queira usar a API pública",

        'app_domain' => "Domain",
        'app_auth_id' => "Auth_id",

        'not_selected' => "Não selecionado",

        'save_error' => "Erro ao salvar configurações, tente novamente ou contate o suporte",
        'save_success' => "Configurações salvas",
    ],

    'validation' => [
        'text' => "texto",
        'required' => "requerido",
        'multiple' => "múltiplo",
        'date' => "data",
        'datetime' => "data/hora",
        'cnpj_required' => "CNPJ vazio!",
        'cnpj_required_1' => "Obrigatório configurar campo para o CNPJ. Acesse a aba Configurações -> Campo do CNPJ para configurar.",
        'cnpj_not_found' => "Nenhuma empresa com esse CNPJ cadastrada no Bitrix24",
        'public_api_limit_reach' => "Limite da api pública, tente em alguns instantes",
    ],

    'subscription' => [
        'subscription' => 'Assinatura',
        'new' => 'Assinar Agora',
        'renew' => 'Renovar',
        'next_payment' => 'Próximo pagamento em',
        'days' => 'dias',
        'expired' => 'Assinatura expirou, tente renovar agora!',
        'renew_now' => 'Renovar Agora',
        'desconto_ano' => 'ano 16% de desconto',
        'before_price' => 'a partir de',
        'year' => 'ano',
        'month' => 'mês',
        'back' => 'Voltar',

        'items' => [
            0 => 'Cadastro de Empresas Automatizado',
            1 => 'Evite duplicidade de Empresas',
            2 => 'Resultados rápidos',
            3 => 'Dados Atualizados',
            4 => 'Suporte ilimitado',
        ],
    ],

    'billing' => [
        'permission_denied' => 'Permissão negada. Assinatura não está ativa.',
    ],

    'help' => [
        'overview' => [
            'title' => "Visão Geral",
            'p' => [
                1 => "Encontre dados completos e precisos em questão de segundos e finalize cadastros com apenas alguns cliques (e sem
                erros!), com integração direta no Bitrix24.",
                2 => "O aplicativo Pesquisa CNPJ tem integração direta com o seu Bitrix24 e CRM, possibilitando que o cadastro dos
                seus clientes seja concluído e atualizado em apenas alguns cliques.",
                3 => "A consulta é realizada usando a <b><a href=':receita_ws' target='blank'>API Receita WS</a></b>, que possui dados completos, fiéis e atualizados de milhares de
                empresas brasileiras, cedidos pela própria Receita Federal.",
                4 => "Realize 3 pesquisas completas a cada minuto e tenha a possibilidade de expandir essa quantidade de acordo com as
                suas necessidade.",
                5 => "IMPORTANTE: A API pública da Receita WS, libera até 3 pesquisas por minuto. Para realizar mais pesquisas por minuto, você pode assinar a
                <b><a href=':receita_ws' target='blank'>API Receita WS</a></b> e informar seu token de integração no nosso aplicativo.
                Veja <b><a href=':howtoconfig'>aqui</a></b> como configurar.",
            ],
        ],
        'howtoconfig' => [
            'title' => "Como Configurar",
            'p' => [
                1 => "Para configurar seu aplicativo de Pesquisa CNPJ, você deve acessar a aba <b>Configurações</b> dentro do aplicativo.",
                2 => "Na aba <b>Configurações</b> você terá a relação dos campos retornados pelo aplicativo e para cada campo, você deve selecionar um campo do Bitrix24
                onde será salva a informação.",
                3 => "IMPORTANTE: O campo CNPJ é primordial para verificar a existência da empresa no Bitrix24.",
            ]
        ],
        'howtouse' => [
            'title' => "Como Utilizar",
            'p' => [
                1 => "Para utilizar o aplicativo, certifique-se de que já realizou a configuração dos campos, caso ainda não tenha, <b><a href=':howtoconfig'>acesse aqui</a></b>.",
                2 => "Na aba <b>Consulta CNPJ</b> você pode realizar as pesquisas de empresas a partir do CNPJ.
                Para isso informe um CNPJ e clique em <b>Buscar</b>",
                3 => "Após pesquisar o CNPJ você receberá o retorno das informações da empresa na tela do aplicativo.",
                4 => "Após receber o retorno das informações da empresa, você pode cadastrar os dados no Bitrix24.
                Para isso, basta clicar no botão <b>Cadastrar no Bitrix24</b>.",
                5 => "Caso a empresa que você pesquisou já esteja cadastrada no Bitrx24, o aplicativo retornará algumas informações da empresa no Bitrix24, como:
                <b>ID</b>, <b>Nome</b> e <b>Pessoa Responsável</b>.
                Você pode atualizar os dados da empresa, caso seja necessário. É possível também acessar a empresa cadastrada diretamente no seu Bitrix.",
            ]
        ],
        'appsubscription' => [
            'title' => "Como assinar o Pesquisa CNPJ",
            'p' => [
                1 => "Assinar o aplicativo é super simples e fácil. Você pode fazer diretamente pelo tela principal do aplicativo. No canto superior direito do aplicativo,
                você encontrará o bloco com informações sobre seu período de testes, nele você verá o botão <b>Assinar Agora</b>.",
                2 => "Ao clicar sobre o botão <b>Assinar Agora</b> será exibida a tela com os planos disponíveis para o aplicativo.
                Escolha o que mais se encaixa na sua necessidade.",
                3 => "Escolhendo seu plano, basta informar os dados solicitados e finalizar a assinatura.",
            ]
        ],
        'receitasubscription' => [
            'title' => "Como Assinar e Configurar a API paga do Receita WS",
            'p' => [
                1 => "Para assinar a API da Receita WS você deve acessar o <b><a href=':receita_ws_pricing' target='blank'>cadastro e contratação do plano</a></b> que
                melhor se encaixa na sua necessidade.",
                2 => "Após a contratação do Receita WS, acesse o <b><a href=':receita_ws_account' target='blank'>menu da API</a></b> e gere um token para a integração.",
                3 => "Clicando sobre o botão <b>Gerar token</b> abrirá a tela para informar um nome para a integração. O nome fica a seu critério.",
                4 => "Informado o nome, agora você pode clicar no botão <b>Gerar</b> e receberá o token gerado. Copie o token gerado pelo Receita WS.",
                5 => "Após gerar e copiar seu token para integração no Receita WS, você deve acessar a aba <b>Configurações</b> dentro do aplicativo Pesquisa CNPJ.",
                6 => "No final dessa aba, existe o campo para informar o seu token do Receita WS. Localize o campo e informe o token que você gerou no Receita WS.",
                7 => "Agora é só clicar em <b>Salvar</b> e está pronto, pode utilizar o Pesquisa CNPJ com sua conta do Receita WS.",
            ]
        ],
    ],
];
