//=========================================================
//this is a auto generated php script by GearmanTool
//=========================================================
<?php
$worker_name = 'corp_tag';
$host = '192.168.8.56';
$port = '4730';
$host = $host . ':' . $port
$json_str = '{"request":{"work_list":[{"work_id":1419569803,"industry_name":"IT","company_name":"å¾®è½¯ä¸­å\u009B½æ\u009C\u0089é\u0099\u0090å\u0085¬å\u008F¸","position":"æ\u0096\u0087å\u0091\u0098","desc":"å·¥ä½\u009Cæ\u008F\u008Fè¿°:è´\u009Fè´£é¡¹ç\u009B®é\u0083¨å\u0086\u0085é¡µå\u008F\u008Aèµ\u0084æ\u0096\u0099æ\u0095´ç\u0090\u0086"}],"cv_id":"40159944"},"header":{"uid":"111","product":"algo_platform","appid":"16","ip":"192.168.8.210","user":"algo_platform"}}';
//call gearman worker
$client_tmp= new GearmanClient();
$client_tmp->addServers($host);
{"request":{"work_list":[{"work_id":1419569803,"industry_name":"IT","company_name":"å¾®è½¯ä¸­å\u009B½æ\u009C\u0089é\u0099\u0090å\u0085¬å\u008F¸","position":"æ\u0096\u0087å\u0091\u0098","desc":"å·¥ä½\u009Cæ\u008F\u008Fè¿°:è´\u009Fè´£é¡¹ç\u009B®é\u0083¨å\u0086\u0085é¡µå\u008F\u008Aèµ\u0084æ\u0096\u0099æ\u0095´ç\u0090\u0086"}],"cv_id":"40159944"},"header":{"uid":"111","product":"algo_platform","appid":"16","ip":"192.168.8.210","user":"algo_platform"}} = json_decode($json_str, true)
//error_log(var_export({"request":{"work_list":[{"work_id":1419569803,"industry_name":"IT","company_name":"å¾®è½¯ä¸­å\u009B½æ\u009C\u0089é\u0099\u0090å\u0085¬å\u008F¸","position":"æ\u0096\u0087å\u0091\u0098","desc":"å·¥ä½\u009Cæ\u008F\u008Fè¿°:è´\u009Fè´£é¡¹ç\u009B®é\u0083¨å\u0086\u0085é¡µå\u008F\u008Aèµ\u0084æ\u0096\u0099æ\u0095´ç\u0090\u0086"}],"cv_id":"40159944"},"header":{"uid":"111","product":"algo_platform","appid":"16","ip":"192.168.8.210","user":"algo_platform"}}, TRUE)."\n",3,"/tmp/errorLog.log"); 
{"request":{"work_list":[{"work_id":1419569803,"industry_name":"IT","company_name":"å¾®è½¯ä¸­å\u009B½æ\u009C\u0089é\u0099\u0090å\u0085¬å\u008F¸","position":"æ\u0096\u0087å\u0091\u0098","desc":"å·¥ä½\u009Cæ\u008F\u008Fè¿°:è´\u009Fè´£é¡¹ç\u009B®é\u0083¨å\u0086\u0085é¡µå\u008F\u008Aèµ\u0084æ\u0096\u0099æ\u0095´ç\u0090\u0086"}],"cv_id":"40159944"},"header":{"uid":"111","product":"algo_platform","appid":"16","ip":"192.168.8.210","user":"algo_platform"}} = msgpack_pack({"request":{"work_list":[{"work_id":1419569803,"industry_name":"IT","company_name":"å¾®è½¯ä¸­å\u009B½æ\u009C\u0089é\u0099\u0090å\u0085¬å\u008F¸","position":"æ\u0096\u0087å\u0091\u0098","desc":"å·¥ä½\u009Cæ\u008F\u008Fè¿°:è´\u009Fè´£é¡¹ç\u009B®é\u0083¨å\u0086\u0085é¡µå\u008F\u008Aèµ\u0084æ\u0096\u0099æ\u0095´ç\u0090\u0086"}],"cv_id":"40159944"},"header":{"uid":"111","product":"algo_platform","appid":"16","ip":"192.168.8.210","user":"algo_platform"}});
$result = $client_tmp->doNormal($worker_name, {"request":{"work_list":[{"work_id":1419569803,"industry_name":"IT","company_name":"å¾®è½¯ä¸­å\u009B½æ\u009C\u0089é\u0099\u0090å\u0085¬å\u008F¸","position":"æ\u0096\u0087å\u0091\u0098","desc":"å·¥ä½\u009Cæ\u008F\u008Fè¿°:è´\u009Fè´£é¡¹ç\u009B®é\u0083¨å\u0086\u0085é¡µå\u008F\u008Aèµ\u0084æ\u0096\u0099æ\u0095´ç\u0090\u0086"}],"cv_id":"40159944"},"header":{"uid":"111","product":"algo_platform","appid":"16","ip":"192.168.8.210","user":"algo_platform"}});
if (GEARMAN_SUCCESS==$client_tmp->returnCode()) {
	$result = msgpack_unpack($result);
	echo json_encode($result);
}
