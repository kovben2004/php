<?php
function ta($in) {
	if(TESTMODE==1) {
		echo('<pre class="ta">');
		print_r($in);
		echo('</pre>');
	}
}
?>