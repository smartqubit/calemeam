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

$_CALEM_gen_data = array(
	'title'=>'Gen InDoc',
   'regenerate'=>true,
   'overwrite'=>false,
   'dataList'=>array(
      array(
			'file_src'=>array(
				'path'=>_CALEM_DIR_ . 'client/modules/inventory/form/controller/',
				'pattern'=>'CalemInStockForm'),
   		'file_dst'=>array(
   			'path'=>_CALEM_DIR_ . 'client/modules/inventory/form/controller/',
   			'pattern'=>'CalemInDocForm')
   	),
   	array(
			'file_src'=>array(
				'path'=>_CALEM_DIR_ . 'client/modules/inventory/form/view/',
				'pattern'=>'CalemInStockView'),
   		'file_dst'=>array(
   			'path'=>_CALEM_DIR_ . 'client/modules/inventory/form/view/',
   			'pattern'=>'CalemInDocView')
   	)
   ),
   'file_patterns'=>array(
   	'CalemInStock'=>'CalemInDoc',
   	'in_stock' => 'in_doc',
   	'location_id'=>'doc_id'   
   )
);

?>
