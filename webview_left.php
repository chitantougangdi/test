<?php

// by 请勿倒卖,已申请软著,否则追究法律责任
if (!defined("IN_ROOT")) {
	exit("Access denied");
}
?><div class="col-sm-2">
    <aside class="aside-left">
        <ul>
            <li class="<?php echo $this->module == "webview" ? "active" : "";?>">
                <a href="/index/webview">
                    <span class="iconfont icon-xiangzi font18"></span>标准封装
                </a>
            </li>
            <li class="<?php echo $this->module == "webview2" ? "active" : "";?>">
                <a href="/index/webview2">
                    <span class="iconfont icon-xiangzi font18"></span>苹果免签封装
                </a>
            </li>
            <li class="<?php echo $this->module == "webview_log" ? "active" : "";?>">
                <a href="/index/webview_log">
                    <span class="iconfont icon-xiangzi font18"></span>封装记录
                </a>
            </li>
            <div class="details-top clearfix"></div>
        </ul>
    </aside>
</div>