<?php
/*
 * The contents of this file are subject to the CalemEAM Public License Version
 * 1.0 ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.calemeam.com/license
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied.  See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * The Original Code is: CalemEAM Open Source
 *
 * The Initial Developer of the Original Code is CalemEAM Inc.
 * Portions created by CalemEAM are Copyright (C) 2007 CalemEAM Inc.;
 * All Rights Reserved.
 
 * Contributor(s): 
 */


//Checking basic initialization
if (!defined('_CALEM_DIR_')) die("Access denied at ".__FILE__);

require_once _CALEM_DIR_ . 'server/include/core/CalemSoapRequest.php';
require_once _CALEM_DIR_ . 'server/include/core/CalemFactory.php';
require_once _CALEM_DIR_ . 'server/include/core/session/CalemSession.php';

/**
 * This class will validate user login and create session if login is successful
 */
class CalemLoginSo extends CalemSoapRequest {
	/**
	 * Authentication is not required to fire off this request
	 */
	public function authenticationRequired() {
 		return false;
 	}
 	/**
 	 * Handling the Soap Login Request
 	 * If login is successful create a session for it to come back.
 	 * @param string 		username
 	 * @param string		password
 	 * @param string		theme  	//@todo to add
 	 * @param string		language	//@todo to add
 	 */
 	public function Login() {
 		$user=$this->getParamValue(0);
 		$passwd=$this->getParamValue(1);
 		if ($this->logger->isDebugEnabled()) $this->logger->debug("Invoking the Login, user=" . $user . ", passwd=" . $passwd);
 		//Use BO to check login.
 		$rtn=false;
 		try {
 			list($succ, $ses) = CalemLoginSo::doLogin($user, $passwd);
			if ($succ) {//Login is successful.
				//@todo - creating theme & language (load from user input or last time stored).
				global $_CALEM_conf;
				return array('sessionId'=>$ses->getSid(), 'validityPeriod'=>$_CALEM_conf['calem_session_config']['lifeTime']);
			} 
 		} catch (Exception $e) {
 			$this->logger->error("Exception in processing login. Error msg=" . $e->getTraceAsString());
 		}
		$this->sendFault(CALEM_SF_INVALID_LOGIN);
 	}
 	
 	public static function doLogin($user, $passwd) {
 		$securityBo=CalemFactory::getSecurityBo();
		list($succ, $userDbo)=$securityBo->verifyLogin($user, $passwd);
		if ($succ) {//Login is successful.
			//Creating a session
			$ses=new CalemSession();
			$ses->set('user', $userDbo->getRow()); //Store off the user.
			$ses->save();
		} 
		return array($succ, $ses);
 	}
}
?>