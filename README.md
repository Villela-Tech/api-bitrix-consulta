# API Bitrix Consulta

API de integração com Bitrix24 desenvolvida com Lumen Framework.

## Requisitos do Sistema

- PHP ^8.1
- Composer

## Tecnologias Utilizadas

- Lumen Framework ^9.0
- Bitrix24 PHP SDK ^1.0
- JWT Auth ^2.0
- Outros pacotes de suporte (veja `composer.json` para lista completa)

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/api-bitrix-consulta.git
cd api-bitrix-consulta
```

2. Instale o Composer (caso não tenha instalado):
```bash
# Baixe o installer do Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Execute o installer
php composer-setup.php

# O Composer será instalado localmente como composer.phar
# Você pode usar: php composer.phar em vez de composer
```

3. Instale as dependências do projeto:
```bash
php composer.phar install
```

4. Configure o ambiente:
```bash
cp .env.example .env
# Edite o arquivo .env com suas configurações
```

## Configuração

1. Configure suas credenciais do Bitrix24 no arquivo `.env`
2. Configure as demais variáveis de ambiente necessárias

## Uso

A API fornece endpoints para integração com o Bitrix24. Consulte a documentação da API para mais detalhes sobre os endpoints disponíveis.

## Manutenção

Para atualizar as dependências do projeto:
```bash
php composer.phar update
```

## Suporte

Em caso de dúvidas ou problemas, abra uma issue no repositório.

## Licença

MIT License - veja o arquivo [LICENSE](LICENSE) para mais detalhes.