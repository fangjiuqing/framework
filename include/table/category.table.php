<?php
/*
  +-------------------------------------------------------
  + category 表模型
  + ------------------------------------------------------
  + @update 2018-12-11 09:08:02
  + @desc 若修改了表结构, 请使用下面的命令更新模型文件
  + @cmd /bin/php rgx/build.php -t -d=../ -pre=goods -f=1
  +-------------------------------------------------------
*/
namespace re\rgx;

class category_table extends table {

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
        'cat_id' => [
            'name'               => 'cat_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '分类ID',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_name' => [
            'name'               => 'cat_name',
            'type'               => 'char',
            'field_type'         => 'char',
            'min'                => 0,
            'max'                => 64,
            'label'              => '类别名称',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_parent' => [
            'name'               => 'cat_parent',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '所属类别',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_route' => [
            'name'               => 'cat_route',
            'type'               => 'char',
            'field_type'         => 'char',
            'min'                => 0,
            'max'                => 32,
            'label'              => '路由hash',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_py' => [
            'name'               => 'cat_py',
            'type'               => 'char',
            'field_type'         => 'char',
            'min'                => 0,
            'max'                => 32,
            'label'              => '类别拼音',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_sort' => [
            'name'               => 'cat_sort',
            'type'               => 'int',
            'field_type'         => 'smallint',
            'min'                => 0,
            'max'                => 65535,
            'label'              => '排序值',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_paths' => [
            'name'               => 'cat_paths',
            'type'               => 'char',
            'field_type'         => 'char',
            'min'                => 0,
            'max'                => 255,
            'label'              => '关系路径',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_level' => [
            'name'               => 'cat_level',
            'type'               => 'int',
            'field_type'         => 'tinyint',
            'min'                => 0,
            'max'                => 255,
            'label'              => '层次级别',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_type' => [
            'name'               => 'cat_type',
            'type'               => 'int',
            'field_type'         => 'tinyint',
            'min'                => 0,
            'max'                => 255,
            'label'              => '分类类型',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_desc' => [
            'name'               => 'cat_desc',
            'type'               => 'char',
            'field_type'         => 'varchar',
            'min'                => 0,
            'max'                => 2048,
            'label'              => '分类介绍',
            'allow_empty_string' => true,
            'allow_null'         => true
        ],
        'cat_admin_id' => [
            'name'               => 'cat_admin_id',
            'type'               => 'int',
            'field_type'         => 'int',
            'min'                => 0,
            'max'                => 4294967295,
            'label'              => '所属管理员ID',
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
        'key' => 'cat_id',
        'inc' => true
    ];

    /*
      +--------------------------
      + 字段默认值
      +--------------------------
    */
    public $defaults = [
        'cat_id'      => 0,
        'cat_name'    => '',
        'cat_parent'  => 0,
        'cat_route'   => '',
        'cat_py'      => '',
        'cat_sort'    => 0,
        'cat_paths'   => '#0#',
        'cat_level'   => 0,
        'cat_type'    => 0,
        'cat_desc'    => '',
        'cat_admin_id'=> 0,
    ];

    /*
      +--------------------------
      + 字段过滤规则
      +--------------------------
    */
    public $filter = [
        'cat_id'      => ['re\rgx\filter', 'int'],
        'cat_name'    => ['re\rgx\filter', 'char'],
        'cat_parent'  => ['re\rgx\filter', 'int'],
        'cat_route'   => ['re\rgx\filter', 'char'],
        'cat_py'      => ['re\rgx\filter', 'char'],
        'cat_sort'    => ['re\rgx\filter', 'int'],
        'cat_paths'   => ['re\rgx\filter', 'char'],
        'cat_level'   => ['re\rgx\filter', 'int'],
        'cat_type'    => ['re\rgx\filter', 'int'],
        'cat_desc'    => ['re\rgx\filter', 'char'],
        'cat_admin_id'=> ['re\rgx\filter', 'int'],
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

        /**
     * get category tree
     * @param number $root_id
     * @param bool $simple
     */
    public static function get_tree ($type_id = 0, $root_id = 0, $simple = false) {
        $ret = [];
        $tab = OBJ('category_table');
        if ($type_id > 0) {
            $tab->where("cat_type = {$type_id}");
        }
        $list = $tab->where("cat_paths like '%#{$root_id}#%'")->order('cat_level asc,cat_sort desc,cat_id asc')->get_all();
        foreach ($list as $k => $v) {
            if ((int)$v['cat_level'] === 0) {
                $v['nodes'] = [];
                $ret[$v['cat_id']] = $v;
            }
            else {
                $ref = &$ret;
                $paths = explode('#', substr(substr($v['cat_paths'], 3), 0, -1));
                while (!empty($paths)) {
                    $path = array_shift($paths);
                    $ref = &$ref[$path]['nodes'];
                }
                $v['nodes'] = [];
                $ref[$v['cat_id']] = $v;
            }
        }
        if ($simple) {
            $ret = self::_to_simple($ret, $has_spec);
        }
        return $ret;
    }

    /**
     * 转换为树形结构
     * @param number $root_id
     * @param bool $simple
     */
    public static function to_tree ($list, $simple = false) {
        $ret = [];
        foreach ($list as $k => $v) {
            if ((int)$v['cat_level'] === 0) {
                $v['nodes'] = [];
                $ret[$v['cat_id']] = $v;
            }
            else {
                $ref = &$ret;
                $paths = explode('#', substr(substr($v['cat_paths'], 3), 0, -1));
                while (!empty($paths)) {
                    $path = array_shift($paths);
                    $ref = &$ref[$path]['nodes'];
                }
                $v['nodes'] = [];
                $ref[$v['cat_id']] = $v;
            }
        }
        if ($simple) {
            $ret = self::_to_simple($ret, $has_spec);
        }
        return $ret;
    }

    /**
     * tree to simple array
     * @param unknown $data
     */
    public static function to_html ($data) {
        $result = new rgx();
        $result->data = [];
        array_walk($data, function ($v, $k, $res) use ($has_spec) {
            if (count($v) > 1) {
                $res->data[] = &$v;
            }
            if (!empty($v['nodes'])) {
                $res->data = array_merge($res->data, self::_to_simple($v['nodes'], $has_spec));
                unset($v['nodes']);
            }
            else {
                $v['last'] = true;
            }
        }, $result);
        return $result->data;
    }

    /**
     * tree to simple array
     * @param unknown $data
     */
    private static function _to_simple ($data) {
        $result = new rgx();
        $result->data = [];
        array_walk($data, function ($v, $k, $res) use ($has_spec) {
            if (count($v) > 1) {
                $res->data[] = &$v;
            }
            if (!empty($v['nodes'])) {
                $res->data = array_merge($res->data, self::_to_simple($v['nodes'], $has_spec));
                unset($v['nodes']);
            }
            else {
                $v['last'] = true;
            }
        }, $result);
        return $result->data;
    }

    /**
     * [get_list description]
     * @method get_list
     * @param  [type]   $type_id [description]
     * @param  [type]   $root_id [description]
     * @return [type]   [description]
     */
    public static function get_list ($type_id, $root_id, $akey = null, $level = null, $map = null) {
        $ret = [];
        $tab = OBJ('category_table');
        if ($type_id > 0) {
            $tab->where("cat_type = {$type_id}");
        }
        if ($root_id) {
            $tab->where("cat_paths like '%#{$root_id}#%'");
        }
        if ($level !== null) {
            $tab->where("cat_level = {$level}");
        }
        if ($akey) {
          $tab->akey($akey);
        }
        if ($map) {
          $tab->map($map);
        }
        return $tab->order('cat_level asc,cat_sort desc,cat_id asc')->get_all();
    }

} //Class End