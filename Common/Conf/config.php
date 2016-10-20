 <?php
return array(
    'URL_CASE_INSENSITIVE' => true,
    'URL_MODEL' => 2,
    'TMPL_TEMPLATE_SUFFIX' => '.php',
    'URL_HTML_SUFFIX' => '.php',
    'URL_PATHINFO_DEPR' => '/',
    'MODULE_ALLOW_LIST' => array('Admin','Test'),
    'DEFAULT_MODULE' => 'Admin', //默认分组
    'MODULE_DENY_LIST' => array('Common'), //禁止访问分组
    'TMPL_L_DELIM' => '{',
    'TMPL_R_DELIM' => '}',

    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__ . '/static'
    ),

    //扩展函数库
    'LOAD_EXT_FILE' => 'base',

    //扩展配置文件
    'LOAD_EXT_CONFIG' => array('database'),
);