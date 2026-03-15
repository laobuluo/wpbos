# WPBOS 百度对象存储插件

WordPress 同步附件至百度云对象存储（BOS），实现站点数据与静态资源分离，提升加载速度。

## 环境要求

- **WordPress** 5.3+
- **PHP** 7.4+
- 百度云 BOS 存储桶及 Access Key

## 功能特性

- 支持自定义域名与多级目录
- 一键替换本地静态资源为对象存储地址
- 一键禁止缩略图
- 支持自定义对象存储目录，一个存储桶可服务多站点
- 支持自动文件重命名
- 支持本地与对象存储分离或同步
- 上传性能优化

## 安装

1. 将插件目录上传到 `/wp-content/plugins/`
2. 在 WordPress 后台 → 插件，启用「WPBOS百度对象存储插件」
3. 在 设置 → BOS对象存储设置 中配置 Bucket、Access Key、Secret Key 等信息

## 配置说明

| 配置项 | 说明 |
|--------|------|
| Bucket名称 | 百度云 BOS 存储桶名称 |
| 所属地域 | 如 `fsh.bcebos.com`（上海） |
| 远程地址 | 对象存储访问 URL，如 `https://bucket.fsh.bcebos.com` |
| 自动重命名 | 上传时自动重命名，避免中文或重复文件名问题 |
| 不在本地保存 | 上传后删除本地文件，仅保留对象存储副本 |
| 禁止缩略图 | 仅上传主图，不生成缩略图 |

## 更新日志

### 3.1 (2025-02)

- 要求 PHP 7.4 及以上版本
- 移除图片处理功能，精简插件
- 修复 BaiduBce.phar 在 PHP 8+ 下的弃用警告
- 安全加固：ABSPATH 检查、SQL 注入防护
- 代码优化：异常处理、参数校验、性能改进

### 2.1

- 完善细节，兼容 WordPress 6.5.2

### 1.1

- 模块调试与兼容优化，兼容 WordPress 5.6

### 1.0

- 初始版本

## 常见问题

1. **上传失败**：检查 Access Key、Secret Key、Bucket 名称和地域是否正确
2. **图片不显示**：确认「远程地址」填写正确，且存储桶为公开读或已配置 CDN
3. **替换地址**：使用「一键替换」前请先备份数据库

## 插件团队和技术支持

[老蒋](https://www.laojiang.me/)（老蒋和他的伙伴们），本着资源共享原则，在运营网站过程中用到的或者是有需要用到的主题、插件资源，有选择的免费分享给广大的网友站长，希望能够帮助到你建站过程中提高效率。

感谢团队成员，以及网友提出的优化工具的建议，才有后续产品的不断迭代适合且满足用户需要。不能确保100%的符合兼容网站，我们也仅能做到在工作之余不断的接近和满足你的需要。

| 类目            | 信息                                                         |
| --------------- | ------------------------------------------------------------ |
| 插件更新地址    | https://www.laojiang.me/7168.html                            |
| 团队成员        | [老蒋](https://www.laojiang.me/)、老赵、[CNJOEL](https://www.rakvps.com/)、木村 |
| 支持网站        | [乐在云](https://www.lezaiyun.com/)、主机评价网              |
| 建站资源推荐    | [便宜VPS推荐](https://www.zhujipingjia.com/pianyivps.html)、[美国VPS推荐](https://www.zhujipingjia.com/uscn2gia.html)、[外贸建站主机](https://www.zhujipingjia.com/wordpress-hosting.html)、[SSL证书推荐](https://www.zhujipingjia.com/two-ssls.html)、[WordPress主机推荐](https://www.zhujipingjia.com/wpblog-host.html) |
| 提交WP官网（F） |                                                              |

![](wechat.png)

## 许可证

GPLv2 or later
