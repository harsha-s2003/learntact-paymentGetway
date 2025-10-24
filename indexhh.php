server { listen 80; listen [::]:80; listen 443 quic; listen 443 ssl; listen [::]:443 quic; listen [::]:443 ssl; http2
on; http3 off; {{ssl_certificate_key}} {{ssl_certificate}} server_name learntact.in; return 301
https://www.learntact.in$request_uri; } server { listen 80; listen [::]:80; listen 443 quic; listen 443 ssl; listen
[::]:443 quic; listen [::]:443 ssl; http2 on; http3 off; {{ssl_certificate_key}} {{ssl_certificate}} server_name
www.learntact.in www1.learntact.in; {{root}} {{nginx_access_log}} {{nginx_error_log}} if ($scheme != "https") { rewrite
^ https://$host$request_uri permanent; } location ~ /.well-known { auth_basic off; allow all; } {{settings}} location /
{ {{varnish_proxy_pass}} proxy_set_header Host $host; proxy_set_header X-Forwarded-Host $host; proxy_set_header
X-Real-IP $remote_addr; proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for; proxy_hide_header X-Varnish;
proxy_redirect off; proxy_max_temp_file_size 0; proxy_connect_timeout 720; proxy_send_timeout 720; proxy_read_timeout
720; proxy_buffer_size 128k; proxy_buffers 4 256k; proxy_busy_buffers_size 256k; proxy_temp_file_write_size 256k; }
location ~* ^.+\.(css|js|jpg|jpeg|gif|png|ico|gz|svg|svgz|ttf|otf|woff|woff2|eot|mp4|ogg|ogv|webm|webp|zip|swf|map)$ {
add_header alt-svc 'h3=":443"; ma=86400'; set $cors_origin ""; if ($http_origin =
"https://www.learntact.in/getProgramData") { set $cors_origin $http_origin; } if ($http_origin = "https://learntact.in")
{ set $cors_origin $http_origin; } add_header 'Access-Control-Allow-Origin' "$cors_origin" always; add_header
'Access-Control-Allow-Methods' 'GET, POST, OPTIONS, PUT, DELETE' always; add_header 'Access-Control-Allow-Headers'
'Content-Type, Authorization, X-Requested-With' always; expires max; access_log off; } if (-f $request_filename) {
break; } } server { listen 8080; listen [::]:8080; server_name www.learntact.in www1.learntact.in; {{root}} include
/etc/nginx/global_settings; try_files $uri $uri/ /index.php?$args; index index.php index.html; location ~ \.php$ {
include fastcgi_params; fastcgi_intercept_errors on; fastcgi_index index.php; fastcgi_param SCRIPT_FILENAME
$document_root$fastcgi_script_name; try_files $uri =404; fastcgi_read_timeout 3600; fastcgi_send_timeout 3600;
fastcgi_param HTTPS "on"; fastcgi_pass 127.0.0.1:{{php_fpm_port}}; fastcgi_param PHP_VALUE "{{php_settings}}"; } if (-f
$request_filename) { break; } }