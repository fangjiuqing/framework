<?php
/*
  +-------------------------------------------------------
  + admin_perm 表模型
  + ------------------------------------------------------
  + @update 2018-12-11 09:08:02
  + @desc 若修改了表结构, 请使用下面的命令更新模型文件
  + @cmd /bin/php rgx/build.php -t -d=../ -pre=goods -f=1
  +-------------------------------------------------------
*/
namespace re\rgx;

class admin_perm_table extends table {

    /*
      +--------------------------
      + 编码
      +--------------------------
    */
    protected $_charset = 'utf8';

    /*
      +--------------------------
      + 字段
      +--------------------------
    */
    protected $_fields = [
        'id' => [
            'name'               => 'id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '权限ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'ap_name' => [
            'name'               => 'ap_name',
            'type'               => 'char',
            'field_type'         => 'char',
            'min'                => 0,
            'max'                => 32,
            'label'              => '项目名称',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'ap_code' => [
            'name'               => 'ap_code',
            'type'               => 'char',
            'field_type'         => 'char',
            'min'                => 0,
            'max'                => 64,
            'label'              => '项目标识',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'ap_type' => [
            'name'               => 'ap_type',
            'type'               => 'int',
            'field_type'         => 'tinyint',
            'min'                => 0,
            'max'                => 255,
            'label'              => 'ap_type',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
    ];

    /*
      +--------------------------
      + 主键
      +--------------------------
    */
    protected $_primary_key = [
        'key' => 'id',
        'inc' => true
    ];

    /*
      +--------------------------
      + 字段默认值
      +--------------------------
    */
    public $defaults = [
        'id'      => 0,
        'ap_name' => '',
        'ap_code' => '',
        'ap_type' => 0,
    ];

    /*
      +--------------------------
      + 字段过滤规则
      +--------------------------
    */
    public $filter = [
        'id'      => ['re\rgx\filter', 'int'],
        'ap_name' => ['re\rgx\filter', 'char'],
        'ap_code' => ['re\rgx\filter', 'char'],
        'ap_type' => ['re\rgx\filter', 'int'],
    ];

    /*
      +--------------------------
      + 唯一性检测
      +--------------------------
    */
    public $unique_check = [
        
    ];

    /*
      +--------------------------
      + 自定义字段验证规则
      + @example 
           [
               // 字段名称
               'name'  => 'user_name',
               // 验证类型, 0 使用filter::$rule的规则进行验证
               //         1 使用正则表达式验证
               //         2 使用自定义方法验证
               'type'  => 0,
               // 若type为 0 则 rule 表示规则名称
               //         1 则 rule 为正则表达式 (/^\w+$/)
               //         2 则 rule 为自定义方法或函数 (['re\rgx\filter', 'char']] 或 'is_numeric')
               'rule'  => 'require',
               // 验证失败返回的文案
               // 若要使用语言变量, 则用#开头. (例如: #user name)
               'error' => '您输入的用户名格式有误'
           ]
      +--------------------------
    */
    public $validate = [];

}