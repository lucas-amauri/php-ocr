<?php
/**
 * Chars regex pattern
 */

class Chars {
	private $default_end = '[01]+\n';
	private $default_start = '[01]+';

	public function __construct() {
		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_equal['char'] = '=';
		$this->_equal['pattern'] = '/';
		$this->_equal['pattern'] .= $this->default_start . '1{5,}' . $this->default_end;
		$this->_equal['pattern'] .= $this->default_start . '1{5,}' . $this->default_end;
		$this->_equal['pattern'] .= '0{5,}' . $this->default_end;
		$this->_equal['pattern'] .= '0{5,}' . $this->default_end;
		$this->_equal['pattern'] .= $this->default_start . '1{5,}' . $this->default_end;
		$this->_equal['pattern'] .= $this->default_start . '1{5,}' . $this->default_end;
		$this->_equal['pattern'] .= '/';

		$this->_minus['char'] = '-';
		$this->_minus['pattern'] = '/';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= $this->default_start . '0+1{5,}0+\n';
		$this->_minus['pattern'] .= $this->default_start . '0+1{5,}0+\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '0{7,}\n';
		$this->_minus['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_plus['char'] = '+';
		$this->_plus['pattern'] = '/';
		$this->_plus['pattern'] .= $this->default_start . '0{5,}1{2}0{5,}' . $this->default_end;
		$this->_plus['pattern'] .= $this->default_start . '0{5,}1{2}0{5,}' . $this->default_end;
		$this->_plus['pattern'] .= $this->default_start . '1{6,}' . $this->default_end;
		$this->_plus['pattern'] .= $this->default_start . '1{6,}' . $this->default_end;
		$this->_plus['pattern'] .= $this->default_start . '0{5,}1{2}0{5,}' . $this->default_end;
		$this->_plus['pattern'] .= $this->default_start . '0{5,}1{2}0{5,}' . $this->default_end;
		$this->_plus['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_0['char'] = '0';
		$this->_0['pattern'] = '/';
		$this->_0['pattern'] .= '1{3,}[0\n]+';
		$this->_0['pattern'] .= '1{4,}[0\n]+';

		$this->_0['pattern'] .= '1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '[01]+1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '[01]+1{1,}0{2,}1{1,}[0\n]+';
		$this->_0['pattern'] .= '1{3,}[0\n]+';
		$this->_0['pattern'] .= '1{4,}[0\n]+';
		$this->_0['pattern'] .= '/';

		$this->_1['char'] = '1';
		$this->_1['pattern'] = '/';
		$this->_1['pattern'] .= $this->default_start . '0+1{3,4}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{4,6}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+1{2,3}' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '1{5,8}' . $this->default_end;
		$this->_1['pattern'] .= $this->default_start . '1{5,8}' . $this->default_end;
		$this->_1['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_2['char'] = '2';
		$this->_2['pattern'] = '/';
		$this->_2['pattern'] .= $this->default_start . '1{3,4}' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '1{4,7}' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '10+1{2,}' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '1{6,10}' . $this->default_end;
		$this->_2['pattern'] .= $this->default_start . '1{6,10}' . $this->default_end;
		$this->_2['pattern'] .= '/';


		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_3['char'] = '3';
		$this->_3['pattern'] = '/';
		$this->_3['pattern'] .= '1{4,}[0\n]+';
		$this->_3['pattern'] .= '1{6,}[0\n]+';
		$this->_3['pattern'] .= '[01]0+1{1,}[0\n]+';
		$this->_3['pattern'] .= '[01]0+1{1,}[0\n]+';
		$this->_3['pattern'] .= '1{5,}[0\n]+';
		$this->_3['pattern'] .= '1{5,}[0\n]+';
		$this->_3['pattern'] .= '0+1{1,}[0\n]+';
		$this->_3['pattern'] .= '0+1{1,}[0\n]+';
		$this->_3['pattern'] .= '0+1{1,}[0\n]+';
		$this->_3['pattern'] .= '[01]+1{1,}[0\n]+';
		$this->_3['pattern'] .= '1{6,}[0\n]+';
		$this->_3['pattern'] .= '1{5,}[0\n]+';
		$this->_3['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_4['char'] = '4';
		$this->_4['pattern'] = '/';
		$this->_4['pattern'] .= $this->default_start . '1{2,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{3,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{1,}0+1{1,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{1,}0+1{1,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{1,}0+1{1,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{1,}0+1{1,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{1,}0+1{1,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{1,}0+1{1,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{6,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '1{6,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '0{5,}1{2,}' . $this->default_end;
		$this->_4['pattern'] .= $this->default_start . '0{5,}1{2,}' . $this->default_end;
		$this->_4['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_5['char'] = '5';
		$this->_5['pattern'] = '/';
		$this->_5['pattern'] .= '1{4,}[0\n]+';
		$this->_5['pattern'] .= '1{4,}[0\n]+';
		$this->_5['pattern'] .= '1{2}0+[0\n]+';
		$this->_5['pattern'] .= '1{2}0+[0\n]+';
		$this->_5['pattern'] .= '1{3,}[0\n]+';
		$this->_5['pattern'] .= '1{4,}[0\n]+';
		$this->_5['pattern'] .= '[01]0+1{2,}[0\n]+';
		$this->_5['pattern'] .= '0+1{2,}[0\n]+';
		$this->_5['pattern'] .= '0+1{2,}[0\n]+';
		$this->_5['pattern'] .= '[01]0+1{2,}[0\n]+';
		$this->_5['pattern'] .= '1{4,}[0\n]+';
		$this->_5['pattern'] .= '1{3,}[0\n]+';		
		$this->_5['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-14
		 */
		$this->_6['char'] = '6';
		$this->_6['pattern'] = '/';
		$this->_6['pattern'] .= $this->default_start . '1{2,4}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{4,7}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{2,2}0+10+\n';
		$this->_6['pattern'] .= $this->default_start . '1{2,2}0+\n';
		$this->_6['pattern'] .= $this->default_start . '1{5,7}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{6,8}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{2,}0+1{2}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{2,}0+1{2}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{2,}0+1{2}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{2,}0+1{2}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{5,7}' . $this->default_end;
		$this->_6['pattern'] .= $this->default_start . '1{4,6}' . $this->default_end;
		$this->_6['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_7['char'] = '7';
		$this->_7['pattern'] = '/';
		$this->_7['pattern'] .= $this->default_start . '1{6,}' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '1{6,}' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_7['pattern'] .= $this->default_start . '0+1{2,3}0+' . $this->default_end;
		$this->_7['pattern'] .= '/';

		$this->_8['char'] = '8';
		$this->_8['pattern'] = '/';
		$this->_8['pattern'] .= $this->default_start . '1{4,6}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{5,10}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{2,3}0+1{2,3}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{2,3}0+1{2,3}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{5,10}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{5,10}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{2,3}0+1{2,3}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{2,3}0+1{2,3}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{2,3}0+1{2,3}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{2,3}0+1{2,3}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{5,7}' . $this->default_end;
		$this->_8['pattern'] .= $this->default_start . '1{4,7}' . $this->default_end;
		$this->_8['pattern'] .= '/';

		/**
		 * Consolidate
		 * @date 2019-06-13
		 */
		$this->_9['char'] = '9';
		$this->_9['pattern'] = '/';
		$this->_9['pattern'] .= '1{2,}[0\n]+';
		$this->_9['pattern'] .= '1{3,}[0\n]+';		
		$this->_9['pattern'] .= '1{1,}0+1{1,}[0\n]+';		
		$this->_9['pattern'] .= '1{1,}0+1{1,}[0\n]+';		
		$this->_9['pattern'] .= '1{1,}0+1{1,}[0\n]+';		
		$this->_9['pattern'] .= '1{1,}0+1{1,}[0\n]+';		
		$this->_9['pattern'] .= '1{4,}[0\n]+';		
		$this->_9['pattern'] .= '1{4,}[0\n]+';
		$this->_9['pattern'] .= '0+1{2,}[0\n]+';		
		$this->_9['pattern'] .= '[01]0+1{2,}[0\n]+';		
		$this->_9['pattern'] .= '1{4,}[0\n]+';		
		$this->_9['pattern'] .= '1{2,}[0\n]+';		
		$this->_9['pattern'] .= '/';
	}
}
