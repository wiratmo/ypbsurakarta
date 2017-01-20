<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Article</h4>
      </div>
        <form method="POST" action="{{url('contributor/article/baru')}}" >
          {{ csrf_field() }}
      <div class="modal-body">
      <!-- content -->
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#article">Content</a></li>
          <li><a data-toggle="tab" href="#meta">Meta</a></li>
        </ul>
        <div class="tab-content">
          
            <div id="article" class="tab-pane fade in active">
              <div class="form-group">
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title of the article" required>
              </div>
              <div class="form-group">
                <input type="text" name="tag" class="form-control"  id="tag" placeholder="Tag of the article">
              </div>
              <div class="form-group">
                <input type="text" name="category" class="form-control"  id="category" placeholder="Category of the article">
              </div>
              <div class="form-group">
                <textarea name="content" id="article-content" id="" class="form-control" placeholder="content of article"></textarea>
              </div>
            </div>
            <div id="meta" class="tab-pane fade">
              <div class="form-group">
                <textarea name="description"  class="form-control" placeholder="fill it with description of article"></textarea>
              </div>
              <div class="form-group">
                <textarea name="keyword"  class="form-control" placeholder="fill it with keyword of article"></textarea>
              </div>
            </div>  
            
          
          
      </div>
      </div>
      <!-- end content -->

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-md btn-primary" value="save article">
      </div>
      </form>
    </div>
  </div>
</div>