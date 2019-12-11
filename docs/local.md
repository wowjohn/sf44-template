* 基础环境
    * symfony 4.4
    * php 7.2 +
    * node

复制 .env.dist内容至新文件 .env.local 中，修改对应配置项（数据库，Redis）

* 本地运行
```bash
php bin/console server:run 0.0.0.0:8005
```

* Docker 运行
```bash
cp docker-compose.yml 至根目录
```
```bash
运行 docker-compose up -d 
```

* 查看项目信息
```bash
php bin/console about
```