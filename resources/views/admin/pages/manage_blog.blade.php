@extend('admin.admin_master')
@section('admin_main_content')
<script type="text/javascript">
    function check_delete()
    {
        chk = confirm("Are You Sure to Delete This?");
        if (chk)
        {
            return true;
        } else {
            return false;
        }
    }
</script>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Blog</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive table-hover">
                <thead>
                    <tr>
                        <th class="col-sm-2">Blog ID</th>
                        <th class="col-sm-4">Blog Title</th>
                        <th class="col-sm-3">Blog Image</th>
                        <th class="col-sm-3">Status</th>
                        <th class="col-sm-3">Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($blog_info as $v_blog)
                    <tr>
                        <td>{{$v_blog->blog_id}}</td>
                        <td>{{$v_blog->blog_title}}</td>
                        <td><img src="{{asset($v_blog->blog_image)}}" alt="img" height="50" width="100">
                        </td>
                        @if($v_blog->publication_status == 1)
                        <td><span class="label label-success">Published</span></td>
                        @elseif($v_blog->publication_status == 0)
                        <td><span class="label label-important">Unpublished</span></td>
                        @endif
                        <td>
                            @if($v_blog->publication_status == 1)
                            <a class="btn btn-danger canter" href="{{URL::to('/unpublish_blog/'.$v_blog->blog_id)}}">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            @elseif($v_blog->publication_status == 0)
                            <a class="btn btn-success" href="{{URL::to('/publish_blog/'.$v_blog->blog_id)}}">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            @endif

                            <a class="btn btn-info" href="{{URL::to('/edit_blog/'.$v_blog->blog_id)}}">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete_blog/'.$v_blog->blog_id)}}" onclick="return check_delete();">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!--/span-->
</div><!--/row-->
@endsection