=== WPBOS ===

Contributors: laobuluo
Donate link: https://www.lezaiyun.com/donate/
Tags:WordPress对象存储,WordPress加速,WordPress百度存储,百度云对象存储
Requires at least: 5.3
Tested up to: 6.9.1
Stable tag: 3.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

WordPress同步附件内容远程至百度云对象存储中，实现网站数据与静态资源分离，提高网站加载速度。公众号：老蒋朋友圈。


## 插件特点

1. 支持自定义域名设置 可设置多级目录
2. 支持一键替换静态本地化至对象存储远程URL
3. 支持一键禁止缩略图
4. 支持自定义任意对象存储目录，一个存储桶可以多网站
5. 支持自动文件重命名
6. 支持本地和对象存储分离和同步
7. 优化重构加速上传

WPBOS百度对象存储插件发布：[https://www.lezaiyun.com/1108.html](https://www.lezaiyun.com/1108.html)

## 网站支持

* [老蒋玩主机](https://www.laojiang.me/ "老蒋玩主机")

* [主机评价网](https://www.zhujipingjia.com/ "主机评价网")

欢迎加入插件和站长交流 微信公众号：老蒋朋友圈。

== Installation ==

* 1、把插件文件夹上传到/wp-content/plugins/目录下<br />
* 2、在后台插件列表中激活插件<br />
* 3、在左侧菜单中输入百度云存储空间账户信息。<br />

== Frequently Asked Questions ==

* 1.当发现插件出错时，开启调试获取错误信息。
* 2.我们可以选择备份对象存储或者本地同时备份。
* 3.如果已有网站使用插件，插件调试没有问题之后，需要将原有本地静态资源上传到又拍云存储中，然后修改数据库原有固定静态文件链接路径。、
* 4.如果不熟悉使用这类插件的用户，一定要先备份，确保错误设置导致网站故障。

== Screenshots ==

1. screenshot-1.png

== Changelog ==

= 3.1 =
* 要求 PHP 7.4 及以上版本
* 移除图片处理功能，精简插件
* 修复 BaiduBce.phar 在 PHP 8+ 下的弃用警告
* 安全加固：ABSPATH 检查、SQL 注入防护
* 代码优化：异常处理、参数校验、性能改进

= 2.1 =
* 重新完善细节
* 调试兼容WP6.5.2版本优化

= 1.1 =
* 完整的基于其他类似插件的模块调试兼容
* 调试兼容WP5.6版本优化

= 1.0 =
* 基础功能

== Upgrade Notice ==

= 3.1 =
要求 PHP 7.4+，移除图片处理功能，推荐升级。 