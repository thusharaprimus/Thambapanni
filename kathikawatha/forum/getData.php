<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');
    
    //Include database configuration file
    include('connection.php');
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 5;
    
    //set conditions for search
    $whereSQL = $orderSQL = '';
    $keywords = $_POST['keywords'];
    $sortBy = $_POST['sortBy'];
    if(!empty($keywords)){
        $whereSQL = "WHERE topic_subject LIKE '%".$keywords."%'";
    }
    if(!empty($sortBy)){
        $orderSQL = " ORDER BY topic_id ".$sortBy;
    }else{
        $orderSQL = " ORDER BY topic_id DESC ";
    }

    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM topics ".$whereSQL.$orderSQL);
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];

    //initialize pagination class
    $pagConfig = array(
        'currentPage' => $start,
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM topics $whereSQL $orderSQL LIMIT $start,$limit");
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            while($row = $query->fetch_assoc()){ 
                $postID = $row['topic_id'];
        ?>
            <div class="list_item"><a href="javascript:void(0);"><h2><?php echo $row["topic_subject"]; ?></h2></a></div>
        <?php } ?>
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php } } ?>