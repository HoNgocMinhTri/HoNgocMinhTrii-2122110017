<?php
use App\Models\Topic;

//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$topic =  Topic::find($id);
if($topic==null){
    header("location:index.php?option=topic");
}
$list = topic::where('status','=',0)->orderBy('Created_at','DESC')->get();

?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết chủ đề</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
               <div class="row">

                  <div class="col-md-12 text-right">
                  <a href="index.php?option=topic" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về thương hiệu
                  </a>
                  </div>
               </div>

               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 
                                 <th>Tên Trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>

                           <tr>
                              <td>ID</td>
                               <td><?= $topic->id;?></td>
                           </tr>
                           <tr>
                              <td>name</td>
                               <td><?= $topic->name;?></td>
                           </tr>
                           <tr>
                              <td>slug</td>
                               <td><?= $topic->slug;?></td>
                           </tr>
                           <tr>
                              <td>description</td>
                               <td><?= $topic->description;?></td>
                           </tr>
                           <tr>
                              <td>created_at</td>
                               <td><?= $topic->created_at;?></td>
                           </tr>
                           <tr>
                              <td>created_by</td>
                               <td><?= $topic->created_by;?></td>
                           </tr>
                           <tr>
                              <td>updated_at</td>
                               <td><?= $topic->updated_at;?></td>
                           </tr>
                           <tr>
                              <td>updated_by</td>
                               <td><?= $topic->updated_by;?></td>
                           </tr>
                           <tr>
                              <td>status</td>
                               <td><?= $topic->status;?></td>
                           </tr>


                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>