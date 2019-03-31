moqian-admin基础权限后台管理系统
===============
该后台管理系统是一套基于Laravel(>=5.4)框架开发的系统，其主要特点包括：
- [x] 集成 Composer，快速安装。
- [x] 用户管理可以配置自己的权限。
- [x] 角色管理可以配置用户及权限。
- [x] 权限控制可以精确到某一个请求的控制。
- [x] 操作日志查看。

> moqian-admin的运行环境要求：PHP5.4+;Laravel框架要求为5.4+;Mysql版本5.5+。

## 导航
  * [安装步骤](#安装步骤)
  	- [1.获取代码](#1获取代码)
  	- [2.安装依赖](#2安装依赖)
  	- [3.生成APP_KEY](#3生成APP_KEY)
  	- [4.修改`env`配置](#4修改-env-配置)
  	- [5.数据库迁移](#5数据库迁移)
  	- [6.访问首页](#6访问首页)
## 安装步骤
#### 1.获取代码
    git init  
    git clone https://github.com/zhaoxuejie/moqian-admin.git
#### 2.安装依赖
    composer install  
#### 3.生成APP_KEY
    cp .env.example .env
    php artisan key:generate  
#### 4.修改 `.env` 配置
    DB_CONNECTION=mysql
    DB_HOST=your_host
    DB_PORT=your_port
    DB_DATABASE=your_db
    DB_USERNAME=your_username
    DB_PASSWORD=your_pwd
    CACHE_DRIVER=array  //将file改为array
#### 5.数据库迁移
    php artisan migrate
    composer dump-autoload
    php artisan db:seed
#### 6.访问首页
访问自己的配置好的域名  
用户名：admin  
密码：f123456

## 效果预览