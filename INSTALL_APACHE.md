# Guia de Instalação - API Bitrix Consulta (Apache)

## 1. Requisitos do Servidor

```bash
# Atualizar o sistema
sudo apt update
sudo apt upgrade

# Instalar Apache e módulos necessários
sudo apt install apache2
sudo a2enmod rewrite
sudo a2enmod ssl
sudo a2enmod headers
sudo a2enmod expires

# Instalar PHP e extensões necessárias
sudo apt install php7.4 php7.4-cli php7.4-common php7.4-mysql php7.4-json php7.4-curl php7.4-mbstring php7.4-xml php7.4-zip libapache2-mod-php7.4

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Instalar Node.js e NPM
curl -fsSL https://deb.nodesource.com/setup_14.x | sudo -E bash -
sudo apt install nodejs
```

## 2. Configurar SSL (usando Let's Encrypt)

```bash
# Instalar Certbot
sudo apt install certbot python3-certbot-apache

# Gerar certificado SSL
sudo certbot --apache -d seu-dominio.com
```

## 3. Configurar o Projeto

```bash
# Criar diretório do projeto
sudo mkdir -p /var/www/api-bitrix-consulta
sudo chown -R $USER:$USER /var/www/api-bitrix-consulta

# Clonar o repositório
git clone [URL_DO_REPOSITÓRIO] /var/www/api-bitrix-consulta

# Instalar dependências PHP
cd /var/www/api-bitrix-consulta
composer install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Instalar dependências Node.js e compilar assets
npm install
npm run build

# Configurar permissões
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

## 4. Configurar Apache Virtual Host

1. Criar arquivo de configuração do Virtual Host:
```bash
sudo nano /etc/apache2/sites-available/api-bitrix-consulta.conf
```

2. Adicionar a seguinte configuração:
```apache
<VirtualHost *:80>
    ServerName seu-dominio.com
    ServerAdmin webmaster@seu-dominio.com
    DocumentRoot /var/www/api-bitrix-consulta/public
    
    <Directory /var/www/api-bitrix-consulta/public>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/bitrix-error.log
    CustomLog ${APACHE_LOG_DIR}/bitrix-access.log combined
</VirtualHost>
```

3. Habilitar o site e reiniciar Apache:
```bash
sudo a2ensite api-bitrix-consulta.conf
sudo systemctl restart apache2
```

## 5. Configurar PHP

1. Ajustar configurações do PHP em `/etc/php/7.4/apache2/php.ini`:
```ini
upload_max_filesize = 64M
post_max_size = 64M
memory_limit = 256M
max_execution_time = 180
```

2. Reiniciar Apache:
```bash
sudo systemctl restart apache2
```

## 6. Configuração do Bitrix24

1. Acesse o marketplace do Bitrix24
2. Registre uma nova aplicação
3. Configure as URLs da aplicação:
   - URL da aplicação: https://seu-dominio.com
   - URL de Handler: https://seu-dominio.com/install
   - URL de eventos: https://seu-dominio.com/

## 7. Verificação Final

1. Teste o acesso à aplicação: https://seu-dominio.com
2. Verifique os logs:
```bash
tail -f /var/log/apache2/bitrix-error.log
```

## Solução de Problemas

Se encontrar problemas:

1. Verifique os logs do Apache:
```bash
tail -f /var/log/apache2/bitrix-error.log
tail -f /var/log/apache2/bitrix-access.log
```

2. Verifique as permissões:
```bash
sudo chown -R www-data:www-data /var/www/api-bitrix-consulta
sudo chmod -R 755 /var/www/api-bitrix-consulta
sudo chmod -R 775 /var/www/api-bitrix-consulta/storage
```

3. Verifique se os módulos do Apache estão ativos:
```bash
apache2ctl -M
```

4. Teste a configuração do Apache:
```bash
apache2ctl configtest
```

5. Se houver problemas com rewrite:
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
``` 