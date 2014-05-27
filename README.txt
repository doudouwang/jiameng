Documentation
--------------
版本库 WEB 地址： http://122.49.11.17:7001/   weizhiliang:klnqb

Sphinx
------

生成索引:
/usr/local/coreseek/bin/indexer --all --rotate

启动 sphinx  （默认端口 9312）：
/usr/local/coreseek/bin/searchd    

Sphinx 配置文件：
/usr/local/coreseek/etc/csft.conf

索引文件保存位置：
/usr/local/coreseek/var/data/test1

词库所在目录：
/usr/local/mmseg3/etc

APACHE
------
重写规则：

<Directory "x:/wwwroot/jm/public_html">
	AddDefaultCharset UTF-8
	RewriteEngine On
	RewriteBase /
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(c|k|i)(.*)$ list.php?/$1$2 [L]
	RewriteRule ^project/(\d+)\.html$   project.php?id=$1  [L]
	RewriteRule ^all/$   list.php  [L]
</Directory>

NGINX
-----
配置文件

server
{
        listen       7000;
        server_name  jm.com jiameng.com www.jm.com www.jiameng.com;
        index index.html index.htm index.php;
        root  /home/www/jm/public_html;

	# 重写规则
        if (!-e $request_filename) {
                rewrite  ^/(c|k|i)(.*)$  /list.php?/$1$2 last;
                rewrite  ^/project/(\d+)\.html$  /project.php?id=$1 last;
                rewrite  ^/all/$  /list.php last;
                break;
	}

        location ~ .*\.(php|php5)?$
        {
                fastcgi_param ENVIRONMENT testing;
                fastcgi_pass  127.0.0.1:9000;
                fastcgi_index index.php;
                include fcgi.conf;
        }
}


TODO
-----
修改页面图片，脚本，CSS 链接为绝对路径
投资额度 格式化 
首页中部行业分类和品牌推荐
