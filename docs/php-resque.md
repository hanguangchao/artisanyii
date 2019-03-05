### 为什么使用php-resque?

php-resque 是轻量级后台任务系统，基于Redis，功能设计简单，配置灵活。相比MQ系统大而全的MQ系统，这个显得小而美。

### php-resque 角色划分

- Job    定义任务，是负责具体的业务逻辑。
- Queue  队列，负责Job存/取
- Worker 从Queue中取Job来执行。 一般为`PHP CLI`模式下，后台守护方式运行。


##  使用 

### install 

- 如果下载慢， 可以配置 composer 国内镜像

```
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```

- 安装php-resque

旧版
```
composer require  "chrisboulton/php-resque 1.2"
```

更新为新的扩展包：`resque/php-resque`

> Composer:This package is abandoned and no longer maintained. The author suggests using the resque/php-resque package instead.

```
composer require resque/php-resque
```

### 编写Job

DemoJob.php
```php
<?php
class DemoJob
{
    public function perform()
    {
        // Work work work
        //echo $this->args['name'];
    }
}
```

### 入队列操作

```php
<?php

Resque::setBackend('localhost:6379');
$args = array(
      'name' => 'hanmeimei',
    );
Resque::enqueue('default', DemoJob::class, $args);
```

### Worker代码

resque-worker.php
```php
<?php
$redis_dsn = '127.0.0.1:6379';
putenv("REDIS_BACKEND=$redis_dsn");
// 引入队列的入口程序
$resque = realpath(dirname(__FILE__) . '/vendor/chrisboulton/php-resque/resque.php');
require_once $resque;
```

### 启动worker

`php-resque` 的环境变量有：

- `QUEUE` – 这个是必要的，会决定 worker 要执行什么任务，重要的在前，例如 QUEUE=notify,mail,log 。也可以设定為 QUEUE=* 表示执行所有任务。

- `APP_INCLUDE` – 可选，加载文件用的。可以设成 APP_INCLUDE=require.php ，在 require.php 中引入所有 Job 的 Class即可。

- `COUNT` – 设定 worker 数量，预设是1 COUNT=5 。

- `REDIS_BACKEND` – 设定 Redis 的 ip, port。如果没设定，预设是连 localhost:6379 。

- `LOGGING`, VERBOSE – 设定 log， VERBOSE=1 即可。

- `VVERBOSE` – 比较详细的 log， VVERBOSE=1 debug 的时候可以开出来看。

- `INTERVAL` – worker 检查 queue 的间隔，预设是五秒 INTERVAL=5 。

- `PIDFILE` – 如果你是开单 worker，可以指定 PIDFILE 把 pid 写入，例如 PIDFILE=/var/run/resque.pid 。

- `BACKGROUND` 可以把 resque 丢到背景执行。或者使用 `php resque.php & `就可以了。

示例

```
QUEUE=counter php resque-worker.php
```

> 至此，php-resque的安装和使用已经完毕。 
> 
> 后面的章节是工具插件， 仅供参考。

---- 


# 界面 `resque-web`
监控 PHP-Resque 的运行状况

安装

```
gem install resque-web -v 0.0.8

```

运行

```
resque-web -p 40000
```


# 监控  `supervisor`

启动服务

```
/usr/bin/python /usr/bin/supervisord -c /etc/supervisor/supervisord.conf

```

监控项目配置
/etc/supervisor/conf.d/lumen_resque.conf
```
[program:worker_lumen_resque]
directory=/home/wwwroot/mysite
command=php resque-worker.php
environment=QUEUE='default'
```

优点：
- 可以配置 程序异常退出后自动重启
- 制定程序运行用户
- 可以设置进程数
- 自动重启
- supervisord启动后，自动启动脚本
- 分组管理
