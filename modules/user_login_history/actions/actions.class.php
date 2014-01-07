<?php

require_once dirname(__FILE__).'/../lib/user_login_historyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/user_login_historyGeneratorHelper.class.php';

/**
 * user_login_history actions.
 *
 * @package    videotech
 * @subpackage user_login_history
 * @author     APP4MOB
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class user_login_historyActions extends autoUser_login_historyActions
{
     public function executeNew(sfWebRequest $request) {
        $this->redirect('@user_login_history');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->redirect('@user_login_history');
    }

    public function executeDelete(sfWebRequest $request) {
        $this->redirect('@user_login_history');
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $this->redirect('@user_login_history');
    }

    public function executeBatch(sfWebRequest $request) {
        $this->redirect('@user_login_history');
    }
}
