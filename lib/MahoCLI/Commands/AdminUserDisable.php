<?php

namespace Maho\Commands;

use Mage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

#[AsCommand(
    name: 'admin:user:disable',
    description: 'Enable an admin user'
)]
class AdminUserDisable extends BaseMahoCommand
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->initMaho();
        $questionHelper = $this->getHelper('question');

        $question = new Question('username: ', '');
        $username = $questionHelper->ask($input, $output, $question);
        $username = trim($username);
        if (!strlen($username)) {
            $output->writeln('<error>Username cannot be empty</error>');
            return Command::INVALID;
        }

        $user = Mage::getModel('admin/user')
            ->loadByUsername($username);
        if (!$user->getUserId()) {
            $output->writeln('<error>User not found</error>');
            return Command::FAILURE;
        }

        $user->setIsActive(0);
        $user->save();
        $output->writeln("<info>User {$username} disabled</info>");

        return Command::SUCCESS;
    }
}