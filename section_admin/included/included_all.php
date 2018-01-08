<!--<div class="row">
  <div class="col-md-8">
    <h4><b>DEADLINE:</b>&nbsp;&nbsp;<span id="deadline_full"></span></h4>
  </div>
  <div class="col-md-4">
    <button data-toggle="modal" data-target="#modalDeadline" class="btn btn-success btn-sm pull-right"><b><i class="fa fa-clock-o"></i> Set Deadline</b></button>
  </div>
</div>!-->
<br>
<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
      <i class="fa fa-users"></i>Members&nbsp;<span id="empNumber" class="label label-success" style="border-radius:10px;">0</span>
      </div>
      <div class="panel-body" style="height:400px; overflow: auto;">
        <div class="list-group" id="empAll">
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
        <span id="fileNum" class="label label-success" style="border-radius:10px;">0</span>&nbsp;&nbsp;<i class="fa fa-user"></i><span id="fname"></span><span class="pull-right"><input onkeyup="searchFiles(this.value)" type="text" placeholder="Search" class="form-control" style="height: 25px; margin-top: 5px;"></span>
        </div>
      <div class="panel-body" ondrop="drop(event,0)" ondragover="allowDrop(event)" style="height:400px; overflow: auto;">
        <table class="table table-bordered" id="empFile">
          <thead>
            <tr>
              <th></th>
              <th><center>Files</center></th>
              <th><center>Actions</center></th>
              <th><center></center></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    <button onclick="apply()" id="btnApply" class="btn btn-info btn-sm pull-right"><i class="fa fa-check"></i> Apply</button>
  </div>
</div>