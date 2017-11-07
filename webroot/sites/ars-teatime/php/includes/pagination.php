<!--Pagination jaune-->
<nav id="pgNav">
    <ul class="pagination pg-jaune flex-center">
        <!--Arrow left-->
        <li class="page-item">
           <?php
            if ($cPage>=$nbPage)
                echo'
                    <a class="page-link" aria-label="Next" href="?page='.$previous.'">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                ';
            ?>
            </a>
        </li>
        <!--Numbers-->
        <?php
        
        for($i=1;$i<=$nbPage;$i++){
            if($_GET['page']!=$i)
                echo'
                        <li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>
                    ';
            if($_GET['page']==$i)
                echo'
                        <li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>
                    ';
        }
            
        ?>
<!--        <li class="page-item active"><a class="page-link" href="?page=">1</a></li>-->
        <!--Arrow right-->
        <li class="page-item">
           <?php      
            if ($cPage<$nbPage)
            echo'
                <a class="page-link" aria-label="Next" href="?page='.$next.'">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            ';
            ?>
        </li>
    </ul>
</nav>
<!--/Pagination jaune-->