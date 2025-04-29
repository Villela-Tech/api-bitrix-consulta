<?php
clearstatcache(true);
if (function_exists('opcache_reset')) {
    opcache_reset();
}
echo "Cache limpo com sucesso!";
?> 