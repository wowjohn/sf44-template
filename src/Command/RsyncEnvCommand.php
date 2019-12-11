<?php
/**
 * Created by PhpStorm.
 * User: baofan
 * Date: 2019/12/11
 * Time: 13:13
 */

namespace App\Command;

use Apollo\ApolloClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Exception;

class RsyncEnvCommand extends Command
{
    protected static $defaultName = 'cron:rsync-env';

    protected function configure()
    {
        $this
            ->setDescription('实时同步配置文件')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('配置同步开始~');

        $apolloClient = new ApolloClient();

        $env = getenv('APP_ENV');
        if($env === false)
            $env = 'dev';

        $apolloAllConfigArray = $this->getApolloConfig();

        if (!$apolloEnvConfigArray = $apolloAllConfigArray[$env]) {
            $output->writeln('配置环境不合法~');

            return;
        }

        $apolloClient
            ->setConfigServerUrl($apolloEnvConfigArray['CONFIG_SERVER'])
            ->setAppId($apolloEnvConfigArray['APP_ID'])
            ->setNamespaceNames($apolloEnvConfigArray['NAMESPACES']);

        try {
            $apolloClient->noCacheRsync();

            /**
             * symfony4 保存至 .env
             */
            $apolloClient->getIsModifyStatus() && $apolloClient->saveToEnv();
        } catch (Exception $exception) {
            $output->writeln($exception->getMessage());
            $output->writeln('配置同步失败~');

            return;
        }

        $output->writeln('配置同步成功~');
    }

    private function getApolloConfig()
    {
        return [
            'dev'     => [
                'CONFIG_SERVER' => '192.168.0.1:30002',
                'APP_ID'        => 'tmp-api',
                'NAMESPACES'    => 'application',
            ],
            'test'    => [
                'CONFIG_SERVER' => '192.168.0.1:30004',
                'APP_ID'        => 'tmp-api',
                'NAMESPACES'    => 'application',
            ],
            'release' => [
                'CONFIG_SERVER' => '192.168.0.1:30006',
                'APP_ID'        => 'tmp-api',
                'NAMESPACES'    => 'application',
            ],
            'pre'     => [
                'CONFIG_SERVER' => '192.168.0.1:30008',
                'APP_ID'        => 'tmp-api',
                'NAMESPACES'    => 'application',
            ],
            'prod'    => [
                'CONFIG_SERVER' => '192.168.0.1:30010',
                'APP_ID'        => 'tmp-api',
                'NAMESPACES'    => 'application',
            ],
        ];
    }
}