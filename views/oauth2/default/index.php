<?php

$this->title = 'PHP 实现 Oauth2.0 验证登录- 授权码授权(Authorization Code Grant)';
?>

<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?php
        $query = sprintf("response_type=%s&client_id=%s&state=%s&scope=%s&redirect_uri=%s", 'code', 'testclient', 'xyz', 'basic', urlencode('http://yii.han.cc/oauth2/cb'));
        ?>
        <?= \yii\helpers\Html::a('使用yii.han登录', ['/oauth2/authorize?' . $query ], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
   <div class="box-header with-border">
        授权码模式（authorization code）基本概念
    </div>
    <div class="box-body table-responsive no-padding">
        <p>
            <img src="http://www.ruanyifeng.com/blogimg/asset/2014/bg2014051204.png">
        </p>
        <pre>
 它的步骤如下：

（A）用户访问客户端，后者将前者导向认证服务器。

（B）用户选择是否给予客户端授权。

（C）假设用户给予授权，认证服务器将用户导向客户端事先指定的"重定向URI"（redirection URI），同时附上一个授权码。

（D）客户端收到授权码，附上早先的"重定向URI"，向认证服务器申请令牌。这一步是在客户端的后台的服务器上完成的，对用户不可见。

（E）认证服务器核对了授权码和重定向URI，确认无误后，向客户端发送访问令牌（access token）和更新令牌（refresh token）。

下面是上面这些步骤所需要的参数。

A步骤中，客户端申请认证的URI，包含以下参数：

response_type：表示授权类型，必选项，此处的值固定为"code"
client_id：表示客户端的ID，必选项
redirect_uri：表示重定向URI，可选项
scope：表示申请的权限范围，可选项
state：表示客户端的当前状态，可以指定任意值，认证服务器会原封不动地返回这个值。
下面是一个例子。


GET /authorize?response_type=code&client_id=s6BhdRkqt3&state=xyz
        &redirect_uri=https%3A%2F%2Fclient%2Eexample%2Ecom%2Fcb HTTP/1.1
Host: server.example.com

C步骤中，服务器回应客户端的URI，包含以下参数：

code：表示授权码，必选项。该码的有效期应该很短，通常设为10分钟，客户端只能使用该码一次，否则会被授权服务器拒绝。该码与客户端ID和重定向URI，是一一对应关系。
state：如果客户端的请求中包含这个参数，认证服务器的回应也必须一模一样包含这个参数。

        </pre>
    </div>


    
    <div class="box-header with-border">
        角色：
        Authorization Server 角色
        User Agent 角色

    </div>
    <div class="box-body table-responsive no-padding">
    </div>


    <div class="box-header with-border">
        创建server
        Authorization Server 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>



    <div class="box-header with-border">
        创建授权页面（基于浏览器）
        User Agent 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>

    <div class="box-header with-border">
        创建获取token
        Authorization Server 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>


    <div class="box-header with-border">
        授权页面
        CLIENT 客户端 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>


    <div class="box-header with-border">
        客户端获取code并请求获取access_token
        CLIENT 客户端 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>


    <div class="box-header with-border">
        刷新token
        Authorization Server 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>


    <div class="box-header with-border">
        客户端请求refresh_token
        CLIENT 客户端 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>


    <div class="box-header with-border">
        scope授权资源
        Authorization Server 角色
    </div>
    <div class="box-body table-responsive no-padding">
    </div>




</div>
