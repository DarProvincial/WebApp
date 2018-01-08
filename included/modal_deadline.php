<div class="modal fade" id="modalDeadline" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-clock-o"></i> Set Deadline (<span id="dname" data-fid=""></span>)</h4>
			</div>
			<div class="modal-body">
				<label class="checkbox">
	                <input type="checkbox" value="0" onclick="setYesNo()" id="chkDead"> <span style="color:black;"> Set Deadline</span>
	            </label>
	          	<div id="groupElements" style="display: none;">
					<div class="row">
						<div class="col-md-2">
							<h5><b>Month:</b></h5>
						</div>
						<div class="col-md-10">
							<select class="form-control" id="dead_month">
							 	<?php
							 		$month = array("January","February","March","April","May","June","July","August","September","October","November","December"); 
							 		for($curDate = date('n')*1; $curDate<count($month); $curDate++){
							 			echo "<option value=\"".$curDate."\">".$month[$curDate-1]."</option>";
							 		}
							 		//(explode("-",date("Y-m-t")))[2]
							 	?> 
							 </select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<h5><b>Day:</b></h5>
						</div>
						<div class="col-md-10">
							<select class="form-control" id="dead_day">
							 	<?php
							 		for($day = date('d')*1; $day<=(explode("-",date("Y-m-t")))[2]; $day++){
							 			echo "<option>".$day."</option>";
							 		}
							 	?> 
							 </select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<h5><b>Year:</b></h5>
						</div>
						<div class="col-md-10">
							 <select class="form-control" id="dead_year">
							 	<?php
							 		for($year = date('Y'); $year<=date('Y')+10; $year++){
							 			echo "<option>".$year."</option>";
							 		}
							 	?>
							 </select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-2">
							<h5><b style="color:black;">TIME:</b></h5>
						</div>
						<div class="col-md-10">
							 <input type="time" class="form-control" id="dead_time">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-sm pull-right" onclick="saveDeadline()">Save</button>
			</div> 
		</div>
	</div>
</div>