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
	public function removeFromTree(&$aOptions){

		foreach($aOptions as $key => &$oOption){

			//  Base case, stop recusrion on this branch
			//  Remove from options array
			if($oOption->nodeId == 14){
				error_log("FOUND... remove it");
				unset($aOptions[$key]);
			}

			//  Next...
			if(!empty($oOption->options)){
				$this->removeFromTree($oOption->options);
			}
		}
	}

	/**
	 * Find some thing in a tree and return a bool if found
	 * @param  object $oHaystack
	 * @param  string $sNeedle
	 * @return boolean
	 */
	public function findInTree($oElement, $sTarget){

		if(!empty($oElement->something) && $oHaystack->something == $sTarget){
			return true;
		} else{
			if(!empty($oElement->children)){

				$bFound = false;

				foreach($oElement->children as $oChild){
					if($this->findInTree($oChild, $sTarget)){
						$bFound = true;
					}
				}

				return $bFound;
			}
		}
	}


}

?>
