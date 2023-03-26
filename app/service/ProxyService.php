<?php
declare (strict_types=1);

namespace app\service;

use think\facade\Db;
use think\Paginator;
use think\Service;

class ProxyService extends Service
{
    public function register()
    {
        $this->app->bind('proxyService', ProxyService::class);
    }

    public function getProtocolList(): array
    {
        return ['http', 'socks5', 'http+url', 'socks5+url'];
    }

    public function fetchByOwner($user_id): Paginator
    {
        return Db::name('proxy')->where('owner', $user_id)->paginate(25);
    }
}