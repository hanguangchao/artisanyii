var page = require('webpage').create();
var system = require('system');
var address = system.args[1];   // 截图页面地址
var output = system.args[2];    // 保存图片名
page.viewportSize = { width: 414*2, height: 736*2 }; // 页面初始高度
page.open(address, function (status) { // 打开页面
        if (status === "success") { // 加载完成
                // 通过在JS获取页面的渲染高度
                var rect = page.evaluate(function () {
                  return document.getElementsByTagName('html')[0].getBoundingClientRect();
                });
                // 按照实际页面的高度，设定渲染的宽高
                page.clipRect = {
                  top:    rect.top,
                  left:   rect.left,
                  width:  rect.width,
                  height: rect.height
                };
                // 预留一定的渲染时间
                window.setTimeout(function () {
                  page.render(output);
                  // var base64 = page.renderBase64('JPEG');
                  // console.log(base64);
                  page.close();
                  console.log('success');
                  phantom.exit();
                }, 1000);
        }
});
