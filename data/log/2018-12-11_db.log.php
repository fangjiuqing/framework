<?php
/*
 * @ip   127.0.0.1
 * @app  http://matchmaking.d/
 * @url  /index.php/goods/add?id=1.html
 * @date 2018-12-11 10:46:48 
 * @desc exception 'PDOException' with message 'SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'goods_id' in where clause is ambiguous' in /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php:107
Stack trace:
#0 /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php(107): PDO->query('select  *  \nFRO...')
#1 /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php(218): re\rgx\mysql_db->query('select  *  \nFRO...')
#2 /data/htdocs/matchmaking/rgx/class/table.class.php(358): re\rgx\mysql_db->get('select  *  \nFRO...', false, false)
#3 /data/htdocs/matchmaking/include/helper/goods.helper.php(52): re\rgx\table->get()
#4 /data/htdocs/matchmaking/module/goods.module.php(40): re\rgx\goods_helper::get(Array)
#5 /data/htdocs/matchmaking/rgx/class/app.class.php(77): com\default_www\goods_module->add_action()
#6 /data/htdocs/matchmaking/rgx/rgx.php(157): re\rgx\app::init()
#7 /data/htdocs/matchmaking/index.php(21): include('/data/htdocs/ma...')
#8 {main}
 * @extra Nil

 # line:00146 file : RGX:class/rgx.class.php re\rgx\file_log->write(exception 'PDOException' with message 'SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'goods_id' in where clause is ambiguous' in /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php:107
    Stack trace:
    #0 /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php(107): PDO->query('select  *  \nFRO...')
    #1 /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php(218): re\rgx\mysql_db->query('select  *  \nFRO...')
    #2 /data/htdocs/matchmaking/rgx/class/table.class.php(358): re\rgx\mysql_db->get('select  *  \nFRO...', false, false)
    #3 /data/htdocs/matchmaking/include/helper/goods.helper.php(52): re\rgx\table->get()
    #4 /data/htdocs/matchmaking/module/goods.module.php(40): re\rgx\goods_helper::get(Array)
    #5 /data/htdocs/matchmaking/rgx/class/app.class.php(77): com\default_www\goods_module->add_action()
    #6 /data/htdocs/matchmaking/rgx/rgx.php(157): re\rgx\app::init()
    #7 /data/htdocs/matchmaking/index.php(21): include('/data/htdocs/ma...')
    #8 {main},1,)
 # line:00110 file : RGX:extra/db/mysql.db.php re\rgx\LOGS(db,exception 'PDOException' with message 'SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'goods_id' in where clause is ambiguous' in /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php:107
    Stack trace:
    #0 /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php(107): PDO->query('select  *  \nFRO...')
    #1 /data/htdocs/matchmaking/rgx/extra/db/mysql.db.php(218): re\rgx\mysql_db->query('select  *  \nFRO...')
    #2 /data/htdocs/matchmaking/rgx/class/table.class.php(358): re\rgx\mysql_db->get('select  *  \nFRO...', false, false)
    #3 /data/htdocs/matchmaking/include/helper/goods.helper.php(52): re\rgx\table->get()
    #4 /data/htdocs/matchmaking/module/goods.module.php(40): re\rgx\goods_helper::get(Array)
    #5 /data/htdocs/matchmaking/rgx/class/app.class.php(77): com\default_www\goods_module->add_action()
    #6 /data/htdocs/matchmaking/rgx/rgx.php(157): re\rgx\app::init()
    #7 /data/htdocs/matchmaking/index.php(21): include('/data/htdocs/ma...')
    #8 {main})
 # line:00218 file : RGX:extra/db/mysql.db.php re\rgx\mysql_db->query(select  *  
    FROM `ips_goods` 
    left JOIN `ips_goods_detail`  ON ( ips_goods.goods_id = ips_goods_detail.goods_id ) 
    WHERE 1 = 1 
     AND (`goods_id` = '1') LIMIT  1 
    )
 # line:00358 file : RGX:class/table.class.php re\rgx\mysql_db->get(select  *  
    FROM `ips_goods` 
    left JOIN `ips_goods_detail`  ON ( ips_goods.goods_id = ips_goods_detail.goods_id ) 
    WHERE 1 = 1 
     AND (`goods_id` = '1') LIMIT  1 
    ,,)
 # line:00052 file : APP:include/helper/goods.helper.php re\rgx\table->get()
 # line:00040 file : APP:module/goods.module.php re\rgx\goods_helper::get([Array])
 # line:00077 file : RGX:class/app.class.php com\default_www\goods_module->add_action()
 # line:00157 file : RGX:rgx.php re\rgx\app::init()

*/
?><?php
/*
 * @ip   127.0.0.1
 * @app  http://matchmaking.d/
 * @url  /index.php/goods/add?id=1.html
 * @date 2018-12-11 10:46:48 
 * @desc 查询失败 「 1052#Column 'goods_id' in where clause is ambiguous 」</li><li>查询语句 「 select  *  
FROM `ips_goods` 
left JOIN `ips_goods_detail`  ON ( ips_goods.goods_id = ips_goods_detail.goods_id ) 
WHERE 1 = 1 
 AND (`goods_id` = '1') LIMIT  1 
 」
 * @extra Nil

 # line:00111 file : RGX:extra/db/mysql.db.php ()
 # line:00218 file : RGX:extra/db/mysql.db.php re\rgx\mysql_db->query(select  *  
    FROM `ips_goods` 
    left JOIN `ips_goods_detail`  ON ( ips_goods.goods_id = ips_goods_detail.goods_id ) 
    WHERE 1 = 1 
     AND (`goods_id` = '1') LIMIT  1 
    )
 # line:00358 file : RGX:class/table.class.php re\rgx\mysql_db->get(select  *  
    FROM `ips_goods` 
    left JOIN `ips_goods_detail`  ON ( ips_goods.goods_id = ips_goods_detail.goods_id ) 
    WHERE 1 = 1 
     AND (`goods_id` = '1') LIMIT  1 
    ,,)
 # line:00052 file : APP:include/helper/goods.helper.php re\rgx\table->get()
 # line:00040 file : APP:module/goods.module.php re\rgx\goods_helper::get([Array])
 # line:00077 file : RGX:class/app.class.php com\default_www\goods_module->add_action()
 # line:00157 file : RGX:rgx.php re\rgx\app::init()

*/
?>