<?php
namespace re\rgx;

/**
 * 通用助手类
 * $Id: common.helper.php 773 2017-11-28 10:33:50Z reginx $
 */
class common_helper extends rgx {
    /**
     * 是否
     * @var [type]
     */
    public static $bool = [
        1       => '否',
        2       => '是'
    ];

    const STATUS_WAITING    = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_PASSED     = 3;
    const STATUS_DENIED     = 4;

    public static $status = [
        1 => '等待审批',
        2 => '正在处理',
        3 => '审批通过',
        4 => '拒绝申请',
    ];

    /**
     * [收入支出类型]
     * @var [type]
     */
    public static $fee_type = [
        1 => '支出',
        2 => '收入',
    ];

    /**
     * 允许的素材类型
     * @var [type]
     */
    public static $allow_mime = [
        'jpg'       => 'image/jpeg',
        'jpeg'      => 'image/jpeg',
        'png'       => 'image/png',
        'zip'       => 'application/zip',
        'rar'       => [
            'application/x-rar-compressed',
            'application/x-rar'
        ],
        'xls'       => 'application/vnd.ms-excel',
        'xlsx'      => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'csv'       => ['text/csv', 'text/comma-separated-values'],
        'pdf'       => 'application/pdf'
    ];


    /**
     * 判断扩展名是否允许
     * @param  [type]  $ext [description]
     * @return boolean      [description]
     */
    public static function is_allowed_ext ($ext) {
        return isset(self::$allow_mime[$ext]);
    }

    /**
     * 检测 mime 是否 allow
     * @param  [type]  $type [description]
     * @return boolean       [description]
     */
    public static function is_allowed ($type) {
        $ret = false;
        foreach (self::$allow_mime as $k => $v) {
            if ($v == $type || (is_array($v) && in_array($type, $v))) {
                $ret = $k;
            }
        }
        return $ret;
    }
} //Class End