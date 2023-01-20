<?php 
require __DIR__.'/../vendor/autoload.php';
use think\facade\Db;;
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');


// 数据库配置信息设置（全局有效）
Db::setConfig([
    // 默认数据连接标识
    'default'     => 'mysql',
    // 数据库连接信息
    'connections' => [
        'mysql' => [
            // 数据库类型
            'type'     => 'mysql',
            // 主机地址
            'hostname' => $_ENV['DB_HOST'],
            //端口
            'hostport' => $_ENV['DB_PORT'],
            // 用户名
            'username' => $_ENV['DB_USERNAME'],
            //密码
            'password' => $_ENV['DB_PASSWORD'],
            // 数据库名
            'database' => $_ENV['DB_DATABASE'],
            // 数据库编码默认采用utf8
            'charset'  => 'utf8',
            // 数据库表前缀
            'prefix'   => '',
            // 数据库调试模式
            'debug'    => true,
        ],
    ],
]);

$data = Db::name('user')->where('id', 1)->find();

echo json_encode([
    'msg' => 'ok',
    'db' => Db::getConfig(),
    'test_user_data' => $data
]);