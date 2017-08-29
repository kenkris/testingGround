<?php

class traverse{

	/**
	 * Basic traversing of an multidimensional array and filter out node
	 *
	 *	Ex:
	 *	options[
	 *		0 => {
	 *			nodeId = 666,
	 *			options = [
	 *				...
	 *			]
	 *		}
	 *	]
	 *
	 * @param  array  &$aOptions . Passed by reference so we dont need to return data
	 */
	public function testTraverse(&$aOptions){

		foreach($aOptions as $key => &$oOption){

			//  Base case, stop recusrion on this branch
			//  Remove from options array
			if($oOption->nodeId == 14){
				error_log("FOUND... remove it");
				unset($aOptions[$key]);
			}

			//  Next...
			if(!empty($oOption->options)){
				$this->testTraverse($oOption->options);
			}
		}
	}






}


?>
