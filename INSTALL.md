# Guia de Instalação - API Bitrix Consulta

## 1. Requisitos do Servidor

```bash
# Instalar Nginx
sudo apt update
sudo apt install nginx

# Instalar PHP e extensões necessárias
sudo apt install php7.4-fpm php7.4-cli php7.4-mysql php7.4-json php7.4-curl php7.4-mbstring php7.4-xml php7.4-zip

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
sudo apt install certbot python3-certbot-nginx

# Gerar certificado SSL
sudo certbot --nginx -d seu-dominio.com
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
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage
```

## 4. Configurar Nginx

1. Copie o arquivo `nginx.conf` para o diretório de sites do Nginx:
```bash
sudo cp nginx.conf /etc/nginx/sites-available/api-bitrix-consulta
```

2. Crie um link simbólico:
```bash
sudo ln -s /etc/nginx/sites-available/api-bitrix-consulta /etc/nginx/sites-enabled/
```

3. Teste a configuração:
```bash
sudo nginx -t
```

4. Reinicie o Nginx:
```bash
sudo systemctl restart nginx
```

## 5. Configurar PHP-FPM

1. Ajuste as configurações do PHP-FPM em `/etc/php/7.4/fpm/php.ini`:
```ini
upload_max_filesize = 64M
post_max_size = 64M
memory_limit = 256M
max_execution_time = 180
```

2. Reinicie o PHP-FPM:
```bash
sudo systemctl restart php7.4-fpm
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
   tail -f /var/log/nginx/bitrix-app-error.log
   ```

## Solução de Problemas

Se encontrar problemas:

1. Verifique os logs do Nginx:
```bash
tail -f /var/log/nginx/bitrix-app-error.log
```

2. Verifique os logs do PHP-FPM:
```bash
tail -f /var/log/php7.4-fpm.log
```

3. Verifique as permissões:
```bash
sudo chown -R www-data:www-data /var/www/api-bitrix-consulta
sudo chmod -R 755 /var/www/api-bitrix-consulta
sudo chmod -R 775 /var/www/api-bitrix-consulta/storage
``` 