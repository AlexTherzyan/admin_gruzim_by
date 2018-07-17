

<div class="row" style="margin-top: 50px;">
    <div class="col-2" style="border: 1px solid darkgray; margin-left: 20px">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-top: 10px">
            <!--<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>-->
           <?php $show=''; ?>
           <?php foreach ($category as $key): ?>

            <?php if ($key == 'Заказы') : ?>
                <?php $show='active';?>

                  <?php else:?>
                  <?php $show='';?>
             <?php endif;?>

                <a class="nav-link <?=$show;?>" id="v-pills-profile-tab" data-toggle="pill" href="#<?=$key;?>" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <?=$key;?>
                    <?php if ($key == 'Заказы') : ?>
                    <span class="badge badge-light" style="float: right;"><?=$record_count?></span>
                    <?php endif;?>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="col-9">


        <style>

        #btn_delete{
             position: relative;
        }

        #btn_delete .button1 {
             position: absolute;
            display: none;
        }


        #btn_delete:hover  .button1 {

            display: block;
        }

        </style>

        <div class="tab-content" id="v-pills-tabContent">
            <!--<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>-->

            <?php $count = 0; $show=''; ?>
            <?php foreach ($category as $key): ?>

                 <?php if ($key == 'Заказы') : ?>
                    <?php $show='show active';?>
                      <?php else:?>
                      <?php $show='';?>
                 <?php endif;?>


                <div class="tab-pane fade <?=$show;?>" id="<?=$key;?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                       <?php if ($key == 'Заказы') : ?>


                       <form class="form-inline my-2 my-lg-0"  action="" method="get" autocomplete="off">
                          <input name="s" class="form-control mr-sm-2 typeahead" id="typeahead"  type="search" placeholder="Поиск..." aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                       </form>


<!--                           <div class="search-bar" style="box-shadow: 0 0 3px rgba(0,0,0,0.1);">-->
<!---->
<!--                               <form action="" method="get" autocomplete="off">-->
<!--                                   <input type="text" class="typeahead" id="typeahead" name="s" value="Введите название продукта..." >-->
<!--                                   <input type="submit" value="">-->
<!--                               </form>-->
<!---->
<!--                               <!--<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">-->
<!--                               <input type="submit" value="">-->
<!--                           </div>-->

                           <?php if ($search ): ?>


                                   <table class="table table-hover" style="margin-top:20px;">
                                       <thead>
                                       <tr>
                                           <th scope="col"></th>
                                           <th scope="col">Имя</th>
                                           <th scope="col">Маршрут</th>
                                           <th scope="col">Статус</th>
                                           <th scope="col">Настройки</th>
                                       </tr>
                                       </thead>
                                       <tbody>

                               <?php foreach ($search as $sear): ?>

                                           <tr id="btn_delete">
                                               <th scope="row"><?=$count = $count+1;?></th>
                                               <td><?=$sear['name']; ?></td>
                                               <td ><?=$sear['info']; ?></td>
                                               <td><?=$sear['status']; ?></td>

                                               <form action = "#" method = "post">
                                                   <td>

                                                       <button name="change" type="submit" class="btn btn-outline-info button1 btn-sm" value="<?=$order['order_id'];?>">Изменить</button>

                                                   </td>
                                                   <td>
                                                       <button name="delete" type="submit" class="btn btn-outline-info button1 btn-sm" value="<?=$order['order_id'];?>"><?=$order['order_id'];?></button>
                                                   </td>
                                               </form>
                                           </tr>


                               <?php endforeach; ?>

                                       </tbody>
                                   </table>






                           <?php else: ?>

                               <table class="table table-hover" style="margin-top:20px;">
                                   <thead>
                                   <tr>
                                       <th scope="col"></th>
                                       <th scope="col">Имя</th>
                                       <th scope="col">Маршрут</th>
                                       <th scope="col">Статус</th>
                                       <th scope="col">Настройки</th>
                                       <th scope="col"></th>
                                   </tr>
                                   </thead>
                                   <tbody>




                                   <?php foreach($orders as $order): ?>
                                       <tr id="btn_delete">
                                           <th scope="row"><?=$count = $count+1;?></th>
                                           <td><?=$order['name']; ?></td>
                                           <td ><?=$order['info']; ?></td>
                                           <td><?=$order['status']; ?></td>



                                           <form action = "#" method = "post">
                                               <td>

                                                   <!-- Modal -->
                                                   <!-- Button trigger modal -->
                                                   <button  type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Изменить</button>

                                                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog" role="document">
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                       <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                               </div>

                                                                   <div class="modal-body">


                                                                           <div class="form-group">
                                                                               <label for="recipient-name" class="col-form-label">Маршрут:</label>
                                                                               <input  name="changedName" type="text" class="form-control" id="recipient-name" value="<?=$order['info']; ?>">
                                                                           </div>
<!--                                                                           <div class="form-group">-->
<!--                                                                               <label for="message-text" class="col-form-label">Message:</label>-->
<!--                                                                               <textarea class="form-control" id="message-text"></textarea>-->
<!--                                                                           </div>-->

                                                                       <button name="change" type="submit" class="btn btn-primary " value="<?=$order['order_id'];?>"  >Изменить</button>
                                                                   </div>
                                                                   <div class="modal-footer">
                                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<!--                                                                       <button name="change" type="submit" class="btn btn-primary " value="--><?//=$order['order_id'];?><!--"  >Изменить</button>-->
                                                                   </div>

                                                           </div>
                                                       </div>
                                                   </div>


                                               </td>

                                               <td>
                                                   <button name="delete" type="submit" class="btn btn-outline-info button1 btn-sm" value="<?=$order['order_id'];?>">удалить</button>
                                               </td>
                                           </form>
                                       </tr>

                                   <?php endforeach;?>


                                   </tbody>
                               </table>

                           <?php endif; ?>


                           <?php if ($pages_count > 1): ?>
                               <nav aria-label="...">
                                   <ul class="pagination ">
<!--                                       <li class="page-item disabled">-->
<!--                                           <a class="page-link" href="#" tabindex="-1">Previous</a>-->
<!--                                       </li>-->
                                       <?php foreach ($pages as $page): ?>

                                       <li class="page-item <?php if($page == $cur_page): ?> page-item active <?php endif; ?>">
                                           <a class="page-link " href="/?page=<?=$page;?>">
                                               <?=$page;?>

                                           </a>

                                       </li>

                                       <?php endforeach;?>

<!--                                       <li class="page-item">-->
<!--                                           <a class="page-link" href="#">Next</a>-->
<!--                                       </li>-->
                                   </ul>
                               </nav>
                           <?php endif;?>


                       <?php endif;?>



                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>







