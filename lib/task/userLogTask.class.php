<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Create a new user.
 *
 * @package    symfony
 * @subpackage task
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id:  $
 */
class userLogTask extends sfBaseTask {

    /**
     * @see sfTask
     */
    protected function configure() {
        $this->addArguments(array(
            new sfCommandArgument('table_name', sfCommandArgument::REQUIRED, 'The table name'),
        ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
        ));

        $this->namespace = 'log';
        $this->name = 'generate-userLog';
        $this->briefDescription = 'Create view log user';
        $this->detailedDescription = <<<EOF
The [log:generate-userLog] task creates a log user:

  [./symfony log:generate-userLog jobeetJob]
EOF;
    }

    /**
     * @see sfTask
     */
    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        $sql = "DROP TABLE IF EXISTS `user_login_log`";
        $statement = Doctrine_Manager::getInstance()->connection();
        $results = $statement->execute($sql);
        $sql = 'CREATE VIEW `user_login_log` AS
 SELECT floor((1000 + (rand() * 89999))) AS id, count(t.id) as nb_entries,DATE_FORMAT(t.created_at,"%Y-%c-%d") as created_at, created_by 
 From ' . $arguments['table_name'] . ' t
 group by created_by,DATE_FORMAT(t.created_at,"%Y-%c-%d") order by DATE_FORMAT(t.created_at,"%Y-%c-%d") DESC ';
        $statement = Doctrine_Manager::getInstance()->connection();
        $results = $statement->execute($sql);



        $this->logSection('log', sprintf('view user_login_log created'));
    }

}