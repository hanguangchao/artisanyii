# Yii 实战

<<<<<<< HEAD

## 使用Workerman


### 安装workerman

```
composer require workerman/workerman
```

### 运行
```
php yii workerman

php yii workerman/tcp-server

php yii  workerman/tcp-server start

php yii workerman/tcp-client
```
=======
* [feature_beanstalk](https://github.com/hanguangchao/artisanyii/tree/feature_beanstalk)  Yii Beanstalk队列



## Beanstalk的特性

- 优先级（priority）
- 延迟（delay）
- 持久化（persistent data）
- 预留（buried）
- 任务超时重发（time-to-run）

## Beanstalk的核心元素
- 管道（tube）
- 任务（job）

## Beanstalk的任务状态

- ready 任务就绪，随时可以被消费
- delayed 任务延迟，延迟时间到时进入ready状态
- buried 任务预留，此状态会重新进入ready
- delete 删除任务
- reserved 任务正在消费中，此状态可以进入delayed、ready、buried、delete

## PHP Beanstalk 类库`Pheanstalk`


### 安装 `pda/pheanstalk`
```
composer require pda/pheanstalk
```

### 使用队列

```php
require 'vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1','11300');

# Put Job 

pheanstalk->useTube('demo')->put("test");
print_r($pheanstalk->statsTube('demo'));

# Consumer  

$job = $pheanstalk->watch('demo')->reserve();
$data = $job->getData();
//一般任务被reserve读出后，业务处理完成时应及时进行delete操作，防止重新被放回管道
$pheanstalk->delete($job);
```

### 守护进程 supervisor


supervisor项目配置

/etc/supervisor/conf.d/consumer_beanstalk.conf

```sh
[program:consumer_beanstalk]
directory=/home/vagrant/Code/GitPro/artisanyii
command=php yii  beanstalk/index

autostart = true     ; 在 supervisord 启动的时候也自动启动
startsecs = 5        ; 启动 5 秒后没有异常退出，就当作已经正常启动了
autorestart = true   ; 程序异常退出后自动重启
startretries = 3     ; 启动失败自动重试次数，默认是 3
user = vagrant       ; 用哪个用户启动
numprocs=10          ; 启动进程数
process_name=%(program_name)s_%(process_num)02d     ;进程的名字
redirect_stderr = true  ; 把 stderr 重定向到 stdout，默认 false
stdout_logfile_maxbytes = 20MB  ; stdout 日志文件大小，默认 50MB
stdout_logfile_backups = 20     ; stdout 日志文件备份数

stdout_logfile = /tmp/resque_default_stdout.log

```


进程管理

```sh
sudo supervisorctl
update
stop consumer_beanstalk:*
start consumer_beanstalk:*
```


### 队列可视化控制台 Console

使用 beanstalk_console [https://github.com/ptrofimov/beanstalk_console](https://github.com/ptrofimov/beanstalk_console)

```
php composer create-project ptrofimov/beanstalk_console beanstalk_console

php -S localhost:8001

```

>>>>>>> feature_beanstalk
