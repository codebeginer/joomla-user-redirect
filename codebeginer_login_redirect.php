<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  User.codebeginer_login_redirect
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.event.plugin' );

class  PlgUserCodebeginer_login_redirect extends JPlugin
{
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	public function onUserAfterLogin($options)
	{
		$app = JFactory::getApplication();
		if($this->params->get('enable_redirect'))
		{
			$user_profile_group = $this->params->get('user_profile_group');
			$redirect_menu_item = $this->params->get('user_profile_menuitem');
			
			$logged_in_user_group = $options['user']->groups;
			
			if(in_array($user_profile_group,$logged_in_user_group)){
				$app->setUserState('users.login.form.return', JRoute::_('index.php?Itemid='.$redirect_menu_item));
			}
		}
	}
}