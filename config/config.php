<?php
   // http://dev.rgx.re/wiki/config.html
   // @see rgx/class/config.class.php
   return [
        'db'    => [
            'pre'       => 'ips_',
            'type'      => 'mysql',
            'mysql'     => [
                'default'   => 'host=127.0.0.1;port=3306;db=matchmaking;user=root;passwd=;charset=utf8;profiling=1',
            ],
        ],
       'CACHE_VER'  => 2,
       'SYS_NAME'  => 'iMatchmaking',
       'tpl'        => [
          'style'     => 'style',
          '404_tpl'   => '404.tpl',
          'msg_tpl'   => 'msg.tpl',
          'ob'        => true,
          'native'    => false,
          'tpl_pre'   => '{',
          'tpl_suf'   => '}',
          'cmod'      => false,
          'charset'   => 'utf-8',
          'allow_php' => false
      ]
    ];
