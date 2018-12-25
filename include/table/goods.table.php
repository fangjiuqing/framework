<?php
/*
  +-------------------------------------------------------
  + goods 表模型
  + ------------------------------------------------------
  + @update 2018-12-11 09:08:02
  + @desc 若修改了表结构, 请使用下面的命令更新模型文件
  + @cmd /bin/php rgx/build.php -t -d=../ -pre=goods -f=1
  +-------------------------------------------------------
*/
namespace re\rgx;

class goods_table extends table {

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
        'goods_id' => [
            'name'               => 'goods_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => 'goods_id',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'goods_name' => [
            'name'               => 'goods_name',
            'type'               => 'char',
            'field_type'         => 'varchar',
            'min'                => 0,
            'max'                => 255,
            'label'              => '商品名称',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'goods_admin_id' => [
            'name'               => 'goods_admin_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '所属管理员ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'goods_cat_id' => [
            'name'               => 'goods_cat_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '分类ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'goods_storage' => [
            'name'               => 'goods_storage',
            'type'               => 'int',
            'field_type'         => 'smallint',
            'min'                => 0,
            'max'                => 65535,
            'label'              => '库存',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'goods_cover' => [
            'name'               => 'goods_cover',
            'type'               => 'char',
            'field_type'         => 'varchar',
            'min'                => 0,
            'max'                => 255,
            'label'              => '商品封面',
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
        'key' => 'goods_id',
        'inc' => true
    ];

    /*
      +--------------------------
      + 字段默认值
      +--------------------------
    */
    public $defaults = [
        'goods_id'        => 0,
        'goods_name'      => '',
        'goods_admin_id'  => 0,
        'goods_cat_id'    => 0,
        'goods_storage'   => 0,
        'goods_cover'     => '',
    ];

    /*
      +--------------------------
      + 字段过滤规则
      +--------------------------
    */
    public $filter = [
        'goods_id'        => ['re\rgx\filter', 'int'],
        'goods_name'      => ['re\rgx\filter', 'char'],
        'goods_admin_id'  => ['re\rgx\filter', 'int'],
        'goods_cat_id'    => ['re\rgx\filter', 'int'],
        'goods_storage'   => ['re\rgx\filter', 'int'],
        'goods_cover'     => ['re\rgx\filter', 'char'],
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