            <div class="col-md-4">


                        <!-- $search_query = "SELECT * FROM posts WHERE tags LIKE '%%' OR 1=1 ;--' " ; -->
<!--  -->
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>

                    <form action="" method='post'>
                   
                        <div class="input-group">
                            <input name='search_key' type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name='submit' class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                     </form>
                    <!-- /.input-group -->
                </div>
                    <div class="col-lg-6">
                            <ul class="list-unstyled">

                <?php
                    if(isset($_POST['submit'])){
                        $key = $_POST['search_key'];
                        $search_query = "SELECT * FROM posts WHERE tags LIKE '%$key%';" ;
                        echo $search_query;
                        if(!$search_query){
                            die('Error :(' . $search_query -> error);
                        }
                        $results = $conn -> query($search_query);
                        while ($result = $results -> fetch_assoc()){

                            ?>

                                <li><a href="#"><?php echo $result['title'] ?></a>
                                </li>

                     <?php   }

                    }


                ?>

                            </ul>
                        </div>


                <!-- Blog Categories Well -->
<!--                 <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row"> -->

                        <!-- /.col-lg-6 -->
   <!--                      <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#"> Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>


            </div>

        </div>