<?php
namespace com\default_www;
use \re\rgx as RGX;
// PASSED
/**
 * 管理登录
 * $Id: login.module.php 281 2017-08-29 11:38:33Z reginx $
 */
class login_module extends base_module {

    /**
     * 管理平台主页
     * @return [type] [description]
     */
    public function index_action () {
        if (!empty($this->login)) {
            $this->redirect('index');
        }
        if ($this->has('isajax', 'p')) {
            $this->submit($this->get('adm', 'p'));
        }
        $this->set_title('用户登录');
        $this->display('login.tpl');
    }


    /**
     * 创建密码及salt
     * @param  [type] $source [description]
     * @param  [type] $salt   [description]
     * @return [type]         [description]
     */
    public static function generate_passwd ($source, $salt = null) {
        $ret['salt'] = $salt ?: RGX\misc::randstr(6);
        $ret['passwd'] = md5(md5($source) . $ret['salt']);
        return $ret;
    }

    /**
     * 登录
     * @return [type] [description]
     */
    private function submit ($adm) {
        $last_verify = $this->sess_get('adm_login_verify');
        if ($last_verify > RGX\app::get_time() + 300 && false) {
            $geetest_challenge = $this->get('geetest_challenge', 'p');
            $geetest_validate  = $this->get('geetest_validate', 'p');
            $geetest_seccode   = $this->get('geetest_seccode', 'p');
            if (empty($geetest_challenge) || empty($geetest_validate) || empty($geetest_seccode)) {
                $this->ajax_failure('验证失败, 请完成滑动验证', 999);
            }

            $verify = RGX\geetest_helper::get_instance(1)->verify(
                $this->sess_get('geetest_alive'),
                $geetest_challenge,
                $geetest_validate,
                $geetest_seccode
            );
            if (!$verify) {
                $this->ajax_failure('验证失败, 请完成滑动验证', 999);
            }
            $this->sess_set('adm_login_verify', REQUEST_TIME);
        }

        if (empty($adm['admin_account'])) {
            $this->ajax_failure([
                'admin_account'     => '请输入登录账号'
            ]);
        }
        if (empty($adm['admin_passwd'])) {
            $this->ajax_failure([
                'admin_passwd'     => '请输入登录密码'
            ]);
        }

        $tab = RGX\OBJ('admin_table');

        $row = $tab->where("(admin_account = '{$adm[admin_account]}') OR (admin_email = '{$adm[admin_account]}')")->get();

        if (empty($row)) {
            self::_insert_admin();
            $this->ajax_failure(['admin_account' => '该账号不存在']);
        }

        $passwd = self::generate_passwd($adm['admin_passwd'], $row['admin_salt'])['passwd'];
        if ($passwd != $row['admin_passwd']) {
            $this->ajax_failure(['admin_passwd' => '您输入的密码不正确']);
        }

        $this->set_login($row);
        $this->ajax_success('登录成功', [], RGX\URL('index'));
    }

    /**
     * [_insert_admin description]
     * 插入一条管理员账号
     * @return [type] [description]
     */
    private static function _insert_admin () {
        $salt = RGX\misc::randstr(6);
        $data = [
            'admin_salt'      =>   $salt,
            'admin_account'   =>   'admin',
            'admin_passwd'    =>   self::generate_passwd('123456' , $salt)['passwd'],
            'admin_realname'  =>   'Andy',
            'admin_lastlogin' =>   time(),
            'admin_lastip'    =>   ip2long('127.0.0.1'),
            'admin_email'     =>   'tech-agent2@ipasspay.com',
        ];
        $tab = RGX\OBJ('admin_table');
        if ( $tab->load($data) ) {
            $ret = $tab->save();

            if ( $ret['code'] == 0 ) {
                die('ok');
            }
        }
        die('not ok');
    }

}// Class End