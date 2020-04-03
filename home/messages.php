<?php
session_start();
$username = $_SESSION['username'];
require('../phpfiles/dbconnect.php');//DBCONNECTION


class Paginator {
 
     private $_conn;
        private $_limit;
        private $_page;
        private $_query;
        private $_total;
		
	 public function __construct( $conn, $query ) {
		 
		$this->_conn = $conn;
		$this->_query = $query;
	 
		$rs= $this->_conn->query( $this->_query );
		$this->_total = $rs->num_rows;
		 
	}
	public function getData( $limit = 10, $page = 1 ) {
     
    $this->_limit   = $limit;
    $this->_page    = $page;
   
 
    if ( $this->_limit == 'all' ) {
        $query      = $this->_query;
    } else {
		$offset=( ( $this->_page - 1 ) * $this->_limit );
        $query      = $this->_query . " LIMIT " . $offset . ", $this->_limit";
    }
    $rs             = $this->_conn->query( $query );
	 
   $results=array();
    while ( $row = $rs->fetch_assoc() ) {
        $results[]  = $row;
    }
 
    $result         = new stdClass();
    $result->page   = $this->_page;
    $result->limit  = $this->_limit;
    $result->total  = $this->_total;
    $result->data   = $results;
 
    return $result;
	}
	
	public function append_existing_query_string($qstring)
	{
		if(isset($_GET))
		{
			foreach($_GET as $k=>$v)
			{
				$qstring.="&".$k."=".$v;
			}
		}
		return $qstring;
	}
	
	public function createLinks( $links, $list_class ) {
    if ( $this->_limit == 'all' ) {
        return '';
    }
 
    $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
	    
	//
	$qstring='?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 );
	$qstring=$this->append_existing_query_string($qstring);
	//
	
    $html       .= '<li class="' . $class . '"><a href="'.$qstring.'">&laquo;</a></li>';
 
    if ( $start > 1 ) {
		
		//
		$qstring='?limit=' . $this->_limit . '&page=1';
		$qstring=$this->append_existing_query_string($qstring);
		//
        $html   .= '<li><a href="'.$qstring.'">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
		//
		$qstring='?limit=' . $this->_limit . '&page=' . $i;
		$qstring=$this->append_existing_query_string($qstring);
		//
        $html   .= '<li class="' . $class . '"><a href="'.$qstring.'">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
		//
		$qstring='?limit=' . $this->_limit . '&page=' . $last;
		$qstring=$this->append_existing_query_string($qstring);
		//
        $html   .= '<li><a href="'.$qstring.'">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
	
	$qstring='?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 );
	$qstring=$this->append_existing_query_string($qstring);
	
    $html       .= '<li class="' . $class . '"><a href="'.$qstring.'">&raquo;</a></li>';
 
    $html       .= '</ul><span style="float:right;color:blue">You have : '.$this->_total.' Messages</span>';
 
    return $html;
	}

}


	//DEFINE LIMIT for PER PAGE now 25 is page limit
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 4;
	
	//DEFAULT PAGE NUMBER if No page in url
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	
	//Number of frequency links to show at one time ; 
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 4;
   
   //your query here in query varriable
    $query  = "SELECT * FROM `q_messages` WHERE receiver='$username' ORDER BY ID DESC";
 
 //create a paging class object with connection and query parameters
    $Paginator  = new Paginator( $con, $query );
 
 //get the results from paginator class
    $results    = $Paginator->getData( $limit, $page ); 
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Quara msg</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
      #msgrap{
          border:2px solid #141e30;
          border-radius:15px;
          padding:20px;
          padding-bottom:1px;
          padding-top:5px;
          margin-top:20px;
      }
  </style>
</head>
<body>
    <nav class="fixed" id="navi">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo"><?php echo $username;?>'s Profile </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="../phpfiles/logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="index.php">Home</a></li>
        <li><a href="../phpfiles/logout.php">logout</a></li>
    </ul>

    <div class="no-pad-bot" id="index-banner">
        <div class="container">
        <br><br>
        <div class="row center">
            <div class="card large" style="height:auto;">
                <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/texting.gif">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Your Messages</span>
                    <?php 
			 
                    if(isset($results) && count( $results->data ) > 0){
                     
                     for( $i = 0; $i < count( $results->data ); $i++ ) { ?>

                    <div id='msgrap'>
                        <h6><?php echo $results->data[$i]['messagetxt']; ?></h6>
                        <hr/>
                        <h8 class='left'>Anonymous </h8>
                        <h8 class='right'><?php echo $results->data[$i]['datesent']; ?> <?php echo $results->data[$i]['timesent']; ?> </h8>
                        <div class='row'>
                            <a style='width:100%;' id='download-button' class='btn-small left waves-effect waves-light green-ligh' href='whatsapp://send?text=*Someone said this about me* %0a". $row['messagetxt'] . "%0avisit https://mp3crib.com and register to get anonymous messages like this😍😊' data-action='share/whatsapp/share'>Share via Whatsapp <i class='material-icons right'>share</i></a>
                        </div>
                    </div>
                    
                    <?php }?>
                    <p><?php echo $Paginator->createLinks( $links, $class="pagination"); ?></p>

                  <?php  } else{ ?>
                        <div id='msgrap'>
                                <h7>sorry you do not have any message yet share your profile link to get messages </h7>
                                <div class='row'>
                                    <a style="width:100%;" id="download-button" class="btn-large left waves-effect waves-light green-ligh" href="whatsapp://send?text=Write *Something you heard about me* 😉 I won't know who wrote it.. 😂❤ 👉   https://mp3crib.com/msg.php?name=<?php echo $username;?> " data-action='share/whatsapp/share'>Share via Whatsapp <i class='material-icons right'>share</i></a>
                                </div>
                            </div>

                    <?php
                    }
                    ?>
                    

                    
                </div>
                

            </div>
        </div>

        </div>
    </div>


  

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Made with &hearts; by  <a class="brown-text text-lighten-3" href="#">finify</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127419768-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127419768-2');
</script>
  </body>
</html>
