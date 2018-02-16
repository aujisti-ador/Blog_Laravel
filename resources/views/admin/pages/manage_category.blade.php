@extend('admin.admin_master')
@section('admin_main_content')
<div id=
     <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span10">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        foreach ($all_category as $v_category) {
                            ?>
                            <tr>
                                <td>{{$v_category->category_id}}</td>
                                <td class="center">{{$v_category->category_name}}</td>
                                <td class="center">
                                    <?php
                                    if ($v_category->publication_status == 1) {
                                        ?>
                                        <span class="label label-success">Published</span>
                                    </td>
                                    <?php
                                } elseif ($v_category->publication_status == 0) {
                                    ?>
                            <span class="label label-important">Unpublished</span>
                        <?php }
                        ?>

                        <td class="center">
                            <?php
                            if ($v_category->publication_status == 1) {
                                ?>
                                <a class="btn btn-danger" href="{{URL::to('/unpublish_category/'.$v_category->category_id)}}">
                                    <i class="halflings-icon white arrow-down"></i>  
                                </a>
                                <?php
                            } elseif ($v_category->publication_status == 0) {
                                ?>
                                <a class="btn btn-success" href="{{URL::to('/publish_category/'.$v_category->category_id)}}">
                                    <i class="halflings-icon white arrow-up"></i>  
                                </a>
                            <?php } ?>
                            <a class="btn btn-info" href="#">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete_category/'.$v_category->category_id)}}">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->
    @endsection