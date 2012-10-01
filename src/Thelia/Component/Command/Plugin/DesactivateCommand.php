<?php

namespace Thelia\Component\Command\Plugin;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class DesactivateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('plugin:desactive')
            ->setDescription('Désactive un ou plusieurs plugin')
            ->addArgument('desactive', InputArgument::OPTIONAL, '')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $desactive = $input->getArgument('desactive');

        $active = $input->getArgument('active');
        $listPlugin = explode(',', $active);
        foreach($listPlugin as $plugin){
            \ActionsAdminModules::instance()->activer($plugin);
        }
        $output->writeln(sprintf('Plugins <info>%s</info> activated', implode(',', $listPlugin)));
    }
}