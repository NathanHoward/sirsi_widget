<?php

if($_REQUEST['query'] && $_REQUEST['num']){

	$q = $_REQUEST['query'];
	$a = $_REQUEST['opt'];
	$n = $_REQUEST['num'];

	$url = 'http://bibc.ocls.ca:8080/symws/rest/standard/searchCatalog?clientID=SymWSTestClient&term1='.$q.'&filter='.$a.'&hitsToDisplay='.$n;
	
	$xml = simplexml_load_file($url);
	echo "<table border=2>
	 <tr>
     
      <th>TITLE</th>
      <th>AUTHOR</th>
      <th>MATERIAL</th>
      <th>ISBN</th>
      <th>URL</th>
    </tr>";
	foreach($xml as $book){

		
			echo "<tr><td><b>" . $book->title . "</b></td>";
			echo "<td>".$book->author."</td>";
			echo "<td>" . $book->materialType."</td>";
			echo "<td>" . $book->ISBN."</td>";
			echo "<td><a href=" . $book->url." target='_blank'>".$book->url."</td></tr>";
		
		
	}   
	echo "<table>";

}

?>