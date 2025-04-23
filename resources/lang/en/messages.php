<?php

return [
    'cnpj_tab' => "Search CNPJ",
    'settings_tab' => "Settings",
    'help_tab' => "Help",

    'loading' => "Loading...",

    'yes' => "Yes",
    'no' => "No",

    'save' => "Save",
    'search' => "Search",
    'cnpj_search_info' => "Type your CNJP in this type 00.000.000/0000-00.",

    'company_created' => "Registered successfully!",

    'bitrix_company_save' => "Register on Bitrix24",

    'btn_are_you_sure' => "Are you sure?",
    'btn_confirm' => "Confirm",
    'btn_cancel' => "Cancel",

    'rf' => [
        'title' => "Company in the IRS",
        'name' => "Name",
        'fantasy_name' => "Fantasy Name",
        'phone' => "Phone",
        'email' => "E-mail",
        'city' => "City",
        'district' => "District",
        'uf' => "UF",
        'street' => "Street",
        'additional' => "Additional",
        'number' => "Number",
        'cep' => "CEP",

        'main_activities' => "Main Activities",
        'side_activities' => "Side Activities",

        'qsa' => "Membership and Administrators (MSA)",

        'status' => "Status",
        'status_date' => "Status Date",
        'status_reason' => "Status Reason",

        'company_size' => "Company Size",
        'company_type' => "Company Type",

        'legal_nature' => "Legal Nature",
        'opened_since' => "Opened Since",
        'last_update' => "Last Update",
        'special_situation' => "Special Situation",
        'special_situation_date' => "Special Situation Date",
        'efr' => "Responsible Federative Entity (RFE)",
        'share_capital' => "Share Capital",
    ],

    'bitrix' => [
        'title' => "Company on Bitrix24",
        'name' => "Name",
        'responsible' => "Responsible",

        'btn_redirect_to_crm' => "Redirect to CRM",
        'btn_update' => "Update on Bitrix24",
    ],

    'settings' => [
        'cnpj_field' => "Field of CNPJ",
        'cpnj_controll'=> "CNPJ duplication control",
        'cpnj_controll_description' => "By activating this option, a control will be added within the companies entity, to not allow a company to be created manually with an existing CNPJ.",
        'main_activity_description' => "Main Activities (Description)",
        'main_activity_id' => "Main Activity (ID)",
        'side_activity_description' => "Side Activities (Description)",
        'side_activity_id' => "Side Activities (ID)",
        'status_date' => "Status Date",
        'qsa' => "Membership and Administrators (MSA)",
        'situation' => "Situation",
        'company_size' => "Company Size",
        'opened_since' => "Opened Since",
        'legal_nature' => "Legal Nature",
        'fantasy_name' => "Fantasy Name",
        'last_update' => "Last Update",
        'status' => "Status",
        'type' => "Type",
        'additional' => "Additional",
        'efr' => "Responsible Federative Entity (RFE)",
        'status_reason' => "Status Reason",
        'special_situation' => "Special Situation",
        'special_situation_date' => "Special Situation Date",
        'share_capital' => "Share Capital",
        'cpnj_mask' => "Save Cnpj with mask?",
        'token_api' => "Token API",
        'token_api_description' => "Leave it blank if you want to use the public API",

        'app_domain' => "Domain",
        'app_auth_id' => "Auth_id",

        'not_selected' => "Not Selected",

        'save_error' => "Error saving settings, try again or contact support",
        'save_success' => "Save Success",
    ],

    'validation' => [
        'text' => "text",
        'required' => "required",
        'multiple' => "multiple",
        'date' => "date",
        'datetime' => "datetime",
        'cnpj_required' => "CNPJ void!",
        'cnpj_required_1' => "Mandatory to set field for CNPJ. Go to Settings -> CNPJ Field to configure.",
        'cnpj_not_found' => "No company with this CNPJ registered with Bitrix24",
        'public_api_limit_reach' => "Public api limit, try in a few moments",
    ],

    'subscription' => [
        'subscription' => 'Subscription',
        'new' => 'Subscribe Now',
        'renew' => 'Renewal',
        'next_payment' => 'Next payment in',
        'days' => 'days',
        'expired' => 'Subscription has expired, try renewing now!',
        'renew_now' => 'Renewal now',
        'desconto_ano' => 'annual with 16% discount',
        'before_price' => 'from',
        'year' => 'year',
        'month' => 'month',
        'back' => 'Back',

        'items' => [
            0 => 'Automated company registration',
            1 => 'Avoid duplication of companies',
            2 => 'Quick results',
            3 => 'Updated Data',
            4 => 'Unlimited support',
        ],
    ],

    'billing' => [
        'permission_denied' => 'Permission denied. Subscription is not active.',
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
