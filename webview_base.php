<?php
namespace app\index;

class webview_base extends BaseUser
{
	public $configData = [];
	function initialize()
	{
		parent::initialize();
		$this->configData = $this->__config();
	}
	function __config()
	{
		$this->configData["name"] = "";
		$this->configData["url"] = "";
		$this->configData["appVersion"] = "1.0.0";
		$this->configData["packageName"] = "";
		$this->configData["isLoadRealAddressByUrl"] = false;
		$this->configData["supportActionBar"] = false;
		$this->configData["actionBarColor"] = "#3289c7";
		$this->configData["titleColor"] = "#ffffff";
		$this->configData["clearCookie"] = false;
		$this->configData["supportSplash"] = false;
		$this->configData["supportNavigator"] = false;
		$this->configData["hideNavigatorWhenLandscape"] = false;
		$this->configData["supportRightSlideGoBack"] = false;
		$this->configData["supportPullToRefresh"] = false;
		$this->configData["supportForwardBackGesture"] = false;
		$this->configData["supportLongPressSavePicture"] = false;
		$this->configData["supportFullScreen"] = false;
		$this->configData["supportQRCodeScan"] = false;
		$this->configData["screenOrientation"] = 0;
		$this->configData["supportScheme"] = false;
		$this->configData["exitMode"] = 0;
		$this->configData["guide"] = 0;
		$this->configData["isSupportZoom"] = false;
		$this->configData["webViewType"] = 0;
		$this->configData["isSupportShare"] = false;
		$this->configData["isSupportLongPressCopy"] = false;
		$this->configData["isSupportConfigureStatueBarColor"] = 1;
		$this->configData["statusBarColor"] = "#d9d9d9";
		$this->configData["statusBarTextColorMode"] = 0;
		$this->configData["appId"] = 2100 + 3.21718071637047E+17;
		$this->configData["secureId"] = 2100 + 3.21718071637047E+17;
		$this->configData["secureUrl"] = "http://kltdo.888/valid/pack/321718071637049344.json";
		$this->configData["secureMsg"] = "error";
		$this->configData["isSupportSplashTime"] = boolval(SafeRequest("isSupportSplashTime"));
		$this->configData["qqAppId"] = SafeRequest("qqAppId") ?: "";
		$this->configData["isSupportShowSplashSkipButton"] = boolval(SafeRequest("isSupportShowSplashSkipButton"));
		$this->configData["supportDownloadFile"] = boolval(SafeRequest("supportDownloadFile"));
		$this->configData["supportUpgradeTip"] = boolval(SafeRequest("supportUpgradeTip"));
		$this->configData["supportWebPageZoom"] = boolval(SafeRequest("supportWebPageZoom"));
		$this->configData["supportPhoneBook"] = boolval(SafeRequest("supportPhoneBook"));
		$this->configData["supportAdBlock"] = boolval(SafeRequest("supportAdBlock"));
		$this->configData["supportGuideEnterMainPageButton"] = boolval(SafeRequest("supportGuideEnterMainPageButton"));
		$this->configData["guideEnterMainPageButtonColor"] = SafeRequest("guideEnterMainPageButtonColor") ?: "#ffffff";
		return $this->configData;
	}
	function createAction($arr = [], $type = '')
	{
		$_var_0 = [];
		if ($type == "menu") {
			foreach ($arr as $_var_1) {
				if ($_var_1["action"] == "link_app") {
					$_var_2 = $_var_1["url"];
				} elseif ($_var_1["action"] == "link_url") {
					$_var_2 = "@systemBrowser|" . $_var_1["url"];
				} else {
					$_var_2 = "@" . $_var_1["action"];
				}
				$_var_0[] = ["icon" => "menu" . $_var_1["icon"], "text" => $_var_1["text"], "action" => $_var_2];
			}
		} else {
			$_var_3 = ["back" => [4, "返回", "back"], "scan" => [61, "扫一扫", "scan"], "refresh" => [15, "刷新", "refresh"], "exit" => [68, "退出", "exit"], "share" => [58, "分享", "share|system"], "sideBar" => [71, "侧边", "sideBar"]];
			foreach ($arr as $_var_1) {
				$_var_0[] = ["icon" => "menu" . $_var_3[$_var_1][0], "text" => $_var_3[$_var_1][1], "action" => "@" . $_var_3[$_var_1][2]];
			}
		}
		return $_var_0;
	}
}