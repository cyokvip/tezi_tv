<?php
require_once('config.php');
?>
﻿<?
//Video/Audio/Photo/All
$STR_Title = "媒体服务器";
$STR_Video_title = "视频";   //new
$STR_Audio_title = "音乐";		//new
$STR_Photo_title = "图片";			//new
$STR_All_title = "全部";							//new
$STR_Logout = "注销";
$STR_Setup = "系统设置";
$STR_Home = "首页";
$STR_Video = "视频";
$STR_Audio = "音频";
$STR_Photo = "图片";
$STR_All = "全部";
$STR_Mylist = "我的列表";
$STR_Upload = "上传";
$STR_Filemanager = "文件管理器";
$STR_NewFolder = "新建文件夹";
$STR_Rename = "重命名";
$STR_CopyMove = "复制/移动";
$STR_Delete = "删除";
$STR_ParentDirectory = "上级目录";
$STR_HDDUsed = "已使用";
$STR_HDDFree = "剩余";
$STR_HDDTotal = "总共";

//Setup
$STR_LoginOption = "启用账号来登录系统：";
$STR_Apply = "应用";
$STR_Save = "保存";
$STR_Username = "用户名";
$STR_Password = "密码";
$STR_ConfirmPassword = "确认密码：";
$STR_Submit = "提交 ";
$STR_PortNo = "Web控制台 端口：";
$STR_FTPServer = "FTP 服务：";
$STR_FTPPortNo = "FTP 端口：";
$STR_FTPStarted = "FTP 服务已启动。";
$STR_FTPStopped = "FTP 服务已停止。";
$STR_DDNS = "动态域名：";
$STR_LiveKey = "直播关键字：";
$STR_Make = "生成";
$STR_LCD = "LCD 版本";
$STR_Upgrade = "升级";
$STR_NewVersion1 = "新版本， ver "; //New Version, ver 3 Available.
$STR_NewVersion2 = " 可用";
$STR_LatestVer = "已是最新版本";
$STR_UpgradeConfirm = "LCD 功能升级完成后，系统将重启。";
$STR_UpgradeConfirm1 = "您确认要继续吗？";
$STR_SpecifyPort = "请检查端口号";
$STR_PortRange = "端口范围是 81 ~ 90 以及 7000 ~ 9999。注意80端口会与默认的httpd服务冲突，且某些地方电信封杀了此端口造成无法远程登录，所以请勿使用80端口。";
$STR_PortChangeConfirm = "如果您更改了HTTP端口，播放器将会重启！";
$STR_PortChangeConfirm1 = "您要继续处理吗？";
$STR_SpecifyFTPPort = "请确认FTP端口。";
$STR_FTPPortRange = "FTP 端口是 21 或者 2000 ~ 6000.";
$STR_FTPPortChangeConfirm = "您要更改FTP端口吗？";
$STR_FTPPortChangeSuccess = "FTP 端口成功修改！";
$STR_SpecifyDDNS = "请检查动态域名！";
$STR_ChangeDDNS = "您确定要更改动态域名？";
//New......
$STR_NAS_Mode = "NAS 模式";
$STR_Login_Head = "登录设定";
$STR_DDNS_Head = "动态域名";
$STR_HTTP_Head = "Web端口";
$STR_FTP_Head = "FTP 服务";
$STR_LiveKeyword_Head = "在线内容";
$STR_Backup_Head = "备份/恢复";
$STR_Language_Head = "系统语言";
$STR_Time_Server_Head = "时间服务器";
$STR_Live_Server_IP="直播服务器 IP：";
$STR_Set_Default="恢复默认";
$STR_Confirm_Default="您确定想按直播服务器来设置默认的HTTP服务器？";
$STR_IP_Address="IP地址";
$STR_Special_IP_Address="是一个专用的IP地址，不能在这里使用。";
$STR_Invalid_IP_Address="不是一个有效的IP地址。";
$STR_Enter_Valid_IP="请输入一个有效的IP";
$STR_Enter_Live_url="请输入您的直播服务器URL";
$STR_Enter_without_http="请只输入服务器IP或DNS，去掉'http://'";
$STR_check_script_path="失败！请检查您的网络连接或脚本路径！";
$STR_default_port_only="（输入URL【去掉端口号】，只支持默认的80端口）";
$STR_Confirm_Default="您确定想使用您的默认HTTP服务器作为直播服务器？";
$STR_Confirm_Personal="您确定想使用您的个人HTTP服务器作为直播服务器？";
$STR_Net_Error="网络错误！请重试！";
$STR_Select_TimeServer="选择时间服务器：";
$STR_TimeServers="时间服务器";
$STR_Select_TimeZone="选择时区：";
$STR_Select_One="请选择";
$STR_Daylight_Saving="正在保存换日线(+)";
$STR_Current_Time="现在时间：";
$STR_Warning_TimeServer="请选择一个时间服务器！";
$STR_Warning_TimeZone="请选择时区！";
$STR_Another_Server="命令不成功！请用其他服务器重试。";
$STR_NFS_Client="NFS设置";
$STR_Browse="浏览";
$STR_Local_Mount="本地挂载点目录名：";
$STR_Remote_Mount="远程挂载点地址：";
$STR_Options="输入选项：";
$STR_select_lmount="请选择一个本地挂载点！";
$STR_select_rmount="请输入一个远程挂载点！";
$STR_select_option="请输入NFS安装选项！";
$STR_mount_failed="挂接失败！请检查远程服务器和网络连接（Windows服务器需关闭防火墙）。";
$STR_mount_Max="不能安装超过10个！";
$STR_No_dir_selected="没选择路径！";
$STR_One_dir_only="您只能选择一个目录！";
$STR_No_item_selected="没有选中条目！";
$STR_delete_failed="失败！请稍后重试。";
$STR_workgroup_host="工作组/主机名";
//New......
//新增
$STR_ReadXML="读取xml文件";

$STR_Language = "语言";
$STR_SelectLanguage = "选择语言：";
$STR_SelectLang = "选择语言";
$STR_Arabic = "Arabic";
$STR_Brazil = "Brazil";
$STR_Chinese = "简体中文";
$STR_Czech = "Čeština";
$STR_Danish = "Dansk";
$STR_German = "Deutsch";
$STR_English = "English";
$STR_Estonia = "Estonia";
$STR_Spain = "Español";
$STR_France = "Francais";
$STR_Greek = "Ελληνικά";
$STR_Hungarian = "Hungarian";
$STR_Hebrew = "עִברִית";
$STR_Italy = "Italiano";
$STR_Korean = "한국어";
$STR_Neder = "Nederlands";
$STR_Polish = "Polski";
$STR_Portu = "Português";
$STR_Russia = "Русский";
$STR_Solvenia = "Slovenia";
$STR_Turkish = "Türkçe";
$STR_Thai = "ไทย";
$STR_Vietname = "Vietnam";


$STR_BackupSetting = "备份设置：";
$STR_Backup = "备份";
$STR_BackupSuccess = "备份成功。";
$STR_Restore = "恢复";
$STR_RestoreConfirm = "恢复后播放器将重启。您确定要恢复吗？";
$STR_RestoreSuccess = "恢复成功，系统将马上重启……";
$STR_FactoryReset = "恢复默认：";
$STR_Reset = "重置";
$STR_ResetConfirm = "重置后播放器将重启。您确定要重置吗？";
$STR_ResetSuccess = "重置成功，系统将马上重启……";

//copy Move
$STR_NoFileSelected = "没有选中文件或者目录！";
$STR_SpecifyDestination = "请指定目标地址";
$STR_CopyTitle = "复制/移动";
$STR_CopySource = "源地址";
$STR_CopyDestination = "目标地址";
$STR_Copy = "拷贝";
$STR_Move = "移动";
$STR_CopySuccess ="拷贝成功";
$STR_MoveSuccess ="移动成功";
$STR_Close = "关闭";
$STR_SourceDestNotSame = "源地址和目标地址不能重复！";

//new Folder
$STR_CreateNewFolder = "建立文件夹";
$STR_CurrentLocation = "当前目录：";
$STR_FolderName = "文件夹名字：";
$STR_Create = "建立";
$STR_MaxLength = "(不能超过255个字符。)";
$STR_FolderCreated = "文件夹已建立";
$STR_UploadTo = "您的文件将被上传到";
$STR_Folder = "文件夹。";
$STR_FileAlreadyExists = "文件/文件夹已存在";
$STR_FolderAlreadyExists = "此文件夹已存在";
$STR_FolderNameInvalid = "文件夹命名不合法！";
$STR_EnterFolderName = "请输入一个文件夹名字先！";

//DDNS
$STR_DDNSChanged = "动态域名修改成功！";
$STR_UnknownError = "未知错误。";
$STR_DDNSExists = "动态域名已经存在！";
$STR_NetworkError = "网络错误";
$STR_DDNSinvalid = "动态域名无效，请输入字母数字字符组！";

//Delete
$STR_NoFileToDel = "没有选择要删除的文件";
$STR_ReallyDelete = "您确定要删除吗？";
$STR_DeleteTitle = "删除文件/文件夹";

//Login
$STR_LoginTitle = "登录";
$STR_UserID = "账户名";
$STR_AlreadyLogedIn = "您已经登录了。";
//$STR_GoTo = "Go to";
$STR_HomePage = "点击这里回到主页面";
$STR_AdminID = "输入账号和密码";
$STR_InvalidUsername = "无效账号/密码";
$STR_TryLoginAgain = "请重试登录";

//Logout
$STR_LogoutError = "错误：您不能注销因为您没有";
$STR_loggedin = "登录";
$STR_loggedOut = "您已经注销。";
//$STR_GoBack = "Go back to";
$STR_LoginPage = "回到登录页面";

//Mylist
$STR_MyListTitle = "我的列表";
$STR_MyListAllTitle = "我的列表";
$STR_MyListMusicTitle = "我的音乐列表";
$STR_MyListPhotoTitle = "我的照片列表";
$STR_MyListVideoTitle = "我的视频列表";
$STR_SelectMyList = "选择我的列表：";
$STR_FileList = "文件列表";
$STR_Add = "添加";
$STR_Remove = "删除";
$STR_NoFileToAdd = "没有选择要添加的文件！";
$STR_NoFileToRemove = "没有选择要删除的文件！";
$STR_FileExists = "文件已存在！";
$STR_CantOpen = "无法打开 ";
$STR_SelectAll = "全部选择";

//Micom
$STR_Restart = "系统重启中 ...!";

//Port
$STR_ValidPort = "错误：您必须输入一个有效的端口号！";
$STR_TryAgain = "重试";
$STR_AfterReeboot = "重启后，点击";

//register
$STR_LoginOptionChanged = "登录选项修改完毕！";
$STR_InvalidUsername = "错误：您必须输入一个有效的账号！";
$STR_InvalidPassword = "错误：您必须输入一个有效的密码！";
$STR_PasswordMismatch = "错误：两次输入的密码不一致！";
$STR_ChangeUserInfo = "修改用户信息";
$STR_UserInfoChanged = "您的用户信息已经成功修改。";
$STR_TryLogin = "请重新登录";

//rename
$STR_SpecifyFile = "请指定文件夹/文件的名字。";
$STR_RenameTitle = "重命名";
$STR_RenameHead = "重命名文件/文件夹 为";
$STR_NewName = "新名字：";
$STR_CheckFileToRename = "请选中您要改名的文件。";
$STR_CheckOnlyOne = "请只选择一个您要改名的文件。";
$STR_RenameSuccess = "文件/文件夹改名成功";
$STR_EnterValidName = "请输入有效的文件/文件夹名。";

//upload
$STR_UploadTitle = "文件上传";
$STR_SpecifyToUpload = "请指定要上传的文件。";
$STR_NoMoreFile = "请勿选择多个文件。";
$STR_AddToUpload = "添加一个要上传的文件";
$STR_UploadLocation = "上传到：";
$STR_NewFolderName = "新文件夹：";
$STR_TotalSize = "所有文件总计不能超过1 GB!";
$STR_AddFile = "添加文件";
$STR_Caution = "注意：";
$STR_TVFunction = "[UPnP Server Boost]";
$STR_If500 = "如果文件大于500MB，必须先按开始键！";
$STR_AfterFinishUpload = "上传完毕后点击开始按钮。";
$STR_Stop = "停止";
$STR_Start = "启用";
$STR_MaxFileSize = "最大文件不能超过1 GB！";
$STR_UploadSuccess = "文件上传成功！";
$STR_UploadError = "文件上传出错！";
$STR_Cancel = "取消";												//new
$STR_File_recvd = "文件已接收";									//new
$STR_Pending = "挂起 ...";										//new
$STR_Uploading = "上传中 ...";									//new
$STR_Moving = "移动中 ...";											//new
$STR_Cancelled= "已取消";										//new
$STR_Stopped = "已停止";											//new
$STR_InvalidName = "无效文件名。";							//new
$STR_FileAlreadyExists = "此文件已存在。";		//new
$STR_FileTooBig = "文件太大";								//new
$STR_ZeroByteFiles = "不能上传空文件。";				//new
$STR_InvalidFileType = "无效的文件类型";						//new
$STR_UnhandledError = "未知错误";							//new

//Live Keyword
$STR_LiveKeyTitle = "直播关键字";
$STR_DataSaved = "数据保存成功";

//VLC
$STR_Play = "播放";
$STR_Pause = "暂停";
$STR_StopPlaying = "停止";
$STR_Version = "版本";
$STR_Volume = "音量：";
$STR_Mute = "静音";
$STR_Buffering = "正在缓冲……";
$STR_Opening = "正在打开……";
$STR_VersionError = "请卸载您的 VLC 然后安装 VLC 的0.8.6h版本！";
$STR_SetupVLCConfirm = "Y您需要安装VLC播放器。是否确认继续？";
$STR_SetupVLC = "在此安装VLC 播放器 0.8.6h。";


$STR_DDNSIntroduce = "本系统采用inadyn客户端，支持的动态域名提供商列表参见";
$STR_DDNSIntroduceURL = "http://www.inatech.eu/inadyn";
$STR_DDNS_Username = "用户名";
$STR_DDNS_Password = "密码";
$STR_DDNS_Domain = "域名";

$STR_VideoLocationIntroduce = "请选择文件的位置：";
$STR_VideoHDD = "硬盘";
$STR_VideoUSB = "USB存储";
$STR_DDNSStopped = "动态域名解析已停止";
$STR_DDNSStarted = "动态域名解析已开始";
$STR_MyWorkgroup = "工作组:";
$STR_MyHost = "主机名:";
$STR_RC = "Web遥控器";
$STR_Reboot = "重启";
$STR_NASStarted = "NAS(samba)模式已启动。";
$STR_NASStopped = "NAS(samba)模式已停止。";
$STR_RebootConfirm = "你确定要重启播放器吗？";
$STR_WebRunConfirm = "系统将会重启，启动后1分钟内开始播放该文件。（此功能后续版本再开放。）";


$STR_OnlineUpdate = "在线更新";
$STR_WebVersionStatus = "当前Web控制台版本：";
$STR_Update = "更新";
$STR_CheckVersion = "检查";
$STR_IMSStatus = "当前IMS状态：";
$STR_Switch = "切换";
$STR_LocalIMS = "原厂IMS";
$STR_RemoteIMS = "HDPfans提供的IMS";
$STR_ConfirmSwitchIMS = "切换后系统会重启来生效，确定继续吗？";
$STR_ConfirmUpdate = "更新后系统会重启来生效，确定继续吗？";
$STR_ForceFlashFM = "刷写固件：";
$STR_ConfirmForceFlashFM = "你确定要刷写固件吗？";

$STR_SystemStatus = "系统状态";
$STR_CPU = "CPU";
$STR_MEM = "内存";
$STR_DISK = "磁盘";


$STR_SetupSoftware = "软件中心";
$STR_NotInstalled = "未安装";
$STR_Installed = "已安装";
$STR_Disabled = "已停用";
$STR_Enabled = "已启用";
$STR_Running = "运行中";
$STR_Install = "安装";
$STR_UnInstall = "卸载";
$STR_SoftwareName = "软件名";
$STR_InstallStatus = "安装状态";
$STR_RunStatus = "运行状态";
$STR_BootStatus = "开机启动";
$STR_HDDNeedFormat = "未接内置硬盘或内置硬盘未用播放器格式化，无法启动。";

$STR_sub = "字幕下载";
$STR_sub_downloading = "字幕下载中...";
$STR_subok = "字幕下载成功！";
$STR_subbad = "字幕下载失败！";

$STR_BTSearch = "BT种子搜索";
$STR_Search = "搜索";
$STR_SearchResult = "搜索结果";
$STR_Catename = "影片类别";
$STR_Filmname = "名称";
$STR_Download = "下载";
$STR_Posttime = "发布时间";
$STR_FilmSize = "文件大小";

$STR_VisitForum = "访问论坛";
$STR_URL = "http://www.hdpfans.com";
$STR_Copyright = "免费固件，尽在高清爱好者！";

$STR_OptwareExplain = "提示：点击软件名可以直接链接到对应的控制页面（前提是该软件在运行中），仅限于Transmission和MlDonkey。";
$STR_TRIntroduce = "注意：系统每半小时检查一次总的上传/下载任务数，将其控制在设定范围内。为避免死机，添加种子后请将其pause住，仅保留1~2个下载任务，此任务完成后，会自动开始新的种子。";
$STR_tr_seed = "最大做种数（1~100）：";
$STR_tr_download = "最大下载数（1~5）：";
$STR_head_transmission = "TR 设置";
$STR_Download_Dir = "下载保存目录：";
$STR_Config_Dir = "配置文件目录（必须ext3分区）：";

$STR_MmsIntroduce = "请输入影片地址，不限于mms，优酷，酷6，电影网，奇艺等等视频网站的播放页面也可以添加。";
$STR_MmsName = "视频名称：";
$STR_MmsAddr = "视频地址：";
$STR_AddVideo = "添加视频";
$STR_setup_mms = "添加RSS视频";
$STR_input_mms_name_addr = "请输入视频名称和地址！";
$STR_TestThisUrl = "   测试链接";
$STR_MMS_Tips = "此处添加内容后，在播放器上进入IMS（互联网视频）-> HDPfans在线 -> 我的收藏 -> Web控制台自定义 下可以看到。注意：添加的地址可以是mms地址，或者各大视频网站的播放页面，如http://v.youku.com/v_show/id_XMjM5OTE4OTQ0.html";
$STR_Import = "导入";
$STR_Export = "导出";
$STR_Upload_Ok = "上传视频列表文件成功！";
$STR_Upload_Fail = "上传失败！";
$STR_Lable_Import_Export = "视频列表导入导出:";

$STR_head_net_favorites = "网络收藏";
$STR_net_favorites_intro = "您可以通过网络浏览或者搜索一些您喜欢的影片，将它们添加到您的私人网络收藏夹，然后通过高清机上的HDPfans在线->我的收藏->网络搜藏 就能够播放了。网络收藏功能需要你输入HDPfans论坛的账号以绑定个人数据，点击这里免费注册一个账号：";
$STR_net_favorites_reg_URL = "http://www.hdpfans.com/member.php?mod=register.php";
$STR_net_favorites_register = "点击注册";
$STR_format_disk = "将内置硬盘转为ext3分区：";
$STR_convert = "转换";
$STR_ReallyFormat = "转换硬盘分区格式会删除掉硬盘内所有数据，您确定要继续吗？";
$STR_start_convert = "高清机将自动重启三次完成分区转换，其间请勿做任何操作。";
?>