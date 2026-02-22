<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<link rel='stylesheet'  href='<?php echo plugin_dir_url(__FILE__); ?>layui/css/layui.css' />
<link rel='stylesheet'  href='<?php echo plugin_dir_url(__FILE__); ?>layui/css/laobuluo.css'/>
<script src='<?php echo plugin_dir_url(__FILE__); ?>layui/layui.js'></script>
<style type="text/css">
.wpbosform .layui-form-label{width:120px;}
.wpbosform .layui-input{width: 350px;}
.wpbosform .layui-form-mid{margin-left:3.5%;}
.wpbosform .layui-form-mid p{padding: 3px 0;}
.laobuluo-wp-hidden {position: relative;}
.laobuluo-wp-hidden .laobuluo-wp-eyes{padding: 5px;position:absolute;top:3px;z-index: 999;display: none;}
.laobuluo-wp-hidden i{font-size:20px;}
.laobuluo-wp-hidden i.dashicons-visibility{color:#009688 ;}
</style>
<div class="container-laobuluo-main">
    <div class="laobuluo-wbs-header" style="margin-bottom: 15px;">
        <div class="laobuluo-wbs-logo">
           <span class="wbs-span">WPBOS百度云对象存储插件</span><span class="wbs-free">Free V3.1</span>
        </div>
        <div class="laobuluo-wbs-btn">
            <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/1108.html" target="_blank">
                <i class="layui-icon layui-icon-home"></i> 插件主页
            </a>
            <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/contact/" target="_blank">
                <i class="layui-icon layui-icon-release"></i> 技术支持
            </a>
        </div>
    </div>
</div>
<!-- 内容 -->
<div class="container-laobuluo-main">
    <div class="layui-container container-m">
        <div class="layui-row layui-col-space15">
            <!-- 左边 -->
            <div class="layui-col-md9">
                <div class="laobuluo-panel">
                    <div class="laobuluo-controw">
                        <fieldset class="layui-elem-field layui-field-title site-title">
                            <legend>
                                <a name="get">
                                    设置选项
                                </a>
                            </legend>
                        </fieldset>
                        <form class="layui-form wpbosform" action="<?php echo wp_nonce_url('./admin.php?page=' . $this->base_folder . '/index.php'); ?>" name="wpbosform" method="post" >
                            <div class="layui-form-item">
                                <label class="layui-form-label">Bucket名称</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" type="text" name="bucket" value="<?php echo esc_attr($this->options['bucket']); ?>" size="50" placeholder="比如：laobuluo"/>
                                    <div class="layui-form-mid layui-word-aux">
                                        创建百度云对象存储名称，比如：
                                        <code>
                                        laobuluo
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> 所属地域</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" type="text" name="endpoint" value="<?php echo esc_attr($this->options['endpoint']); ?>" size="50"
                           placeholder="生成的地区URL"/>
                                    <div class="layui-form-mid layui-word-aux">
                                       
                                            比如上海是：
                                            <code>
                                            fsh.bcebos.com
                                            </code>                                            
                                                                               
                                    </div>
                                </div>
                            </div>
                             <div class="layui-form-item">
                                <label class="layui-form-label"> 远程地址</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" type="text" name="upload_url_path" value="<?php echo esc_url(get_option('upload_url_path')); ?>" size="50" placeholder="对象存储URL地址"/>
                                    <div class="layui-form-mid layui-word-aux">
                                       
                                            Bucket自动生成，如
                                            <code>
                                            http://laobuluo.fsh.bcebos.com
                                            </code>，也可以自定义域名，最后不要以 <code>/</code>结尾，留空。                                          
                                                                               
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> Access Key</label>
                                <div class="layui-input-block">
                                    <div class="laobuluo-wp-hidden">
                                        <input class="layui-input"  type="password" name="accessKeyId" value="<?php echo esc_attr($this->options['accessKeyId']); ?>" size="50" placeholder="Access Key"/>
                                        <span class="laobuluo-wp-eyes"><i class="dashicons dashicons-hidden"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> Secret Key</label>
                                <div class="layui-input-block">
                                    <div class="laobuluo-wp-hidden">
                                        <input class="layui-input"  type="password" name="secretAccessKey" value="<?php echo esc_attr($this->options['secretAccessKey']); ?>" size="50" placeholder="Secret Key"/>
                                        <span class="laobuluo-wp-eyes"><i class="dashicons dashicons-hidden"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> 自动重命名</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox" name="auto_rename"  title="设置"
                                     <?php
                        if (isset($this->options['opt']['auto_rename']) and $this->options['opt']['auto_rename']) {
                            echo 'checked="TRUE"';
                        }
                        ?>
                                    >
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    上传文件自动重命名，解决中文文件名或者重复文件名问题
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">不在本地保存</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox"  name="no_local_file"  title="设置"
                                    <?php
                            if ($this->options['no_local_file']) {
                                echo 'checked="TRUE"';
                            }
                        ?>
                                    >
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    如不想在服务器中备份静态文件就 "勾选"。
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">禁止缩略图</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox"  name="disable_thumb" title="禁止"
                                     <?php
                        if (isset($this->options['opt']['thumbsize'])) {
                            echo 'checked="TRUE"';
                        }
                        ?>
                                    >
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    仅生成和上传主图，禁止缩略图裁剪。
                                </div>
                            </div>
                     </div>
                     <div class="layui-form-item">
                          <label class="layui-form-label"></label>
                          <div class="layui-input-block"><input type="submit" name="submit" value="保存设置" class=" layui-btn" lay-submit lay-filter="formDemo" /></div>
                     </div>
                      <input type="hidden" name="type" value="info_set">
                    </form>
                    <fieldset class="layui-elem-field layui-field-title site-title">
                        <legend><a name="get">一键替换百度云存储地址</a></legend>
                    </fieldset>
                     <blockquote class="layui-elem-quote">
                        <p>1. 网站本地已有静态文件，需要在测试兼容插件之后，将本地文件对应目录上传到对象存储目录中。</p>
                        <p>2. 初次使用对象存储插件，可以通过下面按钮一键快速替换网站内容中的原有图片地址更换为百度云存储地址</p>
                        <p>3. 如果是从其他对象存储或者外部存储替换的，可用 <a href="https://www.lezaiyun.com/wpreplace.html" target="_blank">WPReplace</a> 插件替换。</p>
                        <p>4. 建议不熟悉的朋友先备份网站和数据。</p>
                    </blockquote>
                    <form class="layui-form wpcosform" action="<?php echo wp_nonce_url('./admin.php?page=' . $this->base_folder . '/index.php'); ?>" name="wpbosform2" method="post">
                          <div class="layui-form-item">
                               <label class="layui-form-label">一键替换</label>
                               <div class="layui-input-block">
                                    <input type="hidden" name="type" value="info_replace">
                                    <?php if(isset($this->options['opt']) && array_key_exists('legacy_data_replace', $this->options['opt']) && $this->options['opt']['legacy_data_replace'] == 1) {
                        echo '<input type="submit" disabled name="submit" value="已替换" class="button" />';
                    } else {
                        echo '<input type="submit" name="submit" value="一键替换地址" class="button" />';
                    }
                    ?>
                               </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- 左边 -->
        <!-- 右边 -->
        <div class="layui-col-md3">
            <div id="nav">
                <div class="laobuluo-panel">
                            <div class="laobuluo-panel-title">站长必备资源</div>
                            <div class="laobuluo-shangjia">
                                <a href="https://www.lezaiyun.com/webmaster-tools.html" target="_blank" title="站长必备资源">
                                    <img src="<?php echo plugin_dir_url( __FILE__ );?>layui/images/cloud.jpg"></a>
                                    <p>站长必备的商家、工具资源整理！</p>
                            </div>
                        </div>
                <div class="laobuluo-panel">
                    <div class="laobuluo-panel-title">
                        关注公众号
                    </div>
                    <div class="laobuluo-code">
                        <img src="<?php echo plugin_dir_url(__FILE__); ?>layui/images/qrcode.png">
                        <p>
                            微信扫码关注 <span class="layui-badge layui-bg-blue">老蒋朋友圈</span> 公众号
                        </p>
                        <p>
                            <span class="layui-badge">优先</span> 获取插件更新 和 更多 <span class="layui-badge layui-bg-green">免费插件</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 右边 -->
    </div>
</div>
</div>
<!-- 内容 -->
<!-- footer -->
<div class="container-laobuluo-main">
    <div class="layui-container container-m">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="laobuluo-footer-code">
                    <span class="codeshow"></span>
                </div>
                <div class="laobuluo-links">
                    <a href="https://www.lezaiyun.com/"  target="_blank">乐在云工作室</a>
                    <a href="https://www.zhujipingjia.com/pianyivps.html" target="_blank">便宜VPS推荐</a>
                    <a href="https://www.zhujipingjia.com/hkcn2.html" target="_blank">香港VPS推荐</a>
                    <a href="hhttps://www.zhujipingjia.com/uscn2gia.html" target="_blank">美国VPS推荐</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<script>
layui.use(['form', 'element','jquery'], function() {
var $ =layui.jquery;
var form = layui.form;
function menuFixed(id) {
var obj = document.getElementById(id);
var _getHeight = obj.offsetTop;
var _Width= obj.offsetWidth
window.onscroll = function () {
changePos(id, _getHeight,_Width);
}
}
function changePos(id, height,width) {
var obj = document.getElementById(id);
obj.style.width = width+'px';
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
var _top = scrollTop-height;
if (_top < 150) {
var o = _top;
obj.style.position = 'relative';
o = o > 0 ? o : 0;
obj.style.top = o +'px';

} else {
obj.style.position = 'fixed';
obj.style.top = 50+'px';

}
}
menuFixed('nav');

var laobueys = $('.laobuluo-wp-hidden')

laobueys.each(function(){

var inpu = $(this).find('.layui-input');
var eyes = $(this).find('.laobuluo-wp-eyes')
var width = inpu.outerWidth(true);
eyes.css('left',width+'px').show();

eyes.click(function(){
if(inpu.attr('type') == "password"){
inpu.attr('type','text')
eyes.html('<i class="dashicons dashicons-visibility"></i>')
}else{
inpu.attr('type','password')
eyes.html('<i class="dashicons dashicons-hidden"></i>')
}
})
})

})
</script>


