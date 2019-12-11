```text
    "scripts": {
        "auto-scripts": {
            "cache:clear": "symfony-cmd",
            "assets:install %PUBLIC_DIR%": "symfony-cmd"
        },
        "post-install-cmd": [
            "php bin/console cron:rsync-env",
            "@auto-scripts"
        ],
        "post-update-cmd": [
            "@auto-scripts"
        ]
    }
```

* 备注：
    
    * 在 composer.json 中 scripts 下添加 php bin/console cron:rsync-env，安装完依赖后运行配置同步，然后 cache:clear
    * 项目根目录增加 apollo 目录
    * src/Command 增加 RsyncEnvCommand ，apollo不同环境配置项都保存在该文件中，更新时修改本文件即可
    * 项目发布时，不用做任何操作
    * 定时任务可配置该命令 php bin/console cron:rsync-env，达到实时更新。（考虑到部分配置会生成至缓存中，故需执行清除缓存等命令）