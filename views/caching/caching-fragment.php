<?php
//id(片段缓存也需要全局唯一的 $id 标记)
$id = 'post_content';

//选项

//依赖(dependency) 
$dependency = [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM post',
];

//过期时间（duration）
$duration = 5;

//开关(enabled)

if ($this->beginCache($id, [
    'dependency' => $dependency,
    'enabled' => 1 == Yii::$app->request->get('enabled', 0),
    ], 
    $duration)) {

    // ... 在此生成内容 ...
    showContent();

    // 动态内容
    //动态内容的意思是这部分输出的内容不该被缓存，即便是它被包裹在片段缓存中。 为了使内容保持动态，每次请求都执行 PHP 代码生成， 即使这些代码已经被缓存了。
    echo $this->renderDynamic('return Yii::$app->user->identity->username;');

    $this->endCache();
}

function showContent()
{
    echo time();
    echo __METHOD__;
}

?>


