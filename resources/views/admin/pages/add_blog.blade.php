@extend('admin.admin_master')
@section('admin_main_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h3 style="color:green">
            <?php
            echo Session::get('message');
            Session::put('message', '');
            ?>
        </h3>
        <div class="box-content">
            {!! Form::open(['url' => 'save_blog' , 'method' => 'post']) !!}
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Blog Title </label>
                    <div class="controls">
                        <input type="text" name="blog_title" class="span6 typeahead" id="typeahead">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Author Name </label>
                    <div class="controls">
                        <input type="text" name="author_name" class="span6 typeahead" id="typeahead">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Category Name</label>
                    <div class="controls">
                        <select name="category_name">
                            @foreach($publish_category as $v_category)
                            <option value = "{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Short Description</label>
                    <div class="controls">
                        <textarea name="blog_short_description" class="cleditor" id="textarea2" rows="3"></textarea>
                    </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Long Description</label>
                    <div class="controls">
                        <textarea name="blog_long_description" class="cleditor" id="textarea2" rows="3"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Publication Status</label>
                    <div class="controls">
                        <select name="publication_status">
                            <option selected value = "1">Published</option>
                            <option value = "0">Unpublished</option>
                        </select>
                    </div>
                </div>
<!--                <div class="control-group">
                    <label class="control-label" for="fileInput">File input</label>
                    <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" type="file">
                    </div>
                </div>          -->
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
</div><!--/span-->
@endsection