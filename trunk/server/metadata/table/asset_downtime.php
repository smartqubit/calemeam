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

$_CALEM_table=array(
    'table_name'=>'asset_downtime',
    'module'=>'modCalemAsset',
    'cache_type'=>'database',
    'dbo'=>array(
    	'path'=>'server/modules/workorder/',
    	'name'=>'CalemWoDowntimeDbo',
    ),
    'primary_key'=>array(
    	'id'
    ),
    'order_by'=>array('field'=>'start_time', 'order'=>'DESC'),
    'indexes'=>array(
    	'idx_asset_downtime_start'=>array('start_time'),
    	'idx_asset_downtime'=>array('asset_id')
    ),
    'fields'=>array(
    	'id'=>array(
    		'type'=>'guid'  		
    	),
    	'asset_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'asset'
    	),
    	'downtime_type_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'downtime_type'
    	),
    	'downtime_cause_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'downtime_cause'
    	),
    	'start_time'=>array(
    		'type'=>'datetime',
    		'required'=>true
    	),
    	'shift_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'shift'
    	),
    	'end_time'=>array(
    		'type'=>'datetime'
    	),
    	'hours'=>array(
    		'type'=>'double',
    		'required'=>true
    	),
    	'wo_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'workorder'
    	),
    	'reported_by_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'users'
    	),
    	'reported_time'=>array(
    		'type'=>'datetime'
    	),
    	'note'=>array(
    	    'type'=>'varchar',
    	    'length'=>76
    	 ),
    	'modified_time'=>array(
    		'type'=>'datetime'
    	),
    	'modified_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'users'
    	),
    	'created_time'=>array(
    		'type'=>'datetime'
    	),
    	'created_id'=>array(
    		'type'=>'guid',
    		'lookup'=>'users'
    	)    	
    ) //End of fields list    
)
?>