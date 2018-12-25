<?php
/*
  +-------------------------------------------------------
  + admin_logs 表模型
  + ------------------------------------------------------
  + @update 2018-12-11 09:08:02
  + @desc 若修改了表结构, 请使用下面的命令更新模型文件
  + @cmd /bin/php rgx/build.php -t -d=../ -pre=goods -f=1
  +-------------------------------------------------------
*/
namespace re\rgx;

class admin_logs_table extends table {

    /*
      +--------------------------
      + 编码
      +--------------------------
    */
    protected $_charset = 'utf8mb4';

    /*
      +--------------------------
      + 字段
      +--------------------------
    */
    protected $_fields = [
        'log_id' => [
            'name'               => 'log_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '日志ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'log_admin_id' => [
            'name'               => 'log_admin_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '操作的管理员ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'log_admin_name' => [
            'name'               => 'log_admin_name',
            'type'               => 'char',
            'field_type'         => 'varchar',
            'min'                => 0,
            'max'                => 120,
            'label'              => '操作的管理员名称',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'log_res_type' => [
            'name'               => 'log_res_type',
            'type'               => 'int',
            'field_type'         => 'smallint',
            'min'                => 0,
            'max'                => 65535,
            'label'              => '操作的资源类型',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'log_res_id' => [
            'name'               => 'log_res_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '操作的资源ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'log_remark' => [
            'name'               => 'log_remark',
            'type'               => 'char',
            'field_type'         => 'varchar',
            'min'                => 0,
            'max'                => 1024,
            'label'              => '备注',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'log_adate' => [
            'name'               => 'log_adate',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '操作时间',
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
        'key' => 'log_id',
        'inc' => true
    ];

    /*
      +--------------------------
      + 字段默认值
      +--------------------------
    */
    public $defaults = [
        'log_id'          => 0,
        'log_admin_id'    => 0,
        'log_admin_name'  => '',
        'log_res_type'    => 0,
        'log_res_id'      => 0,
        'log_remark'      => '',
        'log_adate'       => 0,
    ];

    /*
      +--------------------------
      + 字段过滤规则
      +--------------------------
    */
    public $filter = [
        'log_id'          => ['re\rgx\filter', 'int'],
        'log_admin_id'    => ['re\rgx\filter', 'int'],
        'log_admin_name'  => ['re\rgx\filter', 'char'],
        'log_res_type'    => ['re\rgx\filter', 'int'],
        'log_res_id'      => ['re\rgx\filter', 'int'],
        'log_remark'      => ['re\rgx\filter', 'char'],
        'log_adate'       => ['re\rgx\filter', 'int'],
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