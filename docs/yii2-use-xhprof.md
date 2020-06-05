### 在Yii2框架，如何优雅的配置Xhprof

#### 首先把下载xhprof

####

#### 
```php
'on beforeRequest' => function ($event) {
        if (extension_loaded('xhprof') && YII_ENV_DEV && YII_DEBUG) {
            xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
        }
    },
    'on beforeAction' => function ($event) {
        //
    },
    'on afterAction' => function ($event) {
        $response = Yii::$app->response;
        $response->getHeaders()->set('x-request-id', sprintf("%s:%s:%s", gethostname(), getmypid(), time()));
    },
    'on afterRequest' => function ($event) {
        if (extension_loaded('xhprof') && YII_ENV_DEV && YII_DEBUG) {
            
            $data = xhprof_disable();   //返回运行数据

            // xhprof_lib在下载的包里存在这个目录,记得将目录包含到运行的php代码中
            include_once dirname(__FILE__) . "/../web/xhprof-0.9.0/xhprof_lib/utils/xhprof_lib.php";  
            include_once dirname(__FILE__) . "/../web/xhprof-0.9.0/xhprof_lib/utils/xhprof_runs.php";  
             
            $objXhprofRun = new XHProfRuns_Default(); 

            // 第一个参数j是xhprof_disable()函数返回的运行信息
            // 第二个参数是自定义的命名空间字符串(任意字符串),
            // 返回运行ID,用这个ID查看相关的运行结果
            $run_id = $objXhprofRun->save_run($data, "xhprof_foo");

            // 设置一个Pragma 头. 任何已存在的Pragma 头都会被丢弃
            Yii::$app->response->headers->set('xhprof_view', '/xhprof-0.9.0/xhprof_html/index.php?run='. $run_id . '&source=xhprof_foo');
        }
    },
```