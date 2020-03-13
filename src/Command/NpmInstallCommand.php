<?php
/**
 * Created by PhpStorm.
 * User: baofan
 * Date: 2020/2/25
 * Time: 14:11.
 */

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NpmInstallCommand extends Command
{
    protected static $defaultName = 'cron:npm-install';

    protected function configure()
    {
        $this
            ->setDescription('npm install')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('npm install beginning');

        if (strstr(PHP_OS, 'WIN')) {
            exec('npm install');

            $output->writeln('npm install SUCCESS');
        } else {
            $output->writeln('非开发环境，无需安装~');
        }
    }
}
