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

require_once _CALEM_DIR_ . 'server/include/core/CalemException.php';

/**
 * This is the exception of transaction sequence error.
 */
 class CalemDboUpdateConflictException extends CalemException {
 	private $conflict;
 	private $server;
 	private $status= CALEM_DBO_UPDATE_CONFLICT;
 	
 	public function __construct($msg, $server, $conflict) {
 		parent::__construct($msg);
 		$this->server= $server;
 		$this->conflict=$conflict;
 	}
 	
 	public function getServer() {
 		return $this->server;
 	}
 	
 	public function getConflict() {
 		return $this->conflict;
 	}
 	
 	public function getStatus() {
 		return $this->status;
 	}
 }
?>